<!DOCTYPE html>
<html lang="en">
   <head>
    <style>
        .main{
            text-align: center;
            background-color: rgb(151, 50, 17);
            padding-top: 50px;
            padding-bottom: 50px;
        }
    </style>
     @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
     @include('home.header')
   
<div class="container">
    <div class="row">
        @foreach($data as $data)
        <div class="col-lg-4 main">
         <img style="height: 200px;width:300px;margin:auto;" src="/postimg/{{$data->img}}" alt=""><br>
         <input type="text" value="{{$data->title}}" placeholder=""> <br> <br>
 
         <textarea name="" >{{$data->description}}</textarea> <br><br>
   
           <a  href="{{url('my_post_del',$data->id)}}" class="btn btn-outline-danger">Delete</a>
           
           <a  href="{{url('edit_my_post1',$data->id)}}" class="btn btn-success">Edit</a>
        </div>
    @endforeach
 
    </div>
</div>
   
      @include('home.footer')   
   </body>
</html>