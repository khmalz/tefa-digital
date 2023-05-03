<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\VideographyCategory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Videography extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'videography_category_id',
        'name_customer',
        'number_customer',
        'email_customer',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(VideographyCategory::class, 'videography_category_id');
    }
}