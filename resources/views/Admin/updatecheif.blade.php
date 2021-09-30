<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
  @include("Admin.admincss")
  </head>
  <body>

    <div class="container-scroller">
        @include("Admin.Navbar")
        <form action="{{url('/updatecheifs',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
        <div>
            <label>Name</label>
            <input style="color:blue;" type="text" name="name" required="" placeholder="Enter Name of Cheif" value="{{$data->name}}">
        </div>
        <div>
            <label>Speciality</label>
            <input style="color:blue;" type="text" name="speciality" required="" placeholder="Enter Speciality of Cheif" value="{{$data->speciality}}">
        </div>
        <div>
            <label>Old Image</label>
            <img height="200" widt="200" src="/cheifimage/{{$data->image}}">
        </div>
        <div>
            <label>New Image</label>
            <input type="file" name="image">
        </div>
        <div>
            <input style="color:blue;" type="submit" value="Update">
     </div>
        </form>


    </div>
        @include("Admin.adminscript")

  </body>
</html>