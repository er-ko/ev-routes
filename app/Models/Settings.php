<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_format',
        'currency',
        'temperature',
        'distance',
        'consumption',
        'weight',
    ];

    public static function defaultData() {
        return [
            'date_format'   => 'y-m-d',
            'currency'      => 'USD',
            'temperature'   => 'F',
            'distance'      => 'mi',
            'consumption'   => 'Wh',
            'weight'        => 'lb',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
