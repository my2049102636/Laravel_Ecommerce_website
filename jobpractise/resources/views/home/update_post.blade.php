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
    color: #000000;
    padding: 10px 15px;
    border: 2px solid black;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
.img-deg{
    height: 100px;
    width: 100px;
}
p.success {
    color: #4caf50;
    font-weight: bold;
}

    </style>
   @include('home.homecss')
  </head>
  <body>
  @include('home.header')
    
   
      <div class="page-content">



    
    <div style="text-align: center">
        <h1>Edit Post</h1>
    </div>

     
    @if(session()->has('message'))
    <div class="alert alert-success">
     <button class="close" type="button" data-dismiss="alert" aria-hidden="true">X</button>
 
     {{session()->get('message')}}
    </div>
    
    @endif
        <form action="{{url('edit_my_post',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" required  value="{{$data->title}}">
            <br>
            <label for="description"></label>
            <textarea name="description" required>{{$data->description}}</textarea>
            <br>
            <label for="img">update old Image:</label>

             
            <input type="file" name="img" >

            <br>
            <div>
                <label for=""> <b>old image</b></label>
                <img class="img-deg" src="/postimg/{{$data->img}}" alt="">
            </div> <br>
            <button type="submit">Submit</button>
        </form>
      </div>
      @include('home.footer')
  </body>
</html>