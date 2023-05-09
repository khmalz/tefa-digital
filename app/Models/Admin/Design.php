<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use App\Models\Admin\DesignImage;
use App\Models\Admin\DesignCategory;
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
        'design_category_id',
        'name_customer',
        'number_customer',
        'email_customer',
        'slogan',
        'color',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(DesignCategory::class, 'design_category_id');
    }

    public function images()
    {
        return $this->hasMany(DesignImage::class, 'design_id');
    }
}