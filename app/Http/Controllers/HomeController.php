<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\food;
use App\Models\User;
use App\Models\cheif;
use App\Models\Cat;
use App\Models\Order;

class HomeController extends Controller
{
  public function index(){
    if( Auth::id()){
    return redirect('redirects');
    }

    else

     $data=food::all();
     $data2=cheif::all();
      return view("home",compact("data","data2"));
  }

  public function redirects(){
    $data=food::all();
    $data2=cheif::all();

    $usertype=Auth::user()->usertype;
     if($usertype=='1')
    {
      return view('Admin.Adminhome');
    }
    else{
    $userid=Auth::id();
    $count=Cat::where('userid',$userid)->count();


      return view('home',compact("data","data2","count"));
    }
}
public function addcart(Request $request,$id){

if(Auth::id())
{
$userid=Auth::id();
$foodid=$id;
$quantity=$request->quantity;
$cart=new Cat;
$cart->userid=$userid;
$cart->foodid=$foodid;
$cart->quantity=$quantity;
$cart->save();
return redirect()->back();
}
else{

return redirect('/login');

}
}
public function showcart(Request $request ,$id){

  $count=Cat::where('userid',$id)->count();
  if(Auth::id()==$id){
  $data2=Cat::select('*')->where('userid','=',$id)->get();
  $data=Cat::where('userid',$id)->join('food','cats.foodid','=', 'food.id')->get();
  return view('showcart',compact('count','data','data2'));
}
else
{
return redirect()->back();
}
}
public function remove($id)
{
  $data=Cat::find($id);
  $data->delete();
  return redirect()->back();
}
public function orderconfirm(Request $request){

foreach($request->foodname as $key=>$foodname)
{
$data=new Order;
$data->foodname=$foodname;
$data->price=$request->price[$key];
$data->quantity=$request->quantity[$key];
$data->name=$request->name;
$data->phone=$request->phone;
$data->address=$request->address;
$data->save();
}
return redirect()->back();
}
}
