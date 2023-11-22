<?php

namespace App\Models\Admin;

use App\Models\Admin\Photography;
use App\Models\Admin\PhotographyPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class PhotographyCategory extends Model
{
    use HasFactory;

    protected $table = 'photography_categories';

    protected $fillable = [
        'title',
        'body',
        'image'
    ];

    public function plans(): HasMany
    {
        return $this->hasMany(PhotographyPlan::class, 'photography_category_id');
    }

    public function photographies(): HasManyThrough
    {
        return $this->hasManyThrough(
            Photography::class, // Model target
            PhotographyPlan::class,
            // Model melalui
            'photography_category_id',
            // foreign key pada model PhotographyPlan
            'photography_plan_id',
            // foreign key pada model Photography
            'id',
            // local key pada model PhotographyCategory
            'id' // local key pada model PhotographyPlan
        );
    }
}
