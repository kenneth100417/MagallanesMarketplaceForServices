<?php

namespace App\Livewire\User;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['search' => 'searchTerm'];
    public $search;
    public $term;

    public function searchTerm(){
        $this->term = $this->search;
    }
   
    public function render()
    {    
        $services = Service::orderBy('id','DESC')->where('status', '1')->where('service_title','like','%'.$this->term.'%')->paginate(10);
        return view('livewire.user.services',['services' => $services]);
    }
}
