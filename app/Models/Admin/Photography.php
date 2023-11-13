<?php

namespace App\Models\Admin;

use App\Models\Admin\PhotographyPlan;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photography extends Model
{
    use HasFactory, BelongsToThrough;

    protected $fillable = [
        'photography_plan_id',
    ];

    protected $with = ['plan:id,title,price', 'category'];
    protected $appends = ['price', 'order_title'];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(PhotographyPlan::class, 'photography_plan_id');
    }

    public function order(): MorphOne
    {
        return $this->morphOne(Order::class, 'orderable');
    }

    public function category(): \Znck\Eloquent\Relations\BelongsToThrough
    {
        return $this->belongsToThrough(
            PhotographyCategory::class,
            PhotographyPlan::class,
            'photography_plan_id',
            null,
            [PhotographyCategory::class => 'photography_category_id']
        );
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
