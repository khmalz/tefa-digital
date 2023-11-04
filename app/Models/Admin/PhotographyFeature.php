<?php

namespace App\Models\Admin;

use App\Models\Admin\PhotographyPlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhotographyFeature extends Model
{
    use HasFactory;

    protected $table = 'photography_features';

    protected $fillable = [
        'photography_plan_id',
        'text',
        'description'
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(PhotographyPlan::class, 'photography_plan_id');
    }
}
