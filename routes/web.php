<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;


Auth::routes();


Route::get('/test', function(){
    $user = request()->user();
    // dd($user->hasRole('developer')); //will return true, if user has role
    // dd($user->givePermissionsTo('create-tasks'));// will return permission, if not null
    // dd($user->can('create-tasks'));
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::resource('cal', 'gCalendarController');
Route::get('oauth', 'gCalendarController@oauth');
Route::get('calendarlogout', 'gCalendarController@calendarlogout');
// Auth
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function () {

Route::group(['as' => 'calls.', 'prefix' => 'calls'], function () {

     Route::get('/tracking/report', [
        'uses' => 'Calls\CallTrackingController@report',
        'as' => 'report',
        ]);
        Route::get('/choose/number', [
         'uses' => 'Calls\CallTrackingController@choosenumber',
         'as' => 'choosenumber',
         ]);
     Route::get('/tracking/report/pagination', [
        'uses' => 'Calls\CallTrackingController@report',
        'as' => 'pagination',
        ]);

     Route::post('/tracking/report/notes', [
        'uses' => 'Calls\CallTrackingController@notes',
        'as' => 'notes',
        ]);
     Route::get('/tracking/report/viewNotes', [
        'uses' => 'Calls\CallTrackingController@viewNotes',
        'as' => 'viewNotes',
        ]);
     
     Route::post('/block/bycampaign', [
        'uses' => 'Calls\CallTrackingController@blockByCampaign',
        'as' => 'blockByCampaign',
        ]);
     Route::post('/block/blockbysystem', [
        'uses' => 'Calls\CallTrackingController@blockBySystem',
        'as' => 'blockBySystem',
        ]);
});

Route::group(['as' => 'setting.', 'prefix' => 'setting'], function () {

     Route::get('/', [
        'uses' => 'Setting\SettingController@index',
        'as' => 'index',
        ]);
      Route::post('/store', [
        'uses' => 'Setting\SettingController@storeSiteSetting',
        'as' => 'store',
        ]);
      Route::get('/email', [
         'uses' => 'Setting\SettingController@mailSetting',
         'as' => 'email',
         ]);
      Route::post('/email/store', [
            'uses' => 'Setting\SettingController@storemailSetting',
            'as' => 'storeemail',
            ]);
      Route::get('/twilio', [
        'uses' => 'Setting\SettingController@twilioSetting',
        'as' => 'twilio',
        ]);
      Route::post('/twilio/store', [
        'uses' => 'Setting\SettingController@storeTwilioSetting',
        'as' => 'storetwilio',
        ]);
       Route::get('/twilio/phoneNumbers', [
        'uses' => 'Setting\SettingController@twilioNumbers',
        'as' => 'twilioNumbers',
        ]);
        Route::post('/friendlyname/update', [
         'uses' => 'Setting\SettingController@updatefriendlyname',
         'as' => 'updatefriendlyname',
         ]);
         Route::post('/newnumber/add', [
            'uses' => 'Setting\SettingController@addnewnumber',
            'as' => 'addnewnumber',
            ]);
      
});

Route::group(['as' => 'profile.', 'prefix' => 'profile'], function () {

  Route::get('/', [
     'uses' => 'Profile\ProfileController@myprofile',
     'as' => 'myprofile',
     ]);
     Route::get('/edit', [
      'uses' => 'Profile\ProfileController@editprofile',
      'as' => 'editprofile',
      ]);
      Route::post('/store', [
         'uses' => 'Profile\ProfileController@storeprofileinfo',
         'as' => 'store',
         ]);
});

Route::post(
    '/token',
    ['uses' => 'Calls\TokenController@newToken', 'as' => 'new-token']
);
Route::get(
    '/new-call',
    ['uses' => 'Calls\CallController@generateNewCall', 'as' => 'newCall']
);
Route::get(
    '/phonedialer',
    ['uses' => 'Dialer\DialerController@index', 'as' => 'dialer']
);


});

Route::post(
    '/support/call',
    ['uses' => 'Calls\CallController@newCall', 'as' => 'new-call']
);
Route::post(
   '/logs',
   ['uses' => 'Calls\CallTrackingController@calllogs', 'as' => 'logs']
);
Route::post(
    '/incomming',
    ['uses' => 'Calls\CallController@incomming', 'as' => 'incomming']
);
Route::get(
   '/mail',
   ['uses' => 'Mail\MailController@mail', 'as' => 'mail']
);


//fv routes
Route::group(['middleware' => 'auth'], function () {
    Route::group(['as' => 'forwarding.', 'prefix' => 'forwarding'], function () {

        Route::get('/', [
            'uses' => 'Forwarding\ForwardingController@index',
            'as' => 'index',
        ]);
        Route::post('/number-status', [
            'uses' => 'Forwarding\ForwardingController@updateNumberStatus',
            'as' => 'number-status',
        ]);
        Route::post('/get-call-chart', [
            'uses' => 'Forwarding\ForwardingController@getCallChart',
            'as' => 'get-call-chart',
        ]); 
        Route::post('/call-log-export', [
            'uses' => 'Forwarding\ForwardingController@logExport',
            'as' => 'call-log-export',
        ]); 
        Route::get('/get_all', [
            'uses' => 'Forwarding\ForwardingController@get_all',
            'as' => 'get_all',
        ]);
        Route::get('/get_all_calllogs', [
            'uses' => 'Forwarding\ForwardingController@get_all_calllogs',
            'as' => 'get_all_calllogs',
        ]);

        Route::get('/edit/{id}', [
            'uses' => 'Forwarding\ForwardingController@edit',
            'as' => 'edit',
        ]);
        Route::post('/edit/{id}', [
            'uses' => 'Forwarding\ForwardingController@update',
            'as' => 'edit',
        ]);
        Route::post('/get-number', [
            'uses' => 'Forwarding\ForwardingController@getTwilioNumbers',
            'as' => 'get-number',
        ]); 
        Route::post('/purchase-number', [
            'uses' => 'Forwarding\ForwardingController@purchaseNumbers',
            'as' => 'purchase-number',
        ]); 
          
    });
});
Route::group(['as' => 'forwarding.', 'prefix' => 'forwarding'], function () {
    Route::post('/call-status',[
        'uses' => 'Forwarding\ForwardingController@callStatus', 
        'as' => 'call-status'
    ]);
    Route::post('/incomming',[
        'uses' => 'Forwarding\ForwardingController@incomming', 
        'as' => 'incomming'
    ]);

    Route::post('/recording',[
        'uses' => 'Forwarding\ForwardingController@recording', 
        'as' => 'recording'
    ]);
    Route::post('/forward-status',[
        'uses' => 'Forwarding\ForwardingController@forwardStatus', 
        'as' => 'forward-status'
    ]);
    Route::post('/forward-call',[
        'uses' => 'Forwarding\ForwardingController@forwardCall', 
        'as' => 'forward-call'
    ]);
    
});

Route::get('/signup', [PlanController::class, 'signup']);
Route::post('/signup', [PlanController::class, 'register'])->name('plan.signup');

Route::group(['as' => 'plan.', 'prefix' => 'plan'], function () {
    Route::get('/', [PlanController::class, 'index']);
    Route::get('/create', [PlanController::class, 'create'])->name('create');
    Route::get('/show/{plan}', [PlanController::class, 'show'])->name('show');
    Route::post('/store', [PlanController::class, 'store'])->name('store');
    Route::get('/get-all', [PlanController::class, 'getAll'])->name('get-all');
});

Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/show', [UserController::class, 'show'])->name('show');
});




