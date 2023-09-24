<?php

namespace App\Livewire\ServiceProviders;

use Livewire\Component;
use App\Models\Appointment;
use Livewire\WithPagination;

class Appointments extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $appointments = Appointment::where('service_provider_id', auth()->user()->id)->paginate(10);
        return view('livewire.service-providers.appointments',['appointments' => $appointments]);
    }
}
