<?php

class CategoryController extends BaseController {


      public function __construct(){
          if (Auth::check()){
            return Redirect::to('login');
          }

      }


    	public function index(){


          $data["_title"] = array("top"=>"分類","main"=>"Home","sub"=>"cate");
          $data["active"] = "cates";
          // $insert=array('name'=>1,'type'=>1);
          // Cate::create($insert);
          $data["result"] = Cate::paginate(30);
    		  return View::make('admin.categories.index',$data);

          // return View::make('layout.admin');
    	}


      public function categoryStore(){

          $name = Input::get("name");
          $type = Input::get("type");
          $ad_main = Input::get("ad_main");
          // $$valute;
          if($name){
              Cate::create(array('name' => $name,'type' => $type,"ad_main"=>$ad_main));
            // $category = new Category;
            //
            // $category->name = 'John';
            //
            // $category->save();
            //
            return Redirect::to('categories')->withInput()->with('success', '新增成功');

          }else{
            return Redirect::to('categories/create')->withInput()->with('error', '新增失敗');
          }
      }

      public function categoryUpdate(){

        $id           = Input::get("id");
        $name         = Input::get("name");
        $type         = Input::get("type");
        $ad_main = Input::get("ad_main");

        $update_data=array('name' => $name,'type' => $type,'ad_main' => $ad_main);
        $user = Cate::where('id', $id)->update($update_data);
        // $user->username = $username;

        if($user ){
          return Redirect::to('categories')->withInput()->with('success', '更新成功');
        }else{
          return Redirect::to('category/'.$id)->withInput()->with('error', '更新失敗');
        }
      }


      public function delCategory($id){

          Cate::find($id)->delete();
          return Redirect::to('categories')->withInput()->with('error', '分類刪除成功');
      }


      public function create(){
          $data["_title"] = array("top"=>"新增分類","main"=>"Home","sub"=>"cate");
          $data["active"] = "cates";
          $data["post"] = "";

    		  return View::make('admin.categories.create',$data);
          // return View::make('layout.admin');
    	}

      public function deleteUser(){

          // $data["title"] = "新增使用者";
    		  // return View::make('admin.users.create',$data);
          // return View::make('layout.admin');
    	}

      public function edit($id){

          $data["_title"] = array("top"=>"編輯分類","main"=>"Home","sub"=>"cate");
          $data["active"] = "cates";
          $data["post"]=Cate::find($id);


    		  return View::make('admin.categories.edit',$data);

    	}



 }
