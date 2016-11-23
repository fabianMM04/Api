<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Show {{ $blog->name }}</title>
  </head>
  <body>
    <h1>{{ $blog->name }}</h1>

    <h3>Description</h3>
    <p>
      {{ $blog->description }}
    </p>

    <h3>Photos</h3>
    @foreach($pictures as $picture)
      <img src="{{ url( '/photos/' . $picture->name ) }}" alt="" /> <br><br>
      <!-- Example: <img src="http://localhost:8000/photos/key_time.ext" alt="" /> -->
    @endforeach

  </body>
</html>
