<?php

namespace App\Http\Livewire;

use App\Models\User;

use Livewire\Component;

class DataTableUsers extends Component
{
    public $search = '';
    public $perPage = 5;
    public $status = '';

    public $queryString = ['search'=> ['except' => ''], 'perPage' => ['except' => 5], 'status'=> ['except' => '']];
    
    protected $listeners = ['UserDeletedEvent' => '$refresh'];

    public function render()
    {
        $users = User::where('role_id', '!=',1)
        ->when($this->status != '', function($query){
            return $query->where('status', $this->status);           
        })
        ->when($this->search != '', function($query){
            return $query->where('name', 'LIKE', '%'.$this->search.'%')->Orwhere('email', 'LIKE', '%'.$this->search.'%');           
        })
        ->with('services')->paginate($this->perPage);
        return view('livewire.data-table-users', compact('users'));
    }

    public function changeUserStatus(User $user, $status){
        $user->update(['status' => $status]);
        $this->emit('statusChangedUserEvent', __('Status changed.'));
    }

    public function resetFilters(){
        $this->search = '';
        $this->perPage = 5;
        $this->status = '';
    }
}
