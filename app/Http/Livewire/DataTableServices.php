<?php

namespace App\Http\Livewire;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class DataTableServices extends Component
{
    public $search = '';
    public $perPage = 5;
    public $status = '';

    public $queryString = ['search'=> ['except' => ''], 'perPage' => ['except' => 5], 'status'=> ['except' => '']];
    
    protected $listeners = ['ServiceDeletedEvent' => '$refresh'];

    public function render()
    {
        $services = Service::where('user_id', Auth::user()->id)
        ->when($this->status != '', function($query){
            return $query->where('status', $this->status);
        })
        ->where('name', 'LIKE', '%'.$this->search.'%')
        ->with('user')->paginate($this->perPage);
        return view('livewire.data-table-services', compact('services'));
    }

    public function changeServiceStatus(Service $service, $status){
        $service->update(['status' => $status]);
        $this->emit('statusChangedServiceEvent', __('Status changed.'));
    }

    public function resetFilters(){
        $this->search = '';
        $this->perPage = 5;
        $this->status = '';
    }

}
