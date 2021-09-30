<!DOCTYPE html>
<html lang="en">
  <head>
  @include("Admin.admincss")
  </head>
  <body>
    <x-app-layout>

    </x-app-layout>
<div class="container-scroller">
        @include("Admin.Navbar")
        <div style="position:relative;top:60px; right:-150px">
          <form action="{{url('/uploadfood')}}"method="post" enctype="multipart/form-data">
               @csrf
          
          <div>
            <label>Title</label>
            <input style="color:blue;" type ="text" name="title" placeholder="Write Title" required>
          </div>
          <div>
            <label>Price</label>
            <input style="color:blue;"   type ="num" name="price" placeholder="Write Price" required>
          </div>
          <div>
            <label>Image</label>
            <input type ="file" name="image" required>
          </div>
          <div>
            <label>Description</label>
            <input style="color:blue;"      type ="text" name="description" placeholder="Write Description" required>
          </div>
          <div>
          <input style="color:black"type="submit" value="Save">
          </div>
          </form>
          <div>
<table bgcolor="black">
<tr>
<th style="padding:30px">Food Name</th>
<th tyle="padding:30px">Price</th>
<th style="padding:30px">Description</th>
<th style="padding:35px">Image</th>
<th style="padding:35px">Delete</th>
<th style="padding:35px">Update</th>
@foreach($data as $data)
<tr align="center">
<td>{{$data->title}}</td>

<td>{{$data->price}}</td>

<td>{{$data->description}}</td>

<td><img  height="200" width="200" src="/foodimage/{{$data->image}}"</td>
<td><a href="{{url('/deletemenu',$data->id)}}">Delete</a></td>
<td><a href="{{url('/updatemenu',$data->id)}}">Update</a></td>
</tr>

@endforeach
</tr>
</table>
</div>
</div>
  </div>
        @include("Admin.adminscript")

  </body>
</html>