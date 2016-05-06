<?php

/**
 * Page
 *
 */
class Layout extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		    // 'name' => 'required',
        // 'content' => 'required',
        // 'category_id' => 'required|integer',
	];

	// protected $softDelete = true;

	protected $fillable = ['title' ,'content'   ];

  // public function cate(){
  //     // return $this->belongsTo('categories');
  // }

}
