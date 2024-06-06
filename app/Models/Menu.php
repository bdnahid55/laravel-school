<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'menus';

    protected $fillable = [
        'name',
        'parent_id',
        'order',
        'url',
        //'target'

    ];

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

}
