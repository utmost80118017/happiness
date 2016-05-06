<?php

class UserController extends BaseController {


      public function __construct(){

          if (!Auth::check()){
            return Redirect::to('login');
          }

      }

      public function loginWithFacebook(){
        // get data from input
  $code = Input::get( 'code' );

  // get fb service
  $fb = OAuth::consumer( 'Facebook' );

        // check if code is valid

        // if code is provided get user data and sign in
        if ( !empty( $code ) ) {

            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken( $code );

            // Send a request with it
            $result = json_decode( $fb->request( '/me' ), true );

            $message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
            echo $message. "<br/>";

            //Var_dump
            //display whole array().
            dd($result);

        }
        // if not ask for permission first
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
             return Redirect::to( (string)$url );
        }
      }

    	public function index(){

          $data["_title"] = array("top"=>"使用者","main"=>"Home","sub"=>"user");
          $data["active"] = "users";
          $data["users"] = User::paginate(5);
    		  return View::make('admin.users.index',$data);
          // return View::make('layout.admin');
    	}

      public function explode(){

          $data["_title"] = array("top"=>"瀏覧人數","main"=>"Home","sub"=>"explode");
          $data["active"] = "explode";
          $data["users"] = User::paginate(5);
          $result = DB::table("explode")->groupBy('date')->orderBy("date", "desc")->paginate(10);
          $data["result"]=$result;


    		  return View::make('admin.explode',$data);

    	}


      public function UserStore(){
          // print_r(Input::all() );
          $username = Input::get("username");
          $email = Input::get("email");
          $password = Input::get("password");
          $password2 = Input::get("password2");
          $user_data  = array('username'  =>  $username ,
                              'email'     =>  $email ,
                              'password'  =>  Hash::make($password) );
          if(($password==$password2) AND !empty($password2)AND !empty($password)){

            $user = New User;
            $user->username = $username;
            $user->email    = $email;
            $user->password = Hash::make($password);
            $user->save();
            return Redirect::to('users')->withInput()->with('success', '新增使用者成功');
          }else{
            return Redirect::to('users/create')->withInput()->with('error', '新增使用者失敗');
          }
      }

      public function userUpdate(){

        $id = Input::get("id");
        $username = Input::get("username");
        $update_data=array('username'=>$username);
        $user = User::where('id', $id)->update($update_data);
        // $user->username = $username;

        if($user ){
          return Redirect::to('users')->withInput()->with('success', '更新使用者成功');
        }else{
          return Redirect::to('user/'.$id)->withInput()->with('error', '更新使用者失敗');
        }
      }


      public function delUser($id){

          User::find($id)->delete();
          return Redirect::to('users')->withInput()->with('error', '使用者刪除成功');
      }


      public function create(){
          $data["_title"] = array("top"=>"新增使用者","main"=>"Home","sub"=>"user");
          $data["active"] = "users";
          $data["user"] = "";

    		  return View::make('admin.users.create',$data);
          // return View::make('layout.admin');
    	}
      public function deleteUser(){

          // $data["title"] = "新增使用者";
    		  // return View::make('admin.users.create',$data);
          // return View::make('layout.admin');

    	}

      public function edit($id){
          $data["_title"] = array("top"=>"編輯使用者","main"=>"Home","sub"=>"user");
          $data["active"] = "users";
          $data["user"]=User::find($id);


    		  return View::make('admin.users.edit',$data);

    	}



 }
