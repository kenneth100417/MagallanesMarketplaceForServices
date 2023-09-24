<?php

namespace App\Livewire\ServiceProviders;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\ServiceProvider;
use Livewire\WithPagination;

class Appointments extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $user = ServiceProvider::where('user_id',auth()->user()->id)->first();
        $appointments = Appointment::where('service_provider_id', $user->id)->paginate(10);
        return view('livewire.service-providers.appointments',['appointments' => $appointments]);
    }
}
