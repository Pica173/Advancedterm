<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function getArea()
    {
        return optional($this->area)->name;
    }
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
    public function getGenre()
    {
        return optional($this->genre)->name;
    }
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
