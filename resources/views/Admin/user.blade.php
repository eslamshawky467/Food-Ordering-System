<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include("Admin.admincss")
        <title>Laravel</title>

    </head>
    <body>
        <x-app-layout>
        </x-app-layout>
        <div class="container-scroller">
            @include("Admin.Navbar")
<div style="position: relative; top:60px; right:-150">
<table bgcolor="grey" border="3px">
<tr>
<th style="padding: 30px">Name</th>
<th style="padding: 30px">Email</th>
<th style="padding: 30px">Action</th>
</tr>
@foreach($data as $data)
<tr align="center">
<td>{{$data->name}}</td>
<td>{{$data->email}}</td>
 @if($data->usertype=="0")
<td><a href="{{url('/deleteuser',$data->id)}}">Delete</a></td>    
@else
<td><a>Not Allow</a></td> 
@endif
</tr>
@endforeach



</table>

        </div>
        </div>

            @include("Admin.adminscript")

    </body>
    </html>