<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\SaveServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
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
      return view('service.show', compact('service'));
    }

    public function edit(Service $service)
    {
      return view('service.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
      if($service->update($request->validated())){
        return redirect()->route('services.index')->with('successMessage', __('Service udpated successfully'));
      }else{
        return redirect()->route('services.index')->with('errorMessage', __('Something went wrong, try again later.'));
      }
    }

    public function destroy(Service $service)
    {
      if($service->delete()){
        return json_encode(array('code' => 200, 'message' => __('Service deleted successfully')));
      }else{
        return json_encode(array('code' => 500, 'message' => __('Something went wrong, try again later')));
      }
    }
}
