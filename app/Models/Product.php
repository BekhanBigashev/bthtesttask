<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'data' => 'array'
    ];
    /**
     * @return mixed
     */
    public static function activeOnly()
    {
        return self::where('status', 'available')->get();
    }
}
