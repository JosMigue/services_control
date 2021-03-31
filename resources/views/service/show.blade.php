<x-app-layout>
    @section('title',__('Show service'))
    <x-slot name="header">
      <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show service') }}
        </h2>
        <x-danger-link href="{{url()->previous()}}"><i class="fa fa-arrow-left mx-1"></i>{{__('Go back')}}</x-danger-link>
      </div>
    </x-slot>
    <div class="py-12 transition-all">
      <div class="max-w-7xl mx-auto sm:px-6 ">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-8">
            <div class="flex justify-center">
                <div class="max-w-sm bg-white border-2 border-gray-300 p-6 rounded-md tracking-wide shadow-lg">
                    <div id="header" class="flex items-center mb-4"> 
                       <img alt="avatar" class="w-20 rounded-full border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                       <div id="header-text" class="leading-5 ml-6 sm">
                          <h4 id="name" class="text-xl font-semibold">{{$service->name}}</h4>
                          <h5 id="job" class="font-semibold text-blue-600">{{$service->user->name}}</h5>
                       </div>
                    </div>
                    <div id="quote">
                       <q class="italic text-gray-600">{{__('Created at')}}: {{$service->created_at->format('Y-m-d')}} / {{$service->created_at->diffForHumans()}}</q>
                    </div>
                 </div>
            </div>
        </div>
      </div>
    </div
</x-app-layout>