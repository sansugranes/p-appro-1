<?php

namespace App\Models;

class Question extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'content',
        'author',
        'createdat',
        'answer'
    ];
}
