<?php

namespace App\Livewire\Admin\Customers;

use Livewire\Component;
use App\Models\Customer;
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

    public function block($customer_id){
        Customer::where('id',$customer_id)->update([
            'status' => '0'
        ]);
    }
    public function activate($customer_id){
        Customer::where('id',$customer_id)->update([
            'status' => '1'
        ]);
    }

    public function render()
    {
        $term = $this->key;
        $customers = Customer::where(function ($query) use ($term) {
                                $query->where('firstname', 'like', '%' . $term . '%')
                                    ->orWhere('lastname', 'like', '%' . $term . '%');
                                })
                                ->paginate(10);
        return view('livewire.admin.customers.index',['customers' => $customers]);
    }
}
