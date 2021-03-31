<div>
  <div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
      <div class="my-2 flex sm:flex-row flex-col">
        <div class="flex flex-row mb-1 sm:mb-0">
          <div class="relative">
            <select class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="perPage">
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="20">20</option>
            </select>
          </div>
          <div class="relative">
            <select class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="status">
              <option value="">{{__('All')}}</option>
              <option value="1">{{__('Enabled')}}</option>
              <option value="0">{{__('Disabled')}}</option>
            </select>
          </div>
        </div>
        <div class="block relative">
          <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2 text-gray-500">
            <i class="fa fa-search"></i>
          </span>
          <input placeholder="{{__('Search')}}" class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" wire:model="search"/>
        </div>
        <div class="block relative">
          @if ($search != '' || $status != '' || $perPage != 5)
            <button class="bg-gray-200 border-1 border-gray-500 font-thin text-gray-800 uppercase rounded py-2 px-4" wire:click="resetFilters"><i class="fa fa-times"></i></button>
          @endif
        </div>
      </div>
      <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
          <table class="min-w-full leading-normal">
            <thead>
              <tr>
                <th class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  {{__('Name')}}
                </th>
                <th class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  {{__('Status')}}
                </th>
                <th class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  {{__('Age')}}
                </th>
                <th class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  {{__('Gender')}}
                </th>
                <th class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  {{__('Created at')}}
                </th>
                <th class="px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  {{__('Services')}}
                </th>
                <th class=" w-36 px-4 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  {{__('Action')}}
                </th>
              </tr>
            </thead>
            <tbody>
              @if ($users->count() > 0 )
                @foreach ($users as $user)
                  <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                    <td class="px-4 py-5 text-sm">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                          <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{$user->name}}" alt="{{$user->name}}">
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{$user->name}}
                          </div>
                          <div class="text-sm text-gray-500">
                            {{$user->email}}
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-5  text-sm w-34">
                      <div class="overflow-x-auto flex">
                        @if ($user->status)
                          <span class="inline-block rounded-full text-white bg-green-500 px-2 py-1 text-xs font-bold mr-3">{{__('Enabled')}}</span> 
                        @else
                          <span class="inline-block rounded-full text-white bg-red-500 px-2 py-1 text-xs font-bold mr-3">{{__('Disabled')}}</span>
                        @endif
                      </div>
                    </td>
                    <td class="px-4 py-5 text-sm w-34">
                      <div class="overflow-x-auto flex">
                        <p class="text-gray-900 whitespace-no-wrap">{{$user->age}}</p>
                      </div>
                    </td>
                    <td class="px-4 py-5  text-sm w-34">
                      <div class="overflow-x-auto flex w-34">
                        <p class="text-gray-900 whitespace-no-wrap">{{$user->gender}}</p>
                      </div>
                    </td>
                    <td class="px-4 py-5  text-sm w-34">
                      <div class="overflow-x-auto flex w-34">
                        <p class="text-gray-900 whitespace-no-wrap">{{$user->created_at->format('Y-m-d')}}</p>
                      </div>
                    </td>
                    <td class="px-4 py-5  text-sm w-34">
                      <div class="overflow-x-auto flex w-34">
                        <p class="text-gray-900 whitespace-no-wrap">{{$user->services()->count()}}</p>
                      </div>
                    </td>
                    <td class="px-5 py-5 text-sm flex align-center hidden md:hidden lg:block w-36">
                      <x-user-dropdown user="{{$user->id}}" status="{{$user->status}}"></x-user-dropdown>
                    </td>
                    <td class="px-5 py-5 text-sm flex align-center block md:block lg:hidden w-36">
                      <div class="overflow-x-auto flex">
                        <div class="p-2 w-36 ">
                          <a href="{{route('users.show', $user->id)}}" class="flex items-center p-4 bg-blue-200 rounded-lg shadow-xs cursor-pointer hover:bg-blue-500 hover:text-gray-100">                            
                            <i class="fa fa-eye"></i>
                            <div>
                              <p class=" text-xs font-medium ml-2 ">
                                {{__('Show')}}
                              </p>
                            </div>
                          </a>
                        </div>
                        <div class="p-2 w-36 ">
                          <button onclick="deleteUser({{$user->id}})" class="flex items-center p-4 bg-red-200 rounded-lg shadow-xs cursor-pointer hover:bg-red-500 hover:text-gray-100">
                            <i class="fa fa-trash"></i>
                            <div>
                              <p class=" text-xs font-medium ml-2 ">
                                {{__('Delete')}}
                              </p>
                            </div>
                          </button>
                        </div>
                        <div class="p-2 w-36 ">
                          @if ($user->status)
                            <button wire:click="changeUserStatus({{$user->id}},0)" class="flex items-center p-4 bg-red-200 rounded-lg shadow-xs cursor-pointer hover:bg-red-500 hover:text-gray-100">
                              <i class="fas fa-exchange-alt"></i>
                              <div>
                                <p class=" text-xs font-medium ml-2 ">
                                  {{__('Change status')}}
                                </p>              
                              </div>
                            </button>
                          @else
                            <button wire:click="changeUserStatus({{$user->id}},1)" class="flex items-center p-4 bg-green-200 rounded-lg shadow-xs cursor-pointer hover:bg-green-500 hover:text-gray-100">
                              <i class="fas fa-exchange-alt"></i>
                              <div>
                                <p class=" text-xs font-medium ml-2 ">
                                  {{__('Change status')}}
                                </p>              
                              </div>
                            </button>
                          @endif
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              @else
                @if ($search != '')
                  <td class="px-5 py-5 text-sm"  colspan="10">
                    <p class="text-gray-900 whitespace-no-wrap text-center">{{__('There is not nothing to show for search')}} "{{$search}}"</p>
                  </td>
                @else
                  <td class="px-5 py-5 text-sm"  colspan="10">
                    <p class="text-gray-900 whitespace-no-wrap text-center">{{__('There is not nothing to show')}}</p>
                  </td>
                @endif
              @endif
            </tbody>
          </table>
        </div>
      </div>
      <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
        {{$users->links()}}
      </div>
    </div>
  </div>
</div>
