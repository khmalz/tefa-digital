<?php

namespace App\Models\Admin;

use App\Models\Admin\Photography;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\PhotographyFeature;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhotographyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'description'
    ];

    public function features()
    {
        return $this->hasMany(PhotographyFeature::class);
    }

    public function photographies()
    {
        return $this->hasMany(Photography::class);
    }
}