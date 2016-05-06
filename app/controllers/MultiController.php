<?php

class MultiController extends BaseController {

	//  public  $layout = 'layout.admin';

		public function __construct(){
			// echo '/qweqweqweqwe';
		}

	  public function index(){

			$layouts=Layout::first();
			$data["posts"] = DB::table('posts')->groupBy('name')->get();
			$data["layout"] = $layouts->content;
			return View::make("template.index",$data);

  	}


		public function content($id){

			// $layouts=Layout::first();
			$post = Post::find($id);
			$data["post"] 	= $post;
			// $data["layout"] = $layouts->content;
			$html = new \Htmldom($post->content);
			$width=0;
			if(isset($html->find('img')[0])  ){					
					$width = explode("width:",$html->find('img')[0]->style)[1];

					$width = explode("px",$width);
					$width = (int)$width[0];
					// echo $width;
					// echo $width;
					$data["width"] = $width;
					if(  $width >= 600 AND  $width <= 1000){
						return View::make("template.content1",$data);
					}else {
						return View::make("template.content2",$data);
					}


			}else{

					// $width = explode("width:",$html->find('img')[0]->style)[1];

					// $width = explode("px",$width);
					$width = 0;

					$data["width"] = $width;
					return View::make("template.content2",$data);
			}
			// echo $width;
			// echo "/";
			//

  	}

		public function multi_page(){
			$layouts=Layout::first();
			$data["posts"] = Post::all();
			$data["layout"] = $layouts->content;
			return View::make("template.content",$data);
  	}




}
