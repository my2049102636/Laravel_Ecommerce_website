<!DOCTYPE html>
<html lang="en">
   <head>
    <style>
        /* public/css/styles.css */


form {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
   
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

.primary {
    background-color: #4caf50;
    color: #000000;
    padding: 10px 15px;
    border: 2px solid  #4caf50;
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
     @include('home.homecss')
     
   </head>
   <body>


    @include('sweetalert::alert')
      <!-- header section start -->
     @include('home.header')
      <!-- header section end -->

       <div style="text-align: center;font-size:40px;">
        <h2><b>Add Post</b></h2>
       </div>
      <form action="{{url('add_user')}}" method="POST" enctype="multipart/form-data">
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
        <button type="submit" class="primary"><b>Submit</b></button>
    </form>
      @include('home.footer')   
   </body>
</html>