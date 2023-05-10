<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\PhotographyFeature;
use App\Models\Admin\PhotographyCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhotographyPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'photography_category_id',
        'title',
        'price',
        'description'
    ];

    public function photographies()
    {
        return $this->hasMany(Photography::class, 'photography_plan_id');
    }

    public function features()
    {
        return $this->hasMany(PhotographyFeature::class, 'photography_plan_id');
    }

    public function category()
    {
        return $this->belongsTo(PhotographyCategory::class, 'photography_category_id');
    }
}