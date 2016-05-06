<?php
 class Food extends \Eloquent {

    protected $table = 'food';
  // protected $guarded = array('id', 'name');
    // Add your validation rules here
    public static $rules = [
            // 'name' => 'required'
    ];
    // protected $softDelete = true;
    // Don't forget to fill this array
    protected $fillable = [ "title","content","address","latitude","longitude","tel","time","traffic","cate","created_at","updated_at","main_type"];



}
