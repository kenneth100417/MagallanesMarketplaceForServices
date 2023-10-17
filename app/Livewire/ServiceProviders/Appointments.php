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
    protected $paginationTheme = 'bootstrap';
    protected $appointments;
    public $sort = '';
    public $sortDate = '';

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
    }
    public function showAll(){
        $this->sort = '';
        $this->sortDate = '';
    }

    public function render()
    {
        $user = ServiceProvider::where('user_id',auth()->user()->id)->first();
        $this->appointments = Appointment::where('service_provider_id', $user->id)
                                            ->where('status', 'like','%'.$this->sort.'%')
                                            ->where('start_date', 'like','%'.$this->sortDate.'%')
                                            ->paginate(10);
                                            
        foreach($this->appointments as $appointment){
            if($appointment->start_date < date('Y-m-d')){
                $appt = Appointment::where('id',$appointment->id)->where('status','pending')->first();
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
