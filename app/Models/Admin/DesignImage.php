<?php

namespace App\Models\Admin;

use App\Models\Admin\Design;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DesignImage extends Model
{
    use HasFactory;

    protected $table = 'design_images';

    protected $fillable = [
        'design_id',
        'path'
    ];

    public function design(): BelongsTo
    {
        return $this->belongsTo(Design::class);
    }
}
