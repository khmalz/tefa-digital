<?php

namespace App\Models\Admin;

use App\Models\Admin\DesignPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesignFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'design_plan_id'
    ];

    public function plan()
    {
        return $this->belongsTo(DesignPlan::class, 'design_plan_id');
    }
}