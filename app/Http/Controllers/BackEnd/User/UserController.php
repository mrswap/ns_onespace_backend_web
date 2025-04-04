<?php

namespace App\Http\Controllers\BackEnd\User;

use App\Http\Controllers\Controller;
use App\Models\PropertyImpresion;
use App\Models\SupportTicket;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Session;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $searchKey = null;

        if ($request->filled('info')) {
            $searchKey = $request['info'];
        }

        $users = User::query()->when($searchKey, function ($query, $searchKey) {
            return $query->where('username', 'like', '%' . $searchKey . '%')
                ->orWhere('email', 'like', '%' . $searchKey . '%');
        })
            ->orderByDesc('id')
            ->paginate(10);

        return view('backend.end-user.user.index', compact('users'));
    }

    public function create()
    {
        return view('backend.end-user.user.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('users', 'username'),
            ],
            'email' => [
                'required',
                Rule::unique('users', 'email'),
            ],
            'image' => 'required|dimensions:width=80,height=80',
            'password' => 'required|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->getMessageBag()->toArray(),
            ], 400);
        }
        $file = $request->file('image');
        $in = $request->all();
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $directory = public_path('assets/img/users/');
            $fileName = uniqid() . '.' . $extension;
            @mkdir($directory, 0775, true);
            $file->move($directory, $fileName);
        }
        $user = new User();
        $user->image = $fileName;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip_code = $request->zip_code;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = Carbon::now();
        $user->status = 1;
        $user->save();
        Session::flash('success', 'A new user has been added successfully.');
        return response()->json(['status' => 'success'], 200);
    }

    public function updateEmailStatus(Request $request, $id)
    {
        $user = User::query()->find($id);

        if ($request['email_status'] == 1) {
            $user->update([
                'email_verified_at' => date('Y-m-d H:i:s'),
            ]);
        } else {
            $user->update([
                'email_verified_at' => null,
            ]);
        }

        $request->session()->flash('success', 'Email status updated successfully!');

        return redirect()->back();
    }

    public function updateAccountStatus(Request $request, $id)
    {
        $user = User::query()->find($id);

        if ($request['account_status'] == 1) {
            $user->update([
                'status' => 1,
            ]);
        } else {
            $user->update([
                'status' => 0,
            ]);
        }

        $request->session()->flash('success', 'Account status updated successfully!');

        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::query()->findOrFail($id);
        $information['user'] = $user;
        return view('backend.end-user.user.edit', $information);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($id),
            ],
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($id),
            ],
        ];
        if ($request->hasFile('image')) {
            $rules['image'] = 'dimensions:width=80,height=80';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->getMessageBag()->toArray(),
            ], 400);
        }
        $file = $request->file('image');
        $in = $request->all();
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $directory = public_path('assets/img/users/');
            $fileName = uniqid() . '.' . $extension;
            @mkdir($directory, 0775, true);
            $file->move($directory, $fileName);
            $in['image'] = $fileName;
        }
        $user = User::where('id', $id)->firstOrFail();
        $in['email'] = $request->email;
        $user->update($in);
        Session::flash('success', 'User has been updated successfully.');
        return response()->json(['status' => 'success'], 200);
    }

    public function changePassword($id)
    {
        $userInfo = User::query()->findOrFail($id);

        return view('backend.end-user.user.change-password', compact('userInfo'));
    }

    public function updatePassword(Request $request, $id)
    {
        $rules = [
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required',
        ];

        $messages = [
            'new_password.confirmed' => 'Password confirmation does not match.',
            'new_password_confirmation.required' => 'The confirm new password field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray(),
            ], 400);
        }

        $user = User::query()->find($id);

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        $request->session()->flash('success', 'Password updated successfully!');

        return Response::json(['status' => 'success'], 200);
    }

    public function secret_login($id)
    {
        $user = User::where('id', $id)->first();
        Auth::guard('web')->login($user);
        Session::put('secret_login', 1);
        return redirect()->route('user.dashboard');
    }

    public function destroy($id)
    {

        $this->deleteUser($id);
        return redirect()->back()->with('success', 'User deleted successfully!');
    }

    public function bulkDestroy(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $this->deleteUser($id);
        }

        Session::flash('success', 'Users deleted successfully!');

        return Response::json(['status' => 'success'], 200);
    }

    public function deleteUser($id)
    {
        $user = User::query()->findOrFail($id);

        //delete all vendor's support ticket
        $support_tickets = SupportTicket::where([['user_id', $user->id], ['user_type', 'user']])->get();
        foreach ($support_tickets as $support_ticket) {
            //delete conversation
            $messages = $support_ticket->messages()->get();
            foreach ($messages as $message) {
                @unlink(public_path('assets/admin/img/support-ticket/' . $message->file));
                $message->delete();
            }
            @unlink(public_path('assets/admin/img/support-ticket/attachment/') . $support_ticket->attachment);
            $support_ticket->delete();
        }
        // delete user image
        @unlink(public_path('assets/img/users/') . $user->image);

        $user->delete();
        return;
    }

    
    
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:10',
            'otp' => 'required|digits:6',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|unique:users,email',
            'property_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        $user = User::where('phone', $request->phone)->first();
        if (!$user || $user->otp !== $request->otp || now()->isAfter($user->otp_expires_at)) {
            return response()->json(['error' => 'Invalid or expired OTP.'], 422);
        }

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'otp' => null,
            'email_verified_at' => now(),
            'status' => 1,
            'otp_expires_at' => null,
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            $authUser = Auth::guard('web')->user();

            PropertyImpresion::create([
                "property_id" => $request->property_id,
                "user_id" => $authUser->id,
                "name" => $authUser->name,
                "email" => $authUser->email,
                "phone" => $authUser->phone,
            ]);
            // return redirect()->route('user.dashboard');
        }

        return response()->json(['success' => 'Signup successful.']);
    }

    private function sendSms($to, $message)
    {
        // $sid = env('TWILIO_SID');
        // $token = env('TWILIO_AUTH_TOKEN');
        // $from = env('TWILIO_PHONE');

        // $client = new Client($sid, $token);
        // $client->messages->create($to, [
        //     'from' => $from,
        //     'body' => $message,
        // ]);
    }

   
    public function sendOtp(Request $request)
    {

        $user = User::where('phone', $request->phone)->first();
        if (isset($user) && empty($user->password)) {
            $user->delete();
        }
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:10|unique:users,phone',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        // $otp = rand(100000, 999999);
        $otp = 123456;
        $phone = $request->phone;
        // \DB::enableQueryLog();

        User::updateOrCreate(
            ['otp' => $otp, 'otp_expires_at' => now()->addMinutes(5), 'phone' => $phone, 'email' => $phone . "@gmail.com"],

        );
        // logger(\DB::getQueryLog());

        // Send OTP via SMS (e.g., Twilio)
        $this->sendSms($phone, "Your OTP is $otp");

        return response()->json(['success' => 'OTP sent successfully.']);
    }

    public function sendLoginOTP(Request $request)
    {
        $request->validate(['phone' => 'required']);


        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            $user = User::updateOrCreate(
            [
            'phone' => $request->phone,
            'status' =>1,
            'password' => Hash::make(123456),
            'email'=>$request->phone."@gmail.com"
            ]);
            // return response()->json(['error' => 'User not found.']);
        }
        
        $otp = 123456;
        $phone = $request->phone;
        // $otp = rand(100000, 999999); // Generate a 6-digit OTP
        $this->sendSms($phone, "Your OTP is $otp");
        $user->otp = $otp;
        $user->otp_expires_at = Carbon::now()->addMinutes(10); // OTP expires in 10 minutes
        $user->save();

        // Send OTP via SMS or email
        // Example: Mail::to($user->email)->send(new SendOTP($otp));
        return response()->json(['success' => 'OTP sent successfully.']);
    }

    public function verifyLoginOTP(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'otp' => 'required|numeric',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if (!$user || $user->otp === $request->otp && $user->otp_expires_at > Carbon::now()) {
            $user->otp = null; // Clear OTP after successful validation
            $user->otp_expires_at = null;
            $user->save();
            auth()->login($user);
            Session::put('tentant_login_status', true);
            Session::put('tentant_id', $user->id);
            // return redirect()->route('home');
            return response()->json(['success' => 'Login successful.']);
        }

        return response()->json(['error' => 'Invalid or expired OTP']);
        // return back()->withErrors(['otp' => 'Invalid or expired OTP']);

        // Log in the user
       
    }
}
