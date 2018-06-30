<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{
//с какой таблицей работать
    protected $table='messages';

    protected $fillable=['teme','message','filepath','user_id','done',];//

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
