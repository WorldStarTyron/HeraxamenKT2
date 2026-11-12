
<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="text-gray-900 bg-transparent box-border border border-transparent hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium leading-5 rounded-lg ms-3 mt-3 text-sm p-2 focus:outline-none inline-flex sm:hidden">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
      <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10"/>
   </svg>
</button>

<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 border-e border-gray-200 flex flex-col justify-between">
      <ul class="space-y-2 font-medium">
      
         <li>
            <a href="{{route('Homepagina.index')}}" class="flex items-center px-2 py-1.5 text-gray-600 rounded-lg hover:bg-gray-100 hover:text-blue-600 group">
               <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10.5 12 3l9 7.5M5 9.5V20a1 1 0 0 0 1 1h4v-6h4v6h4a1 1 0 0 0 1-1V9.5"/></svg>
               <span class="ms-3">Homepagina</span>
            </a>
         </li>
         <li>
            <a href="" class="flex items-center px-2 py-1.5 text-gray-600 rounded-lg hover:bg-gray-100 hover:text-blue-600 group">
               <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 19v-1.5a3.5 3.5 0 0 0-3.5-3.5h-5A3.5 3.5 0 0 0 4 17.5V19m6-8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm10 8v-1.5a3.5 3.5 0 0 0-2.5-3.35M15.5 4.15a3.5 3.5 0 0 1 0 6.7"/></svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Klanten</span>
               <span class="inline-flex items-center justify-center w-5 h-5 ms-2 text-xs font-medium text-red-700 bg-red-100 border border-red-200 rounded-full">0</span>
            </a>
         </li>
         <li>
            <a href="" class="flex items-center px-2 py-1.5 text-gray-600 rounded-lg hover:bg-gray-100 hover:text-blue-600 group">
               <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5h16a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm4 15h8m-4-4v4"/></svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Beurten</span>
               <span class="inline-flex items-center justify-center w-5 h-5 ms-2 text-xs font-medium text-red-700 bg-red-100 border border-red-200 rounded-full">0</span>
            </a>
         </li>
         <li>
            <a href="" class="flex items-center px-2 py-1.5 text-gray-600 rounded-lg hover:bg-gray-100 hover:text-blue-600 group">
               <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0ZM12 9v4m0 4h.01"/></svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Afspraken</span>
               <span class="inline-flex items-center justify-center w-5 h-5 ms-2 text-xs font-medium text-red-700 bg-red-100 border border-red-200 rounded-full">0</span>
            </a>
         </li>
         
       
       @guest
         <li>
            <a href="{{route('Auth.Register')}}" class="flex items-center px-2 py-1.5 text-gray-600 rounded-lg hover:bg-gray-100 hover:text-blue-600 group">
               <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 19v-1.5a3.5 3.5 0 0 0-3.5-3.5h-5A3.5 3.5 0 0 0 4 17.5V19m6-8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm4.5-2V7m0 0V4.5m0 2.5H18m-4.5 0H11"/></svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Register</span>
            </a>
         </li>
         <li>
            <a href="{{route('login')}}" class="flex items-center px-2 py-1.5 text-gray-600 rounded-lg hover:bg-gray-100 hover:text-blue-600 group">
               <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4m-5-4 5-5-5-5m5 5H3"/></svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Login</span>
            </a>
         </li>
         @endguest
   
      </ul>


      <div class="border-t border-gray-200 pt-4">
         <form action="" method="POST">
            @csrf
            <button type="submit" class="flex items-center w-full px-2 py-1.5 text-gray-600 rounded-lg hover:bg-gray-100 hover:text-red-600 group">
               <svg class="shrink-0 w-5 h-5 transition duration-75 group-hover:text-red-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
               <span class="ms-3">Uitloggen</span>
            </button>
         </form>
      </div>
 
   
   </div>
</aside>
