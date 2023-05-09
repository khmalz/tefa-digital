<?php

namespace App\Models\Admin;

use App\Models\Admin\Design;
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
}