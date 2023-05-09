<?php

namespace App\Models\Admin;

use App\Helpers\MixCaseULID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Printing extends Model
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
        'name_customer',
        'number_customer',
        'email_customer',
        'material',
        'scale',
        'file',
        'description'
    ];
}