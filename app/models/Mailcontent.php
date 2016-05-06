<?php

/**
 * Page
 *
 */
class Mailcontent extends \Eloquent {

	protected $table = 'mailcontent';
  // protected $guarded = array('id', 'name');
	// Add your validation rules here
	public static $rules = [
		    'title' => 'required',
				'content' => 'required',
	];
	protected $softDelete = true;
	// Don't forget to fill this array
	protected $fillable = [     'title','image' ,'content'];



}
