<?php

class MailcontentController extends BaseController {



    	public function index(){

          $data["_title"] = array("top"=>"郵件內容","main"=>"Home","sub"=>"mailcontent");
          $data["active"] = "mail";
          $cate_array = array();


          $data["cates"] = $cate_array;
          $data["result"] = Mailcontent::paginate(10);

    		  return View::make('admin.mailcontents.index',$data);



    	}


      public function store(){
          // print_r(Input::all() );
          // $all = Input::all();
          // print_r($all);
          $title = Input::get("title");
          // $category_id = Input::get("category_id");
          $content = Input::get("content");
          $mailto = Input::get("mailto");
          $image;
          if (Input::hasFile('image')) {
               $file            = Input::file('image');
               $destinationPath = public_path().'/mail';
               $filename        = str_random(6) . '_' . $file->getClientOriginalName();
               $uploadSuccess   = $file->move($destinationPath, $filename);

              //  $rate=Rate::where('id', $id)->update(array('title'   => $title,
              $image   = '/mail/'.$filename;
              //                                             'content' => $content));

          }
          // $$valute;
          if($content){

            $post = New Mailcontent;
            $post->title = $title;
            $post->mailto = $mailto;

            $post->image    =$image;
            $post->content = $content;
            $post->save();
            return Redirect::to('mailcontents')->withInput()->with('success', '新增成功');

          }else{
            return Redirect::to('mailcontents/create')->withInput()->with('error', '新增失敗');
          }
      }

      public function update(){
        $image;
        if (Input::hasFile('image')) {
             $file            = Input::file('image');
             $destinationPath = public_path().'/mail';
             $filename        = str_random(6) . '_' . $file->getClientOriginalName();
             $uploadSuccess   = $file->move($destinationPath, $filename);

            //  $rate=Rate::where('id', $id)->update(array('title'   => $title,
            $image   = '/mail/'.$filename;
            //                                             'content' => $content));

        }

        $id           = Input::get("id");
        $title         = Input::get("title");
        $content      = Input::get("content");
        $mailto  = Input::get("mailto");

        if(empty($image)){
            $update_data=array('title'=>$title,'content'=>$content,'mailto'=>$mailto );
        }else{
            $update_data=array( 'title'   => $title,
                                'content' => $content,
                                'mailto'=>$mailto,
                                'image'   => $image );
        }

        $user = Mailcontent::where('id', $id)->update($update_data);


        // $user->username = $username;
        // print_r(Input::all());
        if($user ){
          return Redirect::to('mailcontents')->withInput()->with('success', '更新成功');
        }else{
          return Redirect::to('mailcontent/'.$id)->withInput()->with('error', '更新失敗');
        }
      }




      public function create(){

          $data["post"] = "";
          $data["_title"] = array("top"=>"郵件內容","main"=>"Home","sub"=>"post");
          $data["active"] = "mail";


    		  return View::make('admin.mailcontents.create',$data);
          // return View::make('layout.admin');
    	}


      public function edit($id){


          $data["_title"] = array("top"=>"郵件內容","main"=>"Home","sub"=>"post");
          $data["active"] = "mail";
          $data["post"]=Mailcontent::find($id);

          $data["cates"] = '';
    		  return View::make('admin.mailcontents.edit',$data);

    	}

      public function  del($id){

        Mailcontent::find($id)->delete();
        return Redirect::to('mailcontents')->withInput()->with('success', '最新消息刪除成功');
      }



 }
