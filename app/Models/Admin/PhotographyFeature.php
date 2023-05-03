<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\PhotographyCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhotographyFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'photography_category_id'
    ];

    public function category()
    {
        return $this->belongsTo(PhotographyCategory::class);
    }
}