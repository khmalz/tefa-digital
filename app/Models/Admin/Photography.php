<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\PhotographyCategory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photography extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'photography_category_id',
        'name_customer',
        'number_customer',
        'email_customer',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(PhotographyCategory::class);
    }
}