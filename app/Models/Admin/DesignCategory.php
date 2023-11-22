<?php

namespace App\Models\Admin;

use App\Models\Admin\DesignPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DesignCategory extends Model
{
    use HasFactory;

    protected $table = 'design_categories';

    protected $fillable = [
        'title',
        'body',
        'image'
    ];

    public function plans(): HasMany
    {
        return $this->hasMany(DesignPlan::class, 'design_category_id');
    }
}
