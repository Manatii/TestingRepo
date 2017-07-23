	<?php

	/*
	|--------------------------------------------------------------------------
	| Web Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register web routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "web" middleware group. Now create something great!
	|
	*/

	Route::group(['middleware' => ['web']], function (){
	 
	  
	});

	Route::any('/ads', [
		'uses' => 'AdsController@displayAds',
	]);

	Route::any('/', [
		'uses' => 'HomePageController@displaycatagories',
	]);

	Route::get('/ads/loc-search-item/{token?}/{location?}/{searchitem?}', [
		'uses' => 'AdsController@displayAdsByLocAndItem',
	]);

	//get locations by province
	Route::any('/locations/{province}', [
		'uses' => 'AdsController@getLocations',
	]);

	Route::any('/sponsored-ads', [
		'uses' => 'AdsController@getSponsoredAds',
	]);

	//get subcategory by id
	Route::any('/sub-categories/{subcatid}', [
		'uses' => 'AdsController@getSubCategoriesById',
	]);

	Route::get('/main-categories', [
		'uses' => 'AdsController@getMainCategories',
	]);

	Route::get('/ads/search-item-cat-province', array('as'=>'search-item-cat-province','uses'=>'AdsController@displayAdsByItemCatProv'));

	Route::get('/search-item-loc-cat-prov/{item}/{location}/{catagory}/{province}', [
		'uses' => 'AdsController@displayAdsByItemCatLocProv',
	]);

	Route::get('/search-item-loc-main-cat-prov/{item}/{location}/{catagory}/{province}', [
		'uses' => 'AdsController@displayAdsByItemMainCatLocProv',
	]);

	Route::get('/province/{province}', ['uses'=>'AdsController@displayAdsByProvince',
	]);



	Route::any('/ads/catagory/{catagory?}/{province?}', [
		'province' => null,
		'uses' => 'AdsController@displayAdsByCat',

		
	]);

	Route::get('/ads/main-category/{maincategory?}', [
		'uses' => 'AdsController@displayAdsByMainCategory',
	]);
	Route::get('/ads/location/{location?}', [
		'uses' => 'AdsController@displayAdsByLoc',
	]);

	Route::any('/ads/', [
		'uses' => 'AdsController@displayAds',
	]);

	Route::get('/ad-details/{adid?}', [
		'uses' =>'adsDetailsController@displayAdsDetails',
	]);

	Route::get('back-to-results', 'adsDetailsController@backToResults');

	Route::get('/postfreead',array('as'=>'postfreead','uses'=>'postAdsConroller@newAd'));


	Route::get('/autocomplete',array('as'=>'autoComplete','uses'=>'postAdsConroller@autoComplete'));

	Route::get('/autoCompleteTownship',array('as'=>'autoCompleteTownship','uses'=>'postAdsConroller@autoCompleteTownship'));

	Route::post('/postfreead', [
		'uses'	=>'postAdsConroller@postAd',
	]);

	Route::get('/posting-successful', function(){
		return view('posting-successful');
	});
	Route::get('/adsdetails3', function(){
		return view('adsdetails3');
	});

	Route::post('/createuser',array('as'=>'createuser','uses'=>'auth\RegisterController@create')

	);

	Route::get('/signup',function(){


	  return view('auth\signup');

	});



	Route::get('/posting-success', function(){
		return view('posting-success');
	});

	Route::get('sub-category-sub-location', function(){
		return view('sub-category-sub-location');
	});

	Route::get('faq', function(){
		return view('faq');
	});

	Route::get('contact', function(){
		return view('contact');
	});



	Route::get('terms-and-conditions', function(){
		return view('terms-and-conditions');
	});

	Route::get('about', function(){
		return view('about');
	});

	Route::get('logout', 'Auth\SocialAuthController@getLogout');

	Auth::routes();

	Route::get('/home', 'HomeController@index');



	Auth::routes();

	Route::get('/redirect', 'Auth\SocialAuthController@redirect');

	Route::get('/callback', 'Auth\SocialAuthController@callback');

	Route::group(['middleware' =>[ 'web']], function () {
	    Route::get('/redirect', 'Auth\SocialAuthController@redirect');

	Route::get('/callback', 'Auth\SocialAuthController@callback');
	});


	Route::get('/account','AccountController@displayAccount');

	Route::post('sendmail', 'SendEmailController@sendEmail');
	Route::get('get-suburbs-by-prov/{prov}', 'AdsController@getSuburbsByProvince');

	
	
	Route::get('ksclr-admin', 'AdminController@displayAllAds');
	Route::get('admin-search-ad/{value?}','AdminController@SearchAds');
	Route::get('admin-search-user-ads/{value?}','AdminController@SearchAdsByUserId');
	Route::get('admin-approve-ad/{adid}', 'AdminController@ApproveAd');
	Route::get('admin-populateModalBox/{adid}/{password}', 'AdminController@populateModalBox');
	Route::get('admin-update-ad', 'AdminController@UpdateAd');
	Route::get('admin-delete-ad/{adid}/{password}', 'AdminController@DeleteAd');
	Route::get('users', 'AdminController@viewAllUsers');
	Route::get('search-users', 'AdminController@searchUsers');
	Route::get('view-categories', 'AdminController@viewAllCategories');
	//used by jQuery on homepage
	Route::get('get-all-categories','HomePageController@getAllCategories');
	Route::get('subcategories/', 'HomePageController@getSubCategoriesById');
	Route::get('jquery-ads-per-category/{category}', 'HomePageController@jQueryAdsPerCategory');

	Route::post('add-category', 'AdminController@AddCategory');
	Route::get('delete-category/{cat_id}/{password}','AdminController@deleteCategory');
	Route::get('populateCategoryModalBox/{catId}/{password}','AdminController@populateCategoryModalBox');
	Route::post('update-category', "AdminController@updateCategory");
	Route::get('view-all-sub-categories', "AdminController@viewAllSubCategories");
	Route::get('add-sub-category', "AdminController@addSubcategory");
	Route::get('delete-sub-category/{id}/{password}', "AdminController@deleteSubCategory");
	Route::get('populate-category-selectbox', "AdminController@populateCategorySelectBox");
	Route::post('update-sub-category', 'AdminController@updateSubCategory');
	Route::get('get-sub-category-by-id/{id}/{password}', 'AdminController@getSubCategoryById');
	Route::get('townships', 'AdminController@viewTownships');
	Route::get('suburbs', 'AdminController@viewSuburbs');
	Route::get('get-all-provinces', 'AdminController@populateProvincesModalBox');
	Route::get('get-all-regions', 'AdminController@populateRegionsSelectBox');
	Route::post('add-township', 'AdminController@addTownship');
	Route::post('add-suburb', 'AdminController@addSuburb');
	Route::get('get-township-by-id/{id}', 'AdminController@getTownshipById');
	Route::post('update-township', 'AdminController@updateTownship');
	Route::get('get-suburb-by-id/{id}', 'AdminController@getSuburbById');
	Route::post('update-surbub', 'AdminController@updateSuburb');
	Route::get('delete-township/{id}', 'AdminController@deleteTownship');
	Route::get('delete-suburb/{id}',"AdminController@deleteSuburb");

	Route::get('/savead/{adid}', 'AccountController@saveAd');
	Route::get('/account-myads', 'AccountController@displayUserAds');
	Route::get('/deletead/{adid}','AccountController@deleteAd');
	Route::get('/account-favourite-ads','AccountController@displayFavouriteAds');
	Route::get('/edit-ad/{adid}','AccountController@editAd');
	Route::post('/edit-ad/{adid}','AccountController@updateAd');
	Route::post('delete-image/{id}','AccountController@deleteImage');
	Route::get('/deleteFavAd/{adid}','AccountController@deleteFavAd');
	Route::get('/delete-unapproved-ad/{adid}','AccountController@deleteUnApprovedAd');
	Route::get('/update-user-details/{name}/{surname}/{phonenumber}','AccountController@updateUserDetails');



	Route::get('/account-pending-approval-ads', 'AccountController@displayPendingAds');












		
	   

