<?php

/**
 * Page
 *
 */
class Cas extends \Eloquent {

    protected $table = 'cases';
  // protected $guarded = array('id', 'name');
    // Add your validation rules here
    public static $rules = [
            // 'name' => 'required'
    ];
    // protected $softDelete = true;
    // Don't forget to fill this array
    protected $fillable = [  
            "title","image","content","created_at","updated_at","address","choice",
            "floor_number","room","house_type","total_price","floor_number_price",
            "area","from_site","url",
            "latitude","longitude" ];



}
