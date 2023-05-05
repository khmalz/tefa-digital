<?php

namespace App\Models\Admin;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\VideographyCategory;
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
        'videography_category_id',
        'name_customer',
        'number_customer',
        'email_customer',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(VideographyCategory::class, 'videography_category_id');
    }
}