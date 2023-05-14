<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use App\Models\Admin\DesignPlan;
use App\Models\Admin\DesignImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Design extends Model
{
    use HasFactory;

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->ulid = MixCaseULID::generate();
        });
    }

    protected $fillable = [
        'design_plan_id',
        'name_customer',
        'number_customer',
        'email_customer',
        'slogan',
        'color',
        'description'
    ];

    protected $with = ['plan.category'];
    protected $appends = ['price', 'order'];

    public function getPriceAttribute()
    {
        return $this->plan->price;
    }

    public function getOrderAttribute()
    {
        return $this->plan->category->title;
    }

    public function scopeByStatus($query, $status): Builder
    {
        return $query->where('status', $status);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(DesignPlan::class, 'design_plan_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(DesignImage::class, 'design_id');
    }
}
