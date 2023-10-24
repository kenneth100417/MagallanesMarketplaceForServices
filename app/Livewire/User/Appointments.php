<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Appointments extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['cancel-confirmed' => 'cancelAppointment'];

    public $cancelId;
    public $rateID;

    public function setRateID($id){
        $this->rateID = $id;
        $this->dispatch('open-rating-modal');
    }

    public function Cancel($id){
        $this->cancelId = $id;
        $this->dispatch('confirm-cancel');
    }

    public function cancelAppointment(){
        $appt = Appointment::where('id',$this->cancelId)->first();
        $cancelled = $appt->delete();
        if($cancelled){
            $this->dispatch('cancelled-successfully');
        }
    }

    public function render()
    {
        //$appointments = Appointment::where('customer_id', auth()->user()->id)->paginate(10);
        $appointments = Appointment::where('customer_id', auth()->user()->id)
                                    ->select(
                                        'service_id',
                                        'id as apptId',
                                        'start_date as appointment_date',
                                        'status as appointmentStatus',
                                        DB::raw('(SELECT COUNT(*) FROM appointments AS a
                                                WHERE a.service_id = appointments.service_id
                                                AND DATE(a.start_date) = DATE(appointments.start_date)
                                                AND TIME(a.created_at) < TIME(appointments.created_at)) as other_appointed_customers_count')
                                    )
                                    ->paginate(10);
        return view('livewire.user.appointments',['appointments' => $appointments]);
    }
}
