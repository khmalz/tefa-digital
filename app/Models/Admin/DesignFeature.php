<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'design_category_id'
    ];

    public function category()
    {
        return $this->belongsTo(DesignCategory::class);
    }
}