<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DesignFeature extends Model
{
    use HasFactory;

    protected $table = 'design_features';

    protected $fillable = [
        'design_plan_id',
        'text',
        'description',
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(DesignPlan::class, 'design_plan_id');
    }
}
