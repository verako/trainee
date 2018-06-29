<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{
    protected $fillable=['teme','message','filename','filepath','filemime','user_id','done',];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
