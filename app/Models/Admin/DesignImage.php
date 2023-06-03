<?php

namespace App\Models\Admin;

use App\Models\Admin\Design;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DesignImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'design_id',
        'image'
    ];

    public function design()
    {
        return $this->belongsTo(Design::class);
    }
}
