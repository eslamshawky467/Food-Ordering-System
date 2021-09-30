<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
  @include("Admin.admincss")
  </head>
  <body>

    <div class="container-scroller">
        @include("Admin.Navbar")
        <form action="{{url('/uploadcheif')}}" method="Post" enctype="multipart/form-data">
            @csrf
                
            <div>
                <label>Name</label>
                <input style="color:blue;" type="text" name="name" required="" placeholder="Enter Name of Cheif">
            </div>
            <div>
                <label>Speciality</label>
                <input style="color:blue;" type="text" name="speciality" required="" placeholder="Enter Speciality of Cheif">
            </div>
            <div>
                <input type="file" name="image" required="">
            </div>
            <div>
                <input style="color:blue;" type="submit" value="Save">
            </div>
            </form>
            <table bgcolor="black">
                <tr>
                <th style="padding:30px;">Cheif Name</th>

                <th style="padding:30px;">Speciality</th>

                <th style="padding:30px;">image</th>
                <th style="padding:30px;">Update</th>
                <th style="padding:30px;">Delete</th>
            </tr>
            @foreach($data as $data)
            <tr align="center">
            <td>{{$data->name}}</td>
            <td>{{$data->speciality}}</td>
            <td><img height="100" width="100" src="/cheifimage/{{$data->image}}"></td>
            <td><a href="{{url('/updatecheif',$data->id)}}">Update</a></td>
            <td><a href="{{url('/deletecheif',$data->id)}}">Delete</a></td>
            </tr>
            @endforeach
            </table>
        </div>
    </div>
        @include("Admin.adminscript")

  </body>
</html>
