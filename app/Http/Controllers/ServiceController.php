<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\SaveServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    public function index()
    {
      return view('service.index');
    }

    public function create()
    {
      return view('service.create');
    }

    public function store(SaveServiceRequest $request)
    {
        $data[] = ['name' => $request->validated()['name'], 'status' => 1];
        if(Auth::user()->services()->createMany($data)){
            return redirect()->route('services.index')->with('successMessage', __('Service added successfully'));
        }else{
            return redirect()->route('services.index')->with('errorMessage', __('Something went wrong, try again later.'));
        }
    }

    public function show(Service $service)
    {
        //
    }

    public function edit(Service $service)
    {
        //
    }

    public function update(Request $request, Service $service)
    {
        //
    }

    public function destroy(Service $service)
    {
        //
    }
}
