<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $fillable=['name'];//какие поля можно записывать в таблицу

   // protected $guarded=[*];//какие поля нельзя записывать в таблицу

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

}
