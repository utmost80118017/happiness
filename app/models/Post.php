<?php

/**
 * Page
 *
 */
class Post extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		    'name' => 'required',
        // 'content' => 'required',
        // 'date' => 'required|date',
	];

	protected $softDelete = true;

	protected $fillable = ['name' ,'content' , 'category_id' , 'prim', 'image',"date" ];

  // public function cate(){
  //     // return $this->belongsTo('categories');
  // }

}
