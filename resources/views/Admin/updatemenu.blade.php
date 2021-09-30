<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
  @include("Admin.admincss")
  </head>
  <body>
    <x-app-layout>

    </x-app-layout>
    <div class="container-scroller">
        @include("Admin.Navbar")
        <div style="position:relative;top:60px; right:-150px">
            <form action="{{url('/update',$data->id)}}"method="post" enctype="multipart/form-data">
                 @csrf
            
            <div>
              <label>Title</label>
              <input style="color:blue;" type ="text" name="title" value="{{$data->title}}" required>
            </div>
            <div>
              <label>Price</label>
              <input style="color:blue;"   type ="num" name="price" value="{{$data->price}}" required>
            </div>
            <div>
              <label> Image</label>
              <img height="200" width="200" src="/foodimage/{{$data->image}}">
            </div>
            <div>
                <label> New Image</label>
                <input type ="file" name="image">
              </div>
            <div>
              <label>Description</label>
              <input style="color:blue;"      type ="text" name="description" value="{{$data->description}}" required>
            </div>
            <div>
            <input style="color:black"type="submit" value="Save">
            </div>
            </form>
            <div>


    </div>
        @include("Admin.adminscript")

  </body>
</html>