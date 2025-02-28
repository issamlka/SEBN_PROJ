<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTwoManagment extends Model
{
    use HasFactory;

    protected $table = 'xu_tbl_users'; // Explicitly set the table name

    public $timestamps = false; // Disable timestamps
}
