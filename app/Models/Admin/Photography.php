<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use App\Models\Admin\PhotographyPlan;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photography extends Model
{
    use HasFactory, BelongsToThrough;

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

    protected $with = ['plan', 'category'];
    protected $appends = ['price', 'order'];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(PhotographyPlan::class, 'photography_plan_id');
    }

    public function category()
    {
        return $this->belongsToThrough(
            PhotographyCategory::class,
            PhotographyPlan::class,
            'photography_plan_id',
            null,
            [PhotographyCategory::class => 'photography_category_id']
        );
    }

    public function getPriceAttribute()
    {
        return $this->plan->price;
    }

    public function getOrderAttribute()
    {
        return $this->category->title;
    }
}
