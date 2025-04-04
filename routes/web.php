<?php

use App\Http\Controllers\BackEnd\User\UserController;
use App\Http\Controllers\SwapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Interface Routes
|--------------------------------------------------------------------------
*/

Route::get('/check-session', function () {
  return response()->json([
    'sessionValue' => session('loginType', null)
  ]);
  // dd(session('loginType', null));

})->name('check-session');


//swap- routes
Route::get('/public-r/check-vendor/{num}', 'SwapController@checkVendor')->name('public.check.vendor');
Route::get('/public-r/check-username/{username}', [SwapController::class, 'checkUsername'])->name('public.check.username');
Route::post('/public-r/submit/property', [SwapController::class, 'submitNewProperty'])->name('public.submit.property');
Route::post('/public-r/verify-otp', [SwapController::class, 'verifyOtp'])->name('public.verify.otp');












Route::post('/push-notification/store-endpoint', 'FrontEnd\PushNotificationController@store');

// cron job for sending expiry mail
Route::get('/subcheck', 'CronJobController@expired')->name('cron.expired');

Route::get('/change-language', 'FrontEnd\MiscellaneousController@changeLanguage')->name('change_language');

Route::post('/store-subscriber', 'FrontEnd\MiscellaneousController@storeSubscriber')->name('store_subscriber');

Route::get('/offline', 'FrontEnd\HomeController@offline')->middleware('change.lang');

Route::middleware('change.lang')->group(function () {
  Route::get('/', 'FrontEnd\HomeController@index')->name('index');
  Route::get('/second-index', 'FrontEnd\HomeController@secondIndex')->name('second.index');
  Route::get('/index4', 'FrontEnd\HomeController@secondIndex')->name('second.index.v4');
  // Route::get('/propertylisting', 'FrontEnd\HomeController@propertylisting')->name('propertylisting');
  Route::get('/property-listing/{type}', 'FrontEnd\HomeController@propertylisting')->name('property-listing');
  Route::get('/agent-detail/{agentid}', 'FrontEnd\HomeController@agentdetail')->name('agent-detail');
  Route::get('/property-management', 'FrontEnd\HomeController@propertymanagement')->name('property-management');
  Route::get('/service/{type}', 'FrontEnd\HomeController@service')->name('service');
  Route::get('/ourprocess/sell@1', 'FrontEnd\HomeController@ourprocess')->name('ourprocess');
  Route::get('/career', 'FrontEnd\HomeController@career')->name('career');
  Route::get('/post-property', 'FrontEnd\HomeController@postproperty')->name('postproperty');

  Route::post('/career', 'FrontEnd\HomeController@career_apply')->name('career_apply');
  Route::post('/contact_enquiry', 'FrontEnd\HomeController@contact_enquiry')->name('contact_enquiry');
  Route::post('/contact_us', 'FrontEnd\HomeController@contact_us')->name('contact_us');
  Route::get('/terms-conditions', 'FrontEnd\HomeController@termsconditions')->name('terms-conditions');
  Route::get('/privacy-policy', 'FrontEnd\HomeController@privacypolicy')->name('privacy-policy');
  Route::get('/faq', 'FrontEnd\HomeController@faq')->name('faq');
  Route::get('/public/post/property', 'FrontEnd\HomeController@postPropertyView')->name('public.post.property.view');

  Route::prefix('vendors')->group(function () {
    Route::get('/', 'FrontEnd\VendorController@index')->name('frontend.vendors');
    Route::post('contact/message', 'FrontEnd\VendorController@contact')->name('vendor.contact.message');
  });

  // Properties route  
  Route::get('/properties', 'FrontEnd\PropertyController@index')->name('frontend.properties');
  Route::get('/state-cities', 'FrontEnd\PropertyController@getStateCities')->name('frontend.get_state_cities');
  Route::get('/cities', 'FrontEnd\PropertyController@getCities')->name('frontend.get_cities');
  Route::get('/categories', 'FrontEnd\PropertyController@getCategories')->name('frontend.get_categories');
  Route::get('/property/{slug}', 'FrontEnd\PropertyController@details')->name('frontend.property.details');
  Route::get('/property-details/{id}', 'FrontEnd\PropertyController@propertydetails')->name('frontend.property.propertydetails');
  Route::get('/search/{name}', 'FrontEnd\PropertyController@search')->name('frontend.property.search');
  Route::post('/property-contact', 'FrontEnd\PropertyController@contact')->name('property_contact');
  Route::post('/contact-mail', 'FrontEnd\PropertyController@contactUser')->name('contact_user');
  // Properties route 
  Route::get('/projects', 'FrontEnd\ProjectController@index')->name('frontend.projects');
  Route::get('/project/{slug}', 'FrontEnd\ProjectController@details')->name('frontend.projects.details');
  // property wishlist 
  Route::get('addto/wishlist/{id}', 'FrontEnd\UserController@add_to_wishlist')->name('addto.wishlist');
  Route::get('remove/wishlist/{id}', 'FrontEnd\UserController@remove_wishlist')->name('remove.wishlist');

  Route::get('vendor/{username}', 'FrontEnd\VendorController@details')->name('frontend.vendor.details');
  Route::get('agent/{username}', 'FrontEnd\AgentController@details')->name('frontend.agent.details');

  Route::prefix('/blog')->group(function () {
    Route::get('', 'FrontEnd\BlogController@index')->name('blog');

    Route::get('/{slug}', 'FrontEnd\BlogController@show')->name('blog_details');
  });

  Route::get('/faq', 'FrontEnd\FaqController@faq')->name('faq');
  Route::get('/about-us', 'FrontEnd\HomeController@about')->name('about_us');
  Route::get('/pricing', 'FrontEnd\HomeController@pricing')->name('pricing');

  Route::prefix('/contact')->group(function () {
    Route::get('', 'FrontEnd\ContactController@contact')->name('contact');

    Route::post('/send-mail', 'FrontEnd\ContactController@sendMail')->name('contact.send_mail')->withoutMiddleware('change.lang');
  });
});

