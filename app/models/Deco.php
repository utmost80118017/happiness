<?php

/**
 * Page
 *
 */
class Deco extends \Eloquent {

  // Add your validation rules here
	public static $rules = [
		    'name'      => 'required',
        'content'   => 'required',
				'lineLink'  => 'url',
				'videoLink' => 'url',
				'vr360Link' => 'url',
				// 'image' => 'required',
	];

	protected $softDelete = true;
	protected $talbe = "decos";

	protected $fillable = [	'name' ,'content' ,
													'lineLink','videoLink','vr360Link','type',
													'category_id' , 'prim', 'image','flag'];



}
