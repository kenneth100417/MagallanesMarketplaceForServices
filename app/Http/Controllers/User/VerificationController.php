<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Models\VerificationRequest;
use Illuminate\Support\Facades\File;


class VerificationController extends Controller
{
    public function addVerificationRequest(Request $request){

        if(Auth()->user()->access == 'service_provider'){
            $validated = $request->validate([
                'name' => ['required'],
                'business_name' => ['required'],
                'business_address' => ['required'],
                'document_type' => ['required'],
                'document' => 'required|mimes:jpeg,png,jpg'
            ]);
        }else{
           
            $validated = $request->validate([
                'name' => ['required'],
                'address' => ['required'],
                'document_type' => ['required'],
                'document' => 'required|mimes:jpeg,png,jpg'
            ]);
            
        }
        

        $user = ServiceProvider::where('user_id',Auth()->user()->id)->first();
        
        if($validated){
            if($request->hasFile('document')){
                if(Auth()->user()->access == 'service_provider'){
                    $filename = $validated['business_name']."_".auth()->user()->id.'.png';
                    if (File::exists(public_path('uploads/docs/' . $filename))) {
                        // If it exists, delete the old file
                        File::delete(public_path('uploads/docs/' . $filename));
                    }
                    $img = $request->file('document');
                    $img->move('uploads/docs/',$filename);
                    
                    $validated['document'] = 'uploads/docs/'.$filename;
                }else{
                    
                    $filename = $validated['name']."_".auth()->user()->id.'.png';
                    if (File::exists(public_path('uploads/docs/' . $filename))) {
                        // If it exists, delete the old file
                        File::delete(public_path('uploads/docs/' . $filename));
                    }
                    $img = $request->file('document');
                    $img->move('uploads/docs/',$filename);
                    
                    $validated['document'] = 'uploads/docs/'.$filename;
                }
                
            }

            if(VerificationRequest::where('user_id', auth()->user()->id)->exists()){
                return redirect()->back()->with('error','Only 1 pending request is allowed. Please wait for the approval. Thank You!');
            }else{
                if(Auth()->user()->access == 'service_provider'){
                    VerificationRequest::create([
                        'user_id' => Auth()->user()->id,
                        'user_type'=> 'service_provider',
                        'business_name' => $validated['business_name'],
                        'name' => $validated['name'],
                        'business_address' => $validated['business_address'],
                        'document_type' => $validated['document_type'],
                        'document' => $validated['document']
                    ]);
                }else{
                   
                    VerificationRequest::create([
                        'user_id' => Auth()->user()->id,
                        'user_type'=> 'customer',
                        'name' => $validated['name'],
                        'business_name' => 'N/A',
                        'business_address' => $validated['address'],
                        'document_type' => $validated['document_type'],
                        'document' => $validated['document']
                    ]);
                }
                
            }

            return redirect()->back()->with('success','Your request is submited and is pending for approval. Thank you!');
        }

    }
}