Route::post('/advertisement/{id}/count-view', 'FrontEnd\MiscellaneousController@countAdView');

Route::prefix('login')->middleware(['guest:web', 'change.lang'])->group(function () {
  // user login via facebook route
  Route::prefix('/user/facebook')->group(function () {
    Route::get('', 'FrontEnd\UserController@redirectToFacebook')->name('user.login.facebook');

    Route::get('/callback', 'FrontEnd\UserController@handleFacebookCallback');
  });

  // user login via google route
  Route::prefix('/google')->group(function () {
    Route::get('', 'FrontEnd\UserController@redirectToGoogle')->name('user.login.google');

    Route::get('/callback', 'FrontEnd\UserController@handleGoogleCallback');
  });
});
Route::post('/otp-send', [UserController::class, 'sendLoginOTP'])->name('otp.login.send');
Route::post('/otp-verify', [UserController::class, 'verifyLoginOTP'])->name('otp.login.verify');
Route::post('/send-otp', [UserController::class, 'sendOtp'])->name('otp.signup.send');
Route::post('/verify-otp', [UserController::class, 'verifyOtp'])->name('otp.signup.verify');
Route::get('login', 'FrontEnd\UserController@login')->name('login');
Route::get('forgot', 'FrontEnd\UserController@forgot')->name('forgot');
Route::get('signup', 'FrontEnd\UserController@signup')->name('signup');
Route::prefix('/user')->middleware(['guest:web', 'change.lang'])->group(function () {
  Route::prefix('/login')->group(function () {
    // user redirect to login page route
    Route::get('', 'FrontEnd\UserController@login')->name('user.login');
  });
  // user login submit route
  Route::post('/login-submit', 'FrontEnd\UserController@loginSubmit')->name('user.login_submit')->withoutMiddleware('change.lang');

  // user forget password route
  Route::get('/forget-password', 'FrontEnd\UserController@forgetPassword')->name('user.forget_password');

  // send mail to user for forget password route
  Route::post('/send-forget-password-mail', 'FrontEnd\UserController@forgetPasswordMail')->name('user.send_forget_password_mail')->withoutMiddleware('change.lang');

  // reset password route
  Route::get('/reset-password', 'FrontEnd\UserController@resetPassword');

  // user reset password submit route
  Route::post('/reset-password-submit', 'FrontEnd\UserController@resetPasswordSubmit')->name('user.reset_password_submit')->withoutMiddleware('change.lang');

  // user redirect to signup page route
  Route::get('/signup', 'FrontEnd\UserController@signup')->name('user.signup');

  // user signup submit route
  Route::post('/signup-submit', 'FrontEnd\UserController@signupSubmit')->name('user.signup_submit')->withoutMiddleware('change.lang');

  // signup verify route
  Route::get('/signup-verify/{token}', 'FrontEnd\UserController@signupVerify')->withoutMiddleware('change.lang');
});

