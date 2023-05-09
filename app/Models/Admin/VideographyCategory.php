<?php

namespace App\Models\Admin;

use App\Models\Admin\Videography;
use App\Models\Admin\VideographyPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideographyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image'
    ];

    public function videographies()
    {
        return $this->hasMany(Videography::class, 'videography_category_id');
    }

    public function plans()
    {
        return $this->hasMany(VideographyPlan::class, 'videography_category_id');
    }
}