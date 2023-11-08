<?php

namespace App\Livewire\ServiceProviders\TopServices;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{

    public $searchTerm;
    public $term = "";

    public function search(){
        $this->term = $this->searchTerm;
    }


    public function render()
    {
        $topServices = DB::table('services')
                                ->join('ratings', 'services.id', '=', 'ratings.service_id')
                                ->join('service_providers', 'services.service_provider_id', '=', 'service_providers.user_id')
                                ->select('services.id', 'services.service_title','services.service_description', 'service_providers.business_name as service_provider', DB::raw('AVG(ratings.rating) as average_rating'))
                                ->groupBy('services.id', 'services.service_title','services.service_description','service_providers.business_name')
                                ->orderBy('average_rating', 'DESC')
                                ->where('services.service_provider_id',auth()->user()->id)
                                ->where('services.service_title','like','%' . $this->term . '%')
                                ->get();
        return view('livewire.service-providers.top-services.index',['topServices' => $topServices]);
    }
}
