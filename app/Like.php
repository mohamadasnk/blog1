<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    public function postLike(){

        return $this->belongsTo('App\Post');




    }






    public function usersLike(){


        return $this->belongsTo('App\User');



    }








}
