<?php

namespace App\Models\Admin;

use App\Models\Admin\DesignFeature;
use App\Models\Admin\DesignCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesignPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'design_category_id',
        'title',
        'price',
        'description'
    ];

    public function designs()
    {
        return $this->hasMany(Design::class, 'design_plan_id');

    }

    public function features()
    {
        return $this->hasMany(DesignFeature::class, 'design_plan_id');
    }

    public function category()
    {
        return $this->belongsTo(DesignCategory::class, 'design_category_id');
    }
}