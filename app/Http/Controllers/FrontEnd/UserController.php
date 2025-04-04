<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontEnd\MiscellaneousController;
use App\Http\Helpers\BasicMailer;
use App\Models\BasicSettings\Basic;
use App\Models\BasicSettings\MailTemplate;
use App\Models\Language;
use App\Models\Property\Wishlist;
use App\Models\User;
use App\Rules\MatchEmailRule;
use App\Rules\MatchOldPasswordRule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function __construct()
    {
        $bs = DB::table('basic_settings')
            ->select('facebook_app_id', 'facebook_app_secret', 'google_client_id', 'google_client_secret')
            ->first();

        Config::set('services.facebook.client_id', $bs->facebook_app_id);
        Config::set('services.facebook.client_secret', $bs->facebook_app_secret);
        Config::set('services.facebook.redirect', url('user/login/facebook/callback'));

        Config::set('services.google.client_id', $bs->google_client_id);
        Config::set('services.google.client_secret', $bs->google_client_secret);
        Config::set('services.google.redirect', url('login/google/callback'));
    }

    public function login(Request $request)
    {
        $themeVersion = Basic::query()->pluck('theme_version')->first();

        $misc = new MiscellaneousController();

        $language = $misc->getLanguage();

        // echo"<pre>";print_r($request->session());die;

        if ($request->session()->has('redirectTo')) {
            $redirectURL = $request->session()->get('redirectTo');
        }

        $queryResult['seoInfo'] = $language->seoInfo()->select('meta_keyword_login', 'meta_description_login')->first();

        $queryResult['pageHeading'] = $misc->getPageHeading($language);

        $queryResult['bgImg'] = $misc->getBreadcrumb();

        // get the status of digital product (exist or not in the cart)
        if (!empty($request->input('digital_item'))) {
            $queryResult['digitalProductStatus'] = $request->input('digital_item');
        }

        $queryResult['bs'] = Basic::query()->select('google_recaptcha_status', 'facebook_login_status', 'google_login_status')->first();

        if ($themeVersion == 5) {
            return view('frontend.v5.user.login', $queryResult);
        }
        return view('frontend.user.login', $queryResult);
    }
    public function forgot(Request $request)
    {
        $themeVersion = Basic::query()->pluck('theme_version')->first();

        $misc = new MiscellaneousController();

        $language = $misc->getLanguage();

        $queryResult['seoInfo'] = $language->seoInfo()->select('meta_keyword_login', 'meta_description_login')->first();

        $queryResult['pageHeading'] = $misc->getPageHeading($language);

        $queryResult['bgImg'] = $misc->getBreadcrumb();

        // get the status of digital product (exist or not in the cart)
        if (!empty($request->input('digital_item'))) {
            $queryResult['digitalProductStatus'] = $request->input('digital_item');
        }

        $queryResult['bs'] = Basic::query()->select('google_recaptcha_status', 'facebook_login_status', 'google_login_status')->first();

        if ($themeVersion == 5) {
            return view('frontend.v5.user.forgot', $queryResult);
        }
        return view('frontend.user.forgot', $queryResult);
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(Request $request)
    {
        if ($request->has('error_code')) {
            Session::flash('error', $request->error_message);
            return redirect()->route('user.login');
        }
        return $this->authenticationViaProvider('facebook');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        return $this->authenticationViaProvider('google');
    }

    public function authenticationViaProvider($driver)
    {
        // get the url from session which will be redirect after login
        if (Session::has('redirectTo')) {
            $redirectURL = Session::get('redirectTo');
        } else {
            $redirectURL = route('user.dashboard');
        }

        $responseData = Socialite::driver($driver)->user();
        $userInfo = $responseData->user;

        $isUser = User::query()->where('email', '=', $userInfo['email'])->first();

        if (!empty($isUser)) {
            // log in
            if ($isUser->status == 1) {
                Auth::guard('web')->login($isUser);

                return redirect($redirectURL);
            } else {
                Session::flash('error', 'Sorry, your account has been deactivated.');

                return redirect()->route('user.login');
            }
        } else {
            // get user avatar and save it
            $avatar = $responseData->getAvatar();
            $fileContents = file_get_contents($avatar);

            $avatarName = $responseData->getId() . '.jpg';
            $path = public_path('assets/img/users/');

            file_put_contents($path . $avatarName, $fileContents);

            // sign up
            $user = new User();

            if ($driver == 'facebook') {
                $user->name = $userInfo['name'];
            } else {
                $user->name = $userInfo['given_name'];
            }

            $user->image = $avatarName;
            $user->username = $userInfo['id'];
            $user->email = $userInfo['email'];
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->status = 1;
            $user->provider = ($driver == 'facebook') ? 'facebook' : 'google';
            $user->provider_id = $userInfo['id'];
            $user->save();

            Auth::guard('web')->login($user);

            return redirect($redirectURL);
        }
    }

    public function loginSubmit(Request $request)
    {

        $themeVersion = Basic::query()->pluck('theme_version')->first();

        $misc = new MiscellaneousController();

        $language = $misc->getLanguage();

        // get the url from session which will be redirect after login
        if ($request->session()->has('redirectTo')) {
            dd("1");
            $redirectURL = $request->session()->get('redirectTo');
        } else {
            $redirectURL = null;
        }

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $info = Basic::select('google_recaptcha_status')->first();

        if ($info->google_recaptcha_status == 1) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        $messages = [];

        if ($info->google_recaptcha_status == 1) {
            $messages['g-recaptcha-response.required'] = 'Please verify that you are not a robot.';
            $messages['g-recaptcha-response.captcha'] = 'Captcha error! try again later or contact site admin.';
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        // dd($validator);

        if ($validator->fails()) {
            return redirect()->route('user.login')->withErrors($validator->errors())->withInput();
        }

        // get the email and password which has provided by the user
        $credentials = $request->only('username', 'password');

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' :
        (preg_match('/^\d{10}$/', $request->username) ? 'phone' : 'username');

// Build the credentials array
        $credentials = [
            $fieldType => $request->username,
            'password' => $request->password,
        ];
        // dd($credentials);
        // dd((Auth::guard('web')->attempt($credentials)));
        // login attempt
        if (Auth::guard('web')->attempt($credentials)) {
            $authUser = Auth::guard('web')->user();
            // dd($authUser);
            // second, check whether the user's account is active or not
            if ($fieldType=="email" && $authUser->email_verified_at == null) {
                Session::flash('error', 'Please verify your email address');

                // logout auth user as condition not satisfied
                Auth::guard('web')->logout();
                session()->put('loginType', '');
                return redirect()->back();
            }
            if ($authUser->status == 0) {
                Session::flash('error', 'Sorry, your account has been deactivated');

                // logout auth user as condition not satisfied
                Auth::guard('web')->logout();
                session()->put('loginType', value: '');
                return redirect()->back();
            }
            // echo"<pre>";print_r($redirectURL);die;
            // $request->session('redirectTo')="/user/dashboard";
            // otherwise, redirect auth user to next url

            if (is_null($redirectURL)) {
                if ($themeVersion == 5) {
                    // return view('frontend.v5.user.dashboard');
                    if (isset($request->property_id) && $request->property_id > 0) {
                        return redirect()->route('frontend.property.propertydetails', ['id' => $request->property_id]);
                    }
                    return redirect()->route('user.dashboard');
                }

                return redirect()->route('user.dashboard');
            } else {

                // before, redirect to next url forget the session value
                $request->session()->forget('redirectTo');

                return redirect($redirectURL);
            }
        } else {
            Session::flash('error', 'Incorrect username or password');

            return redirect()->back();
        }
    }

    public function forgetPassword()
    {
        $misc = new MiscellaneousController();

        $language = $misc->getLanguage();

        $queryResult['seoInfo'] = $language->seoInfo()->select('meta_keyword_forget_password', 'meta_description_forget_password')->first();

        $queryResult['pageHeading'] = $misc->getPageHeading($language);

        $queryResult['bgImg'] = $misc->getBreadcrumb();
        $queryResult['bs'] = Basic::query()->select('google_recaptcha_status', 'facebook_login_status', 'google_login_status')->first();

        return view('frontend.user.forget-password', $queryResult);
    }

    public function forgetPasswordMail(Request $request)
    {
        $rules = [
            'email' => [
                'required',
                'email:rfc,dns',
                new MatchEmailRule('user'),
            ],
        ];

        $info = Basic::select('google_recaptcha_status')->first();
        if ($info->google_recaptcha_status == 1) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        $messages = [];

        if ($info->google_recaptcha_status == 1) {
            $messages['g-recaptcha-response.required'] = 'Please verify that you are not a robot.';
            $messages['g-recaptcha-response.captcha'] = 'Captcha error! try again later or contact site admin.';
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = User::query()->where('email', '=', $request->email)->first();

        // store user email in session to use it later
        $request->session()->put('userEmail', $user->email);

        // get the mail template information from db
        $mailTemplate = MailTemplate::query()->where('mail_type', '=', 'reset_password')->first();
        $mailData['subject'] = $mailTemplate->mail_subject;
        $mailBody = $mailTemplate->mail_body;

        // get the website title info from db
        $info = Basic::select('website_title')->first();

        $name = $user->username;

        $link = '<a href=' . url("user/reset-password") . '>Click Here</a>';

        $mailBody = str_replace('{customer_name}', $name, $mailBody);
        $mailBody = str_replace('{password_reset_link}', $link, $mailBody);
        $mailBody = str_replace('{website_title}', $info->website_title, $mailBody);

        $mailData['body'] = $mailBody;

        $mailData['recipient'] = $user->email;

        $mailData['sessionMessage'] = 'A mail has been sent to your email address';

        BasicMailer::sendMail($mailData);

        return redirect()->back();
    }

    public function resetPassword()
    {
        $misc = new MiscellaneousController();

        $bgImg = $misc->getBreadcrumb();

        return view('frontend.user.reset-password', compact('bgImg'));
    }

    public function resetPasswordSubmit(Request $request)
    {
        if ($request->session()->has('userEmail')) {
            // get the user email from session
            $emailAddress = $request->session()->get('userEmail');

            $rules = [
                'new_password' => 'required|confirmed',
                'new_password_confirmation' => 'required',
            ];

            $messages = [
                'new_password.confirmed' => 'Password confirmation failed.',
                'new_password_confirmation.required' => 'The confirm new password field is required.',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }

            $user = User::query()->where('email', '=', $emailAddress)->first();

            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            Session::flash('success', 'Password updated successfully.');
        } else {
            Session::flash('error', 'Something went wrong!');
        }

        return redirect()->route('user.login');
    }

    public function signup()
    {
        $themeVersion = Basic::query()->pluck('theme_version')->first();

        $misc = new MiscellaneousController();

        $language = $misc->getLanguage();

        $queryResult['seoInfo'] = $language->seoInfo()->select('meta_keyword_signup', 'meta_description_signup')->first();

        $queryResult['pageHeading'] = $misc->getPageHeading($language);

        $queryResult['bgImg'] = $misc->getBreadcrumb();

        $queryResult['recaptchaInfo'] = Basic::select('google_recaptcha_status')->first();
        if ($themeVersion == 5) {
            return view('frontend.v5.user.signup', $queryResult);
        }
        return view('frontend.user.signup', $queryResult);
    }

    public function signupSubmit(Request $request)
    {
        $info = Basic::select('google_recaptcha_status', 'website_title')->first();

        // validation start
        $rules = [
            'username' => 'required|unique:users|max:255',
            'email' => 'required|email:rfc,dns|unique:users|max:255',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];

        if ($info->google_recaptcha_status == 1) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        $messages = [
            'password_confirmation.required' => 'The confirm password field is required.',
        ];

        if ($info->google_recaptcha_status == 1) {
            $messages['g-recaptcha-response.required'] = 'Please verify that you are not a robot.';
            $messages['g-recaptcha-response.captcha'] = 'Captcha error! try again later or contact site admin.';
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            Session::flash('error', json_encode($validator->errors()));
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        // validation end
        // dd($validator->errors());

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country_id;
        $user->state = $request->state_id;
        $user->city = $request->city_id;
        $user->zip_code = $request->zip_code;
        $user->address = $request->address;
        $user->status = 1;
        $user->password = Hash::make($request->password);
        $user->save();
        if (isset($request->property_id) && $request->property_id > 0) {
            // dd("hii");
            // return $this->loginSubmit($request);
            return redirect()->route('user.login');
            // return loginSubmit($request);
            // $this->loginSubmit($request);
        }
        // dd($request);

        // get the mail template information from db
        $mailTemplate = MailTemplate::query()->where('mail_type', '=', 'verify_email')->first();
        $mailData['subject'] = $mailTemplate->mail_subject;
        $mailBody = $mailTemplate->mail_body;

        $link = '<a href=' . url("user/signup-verify/" . $user->id) . '>Click Here</a>';

        $mailBody = str_replace('{username}', $user->username, $mailBody);
        $mailBody = str_replace('{verification_link}', $link, $mailBody);
        $mailBody = str_replace('{website_title}', $info->website_title, $mailBody);

        $mailData['body'] = $mailBody;

        $mailData['recipient'] = $user->email;

        $mailData['sessionMessage'] = 'A verification mail has been sent to your email address';

        BasicMailer::sendMail($mailData);

        $queryResult['authUser'] = $user;

        

        return back();
    }

    public function signupVerify($id)
    {

        $user = User::where('id', $id)->firstOrFail();
        $user->email_verified_at = Carbon::now();
        $user->save();
        Auth::login($user);
        return redirect()->route('user.dashboard');
    }

    public function redirectToDashboard()
    {
        $misc = new MiscellaneousController();

        $language = $misc->getLanguage();

        $themeVersion = Basic::query()->pluck('theme_version')->first();

        $misc = new MiscellaneousController();

        $language = $misc->getLanguage();

        $queryResult['language'] = $language;

        $queryResult['bgImg'] = $misc->getBreadcrumb();
        $queryResult['pageHeading'] = $misc->getPageHeading($language);

        $user = Auth::guard('web')->user();

        $queryResult['authUser'] = $user;
        session()->put('loginType', 'user');
        $queryResult['wishlists'] = Wishlist::where('user_id', $user->id)
            ->get();
        // dd($queryResult);
        if ($themeVersion == 5) {
            return view('frontend.v5.user.dashboard', $queryResult);
        }

        return view('frontend.user.dashboard', $queryResult);
    }

    public function editProfile()
    {

        $misc = new MiscellaneousController();
        $themeVersion = Basic::query()->pluck('theme_version')->first();

        $queryResult['bgImg'] = $misc->getBreadcrumb();
        $language = $misc->getLanguage();

        $queryResult['language'] = $language;
        $queryResult['languages'] = Language::get();

        $queryResult['pageHeading'] = $misc->getPageHeading($language);

        $queryResult['authUser'] = Auth::guard('web')->user();

        $queryResult['vendor'] = Auth::guard('web')->user();
        // dd( $queryResult);
        if ($themeVersion == 5) {
            return view('frontend.v5.user.edit-profile', $queryResult);
        }

        return view('frontend.user.edit-profile', $queryResult);
    }

    public function updateProfile(Request $request)
    {
        // dd($in);
        // $request->validate([
        //   'name' => 'required',
        //   'username' => [
        //     'required',
        //     'alpha_dash',
        //     Rule::unique('users', 'username')->ignore(Auth::guard('web')->user()->id),
        //   ],
        //   'email' => [
        //     'required',
        //     'email',
        //     Rule::unique('users', 'email')->ignore(Auth::guard('web')->user()->id)
        //   ],
        // ]);

        $rules = [
            'username' => [
                'required',
                'not_in:admin',
                Rule::unique('users', 'username')->ignore(Auth::guard('web')->user()->id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(Auth::guard('web')->user()->id),
            ],
        ];

        if ($request->hasFile('image')) {
            $rules['image'] = 'mimes:png,jpeg,jpg';
        }

        // $validator = Validator::make($request->all(), $rules, []);
        // if ($validator->fails()) {
        //   return Response::json([
        //     'errors' => $validator->getMessageBag()
        //   ], 400);
        // }

        $authUser = Auth::guard('web')->user();
        $in = $request->all();
        // dd($in);
        $file = $request->file('image');
        // $file = $request->image;
        // dd($file);
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $directory = public_path('assets/img/users/');
            $fileName = uniqid() . '.' . $extension;
            @mkdir($directory, 0775, true);
            $file->move($directory, $fileName);
            $in['image'] = $fileName;
        }
  try {
        $authUser->update($in);
  } catch (\Exception $e) {
                Session::flash('error', $e->getMessage());
               return redirect()->back();
            }
        Session::flash('success', 'Your profile has been updated successfully.');

        return redirect()->back();
    }

    public function changePassword()
    {
        $themeVersion = Basic::query()->pluck('theme_version')->first();

        $misc = new MiscellaneousController();

        $bgImg = $misc->getBreadcrumb();
        $language = $misc->getLanguage();
        $pageHeading = $misc->getPageHeading($language);
        if ($themeVersion == 5) {
            return view('frontend.v5.user.changepassword', compact('bgImg', 'pageHeading'));
        }
        return view('frontend.user.change-password', compact('bgImg', 'pageHeading'));
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'current_password' => [
                'required',
                new MatchOldPasswordRule('user'),
            ],
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required',
        ];

        $messages = [
            'new_password.confirmed' => 'Password confirmation failed.',
            'new_password_confirmation.required' => 'The confirm new password field is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray(),
            ], 400);
        }
        // $validator = Validator::make($request->all(), $rules, $messages);
        // if ($validator->fails()) {

        //   return redirect()->back()->withErrors($validator->errors());
        // }

        $user = Auth::guard('web')->user();

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        Session::flash('success', 'Password updated successfully!');

        return response()->json(['status' => 'success'], 200);
        // Session::flash('success', 'Password updated successfully.');

        // return redirect()->back();
    }

    //wishlist
    public function wishlist()
    {
        $themeVersion = Basic::query()->pluck('theme_version')->first();
        $misc = new MiscellaneousController();
        $bgImg = $misc->getBreadcrumb();
        $language = $misc->getLanguage();
        $information['language'] = $language;
        $information['pageHeading'] = $misc->getPageHeading($language);

        $information['language'] = $language;
        $user_id = Auth::guard('web')->user()->id;
        $wishlists = Wishlist::with("property")->where('user_id', $user_id)
            ->get();

        $information['bgImg'] = $bgImg;
        $information['wishlists'] = $wishlists;
        // dd($information['wishlists']);
        if ($themeVersion == 5) {
            return view('frontend.v5.user.favorite', $information);
        }
        return view('frontend.user.wishlist', $information);
    }

    //add_to_wishlist

    public function add_to_wishlist($id)
    {
        if (Auth::guard('web')->check()) {
            $user_id = Auth::guard('web')->user()->id;
            $check = Wishlist::where('property_id', $id)->where('user_id', $user_id)->first();

            if (!empty($check)) {
                $notification = array('message' => 'You already added this event into your wishlist..!', 'alert-type' => 'error');
                return back()->with($notification);
            } else {
                $add = new Wishlist;
                $add->property_id = $id;
                $add->user_id = $user_id;
                $add->save();
                $notification = array('message' => 'Added to your wishlist successfully.', 'alert-type' => 'success');
                return back()->with($notification);
            }
        } else {
            return redirect()->route('user.login');
        }
    }
    //remove_wishlist
    public function remove_wishlist($id)
    {
        if (Auth::guard('web')->check()) {
            $remove = Wishlist::where('property_id', $id)->first();
            if ($remove) {
                $remove->delete();
                $notification = array('message' => 'Removed From wishlist successfully..!', 'alert-type' => 'info');
            } else {
                $notification = array('message' => 'Something went wrong', 'alert-type' => 'danger');
            }
            return back()->with($notification);
        } else {
            return redirect()->route('user.login');
        }
    }

    public function logoutSubmit(Request $request)
    {
        Session::flush(); // Clears all session data

        Auth::guard('web')->logout();
        Session::forget('secret_login');
        session()->put('loginType', '');
        if ($request->session()->has('redirectTo')) {
            $request->session()->forget('redirectTo');
        }

        return redirect()->route('user.login');
    }
}
