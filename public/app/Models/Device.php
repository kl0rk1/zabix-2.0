<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    // Указываем, какие поля могут быть массово присвоены
    protected $fillable = [
        'name',
        'ip_address',
    ];

    // Если вы хотите задать дополнительные настройки, можете их добавить здесь
}