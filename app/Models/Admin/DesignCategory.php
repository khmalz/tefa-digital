<?php

namespace App\Models\Admin;

use App\Models\Admin\DesignPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesignCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image'
    ];

    public function plans()
    {
        return $this->hasMany(DesignPlan::class, 'design_category_id');
    }

    public function designs()
    {
        return $this->hasManyThrough(
            Design::class, // Model target
            DesignPlan::class,
            // Model melalui
            'design_category_id',
            // foreign key pada model DesignPlan
            'design_plan_id',
            // foreign key pada model Design
            'id',
            // local key pada model DesignCategory
            'id' // local key pada model DesignPlan
        );
    }
}