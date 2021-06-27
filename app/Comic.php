<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'Title',
        'Type',
        'Series',
        'Sale Date',
        'Price',
        'Thumb',
        'Description'
    ];
}
