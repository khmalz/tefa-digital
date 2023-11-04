<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\VideographyFeature;
use App\Models\Admin\VideographyCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VideographyPlan extends Model
{
    use HasFactory;

    protected $table = 'videography_plans';

    protected $fillable = [
        'videography_category_id',
        'title',
        'price',
        'description'
    ];

    public function videographies(): HasMany
    {
        return $this->hasMany(Videography::class, 'videography_plan_id');
    }

    public function features(): HasMany
    {
        return $this->hasMany(VideographyFeature::class, 'videography_plan_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(VideographyCategory::class, 'videography_category_id');
    }
}
