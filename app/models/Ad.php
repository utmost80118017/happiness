<?php

/**
 * Page
 *
 */
class Ad extends \Eloquent {

    protected $table = 'ad';
  // protected $guarded = array('id', 'name');
    // Add your validation rules here
    public static $rules = [
            'title' => 'required',
            'image' => 'image',
            'url' => 'required|url'
    ];

    // protected $softDelete = true;
    // Don't forget to fill this array

    protected $fillable = ["title",'pr',"image","content","url","created_at","updated_at","category_id" ];



}
