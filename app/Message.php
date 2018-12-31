<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    protected $fillable = ['nama','no_telp','email','message'];
    protected $primaryKey = 'id';

}
