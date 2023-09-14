<?php

namespace App\Livewire\Admin\ServiceProviders;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceProvider;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function block($customer_id){
        ServiceProvider::where('id',$customer_id)->update([
            'status' => '0'
        ]);
    }
    public function activate($customer_id){
        ServiceProvider::where('id',$customer_id)->update([
            'status' => '1'
        ]);
    }
    public function render()
    {
        $service_providers = ServiceProvider::paginate(10);
        return view('livewire.admin.service-providers.index',['serviceProviders' => $service_providers]);
    }
}
