<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

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
        'status',
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
}
