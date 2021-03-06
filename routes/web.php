<?php

/*use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;*/

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

/*Event::listen('Illuminate\Database\Events\QueryExecuted',function($query){
    //var_dump($sql);
    var_dump($query->sql);
});*/

Route::get('/','HomeController@index');

Auth::routes();

Route::get('test-route',function (){
    //return Auth::User()->routeNotificationForKarix();
    return Cache::get('OTP_for_'.Auth::User()->id);

    //return $users = User::where('id','<',3)->count();
    //return User::all('id','name');
    //$users = User::whereNotBetween('id',[3,2127])->get(['id','name']);
    //return $users;

    //Cache::forget(auth()->user()->OTPKey());
    //return 'ok';
});

Route::get('verify-email','VerifyController@sendVerificationEmail');
Route::post('verify-email','VerifyController@verifyEmail')->name('verifyEmail');

Route::get('verify-mobile','VerifyController@sendVerificationSMS');
Route::post('verify-mobile','VerifyController@verifyMobile')->name('verifyMobile');

Route::group(['middleware'=>'VerifyEmail'],function (){
    // Forcing User to verify their email by restricting access to certain routes
});

Route::get('message-users','MessageController@create');
Route::post('message-users/{msg}','MessageController@sendMessage');

Route::get('/admin','AdminController@index')->name('admin');

Route::post('like-indian','UserController@likeIndian');
Route::post('unlike-indian','UserController@unlikeIndian');

Route::post('vote-problem','ProblemController@voteProblem');
Route::post('vote-party','PartyController@voteParty');


Route::get('states/ajax/{id}','StateController@stateAjax');
Route::get('constituencies/states/ajax/{id}','StateController@stateAjax');
Route::get('states/states/ajax/{id}','StateController@stateAjax');
Route::get('constituency/states/ajax/{id}','StateController@stateAjax');
Route::get('blurbs/states/ajax/{id}','StateController@stateAjax');
Route::get('blurbs/constituencies/states/ajax/{id}','StateController@stateAjax');
Route::get('constituencies/contestants/states/ajax/{id}','StateController@stateAjax');


Route::get('blurbs/constituencies/{id}','BlurbController@blurbConstituencies');
Route::post('blurbs/attach-constituency/{blurb}','BlurbController@attachConstituency');

Route::get('loginToVoteProblem','ProblemController@makeReady');
Route::post('problems/ajax-vote/{id}','ProblemController@ajaxVote');
Route::post('problems/vote/{id}','ProblemController@vote');
Route::post('problems/{problem}/upload-image','ProblemController@uploadImage');

Route::post('blurbs/upload-image','BlurbController@uploadImage');


Route::get('constituencies/your-constituency','ConstituencyController@yourConstituency');
Route::post('constituency/track','ConstituencyController@track');
Route::get('constituencies/{id}/contestants','ConstituencyController@contestants');
Route::get('constituencies/contestants/{id}','ConstituencyController@contestants');

Route::get('mygroup','GroupController@mygroup');
Route::get('group/elect-president','GroupController@electPresident');

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/cancel', 'HomeController@cancel')->name('cancel');
Route::get('/faq','HomeController@faq');
//Route::get('/new-login','HomeController@newlogin');
Route::get('privacy-policy','HomeController@privacyPolicy');
Route::get('loginToContinue','HomeController@loginToContinue');

Route::get('image-crop', 'ImageController@imageCrop');
Route::post('image-crop', 'ImageController@imageCropPost');

Route::get('users-poll/{id}','OptionController@usersPoll');
Route::post('options/vote/{id}','OptionController@voteUp');

Route::get('loginToVoteParty','PartyController@makeReady');
Route::post('parties/vote/{id}','PartyController@vote');
Route::post('parties/ajax-vote/{id}','PartyController@ajaxVote');
Route::post('parties/{party}/upload-image','PartyController@uploadImage');


Route::get('offices/{office}/create-post','OfficeController@createPost');
Route::get('offices/{office}/remove-post','OfficeController@removePost');

Route::get('offices/{office}/apply-for','OfficeController@applyFor');

Route::get('applications','ConstituencyController@applications');









Route::post('assign-role','RoleController@assignRole');
Route::post('de-assign-role','RoleController@deAssignRole');

Route::get('rups-paginate','RupController@indexPaginate');


