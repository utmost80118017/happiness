<?php

class PostController extends BaseController {


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
          $data["_title"] = array("top"=>'工程進度',"main"=>"Home","sub"=>"post");
          $data["active"] = "工程進度";

          $cate_array = array();
          $data["cates"] = $cate_array;
          $data["result"] = Post::orderby("prim","asc")
                                    ->paginate(10);

    		  return View::make('admin.posts.index',$data);


    	}


      public function postStore(){
        $uploadSuccess=false;
        $filename;
        $insert_array;


        if(Input::hasFile('image')){

            $filename     = uploadImage(Input::file('image') , "resize" ,"太形廣告","post");

            $insert_array = array(
                    'image'       => '/img/post/'.$filename,
                    'name'        =>  Input::get('name'),
                    'date'        =>  Input::get('date'),
                    'category_id' =>  Input::get('category_id'),
                    'prim'        =>  Input::get('prim'),
                    'content'     =>  Input::get('content')
            );

        }else{

            $insert_array = array(
                    'name'        =>  Input::get('name'),
                    'category_id' =>  Input::get('category_id'),
                    'prim'        =>  Input::get('prim'),
                    'date'        =>  Input::get('date'),
                    'content'     =>  Input::get('content')
            );
        }




          $validator = Validator::make($insert_array, Post::$rules );



          if ( $validator->fails()) {

              return Redirect::to('/post/create')->withErrors($validator);

          } else {

              $t_post =  Post::create($insert_array);
              // $this->do_prim($t_post->id);
              return Redirect::to('/posts');

          }

      }

      public function postUpdate(){

        $id           = Input::get("id");
        $name         = Input::get("name");
        $content      = Input::get("content");
        $category_id  = Input::get("category_id");
        $prim         = Input::get('prim');


        $filename;
        $update_array;


        if(Input::hasFile('image')){

             $filename     = uploadImage(Input::file('image') , "resize" ,"太形廣告" , "post" );

            // die;
            $update_array = array(
                    'image'       => '/img/post/'.$filename,
                    'name'        =>  Input::get('name'),
                    'category_id' =>  Input::get('category_id'),
                    'prim'        =>  Input::get('prim'),
                    'date'        =>  Input::get('date'),
                    'content'     =>  Input::get('content')
            );

        }else{

            $update_array = array(
                    'name'        =>  Input::get('name'),
                    'date'        =>  Input::get('date'),
                    'category_id' =>  Input::get('category_id'),
                    'prim'        =>  Input::get('prim'),
                    'content'     =>  Input::get('content')
            );
        }

        $validator = Validator::make(Input::all(), Post::$rules);

        if ( $validator->passes() ) {
                Post::where('id', $id)->update($update_array);
                // $this->do_prim($id);
                return Redirect::to('/posts');
        }else{
                return Redirect::to('/post/'.$id )->withErrors($validator);
        }




      }


      public function delUser($id){

          User::find($id)->delete();
          return Redirect::to('users')->withInput()->with('error', '使用者刪除成功');
      }


      public function create(){

          $cate_array=$this->cate_init();
          $data["post"] = "";

          $data["_title"] = array("top"=>"新增-工程進度","main"=>"Home","sub"=>"post");
          $data["active"] = "工程進度";

          $data["cates"] = Cate::where('type','最新消息')->get()->toArray();
    		  return View::make('admin.posts.create',$data);

    	}

      public function deleteUser(){

          // $data["title"] = "新增使用者";
    		  // return View::make('admin.users.create',$data);
          // return View::make('layout.admin');
    	}

      public function edit($id){

          $category_id = Input::get('category_id');
          $cate_array=$this->cate_init();
          $data["_title"] = array("top"=>"編輯-工程進度","main"=>"Home","sub"=>"post");

          if($id==25){
              $data["active"] = "關於米築";
          }elseif($id==5){
              $data["active"] = "生活美學";
          }elseif($id==4){
              $data["active"] = "工程進度";
          }else{
              $data["active"] = "news";
          }



          $data["category_id"] = $category_id;
          $data["post"]=Post::find($id);


          $data["cates"] = Cate::where('type','最新消息')->get()->toArray();
          if($id==3){
              return View::make('admin.about',$data);
          }else{
              return View::make('admin.posts.edit',$data);
          }


    	}

      public function  delPost($id){
        $cate_array=$this->cate_init();
        Post::find($id)->delete();
        // $category_id = Input::get("category_id");
        return Redirect::to('/posts')->withInput()->with('success', '刪除成功');
      }


      public function delPostImage($id){

    		$post = Post::find($id);

    		if( File::exists( public_path().$post->image )){
    				File::delete( public_path().$post->image );
    		}
    		$post->image="";
    		$post->save();
        return Redirect::to('/post/'.$id );
      }



      public function do_prim($id ){

        $deco = Post::where('id', $id)->first();
        $res  = Post::whereNotIn( 'id' , array($id) )->orderBy("prim","asc")->get();
        $i=$deco->prim;
        foreach($res as $post){
              $i+=1;
              if($post->prim >= $deco->prim){
                  $post->prim =  $i;
                  $post->save();
              }
        }


      }

 }
