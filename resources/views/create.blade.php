<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create Blog</title>
  </head>
  <body>

    <h1>Create Blog</h1>

    <form action="{{ url('/post/blog') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <label for="name">Name</label>
      <input type="text" name="name" value="" placeholder="Write the name of the blog">

      <br>

      <label for="description">Description</label>
      <input type="text" name="description" value="" placeholder="Write the description of the blog">

      <br>  <br>

      <input type="file" name="files[]" accept=".jpg, .jpeg, .png, .gif, .svg" multiple="multiple">

      <br>  <br>
      <button type="submit" name="button">Send</button>
    </form>

  </body>
</html>
