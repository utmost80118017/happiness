<?php
use SoapBox\Formatter\Formatter;

class HomeController extends BaseController {



	public function showWelcome(){

		return View::make('hello');

	}

	public function index(){

	  $data["active"] = "users";
		$data["_title"] = array("top"=>"使用者","main"=>"Home","sub"=>"user");
		$data["users"] = User::paginate(5);
		return View::make('admin.users.index',$data);
	}

	public function login(){
		return View::make('admin.login');
	}

	public function postLogin(){

			// return View::make('admin.login');

			if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password') ))){
					return Redirect::to('users');
			}else{
					return Redirect::to('login');
			}
	}

	public function logout(){
			Auth::logout();
			return Redirect::to('login');
	}

	public function register(){
		return View::make('admin.users.create');
	}

	public function  postRegister(){

		$username = Input::get('username');
		$email 		= Input::get('email');
		$password = Input::get('password');

		$password = Hash::make($password);

		$user =  array(	'username' =>   $username,
										'email' => 	$email,
										'password' => $password);
										// print_r($user);

		$user = new User;
		$user->username = $username;
		$user->email = $email;
		$user->password = $password;

		if($user->save()){
				return Redirect::to('users');
		}else{
				return Redirect::to('login');
		}
		// User::create($user);

	}

	public function delImage(){

			// Auth::logout();
			// return Redirect::to('login');
	}


	public function jdata(){

		// $foods=Food::where("main_type",'')->get();
		// foreach($foods as $food){
		// 		echo $food->main_type;
		// 		$food->main_type="美食特產之旅";
		// 		$food->save();
		// 		echo "<br>";
		// }
		$json=File::get('jsondata/aa.json');
		$formatter = Formatter::make($json, Formatter::JSON);
		// print_r($json);
		$dd=json_decode($json);
		// print_r($dd );
		// if(false)
		foreach($dd   as $row  ){
		$i=1;
				foreach ($row as $key) {
					print_r($key);
					echo $i;
					// if($i!=1)
					// $insert_data=$this->sub_school($key);
					// echo "<br>";
					// echo "<br>";
					// echo "<br>";
					// print_r($insert_data);
					echo "<br>";
					echo "<br>";
					echo "<br>";


					// if($i!=1){
							// Food::create($insert_data);
					// }
					$i=$i+1;

				}

		}


	}


	public function sub_school($obj){

		// $dd=explode("°E ",$obj->地圖座標);
		// 	// $dd=explode("°E ",$dd);
		// 	$cc;
		// 	// echo $dd[0];
		// 	// echo "/";
		$insert_array=array();
		// if(count($dd)==2){
		//
		// 			$cc=explode("°N",$dd[1]);
		//
		// 			$insert_array=array('title'=>$obj->名稱,
		// 													'content'=>$obj->簡介,
		// 													'address'=>$obj->位置地址,
		// 													'tel'=>$obj->聯絡電話,
		// 													'time'=>$obj->開放時間,
		// 													'traffic'   =>$obj->交通資訊,
		// 													'cate'      =>$obj->類別,
		// 													"latitude"	=>$cc[0],
		// 													"longitude" =>$dd[0],
		// 													'content'   =>$obj->簡介);
		//
		// }else{
		// 				$insert_array=array('title'=>$obj->名稱,
		// 															'content'=>$obj->簡介,
		// 															'address'=>$obj->位置地址,
		// 															'tel'=>$obj->聯絡電話,
		// 															'time'=>$obj->開放時間,
		// 															'traffic'   =>$obj->交通資訊,
		// 															'cate'      =>$obj->類別,
		// 															'main_type'=>'美食特產之旅',
		// 															// "latitude"	=>$key->類別類別,
		// 															// "longitude" =>$key->類別類別,
		// 															'content'   =>$obj->簡介);
		// }

		$insert_array=array(  'title'=>$obj->商圈名稱,
													'content'=>$obj->鄉鎮市,
													'address'=>$obj->地段,
													// 'tel'=>$obj->聯絡電話,
													'main_type'=>'商圈資料',
													// 'time'			=>$obj->開放時間,
													// 'traffic'   =>$obj->交通資訊,
													// 'cate'      =>$obj->類別,
													// "latitude"	=>$obj->類別類別,
													// "longitude" =>$obj->類別類別,

												);
			return $insert_array;
	}


}
