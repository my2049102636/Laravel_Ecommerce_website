<!DOCTYPE html>
<html>
  <head> 
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4caf50;
            color: white;
        }


        /* Responsive Styles */
        @media only screen and (max-width: 600px) {
            th, td {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }

            th {
                text-align: left;
            }

            table {
                margin-top: 0;
            }

            tbody {
                display: block;
                width: 100%;
                overflow-x: auto;
            }

            tr {
                margin-bottom: 15px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            td {
                border: none;
                border-bottom: 1px solid #ddd;
            }

            td:last-child {
                border-bottom: none;
            }
        }
        .img_deg{
            height: 200px;
            width: 250px;
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
    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">X</button>

    {{session()->get('message')}}
   </div>
   @endif
                    <h1 class="text-center text-white pt-5" >All Post</h1>
        <table>
            <thead>
                <tr>
                    <th>Post Title</th>
                    <th>Description</th>
                    <th>Posted by</th>
                    <th>Post status</th>
                    <th>Usertype</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($post as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->post_status}}</td>
                    <td>{{$post->usertype}}</td>
                    <td>
                        <img class="img_deg" src="{{ asset('postimg/' . $post->img) }}" alt="Image">
                    </td>
                    <td>
                        <a href="{{url('edit_post',$post->id)}}" class="btn btn-success">Edit </a>
                        <a href="{{url('delete_post',$post->id)}}" onclick="return confirm('are you sure you want to delete  this?')" class="btn btn-danger">delete</a>
                    </td>
                </tr>
                @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>
      </div>
      @include('admin.footer')
  </body>
</html>