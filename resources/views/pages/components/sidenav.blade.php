<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucwords(str_replace('_', ' ', Route::currentRouteName())) }} | {{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>


<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
   <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <div id="profile" class="my-10">
                <img 
                src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg"
                alt="Profile {{ Auth::user()->name }}"
                class="h-20 w-20 rounded-full mx-auto border border-blue-500"/>
                <div>
                    <h2
                    class="font-medium text-sm md:text-md text-center text-blue-500"
                    >
                    {{ ucwords(Auth::user()->name) }}
                    </h2>
                    <p class="text-xs text-gray-500 text-center">{{ Auth::user()->role == 'admin' ? 'Administrator' : 'Users' }}</p>
                </div>
            </div>

      <ul class="space-y-2 font-medium">
         <li>
            <a href="{{route('dashboard')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group {{ Route::currentRouteName() == 'dashboard' ? 'bg-blue-500 text-white' : 'hover:bg-blue-500 hover:text-white hover:text-base' }}">
               <svg class="w-5 h-5 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                  <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
               </svg>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         
         <li>
            <a href="{{route('category')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group {{ Route::currentRouteName() == 'category' ? 'bg-blue-500 text-white' : 'hover:bg-blue-500 hover:text-white hover:text-base' }}">
               <svg class="w-5 h-5 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Category</span>
            </a>
         </li>
         <li>
            <a href="{{route('book')}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group {{ Route::currentRouteName() == 'book' ? 'bg-blue-500 text-white' : 'hover:bg-blue-500 hover:text-white hover:text-base' }}">
               <svg class="w-5 h-5 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                  <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">My Book</span>
            </a>
         </li>
         <li>
            <hr>
         </li>
         <li>
            <a href="/profile" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group {{ Route::currentRouteName() == 'profile' ? 'bg-blue-500 text-white' : 'hover:bg-blue-500 hover:text-white hover:text-base' }}">
               <svg class="w-6 h-6 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

               <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
            </a>
         </li>
         <li></li>
         <li>
            <form method="POST" action="{{ route('logout') }}">
            @csrf
                <a onclick="event.preventDefault();
                    this.closest('form').submit();" 
                    href="route('logout')" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white group {{ Route::currentRouteName() == 'signout' ? 'bg-blue-500 text-white' : 'hover:bg-blue-500 hover:text-white hover:text-base' }}">
                <svg class="w-5 h-5 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Sign Out</span>
                </a>
            </form>

         </li>
         
      </ul>
   </div>
</aside>

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 relative">
   <h1 class="font-bold text-2xl">{{ ucwords(str_replace('_', ' ', Route::currentRouteName())) }}</h1>
   <div class="mt-5 min-h-96 ">
       @yield('content')
    </div>

    <div class="absolute right-4 top-4 w-1/2">
        @include('pages.components.alert')
    </div>
   </div>
</div>




</body>
</html>