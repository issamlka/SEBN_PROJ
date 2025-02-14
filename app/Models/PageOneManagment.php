<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageOneManagment extends Model
{
    use HasFactory;

    protected $table = 'pageone'; // Explicitly set the table name

    public $timestamps = false; // Disable timestamps
}
