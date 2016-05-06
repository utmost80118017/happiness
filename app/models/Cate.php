<?php

/**
 * Page
 *
 */
class Cate extends \Eloquent {

	protected $table = 'categories';
  // protected $guarded = array('id', 'name');
	// Add your validation rules here
	public static $rules = [
		    'name' => 'required'
	];
	protected $softDelete = true;
	// Don't forget to fill this array
	protected $fillable = [     'name','type' , 'ad_main' ];



}
