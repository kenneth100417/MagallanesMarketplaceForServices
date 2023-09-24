<?php

namespace App\Livewire\ServiceProviders;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceProvider;

class Services extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $delete_id;
    protected $listeners = ['deleteConfirmed' => 'deleteService'];

    public function render()
    {
        $user = ServiceProvider::where('user_id',auth()->user()->id)->first();
        $services = Service::orderBy('id','DESC')->where('service_provider_id', $user->user_id)->paginate(5);
        return view('livewire.service-providers.services',['services' => $services]);
    }

    public function disable($id){
        Service::where('id',$id)->update([
            'status' => '0'
        ]);
    }
    public function enable($id){
        Service::where('id',$id)->update([
            'status' => '1'
        ]);
    }

    public function showDeleteConfirmation($id){
        $this->delete_id = $id;
        $this->dispatch('show-delete-confirmation');
    }

    public function deleteService(){
        Service::where('id',$this->delete_id)->delete();
        $this->dispatch('show-delete-successful');
    }
}
