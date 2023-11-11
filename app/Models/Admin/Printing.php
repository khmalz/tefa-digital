<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Printing extends Model
{
    use HasFactory;

    protected $fillable = [
        'material',
        'scale',
        'file',
    ];

    public function order(): MorphOne
    {
        return $this->morphOne(Order::class, 'orderable');
    }
}
