@props(['service', 'status'])
<div x-data="{ dropdownOpen: false }" @click.away="dropdownOpen = false">
  <div>
    <button  @click="dropdownOpen = !dropdownOpen" type="button" class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" id="options-menu" aria-haspopup="true" aria-expanded="true">
      <i class="fa fa-cog"></i>
    </button>
  </div>
  <div x-show.transition.origin.right="dropdownOpen" class="absolute mt-2 w-36 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5" >
    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
      <a href="{{route('services.edit', $service)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 " role="menuitem"> <i class="fas fa-edit mx-1"></i> {{__('Edit')}}</a>
      @if ($status == 1)
        <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100  focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem" wire:click="changeServiceStatus({{$service}},0)"> <i class="fa fa-times mx-1"></i>{{__('Disable')}}</button>  
      @else
        <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100  focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem" wire:click="changeServiceStatus({{$service}},1)"> <i class="fa fa-check mx-1"></i>{{__('Enable')}}</button>  
      @endif
      <a href="{{route('services.show', $service)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem"> <i class="fa fa-eye mx-1"></i>{{__('Show')}}</a>
      <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-red-200  focus:outline-none focus:bg-gray-100 focus:text-gray-900 border-1 border-red-200" role="menuitem" onclick="deleteService({{$service}})">
        <i class="fa fa-trash-alt mx-1"></i> {{__('Delete')}} 
      </button>
    </div>
  </div>
</div>