<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="public">
     @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
     @include('home.header')
      <!-- header section end -->
      <div style="text-align:center;" class="col-md-8">
        <div><img style="padding:20px;" src="/postimg/{{$post->img}}" class="services_img"></div>
        <h1> <b>{{$post->title}}</b></h1>
          <h3>{{$post->description}}</h3>
        <p>post by <b>{{$post->name}}</b></p>
       
     </div>
      <!-- choose section end -->
      <!-- footer section start -->
      @include('home.footer')   
   </body>
</html>