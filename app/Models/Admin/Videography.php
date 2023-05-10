<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use App\Models\Admin\VideographyPlan;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\VideographyCategory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Videography extends Model
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
        'videography_plan_id',
        'name_customer',
        'number_customer',
        'email_customer',
        'description'
    ];

    protected $with = ['plan', 'category:videography_categories.title'];
    protected $appends = ['price'];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(VideographyPlan::class, 'videography_plan_id');
    }

    public function category(): HasOneThrough
    {
        return $this->hasOneThrough(
            VideographyCategory::class, // Model target
            VideographyPlan::class,
            // Model perantara
            'videography_category_id',
            // foreign key pada model VideographyPlan
            'id',
            // foreign key pada model VideographyCategory
            'id',
            // local key pada model Videography
            'videography_category_id' // local key pada model VideographyPlan
        );
    }

    public function getPriceAttribute()
    {
        return $this->plan->price;
    }
}