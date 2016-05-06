<?php


function ms_str($content,$number=false){

  if(!empty($content)){

    $StrInput=strip_tags(trim($content));
    $strStart=0;
    if(!$number){
        $strLen=400;
    }else{
        $strLen=$number;
    }

    // $a = $content;
    // preg_match_all("/[\x80-\xff]/",$a,$r);
    // echo join('',$r[0]);
    // $start =0;
    // $length =409;
    // $str_lng = mb_strlen( strip_tags(trim($content)), "utf-8");
    // return  substr( strip_tags($content) , $start , $length );

    //對字串做URL Eecode
$StrInput = mb_substr($StrInput,$strStart,mb_strlen($StrInput));
$iString = urlencode($StrInput);
$lstrResult="";
$istrLen = 0;
$k = 0;
do{
  $lstrChar = substr($iString, $k, 1);
  if($lstrChar == "%"){
          $ThisChr = hexdec(substr($iString, $k+1, 2));
              if($ThisChr >= 128){
                if($istrLen+3 < $strLen){
                    $lstrResult .= urldecode(substr($iString, $k, 9));
                    $k = $k + 9;
                    $istrLen+=3;
                  }else{
                    $k = $k + 9;
                    $istrLen+=3;
                  }
              }else{
                $lstrResult .= urldecode(substr($iString, $k, 3));
                $k = $k + 3;
                $istrLen+=2;
              }
      }else{
        $lstrResult .= urldecode(substr($iString, $k, 1));
        $k = $k + 1;
        $istrLen++;
      }
  }while ($k < strlen($iString) && $istrLen < $strLen);
  return $lstrResult;


  }else{
    return  false;
  }

}



function ms_str_news($content){
  if(!empty($content)){
    $start =0;

    // $str_lng = mb_strlen( strip_tags(trim($content)), "utf-8");
    // return  substr( strip_tags($content) , $start , $length );
    $a = $content;
    preg_match_all("/[\x80-\xff]/",$a,$r);
    $nn= join('',$r[0]);

    $length =300;
    // $str_lng = mb_strlen( strip_tags(trim($nn)), "utf-8");
    return  substr( strip_tags($nn) , $start , $length );
  }else{
    return  false;
  }

}



function helper_get_first_img($content){

  $th_img='';
  $html = new \Htmldom($content);
  #抓取圖片
  try {
      if(isset($html->find('img')[0])){
        $th_img_src = $html->find('img')[0]->src;
      }else{
        $th_img_src="images/news/n5.jpg";
      }
  } catch (Exception $e) {
      $th_img_src="images/news/n5.jpg";
  }

  return $th_img_src;

}


function rate_info($rate_date){
  // $rate=Rate::find($rate_id);
  $html="<p><span>".$rate_date->title."</span></p>".
        "<ul>";
  if(strlen($rate_date->investment)>1)
      $html.="<li>投資興建：".$rate_date->investment."</li>";

  if(strlen($rate_date->baseArea)>1)
      $html.="<li>基地面積：".$rate_date->baseArea."</li>";

  if(strlen($rate_date->floor)>1)
      $html.="<li>樓層：".$rate_date->floor."</li>";

  if(strlen($rate_date->households)>1)
      $html.="<li>戶數：".$rate_date->households."</li>";

  if(strlen($rate_date->floorNumber)>1)
      $html.="<li>坪數：".$rate_date->floorNumber."</li>";
  if(strlen($rate_date->pattern)>1)
      $html.="<li>格局：".$rate_date->pattern."</li>";

  $html.="<li></li>";
  $html.="</ul>";
  $html.="<ul>";
  /*

  "postulate","one_price",
  "total_price","base_address",
  "reception",
  */

  if(strlen($rate_date->postulate)>1)
      $html.="<li>公設比：".$rate_date->postulate."</li>";

  if(strlen($rate_date->one_price)>1)
      $html.="<li>單價：".$rate_date->one_price."</li>";

  if(strlen($rate_date->total_price)>1)
      $html.="<li>總價：".$rate_date->total_price."</li>";

  if(strlen($rate_date->base_address)>1)
      $html.="<li>基地位置：".$rate_date->base_address."</li>";
  if(strlen($rate_date->reception)>1)
      $html.="<li>接待中心：".$rate_date->reception."</li>";
  if(strlen($rate_date->tel)>1)
      $html.="<li>洽詢電話：".$rate_date->tel."</li>";
  $html.="</ul>";

  return $html;
}





function getRateImage($rate_id,$flag){
  $rate_pics;
  if($flag=="one"){
      $rate_pics = DB::table("rate_pics")->where("rate_id",$rate_id)->first();

  }elseif($flag=="noAd"){
      $rate_pics = DB::table("rate_pics")
                          ->where("rate_id",$rate_id)
                          ->whereNotIn("name",array("setList","setGoogle","setShow"))
                          ->first();
  }else{
      $rate_pics = DB::table("rate_pics")->where("rate_id",$rate_id)->get();
  }
  return $rate_pics;
}



function getRateImageType($rate_id,$type){
  $rate_pics;
  if($type=="setList"){
      $rate_pics = DB::table("rate_pics")->where(array("rate_id"=>$rate_id,'name'=>"setList" ))->first();
  }elseif($type=="setGoogle"){
      $rate_pics = DB::table("rate_pics")->where(array("rate_id"=>$rate_id,'name'=>"setGoogle" ))->first();
  }elseif($type=="setShow"){
      $rate_pics = DB::table("rate_pics")->where(array("rate_id"=>$rate_id,'name'=>"setShow" ))->first();
  }
  return $rate_pics;
}





function uploadImage($file , $flag , $text , $path){

      $destinationPath = public_path().'/img/'.$path;
      $filename        = str_random(3) .date("ymd"). '_' . $file->getClientOriginalName();
      $uploadSuccess   = $file->move( $destinationPath , $filename );
      $ifname="public/img/".$path."/".$filename;


      if($flag=="logo"){

          $img = Image::make($ifname);
          $img->text( $text, ($img->width()/10)+520, ( $img->height()/10), function($font) {
               $font->file('WCL-02.ttf');
               $font->size(400);
               $font->color('#000000');
               $font->align('center');
               $font->valign('top');

           });
           $img->save();
          //  $img->response('png');

      }elseif($flag=="resize"){
        #尺寸改小
        $img = Image::make($ifname);
        $img->save($ifname,50);

      }


      // echo $filename;
      // die;
      return $filename;
}
