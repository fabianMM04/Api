<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create Blog</title>
  </head>
  <body>

    <h1>Create Blog</h1>

    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br>
    @endif


    <form action="{{ url('/post/blog') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <label for="name">Name</label>
      <input type="text" name="name" value="{{ old('name') }}" placeholder="Write the name of the blog">

      <br>
      <!--
      <div class="{{ $errors->has('name') ? 'has-error' : ' ' }}"></div>-->
      <label for="description">Description</label>
      <input type="text" name="description" value="{{ old('description') }}" placeholder="Write the description of the blog">

      <br>  <br>

      <input type="file" name="files[]" accept=".jpg, .jpeg, .png, .gif" multiple="multiple">

      <br>  <br>
      <button type="submit" name="button">Send</button>
    </form>

  </body>
</html>
