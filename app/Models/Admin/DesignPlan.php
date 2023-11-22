<?php

namespace App\Models\Admin;

use App\Models\Admin\DesignFeature;
use App\Models\Admin\DesignCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DesignPlan extends Model
{
    use HasFactory;

    protected $table = 'design_plans';

    protected $fillable = [
        'design_category_id',
        'title',
        'price',
        'description'
    ];

    public function designs(): HasMany
    {
        return $this->hasMany(Design::class, 'design_plan_id');
    }

    public function features(): HasMany
    {
        return $this->hasMany(DesignFeature::class, 'design_plan_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(DesignCategory::class, 'design_category_id');
    }
}
