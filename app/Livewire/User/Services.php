<?php

namespace App\Livewire\User;

use App\Models\Service;
use App\Models\Customer;
use Livewire\Component;
use App\Models\Appointment;
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
        // $services = Service::orderBy('id','DESC')
        //                     ->where('status', '1')
        //                     ->where('service_title','like','%'.$this->term.'%')
        //                     ->paginate(10);
        $services = Service::select('services.*')
            ->selectRaw('COUNT(ratings.id) as rating_count')
            ->selectRaw('IFNULL(AVG(ratings.rating), 0) as avg_rating')
            ->leftJoin('ratings', 'services.id', '=', 'ratings.service_id')
            ->leftJoin('service_providers', 'services.service_provider_id', '=', 'service_providers.user_id')
            ->orderBy('services.id', 'DESC')
            ->where('services.status', '1')
            ->where('service_providers.status','1')
            ->where('services.service_title', 'like', '%' . $this->term . '%')
            ->groupBy('services.id','services.service_title','services.service_provider_id','services.service_description','services.service_rate','services.slot','services.status','services.created_at','services.updated_at','services.openTime','services.closingTime','services.openDays')
            ->paginate(10);

        $user = Customer::where('user_id', auth()->user()->id)->first();
        return view('livewire.user.services',['services' => $services, 'user' => $user]);
    }
}
