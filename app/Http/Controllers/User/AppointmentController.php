<?php

namespace App\Http\Controllers\User;


use DateTime;
use DateInterval;
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
        $appointments = Appointment::where('customer_id',auth()->user()->id)->where('service_id',$service_id)->get();
        $appointmentCount = Appointment::where('start_date',Date('Y-m-d'))->count();
        $remainingSlot = $service->slot - $appointmentCount;
        $events = array();


        foreach($appointments as $appointment){
            
           
            $customer = Customer::where('user_id',$appointment->customer_id)->first();
            $service = Service::where('id',$appointment->service_id)->first();

            $events[] = [
                'title' => $service->service_title,
                'start' => $appointment->start_date,
                'end' => $appointment->end_date,
                'color' => '#66c2ff'
            ];
        }
        
        return view('UserPages.set_appointment',compact('user','service','events','remainingSlot'));
    }

    public function storeAppointment(Request $request){

        //$service = Service::where('id',$request->service_id)->first();

        // $date=new DateTime($request->start_date);
        // $new_date = $date->add(new DateInterval("PT{12}H"));
        // $end_date = $new_date->format('Y-m-d H:i:s');
        // $date->format('Y-m-d H:i:s');
        // //dd($request->customer_id);
       
        $appointmentExists = Appointment::where('service_id',$request->service_id)->where('customer_id',auth()->user()->id)->exists();
        $service = Service::where('id',$request->service_id)->first();
        $serviceProvider = ServiceProvider::where('id', $service->service_provider_id)->first();
        $appointments = Appointment::where('start_date',$request->start_date)->get();
        $appointmentCount = $appointments->count();

        if($appointmentExists){
            $appt =  Appointment::where('service_id',$request->service_id)->where('customer_id',auth()->user()->id)->first();
            $appt->update([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            ]);
            return redirect()->back()->with('success','Your appointment has been updated.');
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
}
