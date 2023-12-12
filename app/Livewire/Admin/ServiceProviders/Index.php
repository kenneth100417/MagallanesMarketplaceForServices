<?php

namespace App\Livewire\Admin\ServiceProviders;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceProvider;
use App\Models\VerificationRequest;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function block($id){
        ServiceProvider::where('user_id',$id)->update([
            'status' => '0'
        ]);
        VerificationRequest::where('user_id', $id)->update([
            'status' => '2'
        ]);
    }

    public function activate($id){
        ServiceProvider::where('user_id',$id)->update([
            'status' => '1'
        ]);
        VerificationRequest::where('user_id', $id)->update([
            'status' => '1'
        ]);
    }

    public function decline($id){
        VerificationRequest::where('user_id', $id)->delete();
    }

    public function render()
    {
        $service_providers = VerificationRequest::where('user_type','service_provider')->paginate(10);
        return view('livewire.admin.service-providers.index',['serviceProviders' => $service_providers]);
    }

}
