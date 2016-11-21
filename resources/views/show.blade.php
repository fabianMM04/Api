<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Show {{ $blog->name }}</title>
  </head>
  <body>

    <h1>{{ $blog->name }}</h1>
    <p>
      {{ $blog->description }}
    </p>

    @foreach($pictures as $picture)
      <img src="{{ url( $picture->path ) }}" alt="" /> <br>
    @endforeach

  </body>
</html>
