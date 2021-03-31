@props(['icon', 'color'])
<div class="w-full text-white bg-{{$color}}-500">
  <div class="container flex items-center justify-between px-6 py-4 mx-auto">
      <div class="flex">
        <i class="{{$icon}}"></i>
        <p class="mx-3">{{$message}}</p>
      </div>
      <button class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none" onclick="closeAlert(event)">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
      </button>
  </div>
</div>