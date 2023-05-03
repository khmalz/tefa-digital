<?php

namespace App\Models\Admin;

use App\Models\Admin\Design;
use App\Models\Admin\DesignFeature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesignCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'description'
    ];

    public function features()
    {
        return $this->hasMany(DesignFeature::class);
    }

    public function designs()
    {
        return $this->hasMany(Design::class);
    }
}