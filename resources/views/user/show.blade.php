<x-app-layout>
    @section('title',__('Show user'))
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Show user') }}
            </h2>
            <x-danger-link href="{{url()->previous()}}"><i class="fa fa-arrow-left mx-1"></i>{{__('Go back')}}</x-danger-link>
        </div>
    </x-slot>
    <div class="py-12 transition-all">
      <div class="max-w-7xl mx-auto sm:px-6 ">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-8">
          <div class="text-gray-700">
              <div class="grid md:grid-cols-2 text-sm px-2 mx-2">
                <div class="grid grid-cols-2">
                  <div class="px-4 py-2 font-semibold">{{__('Name')}}:</div>
                  <div class="px-4 py-2">{{$user->name}}</div>
                </div>
                <div class="grid grid-cols-2">
                  <div class="px-4 py-2 font-semibold">{{__('E-Mail Address')}}:</div>
                  <div class="px-4 py-2">{{$user->email}}</div>
                </div>
                <div class="grid grid-cols-2">
                  <div class="px-4 py-2 font-semibold">{{__('Age')}}:</div>
                  <div class="px-4 py-2">{{$user->age}}</div>
                </div>
                <div class="grid grid-cols-2">
                  <div class="px-4 py-2 font-semibold">{{__('Gender')}}:</div>
                  <div class="px-4 py-2">{{$user->gender}}</div>
                </div>
                <div class="grid grid-cols-2">
                  <div class="px-4 py-2 font-semibold">{{__('Created at')}}:</div>
                  <div class="px-4 py-2">{{$user->created_at->format('Y-m-d')}}</div>
                </div>
              </div>
            </div>
            <div class="my-4">
              @if ($user->services->count() > 0)
                <p class="text-center">{{__('Services')}}</p>
                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1">
                  @foreach ($user->services as $service)
                    <div>
                      <div class="max-w-sm bg-white border-2 border-gray-300 p-6 rounded-md tracking-wide shadow-lg">
                        <div class="flex items-center mb-4"> 
                        <img class="w-20 rounded-full border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div class="leading-5 ml-6 sm">
                          <h4 class="text-xl font-semibold">{{$service->name}}</h4>
                          <h5 class="font-semibold text-blue-600">{{$service->user->name}}</h5>
                        </div>
                        </div>
                        <div>
                          <q class="italic text-gray-600">{{__('Created at')}}: {{$service->created_at->format('Y-m-d')}} / {{$service->created_at->diffForHumans()}}</q>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              @else 
                  <p class="text-center">{{__('This user has not services.')}}</p>
              @endif
            </div>
        </div>
      </div>
    </div>
    @section('scripts')
      <script src="{{asset('js/utils/sweetalert.js')}}" defer></script>
      <script src="{{asset('js/utils/event-listeners.js')}}" defer></script>
      <script src="{{asset('js/user/delete.js')}}" defer></script>
    @endsection
</x-app-layout>