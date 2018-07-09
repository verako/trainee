<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParsModel extends Model
{
    protected $table='pars';

    protected $fillable=['iframe_video','caption','description','picture',];//
}
