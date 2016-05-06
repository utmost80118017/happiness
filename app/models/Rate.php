<?php

/**
 * Page
 *
 */
class Rate extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		    'title' => 'required',				
				'address' => 'required',
				'lineLink'=> 'url',
				'videoLink'=> 'url',
				'vr360Link'=> 'url',
				'taiwanArea'=> 'required',
	];
	public static  $messages = array(
    'required' => 'The :attribute ',
		'url' => ':attribute 請輸入正確的URL',
	);



  protected $softDelete = true;
	// Don't forget to fill this array
	protected $fillable = [ 	'title' ,'image' ,
														'content','sub',
														'latitude','longitude',

														"investment","baseArea",
														"floor","households",
														"floorNumber","pattern",
														"prim",
														"postulate","one_price",
														"total_price","base_address",
														"reception","tel",
														"googleTitle","googleContent",
														"taiwanArea",
														'xm','ym',
														'lineLink','videoLink','vr360Link',
														'address','choice'];



}
