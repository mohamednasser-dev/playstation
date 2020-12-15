<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";
    protected $hidden = ['id', 'store_id'];
    protected $fillable = ['slack','parent', 'store_id', 'category_code', 'label_ar', 'description_ar','label_en', 'description_en','photo', 'status','discount_code_id','created_by', 'updated_by'];
    public function subcats($id,$lang){
        $label='label_'.$lang;
     return   Category::select('id', $label)->where('parent',$id)->get();
    }

    public function getPhoto(){
    	return ImagePath().$this->photo ;
    }
}
