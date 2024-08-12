<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;protected $fillable = [
        'userId',
        'managerId',
        'type',
        'marketkey'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId','id');
    }
    public function zeramanager()
    {
        return $this->hasOne(User::class, 'zerashopId', 'id');
    }
    public function lenamanager()
    {
        return $this->hasOne(User::class, 'lenashopId', 'id');
    }
    public function keymanager()
    {
        return $this->hasOne(User::class, 'keyshopId', 'id');
    }

}
