<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\VideographyPlan;
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

    public function plan()
    {
        return $this->belongsTo(VideographyPlan::class, 'videography_plan_id');
    }
}