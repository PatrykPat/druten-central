<x-admin-layout>
    

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="flex justify-end">
                    <a href="{{ route('admin.permissions.create')}}" class="px-4 py-2 bg-red-500 hover:bg-red-500 rounded-md">Create</a>
                </div>
                    <ul role="list" class="divide-y divide-gray-100">
                    <!-- {{ __("Admin Roles") }} -->
                </div>
                @foreach ($permissions as $permission)
                <li class="flex justify-between gap-x-6 py-5">
    <div class="flex min-w-0 gap-x-4">
      <!-- <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> -->
      <div class="min-w-0 flex-auto">
        
      </div>
    </div>
    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
      <p class="text-sm leading-6 text-gray-900">Permission:{{ $permission->name}} </p>
    </div>
    <td>
        <a href="">edit</a>
        <a href="">delete</a>
</td>

                @endforeach
                
                

            </div>
        </div>
    </div>
</x-app-layout>
