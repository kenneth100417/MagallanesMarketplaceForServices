<?php

namespace App\Http\Controllers\User;


use DateTime;
use DateInterval;
use App\Models\Rating;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ServiceProvider;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function setAppointment($service_id){
        $user = Customer::where('user_id',auth()->user()->id)->first();

        $service = Service::where('id',$service_id)->first();
        
        $serviceReviews = Rating::where('service_id',$service_id)->get();
        $avg_rating = Rating::where('service_id',$service_id)
                                ->avg('rating');

        $appointments = Appointment::where('service_id',$service_id)->where('status','pending')->whereDate('start_date', '>=', now())->get();
        $appointmentCount = Appointment::where('service_id',$service->id)->where('status','pending')->groupBy('start_date')->count();
        $remainingSlot = $service->slot - $appointmentCount;
        $events = array();
        $title = '';
        $color = '';

        //dd($remainingSlot);
        foreach($appointments as $appointment){
            
           
            $customer = Customer::where('user_id',$appointment->customer_id)->first();
            $service = Service::where('id',$appointment->service_id)->first();
            
            if(auth()->user()->id == $customer->user_id){
                $title = 'You';
                $color = ' #28a745';
            }else{
                $title = $customer->firstname.' '.$customer->lastname;
                $color = '#66c2ff';
            }

            $events[] = [
                'title' => $title,
                'start' => $appointment->start_date,
                'end' => $appointment->end_date,
                'color' => $color
            ];
        }
        
        //reviews
        $reviews = Rating::where('ratings.service_id', $service_id)
                            ->join('customers','ratings.user_id','customers.user_id')
                            ->select('ratings.rating as star','ratings.comment as comment', 'customers.firstname as fname','customers.lastname as lname','customers.photo as photo')
                            ->get();
        return view('UserPages.set_appointment',compact('user','service','events','remainingSlot','serviceReviews','avg_rating','reviews'));
    }

    public function storeAppointment(Request $request){
       
        $appointmentExists = Appointment::where('service_id',$request->service_id)->where('customer_id',auth()->user()->id)->where('status','pending')->exists();
        $service = Service::where('id',$request->service_id)->first();
        $serviceProvider = ServiceProvider::where('user_id', $service->service_provider_id)->first();
        $appointments = Appointment::where('start_date',$request->start_date)->where('status','pending')->get();
        $appointmentCount = $appointments->count();
       
        if($appointmentExists){
            if($appointmentCount >= $service->slot){
                return redirect()->back()->with('info','This schedule is fully booked. Please choose another date.');
            }else{
                $appt =  Appointment::where('service_id',$request->service_id)->where('customer_id',auth()->user()->id)->where('status','pending')->first();
                $appt->update([
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date
                ]);
            
                return redirect()->back()->with('success','Your appointment has been updated.');
            }
            
        }else{
            if($appointmentCount >= $service->slot){
                return redirect()->back()->with('info','This schedule is fully booked. Please choose another date.');
            }else{
                Appointment::create([
                'customer_id' => auth()->user()->id,
                'service_provider_id' => $serviceProvider->id,
                'service_id' => $request->service_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            ]);

            return redirect()->back()->with('success','Appointment Added!');

            }
        }
        
        return redirect()->back()->with('error','An error occured during appointment processing.');
        
    }

    public function viewAppointmentCalendar(){
        $user = ServiceProvider::where('user_id',Auth()->user()->id)->first();


        $appointments = Appointment::where('service_provider_id',$user->id)->where('status','pending')->get();
        
        $events = array();

        //dd($remainingSlot);
        foreach($appointments as $appointment){
            
           
            $customer = Customer::where('user_id',$appointment->customer_id)->first();

            $events[] = [
                'title' =>  $customer->firstname.' '.$customer->lastname,
                'start' => $appointment->start_date,
                'end' => $appointment->end_date,
                'color' => '#66c2ff'
            ];
        }

        return view('ServiceProviderPages.appointment_calendar',['user'=>$user,'events'=>$events]);

    }
}
