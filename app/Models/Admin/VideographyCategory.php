<?php

namespace App\Models\Admin;

use App\Models\Admin\Videography;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\VideographyFeature;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideographyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'description'
    ];

    public function features()
    {
        return $this->hasMany(VideographyFeature::class, 'videography_category_id');
    }

    public function videographies()
    {
        return $this->hasMany(Videography::class, 'videography_category_id');
    }
}