Route::prefix('/user')->middleware(['auth:web', 'account.status', 'change.lang'])->group(function () {
  // user redirect to dashboard route
  Route::get('/dashboard', 'FrontEnd\UserController@redirectToDashboard')->name('user.dashboard');
  Route::get('/wishlist', 'FrontEnd\UserController@wishlist')->name('user.wishlist');


  // edit profile route
  Route::get('/edit-profile', 'FrontEnd\UserController@editProfile')->name('user.edit_profile');

  // update profile route
  Route::post('/update-profile', 'FrontEnd\UserController@updateProfile')->name('user.update_profile')->withoutMiddleware('change.lang');
  Route::post('/updateprofile', 'FrontEnd\UserController@updateProfile')->name('user.updateprofile');

  // change password route
  Route::get('/change-password', 'FrontEnd\UserController@changePassword')->name('user.change_password');


  // update password route
  Route::post('/update-password', 'FrontEnd\UserController@updatePassword')->name('user.update_password')->withoutMiddleware('change.lang');

  Route::prefix('support-ticket')->group(function () {
    Route::get('/', 'FrontEnd\SupportTicketController@index')->name('user.support_ticket');
    Route::get('/create', 'FrontEnd\SupportTicketController@create')->name('user.support_ticket.create');
    Route::post('store', 'FrontEnd\SupportTicketController@store')->name('user.support_ticket.store');
    Route::get('message/{id}', 'FrontEnd\SupportTicketController@message')->name('user.support_ticket.message');
    Route::post('reply/{id}', 'FrontEnd\SupportTicketController@reply')->name('user.support_ticket.reply');
  });


  // user logout attempt route
  Route::get('/logout', 'FrontEnd\UserController@logoutSubmit')->name('user.logout')->withoutMiddleware('change.lang');
});



// service unavailable route
Route::get('/service-unavailable', 'FrontEnd\MiscellaneousController@serviceUnavailable')->name('service_unavailable')->middleware('exists.down');

/*
|--------------------------------------------------------------------------
| admin frontend route
|--------------------------------------------------------------------------
*/

Route::prefix('/admin')->middleware('guest:admin')->group(function () {
  // admin redirect to login page route
  Route::get('/', 'BackEnd\AdminController@login')->name('admin.login');

  // admin login attempt route
  Route::post('/auth', 'BackEnd\AdminController@authentication')->name('admin.auth');

  // admin forget password route
  Route::get('/forget-password', 'BackEnd\AdminController@forgetPassword')->name('admin.forget_password');

  // send mail to admin for forget password route
  Route::post('/mail-for-forget-password', 'BackEnd\AdminController@forgetPasswordMail')->name('admin.mail_for_forget_password');
});

Route::post('/property/video-img-rmv', 'BackEnd\Property\PropertyController@videoImgrmv')->name('property.videoImgrmv');
Route::post('/property/floor-img-rmv', 'BackEnd\Property\PropertyController@floorImgrmv')->name('property.floorImgrmv');

/*
|--------------------------------------------------------------------------
| Custom Page Route For UI
|--------------------------------------------------------------------------
*/
Route::get('/{slug}', 'FrontEnd\PageController@page')->name('dynamic_page')->middleware('change.lang');



// fallback route
Route::fallback(function () {
  return view('errors.404');
})->middleware('change.lang');
