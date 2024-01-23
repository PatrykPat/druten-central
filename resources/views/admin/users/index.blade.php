<x-admin-layout>
    

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="flex justify-end">
                    <a href="{{ route('admin.users.create')}}" class="px-4 py-2 bg-red-500 hover:bg-red-500 rounded-md">Create</a>
                </div>
                    <ul role="list" class="divide-y divide-gray-100">
                </div>
                @foreach ($users as $user)
    <li class="flex justify-between gap-x-6 py-5">
        <div class="flex min-w-0 gap-x-4">
            <!-- Your user avatar or information here -->
            <div class="min-w-0 flex-auto">
                <!-- User information display -->
                <p class="text-sm leading-6 text-gray-900">user: {{ $user->name}} </p></br>
            </div>
        </div>
        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            @if ($user->roles->isNotEmpty())
                @foreach ($user->roles as $role)
                    <!-- Loop over roles for the current user -->
                    <p class="text-sm leading-6 text-gray-900">roles: {{ $role->name }} </p></br>
                @endforeach
            @else
                <p class="text-sm leading-6 text-gray-900">No roles assigned</p>
            @endif
        </div>
        <td>
            <a href="#">edit</a>
            <a href="#">delete</a>
        </td>
    </li>
@endforeach
                
                

            </div>
        </div>
    </div>
</x-app-layout>
