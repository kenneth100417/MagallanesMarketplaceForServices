<?php

namespace App\Livewire\Admin\Customers;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

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
        $customers = Customer::paginate(10);
        return view('livewire.admin.customers.index',['customers' => $customers]);
    }
}
