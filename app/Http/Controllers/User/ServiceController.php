<?php

namespace App\Http\Controllers\User;

use App\Models\Rating;
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
            'slot' => ['required']
        ]);
        
        if($validated){
            $user = ServiceProvider::where('user_id',auth()->user()->id)->first();
            if($user){
                Service::create([
                    'service_provider_id' => auth()->user()->id,
                    'service_title' => $validated['service_title'],
                    'service_description' => $validated['service_description'],
                    'service_rate' => $validated['service_rate'],
                    'slot' => $validated['slot']
                ]);
                return redirect()->back()->with('success','Service added successfully.');
            }else{
                return redirect()->back()->with('error','User not found');
            }
        }else{
            return redirect()->back()->with('error','An error occured.');
        }
    }

    public function rateService(Request $request, $service_id){
        if(request('rating') != null){
           //dd($service_id);
            $service = Rating::where('service_id',$service_id)->where('user_id',auth()->user()->id)->first();
            if($service){
                $service->update([
                    'rating' => request('rating')
                ]);
                return redirect()->back()->with('success', 'Rating Successfully Updated!');
            }else{
                Rating::create([
                    'user_id' => auth()->user()->id,
                    'service_id' => $service_id,
                    'rating' => request('rating')
                ]);
                return redirect()->back()->with('success', 'Thank you for your feedback! Your rating has been successfully submitted.');
            }
        }
        return redirect()->back()->with('error', 'Rating cannot be empty.');

    }
}
