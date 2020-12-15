<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";
    protected $fillable = ['slack','store_id','product_code','name_en','name_ar','description_en','description_ar','category_id','supplier_id','tax_code_id','discount_code_id','quantity','purchase_amount_excluding_tax','sale_amount_excluding_tax','status','photo','soldout','available','created_by','updated_by'];
}
