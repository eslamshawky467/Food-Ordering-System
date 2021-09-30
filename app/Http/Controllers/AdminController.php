<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\food;
use App\Models\reservation;
use App\Models\cheif;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller

{
  public function user()
  {
      $data=user::all();
      return view("admin.user",compact("data"));

  }  //
    public function deleteuser($id)
    {
        $data=user::find($id);
        $data->delete();
        return redirect()->back();
  
    }  //
    public function foodmenu()
    {
        $data=food::all();
        return view("admin.foodmenu",compact("data"));
    } 
    public function upload(Request $request )

    {
        $data=new food;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect()->back();
  
    }
    public function uploadcheif(Request $request )

    {
        $data=new cheif;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('cheifimage',$imagename);
        $data->image=$imagename;
        $data->name=$request->name;
        $data->speciality=$request->speciality;
        $data->save();
        return redirect()->back();
  
    }




    public function deletemenu($id)
    {
        $data =food::find($id);
        $data->delete();
        return redirect()->back();

      



    }   
    public function updatemenu($id)
    {
        $data =food::find($id);
        
        return view("Admin.updatemenu",compact("data"));

    }   
    public function update(Request $request,$id)
    {
        $data=food::find($id);
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect()->back();

    }
    public function reservation(Request $request )

    {
        $data=new reservation;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;
        $data->save();
        return redirect()->back();
  
    }
    public function viewreservation()

    {
      if(Auth::id())
{
        $data=reservation::all();
        return view("Admin.adminreservation",compact("data"));
} 
else{


return redirect('login');




}
    }
    public function viewcheif(){
    $data=cheif::all();
    return view("Admin.cheiffood",compact("data"));
    }  

    public function updatecheif($id)
    {

      $data=cheif::find($id);
      return view("Admin.updatecheif",compact("data"));

    }
    public function updatecheifs(Request $request,$id)
    {
        
        $data =cheif::find($id);
        $image=$request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('cheifimage',$imagename);
        $data->image=$imagename;
        }
        $data->name=$request->name;
        $data->speciality=$request->speciality;
        $data->save();
        return redirect()->back();
    }
    public function deletecheif($id){
    $data=cheif::find($id);
    $data->delete();
    return redirect()->back();
    }
    public function orders(){
        $data=Order::all();
        return view('admin.orders',compact('data'));        
    }
    public function search(Request $request ){

    $search=$request->search;
     $data= Order::where('name' ,'Like','%'.$search."%")->orWhere('foodname' ,'Like','%'.$search."%")->get();
     return view('admin.orders',compact('data'));
    }  

}
