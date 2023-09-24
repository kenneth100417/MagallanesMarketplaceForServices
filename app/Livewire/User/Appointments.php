<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\WithPagination;

class Appointments extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $appointments = Appointment::where('customer_id', auth()->user()->id)->paginate(10);
        return view('livewire.user.appointments',['appointments' => $appointments]);
    }
}
