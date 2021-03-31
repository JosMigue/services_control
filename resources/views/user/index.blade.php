<x-app-layout>
    @section('title',__('Users'))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12 transition-all">
      <div class="max-w-7xl mx-auto sm:px-6 ">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-8 py-8">
          @livewire('data-table-users')
        </div>
      </div>
    </div>
    @section('scripts')
      <script src="{{asset('js/utils/sweetalert.js')}}" defer></script>
      <script src="{{asset('js/utils/event-listeners.js')}}" defer></script>
      <script src="{{asset('js/user/delete.js')}}" defer></script>
    @endsection
</x-app-layout>