<?php

class RateAreaController extends BaseController {


      public function __construct(){
          if (!Auth::check()){
            return Redirect::to('login');
          }
      }

      public function cate_init(){
        $cates=Cate::all();
        foreach($cates as $cate ){
            $cate_array[$cate->id]=$cate->name;
        }
        return $cate_array;
      }



    	public function index(){

          $cate_array       = $this->cate_init();
          $data["_title"]   = array("top"=>'新案訊息地區分類' ,"main"=>"Home","sub"=>"");
          $data["active"]   = "rateArea";



          $data["areas"]   = RateArea::orderBy("id","desc")->paginate(20);

    		  return View::make('admin.rateArea.index',$data);

    	}


      public function store(){

          $insert_array = array('name' =>  Input::get('name'),
                                'flag' =>  Input::get('flag'),
                                'title' =>  Input::get('title'));
          $validator = Validator::make($insert_array, RateArea::$rules );

          if ( $validator->fails()) {

              return Redirect::to('/rateArea/create')->withErrors($validator);
          } else {

              $this_ad = RateArea::create($insert_array);
              return Redirect::to('/rateAreas');

          }

      }

      public function update(){

        $id           =  Input::get('id');
        $update_data  = array('name' => Input::get('name'),
                              'flag' =>  Input::get('flag'),
                              'title' =>  Input::get('title'));
        $validator    = Validator::make(Input::all(), RateArea::$rules);
        if ( $validator->passes() ) {
                RateArea::where('id',$id)->update($update_data);
                return Redirect::to('/rateAreas');
        } else {
                return Redirect::to('/rateArea/'.$id)->withErrors($validator);
        }

      }




      public function create( ){


          $cate_array=$this->cate_init();
          $data["post"] = "";

          $data["_title"] = array("top"=>"新案訊息地區分類" ,"main"=>"Home","sub"=>"rateRate");
          $data["active"] = "rateArea";
    		  return View::make('admin.rateArea.create',$data);
    	}

      public function edit($id){

          $cate_array=$this->cate_init();
          $data["_title"] = array("top"=>"編輯-新案訊息地區分類" ,"main"=>"Home","sub"=>"post");
          $data["post"]   = RateArea::find($id);

          $data["active"] = "rateArea";
    		  return View::make('admin.rateArea.edit',$data);
    	}


      public function del($id){

          foreach(Rate::where("taiwanArea",$id)->get() as $rate){
              $rate->taiwanArea=='';
          }

          RateArea::find($id)->delete();
          return Redirect::to('rateAreas')->withInput()->with('error', '刪除成功');
      }

 }
