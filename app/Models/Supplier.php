<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
   protected $table="suppliers";
   protected $fillable = ['name','photo'] ;

   public function ReturnLangPhoto()
    {
    	return  ImagePath().$this->photo ;
    }
}
