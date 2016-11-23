<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
  </head>
  <body>

    <h1>Welcome!!</h1>
    <a href="{{ url('/create/blog')}}">Create new Blog!</a>

    @if(count($blogs) > 0)
      <h3>Last Blogs created</h3>

      @foreach($blogs as $blog)
        <div>
          <h5>Nombre: {{ $blog->name }} <a href="{{ url('/show/' . $blog->id ) }}">Show!</a></h5>
          <h5>Description: </h5>
          <p>{{ $blog->description }}</p>
          <h5>Corner: </h5>
          <img src="{{ url( '/photos/' . DB::table('photos')->where('blog_id', $blog->id)->first()->name ) }}" alt="" height="100px" height="100px"/>
        </div> <br>
      @endforeach

    @else
      <h3>There are no blogs created recently</h3>
    @endif

  </body>
</html>
