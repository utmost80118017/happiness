<?php

class PeopleController extends BaseController {


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
          $data["_title"] = array("top"=>'人物觀點',"main"=>"Home","sub"=>"pepole");
          $data["active"] = "apeople";
          // $data["post_id"] =  ;
          $cate_array = array();
          $data["cates"] = $cate_array;
          $data["result"] = People::orderby("prim","asc")->paginate(20);

    		  return View::make('admin.people.index',$data);


    	}


      public function peopleUpdate(){

          $id           = Input::get("id");
          $name         = Input::get("name");
          $content      = Input::get("content");
          $fbLink       = Input::get("fbLink");
          $title      = Input::get("title");
          $tag      = Input::get("tag");

          $category_id  = 1111;
          $prim      =  Input::get('prim');



          $update_array = array(
                  'name'        =>  Input::get('name'),
                  'category_id' =>  Input::get('category_id'),
                  'prim'     =>  Input::get('prim'),
                  'tag'     =>  Input::get('tag'),
                  'title'     =>  Input::get('title'),
                  'fbLink'     =>  Input::get('fbLink'),
                  'content'     =>  Input::get('content')
          );

          $validator = Validator::make($update_array, People::$rules );


          if ( $validator->fails()) {

              return Redirect::to('/people/1')->withErrors($validator);

          } else {



              if (Input::hasFile('image') || Input::hasFile('image2')) {

                  $destinationPath = public_path().'/img';
                  $filename = false;
                  $filename2 = false;

                  if (Input::hasFile('image') ){
                    $filename     = uploadImage(Input::file('image') , "resize" ,"太形廣告","people");
                    // $file1            = Input::file('image');
                    // $filename        = str_random(6) . '_' . $file1->getClientOriginalName();
                    // $uploadSuccess1   = $file1->move( $destinationPath , $filename );
                    // $filename     = uploadImage(Input::file('image') , "resize" ,"太形廣告");
                  }

                  if (Input::hasFile('image2') ){
                    $filename2     = uploadImage(Input::file('image2') , "resize" ,"太形廣告","people");
                    // $file2            = Input::file('image2');
                    // $filename2        = str_random(6) . '_' . $file2->getClientOriginalName();
                    // $uploadSuccess2   = $file2->move( $destinationPath , $filename2 );
                  }


                  $update_data=array( 'name'=>$name,
                                      'content'=>$content,
                                      'image'  => $filename ? ('/img/people/'.$filename)  : "",
                                      'image2' => $filename2 ? ('/img/people/'.$filename2) : "",
                                      'tag'     =>  Input::get('tag'),
                                      'title'     =>  Input::get('title'),
                                      'fbLink'     =>  Input::get('fbLink'),
                                      'category_id'=>$category_id,
                                      'prim'=>$prim);

                   People::where("id",$id)->update($update_data);



                    }else{


                    $update_data=array( 'name'=>$name,
                                        'content'=>$content,
                                        'category_id'=>$category_id,
                                        'fbLink'     =>  Input::get('fbLink'),
                                        'tag'     =>  Input::get('tag'),
                                        'title'     =>  Input::get('title'),
                                        'prim'=>$prim);
                    $t_people=People::where("id",$id)->update($update_data);
                    $this->do_prim($id );
                  }


                  return Redirect::to('/people/1');



          }

      }

      public function peopleStore(){

        $id           =  Input::get("id");
        $name         =  Input::get("name");
        $content      =  Input::get("content");
        $tag          =  Input::get("tag");
        $title        =  Input::get("title");
        $category_id  =  1111;
        $prim      =  Input::get('prim');
        $fbLink       =  Input::get('fbLink');

        $insert_data=array( 'name'=>$name,
                            'content'=>Input::get('content'),
                            'fbLink'     =>  Input::get('fbLink'),
                            'category_id'=>$category_id,
                            'prim'=>$prim);

        $validator = Validator::make(Input::all(), People::$rules);

        if ( $validator->fails()) {
                return Redirect::to('/people/create' )->withErrors($validator);
        }else {


          if (Input::hasFile('image') ) {

                $destinationPath = public_path().'/img';
                $uploadSuccess1=false;
                $uploadSuccess2=false;
                $filename;
                $filename2;

                if (Input::hasFile('image') ){
                  // $file1            = Input::file('image');
                  // $filename        = str_random(6) . '_' . $file1->getClientOriginalName();
                  // $uploadSuccess1   = $file1->move( $destinationPath , $filename );
                  $filename     = uploadImage(Input::file('image') , "resize" ,"太形廣告","people");
                }

                if (Input::hasFile('image2') ){
                  // $file2            = Input::file('image2');
                  // $filename2        = str_random(6) . '_' . $file2->getClientOriginalName();
                  // $uploadSuccess2   = $file2->move( $destinationPath , $filename2 );
                  $filename2     = uploadImage(Input::file('image2') , "resize" ,"太形廣告","people");
                }

                $insert_data=array( 'name'=>$name,
                                    'content'=>$content,
                                    'image'  => isset($uploadSuccess1) ? ('/img/people/'.$filename)  : "",
                                    'image2' => isset($uploadSuccess2) ? ('/img/people/'.$filename2) : "",
                                    'fbLink'     =>  Input::get('fbLink'),
                                    'tag'=>$tag,
                                    'title'=>$title,
                                    'category_id'=>$category_id,
                                    'prim'=>$prim);
                $t_post=People::create($insert_data);
                $posts  =  People::whereNotIn('id', array($t_post->id) )->get();
                $i=$prim;
                foreach($posts as $post){
                      $i+=1;
                      if($post->prim >= $prim){
                          $post->prim =  $i;
                          $post->save();
                      }

                }


              }else{

                      $insert_data=array( 'name'=>$name,
                                          'content'=>$content,
                                          'tag'=>$tag,
                                          'title'=>$title,
                                          'fbLink'     =>  Input::get('fbLink'),
                                          'category_id'=>$category_id,
                                          'prim'=>$prim);
                      $t_post=People::create($insert_data);
                      $this->do_prim($t_post->id );
              }
              return Redirect::to('/apeople');
        }

      }



      public function do_prim($id ){

        $deco = People::where('id', $id)->first();
        $res  = People::whereNotIn( 'id' , array($id) )->orderBy("prim","asc")->get();
        $i=$deco->prim;
        foreach($res as $post){
              $i+=1;
              if($post->prim >= $deco->prim){
                  $post->prim =  $i;
                  $post->save();
              }
        }


      }





      public function delUser($id){

          User::find($id)->delete();
          return Redirect::to('users')->withInput()->with('error', '使用者刪除成功');
      }


      public function create(){

          $cate_array=$this->cate_init();
          $data["people"] = "";
          // $data["category_id"] = $id;
          $data["_title"] = array("top"=>"新增-人物觀點","main"=>"Home","sub"=>"post");
          $data["active"] = '人物觀點';

          $data["cates"] = Cate::where('type','最新消息')->get()->toArray();
    		  return View::make('admin.people.create',$data);

    	}

      public function deleteUser(){

          // $data["title"] = "新增使用者";
    		  // return View::make('admin.users.create',$data);
          // return View::make('layout.admin');
    	}

      public function edit($id){

          $category_id = Input::get('category_id');
          $cate_array=$this->cate_init();
          $data["_title"] = array("top"=>"編輯-人物觀點","main"=>"Home","sub"=>"people");
          $data["active"] = "people";
          $data["category_id"] = $category_id;
          $data["people"]=People::find($id);
    		  return View::make('admin.people.edit',$data);

    	}

      public function  delPeople($id){

        People::find($id)->delete();

        return Redirect::to('/apeople')->withInput()->with('success','刪除成功');
      }


      public function  delPeopleImg1(){

        $id = Input::get("id");
        $peo=People::find($id);
        $peo->image="";
        $peo->save();
        return 1;


      }

      public function  delPeopleImg2(){

        $id  = Input::get("id");
        $peo = People::find($id);
        $peo->image2="";
        $peo->save();
        return 1;


      }





 }
