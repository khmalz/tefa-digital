<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\VideographyFeature;
use App\Models\Admin\VideographyCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideographyPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'videography_category_id',
        'title',
        'price',
        'description'
    ];

    public function features()
    {
        return $this->hasMany(VideographyFeature::class, 'videography_plan_id');
    }

    public function category()
    {
        return $this->belongsTo(VideographyCategory::class, 'videography_category_id');
    }
}