<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nickname',
        'image',
    ];

    public function routes(): HasMany
    {
        return $this->hasMany(Route::class);
    }

    public static function getImage($request)
    {
        return DB::table('drivers')
                ->where('id', '=', $request)
                ->value('image');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
