<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //User Pages
    public function UserDashboard(){
        $user = Customer::where('user_id',Auth()->user()->id)->first();
        return view('UserPages.dashboard',compact('user'));
    }
    public function UserServices(){
        $user = Customer::where('user_id',Auth()->user()->id)->first();
        return view('UserPages.services',compact('user'));
    }
    public function UserServiceProviders(){
        $user = Customer::where('user_id',Auth()->user()->id)->first();
        return view('UserPages.service_providers',compact('user'));
    }
    public function UserAppointments(){
        $user = Customer::where('user_id',Auth()->user()->id)->first();
        return view('UserPages.appointments',compact('user'));
    }
    public function UserProfile(){
        $user = Customer::where('user_id',Auth()->user()->id)->first();
        return view('UserPages.profile',compact('user'));
    }

     //Service Provider Pages
    public function ProviderDashboard(){
        $user = ServiceProvider::where('user_id',Auth()->user()->id)->first();
        return view('ServiceProviderPages.dashboard',compact('user'));
    }
    public function ProviderServices(){
        $user = ServiceProvider::where('user_id',Auth()->user()->id)->first();
        return view('ServiceProviderPages.services',compact('user'));
    }
    public function ProviderAppointments(){
        $user = ServiceProvider::where('user_id',Auth()->user()->id)->first();
        return view('ServiceProviderPages.appointments',compact('user'));
    }
    public function ProviderProfile(){
        $user = ServiceProvider::where('user_id',Auth()->user()->id)->first();
        return view('ServiceProviderPages.profile',compact('user'));
    }

    //Admin Pages
    public function AdminDashboard(){
        $user = Admin::where('user_id',Auth()->user()->id)->first();
        if($user == Null){
            Admin::create([
                'user_id' => auth()->user()->id,
                'firstname' => 'Admin',
                'lastname' => 'User',
                'photo' => '/uploads/profile/profile_temp'
            ]);
        }
        return view('AdminPages.dashboard',compact('user'));
    }
    public function AdminServiceProvider(){
        $user = Admin::where('user_id',Auth()->user()->id)->first();
        return view('AdminPages.service_providers',compact('user'));
    }
    public function AdminCustomer(){
        $user = Admin::where('user_id',Auth()->user()->id)->first();
        return view('AdminPages.customers',compact('user'));
    }
    public function AdminProfile(){
        $user = Admin::where('user_id',Auth()->user()->id)->first();
        return view('AdminPages.profile',compact('user'));
    }
    

    public function addCustomer(Request $request){
        
        $validated = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'mobile_number' => ['required','min:11','numeric',Rule::unique('customers', 'mobile_number')],
            'address' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        
        $validated['password'] = Hash::make($validated['password']);

        if($validated){
            $user = User::create([
                'email' => $validated['email'],
                'password' => $validated['password'],
                'access' => 'customer'
            ]);

            if($user){
                Customer::create([
                    'user_id' => $user->id,
                    'firstname' => $validated['firstname'],
                    'lastname' => $validated['lastname'],
                    'mobile_number' => $validated['mobile_number'],
                    'address' => $validated['address']
                ]);
            }else{
                return redirect()->back()->with('message', 'An Error Occured.');
            }
            
            auth()->login($user);
            return redirect('/user_dashboard')->with('message', 'Welcome to Magallanes Marketplace for Services!');
           
        }else{
            return redirect()->back()->with('message', 'An Error Occured.');
        }
    }

    public function addServiceProvider(Request $request){
        
        $validated = $request->validate([
            'business_name' => ['required'],
            'business_address' => ['required'],
            'firstname' => ['required'],
            'lastname' => ['required'],
            'mobile_number' => ['required','min:11','numeric',Rule::unique('customers', 'mobile_number')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        //dd('here');
        $validated['password'] = Hash::make($validated['password']);

        if($validated){
            $user = User::create([
                'email' => $validated['email'],
                'password' => $validated['password'],
                'access' => 'service_provider'
            ]);

            if($user){
                ServiceProvider::create([
                    'user_id' => $user->id,
                    'business_name' => $validated['business_name'],
                    'business_address' => $validated['business_address'],
                    'firstname' => $validated['firstname'],
                    'lastname' => $validated['lastname'],
                    'mobile_number' => $validated['mobile_number'],
                ]);
            }else{
                return redirect()->back()->with('message', 'An Error Occured.');
            }
            
            auth()->login($user);
            return redirect('/service_provider_dashboard')->with('message', 'Welcome to Marketplace for Services!');
           
        }else{
            return redirect()->back()->with('message', 'An Error Occured.');
        }
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        
        $user = User::where('email',$validated['email'])->first();

        if($validated){
            if(User::where('email',$validated['email'])->exists()){
                if(Hash::check($validated['password'], $user->password)){
                    if($user->access == "customer"){
                        $user_info = Customer::where('user_id',$user->id)->where('status','1')->first();
                        auth()->login($user);
                        return redirect('user_dashboard')->with('message', 'Welcome back '.$user_info->firstname.' !');
                        
                    }else if($user->access == "service_provider"){
                        
                        $user_info = ServiceProvider::where('user_id',$user->id)->where('status','1')->first();
                        auth()->login($user);
                        return redirect('service_provider_dashboard')->with('message', 'Welcome back '.$user_info->firstname.' !');
                         
                    }else if($user->access == "admin"){
                        $user_info = Admin::where('user_id',$user->id)->first();
                        auth()->login($user);
                        return redirect('admin_dashboard')->with('message', 'Welcome back Admin!');

                    }else{
                        return redirect()->back()->with('message', 'An error occured.');
                    }
                }else{
                    return redirect()->back()->with('message', 'Email and Password does not match.');
                }
            }else{
                return redirect()->back()->with('message', 'User not found.');
            }
        }
        return redirect()->back()->with('message', 'An error occured.');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
