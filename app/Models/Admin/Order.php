<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function photographies(): HasMany
    {
        return $this->hasMany(Photography::class, 'order_id');
    }

    public function videographies(): HasMany
    {
        return $this->hasMany(Videography::class, 'order_id');
    }

    public function designs(): HasMany
    {
        return $this->hasMany(Design::class, 'order_id');
    }

    public function printings(): HasMany
    {
        return $this->hasMany(Printing::class, 'order_id');
    }

    public function scopeByStatus($query, $status): Builder
    {
        return $query->where('status', $status);
    }
}
