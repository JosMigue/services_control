<x-app-layout>
    @section('title',__('Update service'))
    <x-slot name="header">
      <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update service') }} : {{$service->name}}
        </h2>
        <x-danger-link href="{{url()->previous()}}"><i class="fa fa-arrow-left mx-1"></i>{{__('Go back')}}</x-danger-link>
      </div>
    </x-slot>
    <div class="py-12 transition-all">
      <div class="max-w-7xl mx-auto sm:px-6 ">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-8">
          <x-jet-validation-errors class="m-1"></x-jet-validation-errors>
          <form action="{{route('services.update', $service->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="flex flex-row justify-center">
              <div class="flex-col lg:w-1/2 md:1/2 w-full">
                <x-label-required for="name">{{__('Name')}}</x-label-required>
                <x-input type="text" name="name" id="name" value="{{$service->name}}"></x-input>
              </div>
            </div>
            <div class="flex flex-row justify-end my-2">
              <x-jet-button class="mx-1" type="sumbit">{{__('Update')}}</x-jet-button>
            </div>
          </form>
        </div>
      </div>
    </div>
</x-app-layout>