<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideographyFeature extends Model
{
    use HasFactory;

    protected $table = 'videography_features';

    protected $fillable = [
        'videography_plan_id',
        'text',
        'description',
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(VideographyPlan::class, 'videography_plan_id');
    }
}
