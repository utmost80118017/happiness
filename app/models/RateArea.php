<?php

/**
 * Page
 *
 */
class RateArea extends \Eloquent {

  // Add your validation rules here
	public static $rules = [
		    'name'      => 'required',
				"flag"      => 'required',
				"title"      => 'required',
				 
	];

	protected $softDelete = true;
	protected $talbe = "rate_areas";
	protected $fillable = [	'name',"flag","title" ];



}
