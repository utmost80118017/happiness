<?php

class DecoController extends BaseController {


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

          $cate_array=$this->cate_init();
          $data["_title"] = array("top"=>'生活美學',"main"=>"Home","sub"=>"deco");
          $data["active"] = "生活美學";
          $cate_array = array();
          $data["cates"] = $cate_array;
          $data["result"] = Deco::orderby("prim","asc")->paginate(10);
    		  return View::make('admin.deco.index',$data);
    	}


      public function decoStore(){

        $uploadSuccess=false;
        $filename;
        $insert_array;

        if(Input::get("flag")==1){
            $decos = Deco::where("flag",1)->get();
            if($decos->count() > 2 ){
                // return Redirect::to('/deco/create');
                return Redirect::to('/deco/create')->withInput()->with('error', '前台最多顯示三筆');
            }
        }


        if(Input::hasFile('image')){

            $filename     = uploadImage(Input::file('image') , "resize" ,"太形廣告","deco");

            $insert_array = array(
                    'image'       => '/img/deco/'.$filename,
                    'name'        =>  Input::get('name'),
                    'category_id' =>  Input::get('category_id'),
                    'prim'        =>  Input::get('prim'),
                    'flag'        =>  Input::get('flag'),
                    'type'        =>  Input::get('type'),
                    "lineLink"  => Input::get("lineLink"),
                    "videoLink"  => Input::get("videoLink"),
                    "vr360Link"  => Input::get("vr360Link"),
                    'content'     =>  Input::get('content')
            );

        }else{

            $insert_array = array(
                    'name'        =>  Input::get('name'),
                    'category_id' =>  Input::get('category_id'),
                    'flag'        =>  Input::get('flag'),
                    'prim'        =>  Input::get('prim'),
                    'type'        =>  Input::get('type'),
                    "lineLink"    => Input::get("lineLink"),
                    "videoLink"   => Input::get("videoLink"),
                    "vr360Link"   => Input::get("vr360Link"),
                    'content'     =>  Input::get('content')
            );
        }




          $validator = Validator::make($insert_array, Deco::$rules );



          if ( $validator->fails()) {

              return Redirect::to('/deco/create')->withErrors($validator);

          } else {

              $t_post  =  Deco::create($insert_array);
              $this->doPrimy($t_post->id );
              return Redirect::to('/decos');

          }

      }

      public function decoUpdate(){

        $id           = Input::get("id");
        $name         = Input::get("name");
        $content      = Input::get("content");
        $category_id  = Input::get("category_id");
        $prim         = Input::get('prim');

        $uploadSuccess=false;
        $filename;
        $update_array;


        if(Input::get("flag")==1){
            $decos = Deco::where("flag",1)->whereNotIn("id",array($id))->get();
            if($decos->count() > 2 ){

                return Redirect::to('/deco/'.$id)->withInput()->with('error', '前台最多顯示三筆');
            }
        }



        if(Input::hasFile('image')){
            $filename     = uploadImage(Input::file('image') , "resize" ,"太形廣告","deco");
            $update_array = array(
                    'image'       => '/img/deco/'.$filename,
                    'name'        =>  Input::get('name'),
                    'category_id' =>  Input::get('category_id'),
                    'prim'        =>  Input::get('prim'),
                    'flag'        =>  Input::get('flag'),
                    "lineLink"    => Input::get("lineLink"),
                    "videoLink"   => Input::get("videoLink"),
                    'type'        =>  Input::get('type'),
                    "vr360Link"   => Input::get("vr360Link"),
                    'content'     =>  Input::get('content')
            );

        }else{

            $update_array = array(
                    'name'        =>  Input::get('name'),
                    'category_id' =>  Input::get('category_id'),
                    'prim'        =>  Input::get('prim'),
                    'flag'        =>  Input::get('flag'),
                    "lineLink"    => Input::get("lineLink"),
                    'type'        =>  Input::get('type'),
                    "videoLink"   => Input::get("videoLink"),
                    "vr360Link"   => Input::get("vr360Link"),
                    'content'     =>  Input::get('content')
            );
        }

        $validator = Validator::make($update_array, Deco::$rules);
        if ( $validator->passes() ) {
                $thisDeco = Deco::where('id', $id)->update($update_array);
                $this->doPrimy($id );
                return Redirect::to('/decos');
        } else {
                return Redirect::to('/deco/'.$id )->withErrors($validator);
        }

      }


      public function doPrimy($id ){

        $deco = Deco::where('id', $id)->first();
        $res  = Deco::whereNotIn( 'id' , array($id) )->orderBy("prim","asc")->get();
        $i=$deco->prim;
        foreach($res as $post){
              $i+=1;
              if($post->prim >= $deco->prim){
                  $post->prim =  $i;
                  $post->save();
              }
        }

      }





      public function create(){

          $cate_array=$this->cate_init();
          $data["post"] = "";

          $data["_title"] = array("top"=>"新增-生活美學","main"=>"Home","sub"=>"deco");
          $data["active"] = "生活美學";

          $data["cates"] = Cate::where('type','最新消息')->get()->toArray();
    		  return View::make('admin.deco.create',$data);

    	}



      public function edit($id){

          $category_id = Input::get('category_id');
          $cate_array=$this->cate_init();
          $data["_title"] = array("top"=>"編輯-生活美學","main"=>"Home","sub"=>"deco");

          if($id==25){
              $data["active"] = "關於米築";
          }elseif($id==5){
              $data["active"] = "生活美學";
          }elseif($id==4){
              $data["active"] = "地產動態";
          }else{
              $data["active"] = "news";
          }



          $data["category_id"] = $category_id;
          $data["post"]=Deco::find($id);


          $data["cates"] = Cate::where('type','最新消息')->get()->toArray();
    		  return View::make('admin.deco.edit',$data);

    	}

      public function  delDeco($id){

        Deco::find($id)->delete();

        return Redirect::to('/decos')->withInput()->with('success', '刪除成功');
      }


      public function delDecoImage($id){

    		$post = Deco::find($id);

    		if( File::exists( public_path().$post->image )){
    				File::delete( public_path().$post->image );
    		}
    		$post->image="";
    		$post->save();
        return Redirect::to('/deco/'.$id );
      }



      public function decoFlagChange(){

        $all=Input::all();
      	// $res=Deco::where('flag',1)->get();

        alert($all);

      	// if($res->count() > 2 ){
      	// 	  echo '22';
      	// }else{
        //
      	// 	$rate=Deco::find($all["id"]);
      	// 	$rate->flag=1;
      	// 	$rate->save;
      	// 	return 1;
      	// }

      }







 }
