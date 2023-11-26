<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class VideographyCategory extends Model
{
    use HasFactory;

    protected $table = 'videography_categories';

    protected $fillable = [
        'title',
        'body',
        'image',
    ];

    public function plans(): HasMany
    {
        return $this->hasMany(VideographyPlan::class, 'videography_category_id');
    }

    public function videographies(): HasManyThrough
    {
        return $this->hasManyThrough(
            Videography::class, // Model target
            VideographyPlan::class,
            // Model melalui
            'videography_category_id',
            // foreign key pada model VideographyPlan
            'videography_plan_id',
            // foreign key pada model Videography
            'id',
            // local key pada model VideographyCategory
            'id' // local key pada model VideographyPlan
        );
    }
}
