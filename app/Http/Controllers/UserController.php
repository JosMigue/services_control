<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
      return view('user.index');
    }

    
    public function show(User $user)
    {
      return view('user.show', compact('user'));
    }

    public function destroy(User $user)
    {
      if($user->delete()){
        return json_encode(array('code' => 200, 'message' => __('User deleted successfully')));
      }else{
        return json_encode(array('code' => 500, 'message' => __('Something went wrong, try again later')));
      }
    }
}
