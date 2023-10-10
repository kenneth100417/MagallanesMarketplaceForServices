<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\WithPagination;

class Appointments extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['cancel-confirmed' => 'cancelAppointment'];

    public $cancelId;

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
        $appointments = Appointment::where('customer_id', auth()->user()->id)->paginate(10);
        return view('livewire.user.appointments',['appointments' => $appointments]);
    }
}
