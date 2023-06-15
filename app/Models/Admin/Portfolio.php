<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'image',
    ];

    public function scopeGetSortedCategories($query)
    {
        return $query->pluck('category')->unique()->sortBy(function ($category) {
            switch ($category) {
                case 'design':
                    return 1;
                case 'photography':
                    return 2;
                case 'videography':
                    return 3;
                case 'printing':
                    return 4;
                default:
                    return 5;
            }
        })->values();
    }
}
