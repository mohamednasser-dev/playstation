<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table="slider";
    protected $fillable = ['photo_ar','photo_en'] ;

    public function LangPhoto($lang)
    {
        $photo = Slider::find($this->id) ;
        $name='photo_'.$lang; 
        return ImagePath().$photo->$name ;
     
    }
}
