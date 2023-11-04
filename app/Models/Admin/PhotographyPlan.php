<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\PhotographyFeature;
use App\Models\Admin\PhotographyCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PhotographyPlan extends Model
{
    use HasFactory;

    protected $table = 'photography_plans';

    protected $fillable = [
        'photography_category_id',
        'title',
        'price',
        'description'
    ];

    public function photographies(): HasMany
    {
        return $this->hasMany(Photography::class, 'photography_plan_id');
    }

    public function features(): HasMany
    {
        return $this->hasMany(PhotographyFeature::class, 'photography_plan_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PhotographyCategory::class, 'photography_category_id');
    }
}
