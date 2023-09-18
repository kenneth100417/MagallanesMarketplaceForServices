<?php

namespace App\Http\Controllers\User;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function create(Request $request){
        
        $validated = $request->validate([
            'service_title' => ['required'],
            'service_description' => ['required'],
            'service_rate' => ['required'],
            'service_time' => ['required']
        ]);
        
        if($validated){
            $user = ServiceProvider::where('user_id',auth()->user()->id)->first();
            if($user){
                Service::create([
                    'service_provider_id' => $user->id,
                    'service_title' => $validated['service_title'],
                    'service_description' => $validated['service_description'],
                    'service_rate' => $validated['service_rate'],
                    'service_time' => $validated['service_time']
                ]);
                return redirect()->back()->with('success','Service added successfully.');
            }else{
                return redirect()->back()->with('error','User not found');
            }
        }else{
            return redirect()->back()->with('error','An error occured.');
        }
    }
}
