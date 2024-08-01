<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'garage_id',
        'currency',
        'unit_distance',
        'unit_consumption',
        'unit_weight',
        'unit_temperature',
        'name',
        'drive_date',
        'driving_time',
        'from',
        'to',
        'distance',
        'charging_stops',
        'charging_time',
        'supplied_energy',
        'avg_temp',
        'avg_speed',
        'avg_consumption',
        'total_consumption',
        'price_per_kw',
        'real_price',
        'estimated_price',
        'loaded_weight',
        'trailer',
        'trailer_weight',
        'map_link',
        'map_iframe',
        'note',
        'public',
    ];
    
    public function garage(): BelongsTo
    {
        return $this->belongsTo(Garage::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
