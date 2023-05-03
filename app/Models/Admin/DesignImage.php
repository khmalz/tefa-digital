<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'design_id',
        'path'
    ];

    public function design()
    {
        return $this->belongsTo(Design::class);
    }
}