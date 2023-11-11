<?php

namespace App\Models\Admin;

use App\Models\Admin\VideographyPlan;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Videography extends Model
{
    use HasFactory, BelongsToThrough;

    protected $fillable = [
        'videography_plan_id',
    ];

    protected $with = ['plan', 'category'];
    protected $appends = ['price'];

    public function order(): MorphOne
    {
        return $this->morphOne(Order::class, 'orderable');
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(VideographyPlan::class, 'videography_plan_id');
    }

    public function category(): \Znck\Eloquent\Relations\BelongsToThrough
    {
        return $this->belongsToThrough(
            VideographyCategory::class,
            VideographyPlan::class,
            'videography_plan_id',
            null,
            [VideographyCategory::class => 'videography_category_id']
        );
    }

    public function getPriceAttribute()
    {
        return $this->plan->price;
    }
}
