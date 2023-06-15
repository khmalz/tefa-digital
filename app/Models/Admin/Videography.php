<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use App\Models\Admin\VideographyPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Znck\Eloquent\Traits\BelongsToThrough;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Videography extends Model
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
        'videography_plan_id',
        'name_customer',
        'number_customer',
        'email_customer',
        'status',
        'description'
    ];

    protected $with = ['plan', 'category'];
    protected $appends = ['price', 'order'];

    public function getRouteKeyName()
    {
        return 'ulid';
    }
    public function plan(): BelongsTo
    {
        return $this->belongsTo(VideographyPlan::class, 'videography_plan_id');
    }

    public function category()
    {
        return $this->belongsToThrough(
            VideographyCategory::class,
            VideographyPlan::class,
            'videography_plan_id',
            null,
            [VideographyCategory::class => 'videography_category_id']
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

    public function scopeByStatus($query, $status): Builder
    {
        return $query->where('status', $status);
    }
}
