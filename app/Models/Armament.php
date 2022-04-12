<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armament extends Model
{
    use HasFactory;

    protected $table = 'armament';

    protected $guarded = ['created_at', 'updated_at'];

    protected $fillable = [
        'title',
        'qty',
        'spacecraft_id'
    ];

    public function spacecraft() {
        return $this->belongsTo(SpacecraftModel::class, 'spacecraft_id');
    }
}
