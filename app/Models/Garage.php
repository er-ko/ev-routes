<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Garage extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'name',
        'nickname',
        'image',
        'year',
        'power',
        'torque',
        'battery',
        'voltage',
        'drag_coefficient',
    ];

    public function routes(): HasMany
    {
        return $this->hasMany(Route::class);
    }

    public static function getCarBrands($request)
    {
        return DB::table('cars_brand')
                ->select('brand as value')
                ->where('brand', 'LIKE', '%' . $request . '%')
                ->get();
    }

    public static function getImage($request)
    {
        return DB::table('garages')
                ->where('id', '=', $request)
                ->value('image');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
