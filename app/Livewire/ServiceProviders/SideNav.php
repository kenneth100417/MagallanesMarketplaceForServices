<?php

namespace App\Livewire\ServiceProviders;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\ServiceProvider;

class SideNav extends Component
{
    public function render()
    {
        $user = ServiceProvider::where('user_id',auth()->user()->id)->first();
        $count = Appointment::where('service_provider_id', $user->id)
                            ->where('status', 'pending')
                            ->where('start_date',  date('Y-m-d'))
                            ->count();
        return view('livewire.service-providers.side-nav',['count'=>$count]);
    }
}
