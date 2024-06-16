<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $fillable = [
        'img',
        'invert',
        'blur',
        'contrast',
        'brightness',
        'grayscale',
        'opacity',
        'saturate',
        'sepia',
        'font-size',
        'font-weight'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];
    protected $table = 'style';
    public $timestamps = false;
    use HasFactory;
}
