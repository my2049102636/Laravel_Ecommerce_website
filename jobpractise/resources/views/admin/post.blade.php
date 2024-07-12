<!DOCTYPE html>
<html>
  <head> 
    <style>
        /* public/css/styles.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

form {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
}

input[type="text"],
textarea,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea {
    resize: vertical;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

p.success {
    color: #4caf50;
    font-weight: bold;
}

    </style>
   @include('admin.admincss')
  </head>
  <body>
  @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.navegation')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
     
       @if(session()->has('message'))
       <div class="alert alert-success">
       
         <button class="close" type="button" aria-hidden="true" data-dismiss="alert">X</button>

         {{session()->get('message')}}

       </div>

       @endif
    <form action="{{url('post_page')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        <br>
        <label for="img">Image:</label>
        <input type="file" name="img" >
        <br>
        <button type="submit">Submit</button>
    </form>
    
      </div>


      @include('admin.footer')
  </body>
</html>