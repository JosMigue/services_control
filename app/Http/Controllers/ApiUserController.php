<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserCollection;

class ApiUserController extends Controller
{
    public function index(){
        $users = User::with('services')->where('role_id', 2)->get();
        return new UserCollection($users);
    }
}
