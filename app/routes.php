<?php

Route::get('/mpage/{id}', "MultiController@content");
Route::get('/multi_page_index', "MultiController@index");


Route::get('/', "FrontendController@index");
Route::get('/index', "FrontendController@index");
Route::get('/news', "FrontendController@news");
Route::get('/news2/{id}', "FrontendController@news2");
Route::get('/case', "FrontendController@case1");
Route::get('/case2/{id}', "FrontendController@case2");
Route::get('/deco', "FrontendController@deco");
Route::get('/deco2/{id}', "FrontendController@deco2");

Route::get('/people', "FrontendController@people");
Route::get('/people2/{id}', "FrontendController@people2");
Route::get('/about', "FrontendController@about");
// Route::get('/', "FrontendController@index");
Route::get('/jdata', "HomeController@jdata");
// Route::get('/food', "FrontendController@food");
Route::get('/demo1', "FrontendController@demo1");
Route::post('/demo1', "FrontendController@demo1");
Route::get('/showCase/{id}', "FrontendController@showCase");


Route::get('/search', "FrontendController@search");
Route::post('/search', "FrontendController@search");

Route::get('/explode', "UserController@explode");
Route::get('/construction', "FrontendController@construction");








Route::group(array('before' => 'auth'), function(){
	Route::get('/admin', "HomeController@index");
	//RateController
	//detailStore
	Route::get('/delRate/{id}', "RateController@delRate");
	Route::get('/rate/details/{id}', "RateController@details");
	Route::get('/rates', "RateController@index");
	Route::get('/rates/create', "RateController@create");
	Route::get('/rate/{id}', "RateController@edit");
	Route::post('/rateStore', "RateController@rateStore");
	Route::post('/detailStore', "RateController@detailStore");
	Route::post('/rateUpdate', "RateController@rateUpdate");


	//UserController
	Route::get('/user/{id}', "UserController@edit");
	Route::get('/users', "UserController@index");
	Route::get('/users/create', "UserController@create");
	Route::get('/delUser/{id}', "UserController@delUser");
	Route::post('/userUpdate', "UserController@userUpdate");
	Route::post('/UserStore', "UserController@UserStore");

	Route::get('/explode', "UserController@explode");


	//PostController
	Route::get('/posts', "PostController@index");
	Route::get('/delPost/{id}', "PostController@delPost");
	Route::get('/post/create', "PostController@create");
	Route::get('/post/{id}', "PostController@edit");
	Route::post('/postStore', "PostController@postStore");
	Route::post('/postUpdate', "PostController@postUpdate");

	//MailController
	Route::get('/mailcontents', "MailcontentController@index");
	Route::get('/delmailcontents/{id}', "MailcontentController@del");
	Route::get('/mailcontents/create', "MailcontentController@create");
	Route::get('/mailcontent/{id}', "MailcontentController@edit");
	Route::post('/mailcontentsStore', "MailcontentController@store");
	Route::post('/mailcontentsUpdate', "MailcontentController@update");


	//CategoryController
	Route::get('/delCategory/{id}', "CategoryController@delCategory");
	Route::get('/categories', "CategoryController@index");
	Route::get('/categories/create', "CategoryController@create");
	Route::get('/category/{id}', "CategoryController@edit");
	Route::post('/categoryStore', "CategoryController@categoryStore");
	Route::post('/categoryUpdate', "CategoryController@categoryUpdate");


  Route::get('/delAd/{id}', "AdController@delAd");
	Route::get('/ads/index/{id}', "AdController@index");
  Route::get('/adlist', "AdController@adlist");
	Route::get('/ads/create/{id}', "AdController@create");
	Route::get('/ads/{id}', "AdController@edit");
	Route::post('/adStore', "AdController@adStore");
	Route::post('/adUpdate', "AdController@adUpdate");

  //CategoryController
	Route::get('/delPeople/{id}', "PeopleController@delPeople");
	Route::get('/apeople', "PeopleController@index");
	Route::get('/people/create', "PeopleController@create");
	Route::get('/people/{id}', "PeopleController@edit");
	Route::post('/peopleStore', "PeopleController@peopleStore");
	Route::post('/peopleUpdate', "PeopleController@peopleUpdate");


  Route::post('/delPeopleImage1', "PeopleController@delPeopleImg1");
  Route::post('/delPeopleImage2', "PeopleController@delPeopleImg2");

  Route::get('/layout', "AdController@layout");


	//CategoryController
	Route::get('/delDeco/{id}', "DecoController@delDeco");
	Route::get('/decos', "DecoController@index");
	Route::get('/deco/create', "DecoController@create");
	Route::get('/deco/{id}', "DecoController@edit");
	Route::post('/decoStore', "DecoController@decoStore");
	Route::post('/decoUpdate', "DecoController@decoUpdate");


	//CategoryController
	Route::get('/delRateArea/{id}', "RateAreaController@del");
	Route::get('/rateAreas',    "RateAreaController@index");
	Route::get('/rateArea/create',  "RateAreaController@create");
	Route::get('/rateArea/{id}',    "RateAreaController@edit");
	Route::post('/rateAreaStore',   "RateAreaController@store");
	Route::post('/rateAreaUpdate',  "RateAreaController@update");

});



