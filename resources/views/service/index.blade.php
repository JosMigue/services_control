<x-app-layout>
    @section('title',__('Services'))
    <x-slot name="header">
      <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Services') }}
        </h2>
        <x-link href="{{route('services.create')}}">{{__('Add')}} <i class="fa fa-plus mx-1"></i></x-link>
      </div>
    </x-slot>
    <div class="py-12 transition-all">
      <div class="max-w-7xl mx-auto sm:px-6 ">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-8">
          <x-session-messages></x-session-messages>
          @livewire('data-table-services')
        </div>
      </div>
    </div>
    @section('scripts')
      <script src="{{asset('js/utils/sweetalert.js')}}" defer></script>
      <script src="{{asset('js/service/delete.js')}}" defer></script>
    @endsection
</x-app-layout>