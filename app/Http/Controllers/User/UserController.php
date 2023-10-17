<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Admin;
use App\Models\Rating;
use App\Models\Service;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
     //edit Profile
     public function cuEditProfile(Request $request){
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile_number' => 'required',
            'address' => 'required'
        ]);

        if($validated){
            $user = Customer::where('user_id',auth()->user()->id)->first();
            if($user){
                $user->update([
                    'firstname' => $validated['firstname'],
                    'lastname' => $validated['lastname'],
                    'mobile_number' => $validated['mobile_number'],
                    'address' => $validated['address'],
                ]);
                return redirect()->back()->with('success','Profile updated successfully!');
            }
            else{
                return redirect()->back()->with('error','User not Found!');
            }
        }
    }
    //change profile pic
    public function cuChangeProfilePic(Request $request) {
        $validated = $request->validate([
            'photo' => 'required|mimes:jpeg,png,jpg,gif'
        ]);

        $user = Customer::where('user_id',Auth()->user()->id)->first();
        if($validated){
            if($request->hasFile('photo')){
                $filename = 'Customer_profile_'.auth()->user()->id.'.png';
                if (File::exists(public_path('uploads/profile/' . $filename))) {
                    // If it exists, delete the old file
                    File::delete(public_path('uploads/profile/' . $filename));
                }
                $img = $request->file('photo');
                $img->move('uploads/profile/',$filename);
                $photo = 'uploads/profile/'.$filename;
            }else{
                $photo = $user->photo;
            }
            $user->update([
                'photo' => $photo
            ]);

            return redirect()->back()->with('success','Profile picture uploaded successfully!.');
        
        }else{
            return redirect()->back()->with('error','Ann error occured while uploading your picture.');
        }


        
    }
    //view service provider profile
    public function viewServiceProvider($sp_user_id){
        $user = ServiceProvider::where('user_id',$sp_user_id)->where('status','1')->first();
        //$services = Service::where('service_provider_id',$sp_user_id)->where('status', '1')->get();

        $services = Service::select('services.*')
            ->selectRaw('COUNT(ratings.id) as rating_count')
            ->selectRaw('IFNULL(AVG(ratings.rating), 0) as avg_rating')
            ->leftJoin('ratings', 'services.id', '=', 'ratings.service_id')
            ->orderBy('services.id', 'DESC')
            ->where('services.status', '1')
            ->where('services.service_provider_id', $sp_user_id)
            ->groupBy('services.id','services.service_title','services.service_provider_id','services.service_description','services.service_rate','services.slot','services.status','services.created_at','services.updated_at')
            ->paginate(10);

        return view('UserPages.service_provider_profile', ['user' => $user, 'services' => $services]);
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
    //edit Profile
    public function spEditProfile(Request $request){
        $validated = $request->validate([
            'business_name' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile_number' => 'required',
            'business_address' => 'required'
        ]);

        if($validated){
            $user = ServiceProvider::where('user_id',auth()->user()->id)->first();
            if($user){
                $user->update([
                    'business_name' => $validated['business_name'],
                    'firstname' => $validated['firstname'],
                    'lastname' => $validated['lastname'],
                    'mobile_number' => $validated['mobile_number'],
                    'business_address' => $validated['business_address'],
                ]);
                return redirect()->back()->with('success','Profile updated successfully!');
            }
            else{
                return redirect()->back()->with('error','User not Found!');
            }
        }
    }
    //change profile pic
    public function spChangeProfilePic(Request $request) {
        $validated = $request->validate([
            'photo' => 'required|mimes:jpeg,png,jpg,gif'
        ]);

        $user = ServiceProvider::where('user_id',Auth()->user()->id)->first();

        if($validated){
            if($request->hasFile('photo')){
                $filename = 'ServiceProvider_profile_'.auth()->user()->id.'.png';
                if (File::exists(public_path('uploads/profile/' . $filename))) {
                    // If it exists, delete the old file
                    File::delete(public_path('uploads/profile/' . $filename));
                }
                $img = $request->file('photo');
                $img->move('uploads/profile/',$filename);
                
                $photo = 'uploads/profile/'.$filename;
            }else{
                $photo = $user->photo;
                
            }

            $user->update([
                'photo' => $photo
            ]);

            return redirect()->back()->with('success','Profile picture uploaded successfully!.');
        
        }else{
            return redirect()->back()->with('error','Ann error occured while uploading your profile picture.');
        }


        
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
    //edit Profile
    public function adEditProfile(Request $request){
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        if($validated){
            $user = Admin::where('user_id',auth()->user()->id)->first();
            if($user){
                $user->update([
                    'firstname' => $validated['firstname'],
                    'lastname' => $validated['lastname']
                ]);
                return redirect()->back()->with('success','Profile updated successfully!');
            }
            else{
                return redirect()->back()->with('error','User not Found!');
            }
        }
    }

    //change profile pic
    public function adChangeProfilePic(Request $request) {
        $validated = $request->validate([
            'photo' => 'required|mimes:jpeg,png,jpg,gif'
        ]);

        $user = Admin::where('user_id',Auth()->user()->id)->first();

        if($validated){
            if($request->hasFile('photo')){
                $filename = 'Admin_profile_'.auth()->user()->id.'.png';
                if (File::exists(public_path('uploads/profile/' . $filename))) {
                    // If it exists, delete the old file
                    File::delete(public_path('uploads/profile/' . $filename));
                }
                $img = $request->file('photo');
                $img->move('uploads/profile/',$filename);
                
                $photo = 'uploads/profile/'.$filename;
            }else{
                $photo = $user->photo;
                
            }

            $user->update([
                'photo' => $photo
            ]);

            return redirect()->back()->with('success','Profile picture uploaded successfully!.');
        
        }else{
            return redirect()->back()->with('error','Ann error occured while uploading your profile picture.');
        }


        
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
                        
                        $user_info = Customer::where('user_id',$user->id)->first();
                        if($user_info->status == '0'){
                            return redirect()->back()->with('message', 'You are not allowed to log in. Please Contact the Administrator for further information. Thank You!');
                        }else{
                            auth()->login($user);
                            return redirect('user_dashboard')->with('message', 'Welcome back '.$user_info->firstname.' !');
                        }
                        
                        
                        
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
                return redirect()->back()->with('message', 'Email and Password does not match.');
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
