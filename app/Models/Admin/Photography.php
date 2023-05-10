<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use App\Models\Admin\PhotographyPlan;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\PhotographyCategory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Photography extends Model
{
    use HasFactory;

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->ulid = MixCaseULID::generate();
        });
    }

    protected $fillable = [
        'photography_plan_id',
        'name_customer',
        'number_customer',
        'email_customer',
        'description'
    ];

    protected $with = ['plan', 'category:photography_categories.title'];
    protected $appends = ['price'];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(PhotographyPlan::class, 'photography_plan_id');
    }

    public function category(): HasOneThrough
    {
        return $this->hasOneThrough(
            PhotographyCategory::class, // Model target
            PhotographyPlan::class,
            // Model perantara
            'photography_category_id',
            // foreign key pada model PhotographyPlan
            'id',
            // foreign key pada model PhotographyCategory
            'id',
            // local key pada model Photography
            'photography_category_id' // local key pada model PhotographyPlan
        );
    }

    public function getPriceAttribute()
    {
        return $this->plan->price;
    }
}