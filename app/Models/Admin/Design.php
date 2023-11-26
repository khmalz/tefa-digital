<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Znck\Eloquent\Traits\BelongsToThrough;

class Design extends Model
{
    use BelongsToThrough, HasFactory;

    protected $fillable = [
        'design_plan_id',
        'slogan',
        'color',
    ];

    protected $with = ['plan:id,title,price', 'category'];

    protected $appends = ['price', 'order_title'];

    public function order(): MorphOne
    {
        return $this->morphOne(Order::class, 'orderable');
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(DesignPlan::class, 'design_plan_id');
    }

    public function category(): \Znck\Eloquent\Relations\BelongsToThrough
    {
        return $this->belongsToThrough(
            DesignCategory::class,
            DesignPlan::class,
            'design_plan_id',
            null,
            [DesignCategory::class => 'design_category_id']
        );
    }

    public function images(): HasMany
    {
        return $this->hasMany(DesignImage::class, 'design_id');
    }

    public function getPriceAttribute()
    {
        return $this->plan->price;
    }

    public function getOrderTitleAttribute()
    {
        return $this->category->title;
    }
}
