<?php

namespace App\Models\Admin;

use App\Models\Admin\PhotographyPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhotographyFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'description',
        'photography_plan_id'
    ];

    public function plan()
    {
        return $this->belongsTo(PhotographyPlan::class, 'photography_plan_id');
    }
}