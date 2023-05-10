<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use App\Models\Admin\VideographyPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    protected $with = ['plan.category'];
    protected $appends = ['price', 'order'];

    public function getPriceAttribute()
    {
        return $this->plan->price;
    }

    public function getOrderAttribute()
    {
        return $this->plan->category->title;
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(VideographyPlan::class, 'videography_plan_id');
    }
}
