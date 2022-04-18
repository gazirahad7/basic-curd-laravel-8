<?php

namespace App\Models;

//use Illuminate\Notifications\HasDatabaseNotifications;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Employee extends Model
{
    //

    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['name', 'email', 'phone', 'designation', 'status'];
}