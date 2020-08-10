<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    //Add fillable property to be able to add data to database, it should contain array of items that you wanna add to the database
    protected $fillable = [
        'title',
        'mobile_number',
        'email',
        'body',
    ];
}
