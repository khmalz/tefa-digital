<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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

    public function photography(): HasOne
    {
        return $this->hasOne(Photography::class, 'order_id');
    }

    public function videography(): HasOne
    {
        return $this->hasOne(Videography::class, 'order_id');
    }

    public function design(): HasOne
    {
        return $this->hasOne(Design::class, 'order_id');
    }

    public function printing(): HasOne
    {
        return $this->hasOne(Printing::class, 'order_id');
    }

    public function scopeByStatus($query, $status): Builder
    {
        return $query->where('status', $status);
    }
}
