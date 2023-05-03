<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printing extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_customer',
        'number_customer',
        'material',
        'scale',
        'file',
        'description'
    ];
}