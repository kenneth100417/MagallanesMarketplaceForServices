<?php

namespace App\Livewire\User;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

   

    public function render()
    {   
        $services = Service::where('status', '1')->paginate(10);
        return view('livewire.user.services',['services' => $services]);
    }
}
