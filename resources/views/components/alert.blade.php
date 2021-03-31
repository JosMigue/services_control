@props(['icon', 'color'])
<div class="transition duration-150 ease-in-out bg-{{$color}}-200 text-{{$color}}-500 lg:px-6 lg:py-3 py-3 px-4 border-2 border-{{$color}}-400 rounded relative mb-4">
  <span class="text-md lg:text-xl inline-block lg:mr-5 align-middle">
    <i class="{{$icon}}"></i>
  </span>
  <span class="inline-block align-middle lg:mr-8 text-md lg:text-lg">
    <b class="capitalize">{{  $boldMessage }}</b> | {{  $message  }}
  </span>
  <button type="button" class="absolute bg-transparent text-md lg:text-2xl font-semibold leading-none right-0 top-0 lg:m-2 m-3 outline-none focus:outline-none" onclick="closeAlert(event)">
    <span class="flex align-center">×</span>
  </button>
</div>