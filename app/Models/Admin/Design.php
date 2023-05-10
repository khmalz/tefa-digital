<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use App\Models\Admin\DesignPlan;
use App\Models\Admin\DesignImage;
use App\Models\Admin\DesignCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Design extends Model
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
        'design_plan_id',
        'name_customer',
        'number_customer',
        'email_customer',
        'slogan',
        'color',
        'description'
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(DesignPlan::class, 'design_plan_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(DesignImage::class, 'design_id');
    }

    public function category(): HasOneThrough
    {
        return $this->hasOneThrough(
            DesignCategory::class, // Model target
            DesignPlan::class,
            // Model perantara
            'design_category_id',
            // foreign key pada model DesignPlan
            'id',
            // foreign key pada model DesignCategory
            'id',
            // local key pada model Design
            'design_category_id' // local key pada model DesignPlan
        );
    }
}