<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Helpers\MixCaseULID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'orderable_id',
        'orderable_type',
        'name_customer',
        'number_customer',
        'email_customer',
        'description',
        'status'
    ];

    /**
     *  FIll ulid field when creating
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->ulid = MixCaseULID::generate();
        });
    }

    public function getRouteKeyName()
    {
        return 'ulid';
    }

    public function orderable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'orderable_type', 'orderable_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeByStatus($query, $status): Builder
    {
        return $query->where('status', $status);
    }

    public function scopeWhereCategory($query, $category)
    {
        return $query->whereHasMorph('orderable', ['App\Models\Admin\\' . $category], null);
    }

    public function scopeWhereFilterByTimePeriod($query, $timePeriod)
    {
        switch ($timePeriod) {
            case 'week':
                return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            case 'month':
                return $query->whereMonth('created_at', now()->month);
            case 'year':
                return $query->whereYear('created_at', now()->year);
            case 'all':
                return $query;
            default:
                return $query->whereDate('created_at', now());
        }
    }

    public function scopeWhereCanceledOrders($query)
    {
        return $query->where('status', 'cancel');
    }

    public function scopeWhereNotCanceledOrders($query)
    {
        return $query->where('status', '!=', 'cancel');
    }
}
