<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SpacecraftModel extends Model
{
    use HasFactory;

    protected $table = 'spacecraft';

    protected $guarded = ['created_at', 'updated_at'];

    protected $casts = ['armament' => 'array'];

    protected $fillable = [
        'id',
        'name',
        'class',
        'price',
        'crew',
        'status',
    ];

    public function getImageAttribute($value) {
        return env('APP_URL') . Storage::url($value);
    }

}
