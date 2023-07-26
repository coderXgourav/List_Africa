<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ListingModel;
use DB;

class ListingController extends Controller
{
    public function addListingPage(){
        $category = CategoryModel::where('status',1)->get();
        // echo "<pre>";
        // print_r($category[0]);
        // die();
        return view('admin.dashboard.add-listing',['category'=>$category]);
    }

//    THIS IS A saveListing FUNCION 

    public function saveListing(Request $request){
    
        $category_id = $request->category_id;
        $company = $request->company;
     if($request->sunday_start!=""){
           $sunday_start = $request->sunday_start;
           $sunday_end = $request->sunday_end;
        }else{
           $sunday_start = "CLOSED";
           $sunday_end = "";
        }

        if($request->monday_start!=""){
           $monday_start = $request->monday_start;
           $monday_end = $request->monday_end;
        }else{
           $monday_start = "CLOSED";
           $monday_end = "";
        }

         if($request->tue_start!=""){
           $tue_start = $request->tue_start;
           $tue_end = $request->tue_end;
        }else{
           $tue_start = "CLOSED";
           $tue_end = "";
        }

         if($request->wed_start!=""){
           $wed_start = $request->wed_start;
           $wed_end = $request->wed_end;
        }else{
           $wed_start = "CLOSED";
           $wed_end = "";
        }


        if($request->thus_start!=""){
           $thus_start = $request->thus_start;
           $thus_end = $request->thus_end;
        }else{
           $thus_start = "CLOSED";
           $thus_end = "";
        }

        if($request->friday_start!=""){
           $friday_start = $request->friday_start;
           $friday_end = $request->friday_end;
        }else{
           $friday_start = "CLOSED";
           $friday_end = "";
        }

         if($request->saturday_start!=""){
           $saturday_start = $request->saturday_start;
           $saturday_end = $request->saturday_end;
        }else{
           $saturday_start = "CLOSED";
           $saturday_end = "";
        }
       


        $address = $request->address;
       $x = $address;
        $keyword = explode(",",$x);
        $y = end($keyword);
        $y= trim($y);
        

        $country=$y;

        if($request->lat!=""){
            $lat = $request->lat;
        }else{
            $lat="";
        }
        if($request->lng!=""){
            $lng = $request->lng;
        }else{
            $lng="";
        }
        if($request->phone_number!=""){
            $phone_number = $request->phone_number;
        }else{
            $phone_number="";
        }
        if($request->mobile_number!=""){
            $mobile_number = $request->mobile_number;
        }else{
            $mobile_number="";
        }
        if($request->fax!=""){
            $fax = $request->fax;
        }else{
            $fax="";
        }
        if($request->email!=""){
            $email = $request->email;
        }else{
            $email="";
        }
        if($request->website!=""){
            $website = $request->website;
        }else{
            $website ="";

        }
        if($request->desc!=""){
            $desc = $request->desc;
        }else{
            $desc = "";

        }
        if($request->year!=""){
            $year = $request->year;
        }else{
            $year ="";

        }
        if($request->employe!=""){
            $employe = $request->employe;
        }else{
            $employe = "";
        }
        if($request->manager!=""){
            $manager = $request->manager;
        }else{
            $manager ="";

        }

         if($request->gallery1!=""){
           $gellery1 = $request->gallery1;
           $ex1 = $gellery1->getClientOriginalExtension();
           $gellery1name = rand('1000','9999').'.'.$ex1;
           if($ex1 == 'jpg' || $ex1 == 'png' || $ex1 == 'jpeg' || $ex1 == 'webp'){
            $gellery1->move('listing_photo', $gellery1name);
             $galleryOne = $gellery1name;
           }else{
             return response()->json([
                    'status' => false,
                    'title' => 'Gallery One Photo Not Valid',
                    'icon' => 'error',
                ]);
           }
           
        }else{
             $galleryOne = "";

        }


          if($request->gallery2!=""){
           $gellery2 = $request->gallery2;
           $ex2 = $gellery2->getClientOriginalExtension();
           $gellery2name = rand('1000','9999').'.'.$ex2;
           if($ex2 == 'jpg' || $ex2 == 'png' || $ex2 == 'jpeg' || $ex2 == 'webp'){
             $gellery2->move('listing_photo', $gellery2name);
             $galleryTwo = $gellery2name;
           }else{
             return response()->json([
                    'status' => false,
                    'title' => 'Gallery TWo Photo Not Valid',
                    'icon' => 'error',
                ]);
           }
           
        }else{
             $galleryTwo = "";

        }

         if($request->gallery3!=""){
           $gallery3 = $request->gallery3;
           $ex3 = $gallery3->getClientOriginalExtension();
           $gellery3name = rand('1000','9999').'.'.$ex3;
           if($ex3 == 'jpg' || $ex3 == 'png' || $ex3 == 'jpeg' || $ex3 == 'webp'){
             $gallery3->move('listing_photo', $gellery3name);
             $galleryThree = $gellery3name;
           }else{
             return response()->json([
                    'status' => false,
                    'title' => 'Gallery Three Photo Not Valid',
                    'icon' => 'error',
                ]);
           }
           
        }else{
            $galleryThree ="";

        }

         if($request->gallery4!=""){
           $gallery4 = $request->gallery4;
           $ex4 = $gallery4->getClientOriginalExtension();
           $gellery4name = rand('1000','9999').'.'.$ex4;
           if($ex4 == 'jpg' || $ex4 == 'png' || $ex4 == 'jpeg' || $ex4 == 'webp'){
             $gallery4->move('listing_photo', $gellery4name);
             $galleryFour = $gellery4name;
           }else{
             return response()->json([
                    'status' => false,
                    'title' => 'Gallery Four Photo Not Valid',
                    'icon' => 'error',
                ]);
           }
           
        }else{
           $galleryFour = "";

        }

       



      $photo = $request->file;
      $ex = $photo->getClientOriginalExtension();
      $icon_name = rand('1000','9999').'.'.$ex;
      if ($ex == 'jpg' || $ex == 'png' || $ex == 'jpeg' || $ex == 'webp') {
     
            if ($photo->move('listing_photo', $icon_name)) {
                $listing_data = new ListingModel;
                $listing_data->cat_id = $category_id;
                $listing_data->listing_title = $company;
                $listing_data->address = $address;
                $listing_data->country = $country;
                $listing_data->lat = $lat;
                $listing_data->lan = $lng;
                $listing_data->phone_number = $phone_number;
                $listing_data->mobile_number = $mobile_number;
                $listing_data->fax = $fax;
                $listing_data->email = $email;
                $listing_data->website = $website;
                $listing_data->description = $desc;
                $listing_data->year = $year;
                $listing_data->employe = $employe;
                $listing_data->manager = $manager;
                $listing_data->photo = $icon_name;

                $listing_data->sun_start = $sunday_start;
                $listing_data->sun_end = $sunday_end;

                $listing_data->mon_start = $monday_start;
                $listing_data->mon_end = $monday_end;

                $listing_data->tue_start = $tue_start;
                $listing_data->tue_end = $tue_end;

                $listing_data->wed_start = $wed_start;
                $listing_data->wed_end = $wed_end;

                $listing_data->thusday_start = $thus_start;
                $listing_data->thusday_end = $thus_end;

                $listing_data->friday_start = $friday_start;
                $listing_data->friday_end = $friday_end;

                $listing_data->saturday_start = $saturday_start;
                $listing_data->saturday_end = $saturday_end;

                $listing_data->gallery_1 = $galleryOne;
                $listing_data->gallery_2 = $galleryTwo;
                $listing_data->gallery_3 = $galleryThree;
                $listing_data->gallery_4 = $galleryFour;

                $listing_data->admin = 'ADMIN';
                $save = $listing_data->save();
                if ($save) {
                    return response()->json([
                        'status' => true,
                        'title' => 'Listing Saved',
                        'icon' => 'success',
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'title' => 'Technical Issue, Try again later !',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'title' => 'Listing Photo Not Saved',
                    'icon' => 'error',
                ]);
            }

        
    } else {
        return response()->json([
            'status' => false,
            'title' => 'Photo Must be JPG, PNG, Webp',
            'icon' => 'error',
        ]);
    }

       
    


    }


    // THIS IS A listingView FUNCTION 
    public function listingView(){
        $listing_data = DB::table('category')
        ->join('listing','listing.cat_id','=','category.id')->orderBy('id','DESC')->paginate(10);

$all_category = CategoryModel::where('status',1)->orderBy('category_name','ASC')->get();
 $all_country = DB::table('listing')->distinct()->get(['country']);
        return view('admin.dashboard.view-listing',['listing_data'=>$listing_data,'all_category'=>$all_category,'all_country'=>$all_country]);
    }

    // THIS IS A listingStatus FUNCTION 

    public function listingStatus(Request $request ){
        $status = $request->status_type;
        $listing_id = $request->listing_id;
       
        // $this_status = ListingModel::find($listing_id)->get();
        // $main_status = $this_status[0]['status'];
    
          $update_status = ListingModel::find($listing_id);
          $update_status->status=$status;
          $update_status->save();

       if($status==0){
           return response()->json([
             'status'=>true,
             'title'=>'Listing Deactivated',
             'icon'=>'success'
          ]);
       }
         else if($status==1){
           return response()->json([
             'status'=>true,
             'title'=>'Listing Activated',
             'icon'=>'success'
          ]);
       }else{
         return response()->json([
             'status'=>true,
             'title'=>'Listing Verifyed',
             'icon'=>'success'
          ]);
       }
        
   
      
    }

    // THIS IS A listingUpdatePage FUNCTION 

    public function listingUpdatePage($id){
        
        $listing_data = ListingModel::find($id);
        $category = CategoryModel::where('status',1)->get();
        return view('admin.dashboard.edit-listing',['listing_data'=>$listing_data,'category'=>$category]);
    
    }


    // THIS IS A updateListing FUNCTION 
    public function updateListing(Request $request)
   {
    $listing_id = $request->listing_id;
    $category_id = $request->category_id;

  if($request->sunday_start!=""){
           $sunday_start = $request->sunday_start;
           $sunday_end = $request->sunday_end;
        }else{
           $sunday_start = "CLOSED";
           $sunday_end = "";
        }

        if($request->monday_start!=""){
           $monday_start = $request->monday_start;
           $monday_end = $request->monday_end;
        }else{
           $monday_start = "CLOSED";
           $monday_end = "";
        }

         if($request->tue_start!=""){
           $tue_start = $request->tue_start;
           $tue_end = $request->tue_end;
        }else{
           $tue_start = "CLOSED";
           $tue_end = "";
        }

         if($request->wed_start!=""){
           $wed_start = $request->wed_start;
           $wed_end = $request->wed_end;
        }else{
           $wed_start = "CLOSED";
           $wed_end = "";
        }


        if($request->thus_start!=""){
           $thus_start = $request->thus_start;
           $thus_end = $request->thus_end;
        }else{
           $thus_start = "CLOSED";
           $thus_end = "";
        }

        if($request->friday_start!=""){
           $friday_start = $request->friday_start;
           $friday_end = $request->friday_end;
        }else{
           $friday_start = "CLOSED";
           $friday_end = "";
        }

         if($request->saturday_start!=""){
           $saturday_start = $request->saturday_start;
           $saturday_end = $request->saturday_end;
        }else{
           $saturday_start = "CLOSED";
           $saturday_end = "";
        }


    $company = $request->company;
    $address = $request->address;
    $x = $address;
        $keyword = explode(",",$x);
        $y = end($keyword);
         $y= trim($y);

        $country=$y;

    
    if($request->phone_number!=""){
        $phone_number = $request->phone_number;
    }else{
        $phone_number="";
    }
    if($request->mobile_number!=""){
        $mobile_number = $request->mobile_number;
    }else{
        $mobile_number="";
    }
    if($request->fax!=""){
        $fax = $request->fax;
    }else{
        $fax="";
    }
    if($request->email!=""){
        $email = $request->email;
    }else{
        $email="";
    }
    if($request->website!=""){
        $website = $request->website;
    }else{
        $website ="";

    }
    if($request->desc!=""){
        $desc = $request->desc;
    }else{
        $desc = "";

    }
    if($request->year!=""){
        $year = $request->year;
    }else{
        $year ="";

    }
    if($request->employe!=""){
        $employe = $request->employe;
    }else{
        $employe = "";
    }
    if($request->manager!=""){
        $manager = $request->manager;
    }else{
        $manager ="";

    }

     if($request->gallery1!=""){
           $gellery1 = $request->gallery1;
           $ex1 = $gellery1->getClientOriginalExtension();
           $gellery1name = rand('1000','9999').'.'.$ex1;
           if($ex1 == 'jpg' || $ex1 == 'png' || $ex1 == 'jpeg' || $ex1 == 'webp'){
            $gellery1->move('listing_photo', $gellery1name);
             $galleryOne = $gellery1name;
           }else{
             return response()->json([
                    'status' => false,
                    'title' => 'Gallery One Photo Not Valid',
                    'icon' => 'error',
                ]);
           }
           
        }else{
             $galleryOne = "";

        }


          if($request->gallery2!=""){
           $gellery2 = $request->gallery2;
           $ex2 = $gellery2->getClientOriginalExtension();
           $gellery2name = rand('1000','9999').'.'.$ex2;
           if($ex2 == 'jpg' || $ex2 == 'png' || $ex2 == 'jpeg' || $ex2 == 'webp'){
             $gellery2->move('listing_photo', $gellery2name);
             $galleryTwo = $gellery2name;
           }else{
             return response()->json([
                    'status' => false,
                    'title' => 'Gallery TWo Photo Not Valid',
                    'icon' => 'error',
                ]);
           }
           
        }else{
             $galleryTwo = "";

        }

         if($request->gallery3!=""){
           $gallery3 = $request->gallery3;
           $ex3 = $gallery3->getClientOriginalExtension();
           $gellery3name = rand('1000','9999').'.'.$ex3;
           if($ex3 == 'jpg' || $ex3 == 'png' || $ex3 == 'jpeg' || $ex3 == 'webp'){
             $gallery3->move('listing_photo', $gellery3name);
             $galleryThree = $gellery3name;
           }else{
             return response()->json([
                    'status' => false,
                    'title' => 'Gallery Three Photo Not Valid',
                    'icon' => 'error',
                ]);
           }
           
        }else{
            $galleryThree ="";

        }

         if($request->gallery4!=""){
           $gallery4 = $request->gallery4;
           $ex4 = $gallery4->getClientOriginalExtension();
           $gellery4name = rand('1000','9999').'.'.$ex4;
           if($ex4 == 'jpg' || $ex4 == 'png' || $ex4 == 'jpeg' || $ex4 == 'webp'){
             $gallery4->move('listing_photo', $gellery4name);
             $galleryFour = $gellery4name;
           }else{
             return response()->json([
                    'status' => false,
                    'title' => 'Gallery Four Photo Not Valid',
                    'icon' => 'error',
                ]);
           }
           
        }else{
           $galleryFour = "";

        }

        
  $photo = $request->file;
  if($photo!=""){
    $ex = $photo->getClientOriginalExtension();
    $icon_name = rand('1000','9999').'.'.$ex;
    if ($ex == 'jpg' || $ex == 'png' || $ex == 'jpeg' || $ex == 'webp') {
   
          if ($photo->move('listing_photo', $icon_name)) {
              $listing_data =ListingModel::find($listing_id);
              $listing_data->cat_id = $category_id;
              $listing_data->listing_title = $company;
              $listing_data->address = $address;
              $listing_data->country = $country;
            //   $listing_data->lat = $lat;
            //   $listing_data->lan = $lng;
              $listing_data->phone_number = $phone_number;
              $listing_data->mobile_number = $mobile_number;
              $listing_data->fax = $fax;
              $listing_data->email = $email;
              $listing_data->website = $website;
              $listing_data->description = $desc;
              $listing_data->year = $year;
              $listing_data->employe = $employe;
              $listing_data->manager = $manager;
              $listing_data->photo = $icon_name;


               $listing_data->sun_start = $sunday_start;
                $listing_data->sun_end = $sunday_end;

                $listing_data->mon_start = $monday_start;
                $listing_data->mon_end = $monday_end;

                $listing_data->tue_start = $tue_start;
                $listing_data->tue_end = $tue_end;

                $listing_data->wed_start = $wed_start;
                $listing_data->wed_end = $wed_end;

                $listing_data->thusday_start = $thus_start;
                $listing_data->thusday_end = $thus_end;

                $listing_data->friday_start = $friday_start;
                $listing_data->friday_end = $friday_end;

                $listing_data->saturday_start = $saturday_start;
                $listing_data->saturday_end = $saturday_end;


               if($galleryOne!=""){
                 $listing_data->gallery_1 = $galleryOne;
              }
               if($galleryTwo!=""){
                 $listing_data->gallery_2 = $galleryTwo;
              }
                if($galleryThree!=""){
                 $listing_data->gallery_3 = $galleryThree;
              }
                 if($galleryFour!=""){
                $listing_data->gallery_4 = $galleryFour;
              }
              if($request->lat!=""){
        $listing_data->lat = $request->lat;
    }
   
    if($request->lng!=""){
        $listing_data->lan = $request->lng;
    }


              $save = $listing_data->save();
              if ($save) {
                  return response()->json([
                      'status' => true,
                      'title' => 'Updated Success',
                      'icon' => 'success',
                  ]);
              } else {
                  return response()->json([
                      'status' => false,
                      'title' => 'Technical Issue, Try again later !',
                  ]);
              }
          } else {
              return response()->json([
                  'status' => false,
                  'title' => 'Listing Photo Not Updated',
                  'icon' => 'error',
              ]);
          }
  
      
  } else {
      return response()->json([
          'status' => false,
          'title' => 'Photo Must be JPG, PNG, Webp',
          'icon' => 'error',
      ]);
  }
  }else{
    $listing_data =ListingModel::find($listing_id);
    $listing_data->cat_id = $category_id;
    $listing_data->listing_title = $company;
    $listing_data->address = $address;
    $listing_data->country = $country;
    // $listing_data->lat = $lat;
    // $listing_data->lan = $lng;
    $listing_data->phone_number = $phone_number;
    $listing_data->mobile_number = $mobile_number;
    $listing_data->fax = $fax;
    $listing_data->email = $email;
    $listing_data->website = $website;
    $listing_data->description = $desc;
    $listing_data->year = $year;
    $listing_data->employe = $employe;
    $listing_data->manager = $manager;

     $listing_data->sun_start = $sunday_start;
                $listing_data->sun_end = $sunday_end;

                $listing_data->mon_start = $monday_start;
                $listing_data->mon_end = $monday_end;

                $listing_data->tue_start = $tue_start;
                $listing_data->tue_end = $tue_end;

                $listing_data->wed_start = $wed_start;
                $listing_data->wed_end = $wed_end;

                $listing_data->thusday_start = $thus_start;
                $listing_data->thusday_end = $thus_end;

                $listing_data->friday_start = $friday_start;
                $listing_data->friday_end = $friday_end;

                $listing_data->saturday_start = $saturday_start;
                $listing_data->saturday_end = $saturday_end;
                
     if($galleryOne!=""){
                 $listing_data->gallery_1 = $galleryOne;
              }
               if($galleryTwo!=""){
                 $listing_data->gallery_2 = $galleryTwo;
              }
                if($galleryThree!=""){
                 $listing_data->gallery_3 = $galleryThree;
              }
                 if($galleryFour!=""){
                $listing_data->gallery_4 = $galleryFour;
              }
               if($request->lat!=""){
        $listing_data->lat = $request->lat;
    }
   
    if($request->lng!=""){
        $listing_data->lan = $request->lng;
    }
    $save = $listing_data->save();
   if($save){
    return response()->json([
        'status'=>true,
        'title'=>'Updated Success',
        'icon'=>'success'
    ]);
   }else{
    return response()->json([
        'status'=>false,
        'title'=>'Update Failed..!',
        'icon'=>'error'
    ]);
   }
  }
  

   }

//    THIS IS A listingDelete FUNCTION 
 public function listingDelete(Request $request){
   $listing_id = $request->listing_id;
   $delete = ListingModel::find($listing_id)->delete();
   if($delete){
    return response()->json([
        'status'=>true,
        'title'=>'Deleted',
        'icon'=>'success',
        'id'=>$listing_id
    ]);
   }else{
    return response()->json([
        'status'=>false,
        'title'=>'Deleted Failed',
        'icon'=>'error'
    ]);
   }

 }







 
// THIS IS END OF CLASS 

}