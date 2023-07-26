<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ListingModel;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{

    // THIS IS A addCategoryPage FUNCTION
    public function addCategoryPage()
    {
        return view('admin.dashboard.add-category');

    }
    // THIS IS A addCategory FUNCTION

    public function addCategory(Request $request)
    {
        $category = $request->category;
        $icon = $request->file;
        $ex = $icon->getClientOriginalExtension();
        $icon_name = rand('10000', '99999') . '.' . $ex;
        if ($ex == 'jpg' || $ex == 'png' || $ex == 'jpeg' || $ex == 'webp') {
            $check_category = CategoryModel::where('category_name', $category)->count();
            if ($check_category > 0) {
                return response()->json([
                    'status' => false,
                    'title' => 'Category Already Exist',
                    'icon' => 'warning',
                ]);
            } else {
                if ($icon->move('category_icon', $icon_name)) {
                    $category_data = new CategoryModel;
                    $category_data->category_name = $category;
                    $category_data->category_icon = $icon_name;
                    $save = $category_data->save();
                    if ($save) {
                        return response()->json([
                            'status' => true,
                            'title' => 'Category Saved',
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
                        'title' => 'Category Icon Not Saved',
                        'icon' => 'error',
                    ]);
                }

            }
        } else {
            return response()->json([
                'status' => false,
                'title' => 'Icon Must be JPG, PNG, Webp',
                'icon' => 'error',
            ]);
        }

    }
    // THIS IS A viewCategory FUNCTION
    public function viewCategory()
    {
        $category_data = CategoryModel::orderBy('id','DESC')->paginate(10);
        return view('admin.dashboard.view-category', ['category_data' => $category_data]);
    }

    // this is status function
    public function status(Request $request)
    {
     $status = $request->status_type;
     $category_id = $request->category_id;
    
    //  $this_status = CategoryModel::find($category_id)->get();
    //  $main_status = $this_status[0]['status'];
    if($status==0){
       $update_status = CategoryModel::find($category_id);
       $update_status->status=0;
       $update_status->save();
       return response()->json([
          'status'=>true,
          'title'=>'Category Deactivated',
          'icon'=>'success'
       ]);

    }else{
      $update_status = CategoryModel::find($category_id);
       $update_status->status=1;
       $update_status->save();
       return response()->json([
        'status'=>true,
        'title'=>'Category Activated',
        'icon'=>'success'
     ]);
    }


    }

    // THIS IS A categoryUpdatePage FUNCTION 

    public function categoryUpdatePage($id){
      
        $update_category_data = CategoryModel::find($id);
        return view('admin.dashboard.edit-category',['category_data'=>$update_category_data]);

     }

     // THIS IS A updateCategory FUNCTION 

    public function updateCategory(Request $request){
        $category = $request->category;
        $category_id = $request->category_id;
      if($request->file!=""){
        $icon = $request->file;
        $ex = $icon->getClientOriginalExtension();
        $icon_name = rand('10000', '99999') . '.' . $ex;
        if ($ex == 'jpg' || $ex == 'png' || $ex == 'jpeg' || $ex == 'webp') {
            if ($icon->move('category_icon', $icon_name)) {
                $category_data = CategoryModel::find($category_id);
                $category_data->category_name = $category;
                $category_data->category_icon = $icon_name;
                $save = $category_data->save();
                if ($save) {
                    return response()->json([
                        'status' => true,
                        'title' => 'Category Update',
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
                    'title' => 'Category Icon Not Saved',
                    'icon' => 'error',
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'title' => 'Icon Must be JPG, PNG, Webp',
                'icon' => 'error',
            ]);
        }
      }else{
            $category_data = CategoryModel::find($category_id);
            $category_data->category_name = $category;
           $success =  $category_data->save();
           if($success){
            return response()->json([
                'status' => true,
                'title' => 'Category Updated',
                'icon' => 'success',
            ]);
           }else{
            return response()->json([
                'status' => false,
                'title' => 'Technical Issue..!',
                'icon' => 'error',
            ]);
           }
    
        }
        

      }
        

    // THIS IS A categoryDelete FUNCTION
    public function categoryDelete(Request $request){
         $id = $request->category_id;
         if($id==1){
              return response()->json([
                'status'=>false,
                'title'=> 'This is Default Category ',
                'icon'=>'warning'
              ]);
         }else{
    $listing = DB::table('category')->
             join('listing','listing.cat_id','=','category.id')
            ->where('listing.cat_id',$id)->count();

            if($listing>0){
                $all_listing = DB::table('category')->
                join('listing','listing.cat_id','=','category.id')
               ->where('listing.cat_id',$id)->get();

               foreach ($all_listing as $key => $value) {
                $list[] = $value->listing_id;
                $listing_update = ListingModel::find($value->listing_id);
                $listing_update->cat_id = 1;
                $listing_update->save();
             }


             $delete = CategoryModel::find($id)->delete();
             return response()->json([
             'status'=>true,
             'title'=>'Deleted',
             'icon' => 'success',
             'id'=>$id
             ]);
 
            }else{
            $delete = CategoryModel::find($id)->delete();
            return response()->json([
            'status'=>true,
            'title'=>'Deleted',
            'icon' => 'success',
            'id'=>$id
            ]);
            }


            
         }

        
         
         

    } 








    // THIS IS A END CLASS

}