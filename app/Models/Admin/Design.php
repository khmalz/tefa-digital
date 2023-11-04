<?php

namespace App\Models\Admin;

use App\Models\Admin\DesignPlan;
use App\Models\Admin\DesignImage;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Design extends Model
{
    use HasFactory, BelongsToThrough;

    protected $fillable = [
        'order_id',
        'design_plan_id',
        'slogan',
        'color',
    ];

    protected $with = ['plan', 'category'];
    protected $appends = ['price'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
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
}
