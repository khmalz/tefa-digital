<?php

namespace App\Models\Admin;

use Illuminate\Support\Str;
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
            $model->ulid = self::generateMixCaseULID();
        });
    }

    /**
     * Summary of generateMixCaseULID
     * @return string
     */
    public static function generateMixCaseULID(): string
    {
        $ulid = (string) Str::ulid();
        $mixcase = implode("", array_map(fn($c) => rand(0, 1) ? strtolower($c) : strtoupper($c), str_split($ulid)));
        return $mixcase;
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