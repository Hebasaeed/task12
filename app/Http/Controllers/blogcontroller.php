<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;

class blogcontroller extends Controller
{
public function create(){

    return view('create');
}
public function storee(Request $request){//$request is object

//     echo $request->title."<br>";
//     echo $request->content."<br>";
//     echo $request->image."<br>";
//     $title=$request->title;
//     $content=$request->content;
//    $image=$request->image;




$dataa=$this->validate($request,[
           "title"  => "required|string",
            "content" => "required|min:50",
            "image"   => "required|image|mimes:jpg,png,jpeg|max2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000",
            "startdate" => "required|date_format:m-d-Y|after:tomorrow",
            "enddate" => "required|date_format:m-d-Y|after:startdate"
]);


$op= blog :: create($dataa);
if($op){
    echo 'data inserted';
    $message = 'data inserted';
}else{
    echo 'error try again';
    $message =  'error try again';
}

session()->flash('Message',$message);

return redirect(url('/'));

}





public function loadData(Request $request){
$data=[$title,$content,$image];
$titlepage="blog";
//session()->put("data","titlepage");//(key,value)
session()->flash("titlepage","data");//(key,value)
    return view('profile',compact('titlepage','data'));//url
}

public function index(){
    // code .....
    if(auth()->check()){
   $dataa =  blog :: orderBy('id','desc')->get(); //name of table

   //->take(2)

    return view('index',["data" => $dataa]);
}else{
    return redirect(url('/login'));

}
}

public function delete($id){
    // code .....

 //  $op =  blog::where('id',$id)->delete();     // find($id)
   $op =  blog::find($id)->delete();// get   ...with only id
   if($op){
      $message = "Raw Removed";
   }else{
      $message = 'Error Try Again';
   }

    session()->flash('Message',$message);

    return redirect(url('/'));

    }



    public function edit($id){

        // code

        $data = blog :: find($id);

           return view('edit',["data" => $data]);
      }


      public function update(Request $request,$id){


        $data=$this->validate($request,[
            "title"  => "required|string",
            "content" => "required|min:50",
            "image"   => "nullable|image",
            "startdate" => "required|date_format:m-d-Y|after:tomorrow",
            "enddate" => "required|date_format:m-d-Y|after:startdate"
        ]);

         $op =  student :: where('id',$id)->update($data);

         if($op){
            $message = 'Raw Updated';
        }else{
            $message =  'error try again';
        }

        session()->flash('Message',$message);

        return redirect(url('/'));



      }


      public function login(){
        return view('login');
    }
    public function doLogin(Request $request){

        $data =  $this->validate($request,[
            "password"  => "required|min:6",
            "email"     => "required|email"
          ]);


          if(auth()->attempt($data)){

           return redirect(url('/'));

          }else{
              session()->flash('Message','invalid Data');
              return redirect(url('/login'));
          }


       }




       public function logOut(){
           // code .....

           auth()->logout();
           return redirect(url('/login'));
       }

       public function image()
       {
           return view('create');
       }

       public function imageStore(Request $request)
       {
           $request->validate([
               'image' => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
           ]);
           return redirect('/')->back();

       }

}
