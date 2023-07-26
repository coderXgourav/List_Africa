<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\ListingModel; 
use App\Models\QuestionModel;
use DB;



class AdminLoginController extends Controller
{
//    THIS IS A ADMIN LOGIN FUNCTION 
   public function login(Request $request)
   {
    $email = $request->username;
    $password = $request->password;
    $username = $request->username;
    
    $username_check = AdminModel::where('email',$email)->orWhere('username',$username)->first();
   if($username_check){
     if($password==$username_check['password']){
        session()->put('admin',$username_check['id']);
        return response()->json([
            'status'=>true,
            'title'=>'Login Successfull',
            'icon'=>'success'
         ]);

     }else{
        return response()->json([
           'status'=>false,
           'title'=>'Invalid Password',
           'icon'=>'error'
        ]);
     }

   }else{
    return response()->json([
          'status'=>false,
          'title'=>'Invalid Username & Password',
          'icon'=>'error'
    ]);

   }
 

   }

// THIS IS A DASHBOARD FUNCTION 

public function dashboard()
{
    $data = AdminModel::all();
    $listing_count = ListingModel::count();
    $user_count = UserModel::count();
    $category_count = CategoryModel::count();
    $question_count = QuestionModel::count();

return view('admin.dashboard.index',['data'=>$data,'listing_count'=>$listing_count,'user_count'=>$user_count,'category_count'=>$category_count,'question_count'=>$question_count]);
}

// THIS IS A LOGOUT FUNCTION 

public function logout(){
    session()->forget('admin');
   return response()->json([
     'status'=>true
   ]);
}

// THIS IS A userDetails FUNCTION 

public function userDetails(){
$data = UserModel::all();
return view('admin.dashboard.users',['users'=>$data]);

}


// THIS IS A questionShow FUNCTION 
public function questionShow(){
$data = DB::table('user')
->join('question','question_admin','=','user.user_id')
->orderBy('question.question_id','DESC')
->get();
return view('admin.dashboard.question',['users'=>$data]);

}

// THIS IS deactiveQuestion FUNCTION 
public function deactiveQuestion($id)
{
  $data = QuestionModel::find($id);

  if($data!=""){
     $data->status=0;
     $data->save();
     return self::questionShow();
  }else{
   echo "Bad Request";
  }
  
}

// THIS IS A passChangeForm FUNCTION 
public function passChangeForm(){
    return view('admin.dashboard.change_password');
}

// THIS IS activeQuestion FUNCTION 
public function activeQuestion($id)
{
  $data = QuestionModel::find($id);

  if($data!=""){
     $data->status=1;
     $data->save();
     return self::questionShow();
  }else{
   echo "Bad Request";
  }
  
}

// THIS IS A changePassword FUNCTION 
public function changePassword(Request $request){
    
      $old = $request->old;
        $new = $request->new;
        $confirm = $request->confirm;
    
     $admin_id = session('admin');
     $admin_details = AdminModel::find($admin_id);
     $db_password = $admin_details->password;

        
        if($db_password==$old){
            $id = session('admin');
            $admin_password = AdminModel::find($id);
            $admin_password->password=$confirm;
            $admin_password->save();
            return response()->json(['status'=>true,'title'=>'Password Updated','icon'=>'success']);


        }else{
            return response()->json(['status'=>false,'title'=>'Wrong Old Password','icon'=>'error']);
        }
    
}
// this is a requestPage function 
public function requestPage(){
$data = DB::table('user')
->join('category_request','category_request.request_user_id','=','user.user_id')
->orderBy('category_request.request_id','DESC')
->paginate(10);
return view('admin.dashboard.request',['users'=>$data]);

}

// THIS IS A searchListing FUNCTION 
public function searchListing(Request $request){
     $country =  $request->country;
     $category_id = $request->category;
    
$listing_data = DB::table('category')
        ->join('listing','listing.cat_id','=','category.id')->where('listing.country','=',$country)
        ->where('listing.cat_id','=',$category_id)->paginate(10);

$all_category = CategoryModel::where('status',1)->orderBy('category_name','ASC')->get();
 $all_country = DB::table('listing')->distinct()->get(['country']);
        return view('admin.dashboard.view-listing',['listing_data'=>$listing_data,'all_category'=>$all_category,'all_country'=>$all_country]);

}

// THIS IS END OF CLASS 


}