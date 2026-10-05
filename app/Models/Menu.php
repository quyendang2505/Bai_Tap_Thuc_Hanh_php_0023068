<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['slug', 'tenhienthi', 'trangthai'];

    protected function casts(): array
    {
        return ['trangthai' => 'boolean'];
    }
}
