<?php

namespace App\Http\Controllers;

use App\Models\AnswerModel;
use App\Models\CategoryModel;
use App\Models\ListingModel;
use App\Models\QuestionModel;
use App\Models\UserModel;
use DB;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{

// THIS IS A HomeController FUNCTION
    public function homePage()
    {

        $listing_data = ListingModel::where('status', 1)->orderBy('listing_id', 'DESC')->paginate(8);
        $category_data = CategoryModel::where('status', 1)->orderBy('category_name', 'ASC')->paginate(9);
        $all_category = CategoryModel::where('status', 1)->orderBy('category_name', 'ASC')->get();
        // $all_country = DB::table('listing')->distinct()->get(['country']);
        $all_country =ListingModel::distinct()->select('country')->get();

        $question = DB::table('question')
            ->join('user', 'user.user_id', '=', 'question.question_admin')
            ->orderBy('question.question_id', 'desc')
            ->where('question.status',1)
            ->paginate(1);

// $ans =  DB::table('answer')
//            ->join('question','question.question_id','=','answer.main_question_id')
//            ->join('user','user.user_id','=','answer.ans_user_id')
//            ->get();

        //    echo "<pre>";
        //    print_r($ans);
        //    die();

        return view('welcome', ['category' => $category_data, 'listing' => $listing_data, 'all_category' => $all_category, 'country' => $all_country, 'question' => $question]);

    }

// THIS IS A categoryWiseListing FUNCTION

    public function categoryWiseListing($id)
    {
        $category_name = CategoryModel::find($id);

        $count = ListingModel::where('cat_id', $id)
        ->where('status',1)
        ->count();
        $category = CategoryModel::where('status',1)->get();

        $data = DB::table('category')->
            join('listing', 'listing.cat_id', '=', 'category.id')
            ->where('listing.cat_id', $id)
            ->where('listing.status','>',0)
            ->paginate(5);

        $all_category = CategoryModel::where('status', 1)->orderBy('category_name', 'ASC')->get();
        $all_country = DB::table('listing')->distinct()->get(['country']);

        return view('category-listing', ['data' => $data, 'count' => $count, 'category' => $category, 'category_name' => $category_name, 'all_category' => $all_category, 'country' => $all_country]);

    }

// THIS IS A listingDetails  FUNCTION

    public function listingDetails($id)
    {
        $data = DB::table('category')->
            join('listing', 'listing.cat_id', '=', 'category.id')->
            where('listing.listing_id', $id)->get();
        $all_category = CategoryModel::where('status', 1)->orderBy('category_name', 'ASC')->get();

        $review_details = DB::table('review')
            ->join('listing', 'listing.listing_id', '=', 'review.main_listing_id')
            ->join('user', 'user.user_id', '=', 'review.main_user_id')
            ->where('listing.listing_id', $id)
            ->orderBy('review.rating_id', 'DESC')
            ->paginate(10);

        return view('listing', ['data' => $data[0], 'all_category' => $all_category, 'review' => $review_details]);

    }

// THIS IS A ListingCountryDetails FUNCTION
    public function ListingCountryDetails($country)
    {
        $category_name = CategoryModel::find(1);

        $count = ListingModel::where('country', 'LIKE', '%' . $country . '%')->count();

        $category = CategoryModel::where('status',1)->get();

        $data = DB::table('category')->
            join('listing', 'listing.cat_id', '=', 'category.id')
            ->where('listing.country', 'LIKE', '%' . $country . '%')
            ->where('listing.status','>',0)
            ->paginate(5);

        $all_category = CategoryModel::where('status', 1)->orderBy('category_name', 'ASC')->get();
        $all_country = DB::table('listing')->distinct()->get(['country']);

        return view('category-listing', ['data' => $data, 'count' => $count, 'category' => $category, 'category_name' => $category_name, 'all_category' => $all_category, 'country' => $all_country]);

    }

// THIS IS A allCategory FUNCTION

    public function allCategory()
    {
        $all_category = CategoryModel::where('status', 1)->orderBy('category_name', 'ASC')->get();
        return view('all_category', ['all_category' => $all_category]);
    }

// THIS IS QUESTION POST FUNCTION

    public function questionPost(Request $request)
    {
        $session = session('user');
        if ($session != "") {
            $id = session('user');
            $question_data = new QuestionModel;
            $question_data->question_admin = $id;
            $question_data->question = $request->question;
            $question_data->save();
            return response()->json([
                'status' => true,
                'title' => 'Question Post , Wait for Approval',
                'icon' => 'success',
            ]);
        } else {
            session()->put('question', 1);
            return response()->json([
                'question' => true,
                'status' => false,
                'title' => 'Please Login First',
                'icon' => 'warning',
            ]);
        }

    }

// THIS IS A answerPost FUNCITON
    public function answerPost(Request $request)
    {
        $session = session('user');
        if ($session != "") {
            $id = session('user');

            
            $ansPost = new AnswerModel;
            $ansPost->main_question_id = $request->question_id;
            $ansPost->ans_user_id = $id;
            $ansPost->answer = $request->ans;
            $ansPost->save();
            return response()->json([
                'status' => true,
                'title' => 'Answer Post',
                'icon' => 'success',
            ]);
        } else {
            session()->put('question', 1);
            return response()->json([
                'question' => true,
                'status' => false,
                'title' => 'Please Login First',
                'icon' => 'warning',
            ]);
        }

    }
    // THIS IS ALL LOCATION FUNCTION 


public function alllocation()
{
    $all_category = CategoryModel::where('status', 1)->orderBy('category_name', 'ASC')->get();
    $all_country = DB::table('listing')->distinct()->get(['country']);
    return view('all_country', ['all_location' => $all_country,'all_category'=>$all_category]);
}

    // THIS IS GOOGLE LOGIN FUNCTION
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // THIS IS A handleGoogleCallback FUNCTION
    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();
        $user_record = UserModel::where('google_id', $user->getId())->first();
        if ($user_record != "") {
            session()->put('user', $user_record->user_id);
            return redirect('/');

        } else {
            $user_data = new UserModel;
            // $user_data->user_id = $user->getId();
            $user_data->user_name = $user->getName();
            $user_data->user_email = $user->getEmail();
            $user_data->google_id = $user->getId();
            $user_data->user_password = rand('10000', '99999');
            $user_data->save();
            session()->put('user', $user_data->user_id);
            $user_record = UserModel::where('google_id', $user->getId())->first();
             return redirect('/');

        }

    }
    // THIS IS A allAns FUNCTION

    public function allAns(Request $request)
    {
        $question_id = $request->myid;
        // $answers = DB::table('answer')
        //     ->join('question', 'question.question_id', '=', 'answer.main_question_id')
        //     ->join('user', 'user.user_id', '=', 'answer.ans_user_id')
        //     ->where('question.question_id', $question_id)
        //     ->orderBy('ans_id','DESC')
        //     ->paginate(5);
         
         $answers = DB::table('question')
                   ->join('answer','answer.main_question_id','=','question.question_id') 
                   ->join('user','user.user_id','=','answer.ans_user_id')
                   ->where('answer.main_question_id',$question_id)
                   ->orderBy('answer.ans_id','DESC') 
                   ->paginate(50); 
                //    echo "<pre>";
                //    print_r($answers);




            if(count($answers)>0){
                foreach ($answers as $key => $value) {?>

<div style="margin-left:55px; border:1px solid #e7dae7; border-radius:12px; margin-bottom:10px;">
    <div class="comment" style="margin-top: 10px; gap: 0px">
        <div class="user-banner">
            <div class="user" style="display:flex; align-items:center; gap:10px;">
                <div class="avatar">
                    <img src="user-2.png" style="width:30px; border-radius:50%;">
                    <!-- <span class="stat green"></span> -->
                </div>
                <h5><b><?php echo $value->user_name; ?></h5>
            </div>

            <!-- <button class="btn dropdown"><i class="ri-more-line"></i></button> -->
        </div>
        <p style="margin-bottom: 10px;
    margin-left: 40px; font-weight:normal;
}"><?php echo $value->answer; ?></p>


    </div>
</div>

<?php }
            }else{ ?>
<div style="margin-left:55px;">
    <div class="comment" style="margin-top: 10px;">
        <div class="user-banner" style="justify-content: center;">
            <div class="user">
                <h5 style="text-align:center; color:red; align-items:center"><?php echo "Answer Not Found..!" ?></h5>
            </div>
        </div>
    </div>
</div>
<?php }
       

    }
    // THIS IS redirectToFacebook FUNCTION 

    public function redirectToFacebook()
{
    return Socialite::driver('facebook')->redirect();
}

