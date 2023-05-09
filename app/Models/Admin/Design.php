<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use App\Models\Admin\DesignImage;
use App\Models\Admin\DesignPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function plan()
    {
        return $this->belongsTo(DesignPlan::class, 'design_plan_id');
    }

    public function images()
    {
        return $this->hasMany(DesignImage::class, 'design_id');
    }
}