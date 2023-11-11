<?php

namespace App\Livewire\ServiceProviders;

use App\Models\Service;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Appointment;
use Livewire\WithPagination;
use App\Models\ServiceProvider;

class Appointments extends Component
{
    use WithPagination;

    protected $listeners = ['search' => 'searchTerm'];
    protected $paginationTheme = 'bootstrap';
    protected $appointments;
    public $sort = 'pending';
    public $sortDate = '';
    public $search;
    public $term;

    public function searchTerm(){
        $this->term = $this->search;
    }
   

    public function showPending(){
        $this->sort = 'pending';
    }
    public function showServed(){
        $this->sort = 'served';
    }
    public function showExpired(){
        $this->sort = 'expired';
    }
    public function showToday(){
        $this->sortDate = date('Y-m-d');
        $this->sort = '';
    }
    public function showAll(){
        $this->sort = '';
        $this->sortDate = '';
    }

    public function render()
    {
        $user = ServiceProvider::where('user_id',auth()->user()->id)->first();
        // $this->appointments = Appointment::where('service_provider_id', $user->id)
        //                                     ->where('status', 'like','%'.$this->sort.'%')
        //                                     ->where('start_date', 'like','%'.$this->sortDate.'%')
        //                                     ->where('service_title', 'like', '%' . $this->term . '%')
        //                                     ->paginate(10);                             
        $this->appointments = Appointment::join('services', 'appointments.service_id', '=', 'services.id')
                                            ->join('customers', 'appointments.customer_id', '=', 'customers.user_id')
                                            ->where('appointments.service_provider_id', $user->id)
                                            ->where('appointments.status', 'like', '%' . $this->sort . '%')
                                            ->where('appointments.start_date', 'like', '%' . $this->sortDate . '%')
                                            ->where('services.service_title', 'like', '%' . $this->term . '%')
                                            ->select('customers.firstname as firstname','customers.lastname as lastname','services.service_title as service_title','services.service_rate as service_rate','appointments.status as apptStatus','appointments.start_date as appointmentDate','appointments.id as appointmentId')
                                            ->paginate(10);

        foreach($this->appointments as $appointment){
            if($appointment->end_date < date('Y-m-d')){
                $appt = Appointment::where('id',$appointment->appointmentId)->where('status','pending')->first();
                if($appt){
                    $appt->update([
                        'status' => 'expired'
                    ]);
                }
            }
        }

        $calendarAppt = Appointment::where('service_provider_id',$user->id)->get();
        $events = array();
        

        foreach($calendarAppt as $appt){
            
            $color = '#009933';
            $title = 'Pending';
            if($appt->start_date < date('Y-m-d')){
                $color = '#ff3333';
                $title = 'Expired';
            }
            if($appt->status == 'served'){
                $color = '#66c2ff';
                $title = 'Served';
            }

            $events[] = [
                'title' => $title,
                'start' => $appt->start_date,
                'end' => $appt->end_date,
                'color' => $color
            ];
        }
        return view('livewire.service-providers.appointments',['appointments' => $this->appointments,'sortBy' => $this->sort,'events' => $events,'today' => $this->sortDate]);
    }

    public function completed($id){
        $appointment = Appointment::where('id',$id)->first();
        $appointment->update([
            'status' => 'served'
        ]);
    }

    
 }
