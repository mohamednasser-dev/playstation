<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Boxes;
class Gift_Box_Handle extends Model
{
    protected $table="box_gift_handle";
    protected $fillable = ['customer_id','box_id','card_id','product_id','message'];
    public $timestamps = false;

    public function box(){
    	return Boxes::find($this->box_id) ;
    }
}