Route::post('/sgggglayout', "AdController@sgggglayout");


Route::post('/delRateImage', "RateController@delRateImage");

Route::get('/login', "HomeController@login");
Route::get('/logout', "HomeController@logout");


Route::post('/postRegister', "HomeController@postRegister");
Route::post('/postLogin', "HomeController@postLogin");




Route::get('/imgaa_aa', function()
{

   $img = Image::make('02.jpg');
  //  $img->text('太形', ($img->width()/10), ( $img->height()/10), function($font) {
  //       $font->file('WCL-02.ttf');
  //       $font->size(153);
  //       $font->color('#000000');
  //       $font->align('center');
  //       $font->valign('top');
	 //
  //   });
	// read all existing data into an array
	// $data = Image::make('public/foo.jpg')->iptc();
	//
	// // read only 'Copyright'
	// $copyright = Image::make('public/foo.jpg')->iptc('Copyright');

	// $img->sharpen(15);
	$img->save("utmost.jpg",50);
  return $img->response('png');

});

Route::get('/auth/facebook', 'UserController@loginWithFacebook');

Route::get('/fb', function(){
    echo "<a href='/auth/facebook'>Login with Facebook</a>";
});
Route::get('/te_xm_ym', 'RateController@te_xm_ym');

Route::get('/demo2',function(){
  $data["case"]    =Rate::first();
  return View::make("frontend.demo2",$data);
});




Route::post('/postRegister', "HomeController@postRegister");


Route::post('/sgggglayout',function(){
    $flag = Input::get("flag");
    $id   = Input::get("id");
    DB::table("layouts")->where("id",$id)->update(array("flag"=>$flag));
});



Route::get('/delThisAdImage/{id}',"AdController@delThisAdImage");



Route::get('/randoad',function(){

 	foreach(AD::all() as $ad){
		 $ad->pr = rand(2,9);
		 $ad->save();
	}
});


Route::post('/delThisAdImage',function(){

    $al=Input::all();
		$rates = Rate::where('xm',1)->get();




		if( $rates->count() <= 5){

				$rate = Rate::where('id',$al["id"])->first();

				if($rate->xm == 1 ){
					$rate->xm=0;
				}else{
					$rate->xm=1;
				}
				$rate->save();

				return 1;
		}else{
				return 2;
		}



});


Route::post('/selectRate',function(){

	$all=Input::all();
	$rates=Rate::where('xm',1)->get();
	if($rates->count() > 4 ){
		echo 'qweqweqwe';
	}else{


		$rate=Rate::find($all["id"]);
		$rate->xm=1;
		$rate->save;
		return 1;
	}


});

Route::get('/delDecoImage/{id}',"DecoController@delDecoImage");
Route::get('/delPostImage/{id}',"PostController@delPostImage");

Route::post('/decoFlagChange', function(){

	$all=Input::all();
	alert($all);

	// $rates=Rate::where('xm',1)->get();
	// if($rates->count() > 4 ){
	// 	echo 'qweqweqwe';
	// }else{
	//
	//
	// 	$rate=Rate::find($all["id"]);
	// 	$rate->xm=1;
	// 	$rate->save;
	// 	return 1;
	// }
});



Route::post('/setListImage', function(){

	$all=Input::all();
	$pic=DB::table("rate_pics")->where('id',$all["id"])->first();
	$rate_pics = DB::table("rate_pics")
														->where('rate_id',$pic->rate_id)
														->whereNotIn('name',array("setShow","setGoogle"))
														->get();
	foreach($rate_pics as $pic){
				DB::table("rate_pics")->where('id',$pic->id)->update(array("name"=>"") );
	}
	DB::table("rate_pics")->where('id',$all["id"])->update(array("name"=>"setList") );

	return 1;

});



Route::post('/setGoogleImage', function(){

	$all=Input::all();
	$pic=DB::table("rate_pics")->where('id',$all["id"])->first();
	$rate_pics = DB::table("rate_pics")
											->where('rate_id',$pic->rate_id)
											->whereNotIn('name',array("setShow","setList"))
											->get();

	foreach($rate_pics as $pic){
				DB::table("rate_pics")->where('id',$pic->id)->update(array("name"=>"") );
	}
	DB::table("rate_pics")->where('id',$all["id"])->update(array("name"=>"setGoogle") );

	return 1;

});


Route::post('/setShowImage', function(){

	$all=Input::all();
	$pic=DB::table("rate_pics")->where('id',$all["id"])->first();
	$rate_pics = DB::table("rate_pics")
								->where('rate_id',$pic->rate_id)
								->whereNotIn('name',array("setGoogle","setList"))
								->get();

	foreach($rate_pics as $pic){
				DB::table("rate_pics")->where('id',$pic->id)->update(array("name"=>"") );
	}
	DB::table("rate_pics")->where('id',$all["id"])->update(array("name"=>"setShow") );

	return 1;

});



Route::get('/ajax_pay', function(){

		$res=DB::table("peoples")->get();
		$ig="";
		$ig2="";
		foreach( $res as $row){
			$ig  = $row->image;
			$ig2 = $row->image2;
		}
		$arr = array('ig' => $ig, 'ig2' => $ig2);
		echo json_encode($arr);


});
