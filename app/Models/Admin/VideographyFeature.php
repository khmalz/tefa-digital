<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\VideographyCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideographyFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'videography_category_id'
    ];

    public function category()
    {
        return $this->belongsTo(VideographyCategory::class, 'videography_category_id');
    }
}