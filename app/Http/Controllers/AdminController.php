<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategories;
use App\Region;
use DB;
use Admin;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Images;
use App\FavouriteAds;
use App\Category;
use App\UserAds;
use App\Surbub;
use App\Locations;
use App\Township;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
        //$this->middleware('auth:api');
    }

    public function displayAllAds(){

    	$ads = DB::table('kasiads')->Paginate(15);
    	return view('Admin/admin',['ads'=>$ads]);

    }

    public function SearchAds(Request $request){

     	$searchItem = Input::get('searchItem');
     	
     	$ads = userAds::where('title', 'like','%'.$searchItem.'%')
    			->orWhere('catagory', 'like','%'.$searchItem.'%')
    			->orWhere('main_catagory', 'like','%'.$searchItem.'%')
    			->orWhere('price', 'like','%'.$searchItem.'%')
    			->orWhere('location', 'like','%'.$searchItem.'%')
    			->orWhere('province', 'like','%'.$searchItem.'%')
    			->orWhere('featured', 'like','%'.$searchItem.'%')
    			->orWhere('approved', 'like', '%'.$searchItem.'%')->Paginate(11);
    			//->toSql();
    			//dd($ads);
    			
    	return view('Admin/adminSearchAds',['ads'=>$ads]);

    }
    public function SearchAdsByUserId($searchItem){

        $ads = userAds::where('title', 'like','%'.$searchItem.'%')
                ->orWhere('user_id', 'like','%'.$searchItem.'%')
                ->orWhere('catagory', 'like','%'.$searchItem.'%')
                ->orWhere('main_catagory', 'like','%'.$searchItem.'%')
                ->orWhere('price', 'like','%'.$searchItem.'%')
                ->orWhere('location', 'like','%'.$searchItem.'%')
                ->orWhere('province', 'like','%'.$searchItem.'%')
                ->orWhere('featured', 'like','%'.$searchItem.'%')
                ->orWhere('approved', 'like', '%'.$searchItem.'%')->Paginate(11);
                //->toSql();
                //dd($ads);
                
        return view('Admin/adminSearchAds',['ads'=>$ads]);

    }

    public function ApproveAd($id){

    	//$approve = DB::update('update kasiads set approved = 1 where adid = ?', [$ad]);

        DB::table('kasiads')
                ->where('adid',$id)
                ->update(['approved'=>"Approved" ]);
    }

    public function UpdateAd(){
    	$id = Input::get('ad-id');       
    	$title = Input::get('title');
    	$category = Input::get('category');
    	$price = Input::get('price');
    	$province = Input::get('province');
    	$promotionPlan = Input::get('promotion-plan');
    	$status = Input::get('status');
    	$mainCategory = Input::get('main-category');
    	
    	DB::table('kasiads')
                ->where('adid',$id)
                ->update(['title'=>$title
	                ,'catagory'=>$category
	                ,'main_catagory'=>$mainCategory
	                ,'price'=>$price
	                ,'province'=>$province
	                ,'featured'=>$promotionPlan
	                ,'approved'=>$status
	            ]);
	    return back()->withInput();
    }

    public function populateModalBox($adId,$password){
        if($password ==="KsclrAdminMyAdmin"){   
        	$ads = DB::table('kasiads')
            ->where('adid', $adId)->get();
        
            return json_encode($ads);
        }
        else{
             return "Incorect password!!";
        }
    }

    public function populateCategorySelectBox(){
        $categories = DB::table('categories')->get();
        return json_encode($categories);
    }


    public function getManageAdsPassword($password){
        $admin = DB::table('users')
       ->where('id',"=", Auth::user()->id)
       ->get();

       $manage_ads_password = "";
       foreach ($admin as $myAdmin) {
            $manage_ads_password = $myAdmin->manage_ads_password; 
       }

       return $manage_ads_password;
    }

    public function deleteAd($adid,$password){     

       $manage_ads_password = $this->getManageAdsPassword($password);
       
        if($manage_ads_password === md5($password)){
            $ad = UserAds::where('adid',$adid);
            $FavAd = FavouriteAds::where('ad_id',$adid); 

            if($ad->delete()){
                 $FavAd->delete();
                 $images = Images::where('adid',$adid)->get();
                foreach($images as $image){
                    @unlink("images/user_images/".$image['name1']);
                }

                $deletedImages = Images::where('adid',$adid)->delete();
                if($deletedImages){
                    return "deleted!!";
                }
            }
            
        }
        else{
                return "Incorect password!!";
        } 
    }

    public function viewAllUsers(){
        $users = DB::table('users')->Paginate(15);

        return view('Admin/users', ['users' => $users]);
    }


    public function searchUsers(){

        $searchItem = Input::get('searchItem');

        
        $user = DB::table('users')
        ->where('id', 'like','%'.$searchItem.'%')
                ->orWhere('email', 'like','%'.$searchItem.'%')
                ->orWhere('name', 'like','%'.$searchItem.'%')
                ->orWhere('phonenumber', 'like','%'.$searchItem.'%')
                ->Paginate(11);            
                //->toSql();
                //dd($ads);
                
        return view('Admin/users',['user'=>$user]);


    }

    public function viewAllCategories(){
        $categories = DB::table('categories')->Paginate(15);
         
        return view('Admin/AdminViewAllCategories', ['categories'=>$categories]);
       
    }

    public function Addcategory(Request $request){
        $this->validate($request, [
                'categoryImage' => 'image',
                'categoryImage' => 'required',
        ]);
        
        if ($request->hasFile("categoryImage")){
            $category_name = Input::get("category-name");
            $imageName = $request->file("categoryImage")->getClientOriginalName();


            if ( move_uploaded_file( $_FILES["categoryImage"]["tmp_name"], "images/category/".
                                                                                            $imageName) ) {
                echo "Your file was successfully uploaded.";
            }

            $category = new Category();
            $imageName = $imageName;
            $category->category =  $category_name;
            $category->category_image =  $imageName; 
            $category->save();
        }  
    }

    public function deleteCategory($cat_id, $password){
        $manage_ads_password = $this->getManageAdsPassword($password);
        if(md5($password) === $manage_ads_password ){
            $deleted = DB::delete('delete from categories where cat_id =?', [$cat_id]);
             $deleted = DB::delete('delete from subcategory where category_id =?', [$cat_id]);

            return "Deleted!!";
        }
        else{
             return "Incorrect password!!";
        }
             
    }

    public function populateCategoryModalBox($cat_id,$password){
        $manage_ads_password = $this->getManageAdsPassword($password);
        if(md5($password) === $manage_ads_password ){

            $categories = DB::table('categories')
            ->where('cat_id', $cat_id)->get();        
            return json_encode($categories);

        }else{
            return "Incorrect password!!";
        }
    }

    public function updateCategory(Request $request){
        $cat_id = Input::get('cat-id');
        $cat_name = Input::get('category-name');
        $imageName = Input::get('category-image');


        if ($request->hasFile("new-image")){
            
            $this->validate($request, [
                'new-image' => 'image',
            ]);

            $imageName = $request->file("new-image")->getClientOriginalName();


            if ( move_uploaded_file( $_FILES["new-image"]["tmp_name"], "images/category/".
                                                                                            $imageName) ) {
                echo "Your file was successfully uploaded.";
            }
        }

        $updateCategory =  DB::table('categories')
                ->where('cat_id',$cat_id)
                ->update(['category'=>$cat_name
                    ,'category_image'=>$imageName,
                               
                ]);

        return back()->withInput();
    }

    public function viewAllSubCategories(){

        
       //dd($categories);
        $subCategories = DB::table('subcategory')->Paginate();
        return view('Admin/AdminViewSubCategories', ["subCategories"=>$subCategories]);

    }

    public function addSubcategory(){

            //establish a relationship between a category and sub-category
            $category_id = Input::get('category_id');
            $category_name = Input::get('category-name');

           // dd($category_id."-".$category_name);

            $subcategory = new SubCategories();
            $subcategory->category_id = $category_id;
            $subcategory->subcategory_name = $category_name;

            $subcategory->save();

            return back()->withInput();
    }

    public function deleteSubCategory($sub_cat_id,$password){
        $manage_ads_password = $this->getManageAdsPassword($password);
        if(md5($password) === $manage_ads_password ){
            $deleteSubCategory = DB::delete('delete from subcategory where id =?', [$sub_cat_id]);   
            return "Deleted!!";
        }else{
            return "Incorrect Password!!";
        }
       
    }

    public function getSubCategoryById($id,$password){

        $manage_ads_password = $this->getManageAdsPassword($password);

        if(md5($password) === $manage_ads_password){
             $subCateogry = DB::table('subcategory')
             ->where('id', '=', $id)->get();

            return json_encode($subCateogry);
        }
        else{
            return "Incorrect password!!";
        }
        
       
    }

    public function updateSubCategory(){
        $category_id = Input::get('new-sub-category_id');
        $subCategory_id = Input::get('sub-category-id');

        $subCategory_name = Input::get('new-sub-category-name');
       
        DB::table('subcategory')
                ->where('id',$subCategory_id)
                ->update(['subcategory_name'=>$subCategory_name
                    ,'category_id'=>$category_id                
                ]);

        return back()->withInput();
        
    }

    public function viewTownships(){
        $locations = DB::table('locations')->Paginate(15);
        return view('Admin/locations', ['locations'=>$locations]);
    }

    public function viewSuburbs(){
        $locations = DB::table('surbubs')->Paginate(15);
        return view('Admin/locations', ['locations'=>$locations]);
    }

    //populate selectbox that's on the modal-box with provinces
    public function populateProvincesModalBox(){

        $provinces = DB::table('provinces')->get();  
        return json_encode($provinces);
    }

    public function populateRegionsSelectBox(){
        $regions = DB::table('surbub_regions')->get();
        return json_encode($regions);
    }



    public function addTownship(){
        $province_name = Input::get('provinces-select-box');
        $township_name  = Input::get('township-name');

        //dd($province."--".$township);

        //should be singular.....it's a mistake 
        //I made at the very beggining of the project
        $township = new Locations();
        $township->location =   $township_name;
        $township->province = $province_name;
        $township->save();

        return back()->withInput();

    }

    public function addSuburb(){
        $province_name = Input::get('provinces-select-box');
        $suburb_name  = Input::get('province-name');
        $region = Input::get('regions-select-box');

        $suburb = new Surbub();
        $suburb->surbub =  $suburb_name;
        $suburb->region = $region;
        $suburb->province = $province_name;
        $suburb->save();

        return back()->withInput();
    }



    public function getTownshipById($id){

        $township = DB::table('locations')
        ->where('id', '=', $id)->get();

        return json_encode($township);

    }

    public function updateTownship(){
        $township_id = Input::get('township-id');
        $province_name = Input::get('provinces-select-box');
        $township  = Input::get('township-name');

        //dd( $township_id."--".$province_name."--".$township);

        DB::table('locations')
                ->where('id',$township_id)
                ->update(['province'=>$province_name
                    ,'township'=>$township                                      
        ]);

        return back()->withInput();
    }

    public function getSuburbById($id){

        $township = DB::table('surbubs')
        ->where('id', '=', $id)->get();

        return json_encode($township);

    }

    public function updateSuburb(){
        $suburb_id = Input::get('suburb-id');
        $province_name = Input::get('provinces-select-box');
        $suburb_name  = Input::get('suburb-name');

        

        DB::table('surbubs')
                ->where('id',$suburb_id)
                ->update(['province'=>$province_name
                    ,'surbub'=>$suburb_name                                      
        ]);       
    }

    public function deleteTownship($townshipId){
        $deleted = DB::delete('delete from locations where id =?', [$townshipId]);
    }

    public function deleteSuburb($suburbId){
        $deleted = DB::delete('delete from surbubs where id =?', [$suburbId]);
    }
}
