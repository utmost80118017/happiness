<?php

/**
 * Page
 *
 */
class People extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		    // 'name' => 'required',
				// 'tag'  => 'required',
        // 'content' => 'required',
        // 'image' => 'required|image',
				// 'image2' => 'required|image',
				// "title"=>"required|max:5",
	];

	protected $softDelete = true;
	protected $talbe = "peoples";

	protected $fillable = ['name' ,'fbLink','content','tag','title' , 'category_id' , 'prim', 'image','image2' ];

  // public function cate(){
  //     // return $this->belongsTo('categories');
  // }

}