Route::get('states/your-state','StateController@yourState');
Route::get('states/{id}/voting','StateController@users');
Route::get('states/{id}/constituencies','StateController@stateWithConstituencies');
Route::get('states/{state}/list-parties','StateController@listParties');
Route::post('states/{state}/attach-parties','StateController@attachParties');
Route::get('states/{state}/list-languages','StateController@listLanguages');
Route::post('states/{state}/attach-languages','StateController@attachLanguages');
Route::get('capitals','StateController@capitals');
Route::get('literacy','StateController@literacy');
Route::get('populations','StateController@populations');
Route::get('chief-ministers','StateController@cm');
Route::get('governor','StateController@governor');
Route::get('ruling-party','StateController@rulingParty');
Route::get('gdp','StateController@gdp');
Route::get('seats','StateController@seats');
Route::get('languages-spoken','StateController@languages');

Route::post('users/iknow/{id}','UserController@makeKnow');
Route::post('users/revokeknow/{id}','UserController@revokeKnow');
Route::get('uuid/{uid}','UserController@getUserByUuid');
Route::post('users/{user}/upload-image','UserController@uploadImage');

Route::get('loginToVoteUser/{id}','UserController@makeReady');
Route::post('users/vote/{id}','UserController@vote');
Route::post('users/ajax-vote/{id}','UserController@ajaxVote');

Route::get('loginToLike/{id}','UserController@loginToLike');
Route::post('users/like','UserController@like');
Route::post('users/unlike','UserController@unlike');




Route::get('states/{id}/members','UserController@stateMembers');
Route::get('constituencies/{id}/members','UserController@constituencyMembers');
Route::get('members','UserController@countMembers');

Route::get('settings','UserController@settings');
Route::post('hide-profile/{user}','UserController@hideUser');

Route::get('users/admin-show/{id}','UserController@adminShow');

Route::post('professions/like','ProfessionController@like');



Route::get('opinions2','OpinionController@index2');
//Route::post('users/like-profession/{id}','UserController@likeProfession');



Route::get('test','UserController@test');


Route::get('constituencies/{constituency}/office-bearers','ConstituencyController@officeBearer');
Route::get('constituencies/apply-for-post','ConstituencyController@applyForPost');

Route::get('loksabha-election-2019','HomeController@loksabhaElection2019');
Route::get('loksabha-election','HomeController@loksabhaElection');
Route::get('letter-to-candidates','HomeController@letterToCandidates');
Route::get('greatest-indians','IndianController@index');
Route::get('constitution','HomeController@constitution');
Route::get('constitution-pdf','HomeController@constitutionPDF');




/*
|--------------------------------------------------------------------------
| Resource Routes
|--------------------------------------------------------------------------
|
| All the Resource Routing is done here
|
 */
Route::resource('adds','AddController');
Route::resource('ages','AgeController');
Route::resource('bearers','BearerController');
Route::resource('constituencies','ConstituencyController');
Route::resource('contents','ContentController');
Route::resource('ctypes','CtypeController');
Route::resource('educations','EducationController');
Route::resource('elections','ElectionController');
Route::resource('elinks','ElinkController');
Route::resource('faqs','FaqController');
Route::resource('genders','GenderController');
Route::resource('groups','GroupController');
Route::resource('images','ImageController');
Route::resource('indians','IndianController');
Route::resource('languages','LanguageController');
Route::resource('links','LinkController');
Route::resource('maritals','MaritalController');
Route::resource('messages','MessageController');
Route::resource('offices','OfficeController');
Route::resource('opinions','OpinionController');
Route::resource('options','OptionController');
Route::resource('parties','PartyController');
Route::resource('polls','PollController');
Route::resource('problems','ProblemController');
Route::resource('professions','ProfessionController');
Route::resource('ptypes','PtypeController');
Route::resource('religions','ReligionController');
Route::resource('roles','RoleController');
Route::resource('rups','RupController');
Route::resource('states','StateController');
Route::resource('stypes','StypeController');
Route::resource('tags','TagController');
Route::resource('users','UserController');
Route::resource('blurbs','BlurbController');


/*Route::get('slider-image-crop', 'ImageController@sliderImageCrop');
Route::post('slider-image-crop', 'ImageController@sliderImageCropPost');*/

/*Route::get('/delete',function (){

    //File::delete('storage/aitc2.jpg');
    Storage::delete('public/lawyer.jpg');

});*/


