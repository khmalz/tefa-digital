<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\VideographyPlan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideographyFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'videography_plan_id'
    ];

    public function plan()
    {
        return $this->belongsTo(VideographyPlan::class, 'videography_plan_id');
    }
}