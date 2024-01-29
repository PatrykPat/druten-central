<x-admin-layout>
    

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-2">
                    <a href="{{ route('admin.users.index')}}" class="px-4 py-2 bg-red-500 test-slate-100 hover:bg-red-500 rounded-md">roles</a>
                </div>
                <div class="p-6 text-gray-900">
                    <ul role="list" class="divide-y divide-gray-100">
                </div>
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
  <form method="POST" action="{{ route('admin.users.store')}}">
    @csrf
    <div class="sm:col-span-6">
      <label for="name" class="block text-sm font-medium text-gray-700"> naam: </label>
      <div class="mt-1">
        <input type="text" id="name" name="name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
    </div>
      </div>
      @error('name') <span class="text-red-400 text-sm">{{ $message}}</span> @enderror
      </div>
    <div class="sm:col-span-6">
      <label for="email" class="block text-sm font-medium text-gray-700"> email: </label>
      <div class="mt-1">
        <input type="text" id="email" name="email" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
        </div>
        <div class="sm:col-span-6">
                <label for="role_id" class="block text-sm font-medium text-gray-700">Select Role:</label>
                <div class="mt-1">
                <select id="role_id" name="role_id" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
    @foreach($roles as $role)
        <option value="{{ $role->id }}">{{ $role->name }}</option>
    @endforeach
</select>
                </div>
                @error('role_id') <span class="text-red-400 text-sm">{{ $message}}</span> @enderror
            </div>
      @error('email') <span class="text-red-400 text-sm">{{ $message}}</span> @enderror
      </div>
      <div class="sm:col-span-6">
      <label for="password" class="block text-sm font-medium text-gray-700"> password: </label>
      <div class="mt-1">
        <input type="text" id="password" name="password" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
        </div>
      @error('password') <span class="text-red-400 text-sm">{{ $message}}</span> @enderror
      </div>
      <div class="sm:col-span-6">
      <label for="postcode" class="block text-sm font-medium text-gray-700"> postcode: </label>
      <div class="mt-1">
        <input type="text" id="postcode" name="postcode" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
        </div>
      @error('postcode') <span class="text-red-400 text-sm">{{ $message}}</span> @enderror
      </div>
      
    
    <div class="sm:col-span-6 pt-5">
      <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-300 routed-md">create</button>
    </div>
  </form>
</div>


            </div>
        </div>
    </div>
</x-app-layout>
