<?php
  echo $width;
?>


 
  @extends("layout.f1")


    @section('sidebar')
    @parent

    <p>{{$post->name}}</p>


    <?php
      $html = new \Htmldom($post->content);
      // Find all images
      // foreach($html->find('p') as $element){
      //        echo strip_tags($element) . '';
      //        echo "<br>";
      //        echo mb_strlen( strip_tags($element), "utf-8");
      //        echo "<br>";
      //        echo "<br>";
      // }
      // echo $html->find('img')[0]->style;


      foreach($html->find('img') as $element){
          // echo $element->src;
            //  echo strip_tags($element) . '';
            //  echo "<br>";
            //  echo mb_strlen( strip_tags($element), "utf-8");
            //  echo "<br>";
            //  echo "<br>";
      }

    ?>

@stop

@section('content')
    {{$post->content}}
@stop
