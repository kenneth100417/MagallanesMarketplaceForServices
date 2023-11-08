<?php

namespace App\Livewire\Admin\TopServices;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {
        $topServices = DB::table('services')
                                ->join('ratings', 'services.id', '=', 'ratings.service_id')
                                ->join('service_providers', 'services.service_provider_id', '=', 'service_providers.user_id')
                                ->select('services.id', 'services.service_title','services.service_description', 'service_providers.business_name as service_provider', DB::raw('AVG(ratings.rating) as average_rating'))
                                ->groupBy('services.id', 'services.service_title','services.service_description','service_providers.business_name')
                                ->orderBy('average_rating', 'DESC')
                                ->get();
        return view('livewire.admin.top-services.index',['topServices' => $topServices]);
    }
}