// THIS IS A handleFacebookCallback function 
public function handleFacebookCallback(){
      $user = Socialite::driver('facebook')->user();
       $existingUser = UserModel::where('user_email', $user->email)->first();
       if($existingUser){
           session()->put('user',$existingUser->user_id);
           return redirect()->back();
       }else{
         $newUser = new UserModel();
            $newUser->user_name = $user->name;
            $newUser->user_email = $user->email;
            $newUser->password = rand(1111,9999);
            $newUser->save();
           session()->put('user', $newUser->user_id);
           return redirect()->back();

       }
    
}




// THIS IS FIRST BLOG FUNCTION 
  public function firstBlog(){
    $all_category = CategoryModel::where('status', 1)->orderBy('category_name', 'ASC')->get();
    return view('first_blog', ['all_category'=>$all_category]);
  }
// THIS IS SECOND BLOG FUNCTION 
  public function secondBlog(){
    $all_category = CategoryModel::where('status', 1)->orderBy('category_name', 'ASC')->get();
    return view('second_blog', ['all_category'=>$all_category]);
  }
// THIS IS THIRD BLOG FUNCTION 
  public function thirdBlog(){
    $all_category = CategoryModel::where('status', 1)->orderBy('category_name', 'ASC')->get();
    return view('third_blog', ['all_category'=>$all_category]);
  }
    // THIS IS END OF CLASS

    // THIS IS A all-questions FUNCTIONS 
    public function allQuestion(){
        
    $all_category = CategoryModel::where('status', 1)->orderBy('category_name', 'ASC')->get();
    $questions = DB::table('question')
            ->join('user', 'user.user_id', '=', 'question.question_admin')
            ->orderBy('question.question_id', 'desc')
            ->where('question.status',1)
            ->paginate(10);
    return view('all_question', ['questions' => $questions,'all_category'=>$all_category]);

            
    }


