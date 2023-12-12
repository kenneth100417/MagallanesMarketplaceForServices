<?php

namespace App\Livewire\Admin\Customers;

use Livewire\Component;
use App\Models\Customer;
use App\Models\VerificationRequest;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm;
    public $key = "";
    
    public function search(){
        $this->key = $this->searchTerm;
    }

    public function block($id){
        Customer::where('user_id',$id)->update([
            'status' => '0'
        ]);
        VerificationRequest::where('user_id', $id)->update([
            'status' => '2'
        ]);
    }
    public function activate($id){
        Customer::where('user_id',$id)->update([
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
        $term = $this->key;
        $customers = VerificationRequest::where('user_type','customer')
                                ->where('name', 'like', '%' . $term . '%')
                                ->paginate(10);
        return view('livewire.admin.customers.index',['customers' => $customers]);
    }
    // where(function ($query) use ($term) {
    //     $query->where('firstname', 'like', '%' . $term . '%')
    //         ->orWhere('lastname', 'like', '%' . $term . '%');
    //     }) query for searching sa magkahiwalay na clolumn
}
