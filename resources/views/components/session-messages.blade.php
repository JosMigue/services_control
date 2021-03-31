@if (session('successMessage'))
<x-alert icon="fa fa-check" color="green">
  <x-slot name="message">
    {{session('successMessage')}}
  </x-slot>
</x-alert>
@endif
@if (session('errorMessage'))
<x-alert icon="fa fa-times" color="red">
  <x-slot name="message">
    {{session('errorMessage')}}
  </x-slot>
</x-alert>
@endif
@if (session('infoMessage'))
<x-alert icon="fa fa-info" color="blue">
  <x-slot name="message">
    {{session('infoMessage')}}
  </x-slot>
</x-alert>
@endif