// THIS IS A userAnswerPost FUNCITON
    public function userAnswerPost(Request $request)
    {
        $session = session('user');
        if ($session != "") {
            $id = session('user');     
            $ansPost = new AnswerModel;
            $ansPost->main_question_id = $request->question_id;
            $ansPost->ans_user_id = $id;
            $ansPost->answer = $request->ans;
            $ansPost->save();
           session()->flash('ok','Answer Post Successfull');
           return redirect()->back();
        } else {
            session()->put('question', 1);
           ?>
<script>
window.location = "/user";
</script>
<?php
           
        }

    }

    // THIS IS A searchFilter FUNCTION 
 public function searchFilter(Request $request){
    
    $country =  $request->country;
    $category_id = $request->category;

$all_category = CategoryModel::where('status',1)->orderBy('category_name','ASC')->get();
$all_country = DB::table('listing')->distinct()->get(['country']);

    $category_name =CategoryModel::where('id',$category_id)->first();
  
    $count = ListingModel::where('country',$country)
    ->where('cat_id',$category_id)
    ->where('status','>',0)
    ->count();
     $category = CategoryModel::where('status',1)->get();

     $data = DB::table('category')->
            join('listing','listing.cat_id','=','category.id')
            ->where('listing.cat_id',$category_id)
            ->where('listing.country',$country)
            ->where('listing.status','>',0)
            ->paginate(5);
            
            return view('category-listing',['data'=>$data,'count'=>$count,'category'=>$category,'category_name'=>$category_name,'all_category'=>$all_category,'country'=>$all_country]);
        }


// THIS IS imageUpload FUNCTION 
public function imageUpload(Request $request){
    $data =[
         'status'=>true,
         'title'=>'Kam Kar Raha Hai Vai..'
        ];
    // $photo = $request->photo;
    // echo json_encode($photo);
    // die();
}

   
// end of class 

}