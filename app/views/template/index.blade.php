
@foreach($posts as $post)
{{HTML::link("/mpage/".$post->id, $post->name)}}
<br>

@endforeach
