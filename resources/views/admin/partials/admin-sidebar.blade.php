<nav class="fixed top-0 z-50 w-full bg-rfg-background">
   <div class="">
      <div class="">
      @include('navbar.admin_navbar')
      </div>
   </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full sm:translate-x-0 bg-white drop-shadow-md" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white drop-shadow-md">
      <ul class="space-y-2 font-medium">

         <li>
            <a href="/dashboard" class="@if(request()->is('dashboard')) bg-orange-400 text-white hover:bg-orange-400 hover:text-white @endif text-black flex items-center p-2 rounded-lg hover:bg-gray-300 group">
               <svg class="@if(request()->is('dashboard')) text-white @endif w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M15.985 8.5H8.207l-5.5 5.5a8 8 0 0 0 13.277-5.5zM2 13.292A8 8 0 0 1 7.5.015v7.778zM8.5.015V7.5h7.485A8 8 0 0 0 8.5.015"/>
               </svg>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         
         <li>
            <a href="/admin/categories" class="@if(request()->is('admin/categories')) bg-orange-400 text-white hover:bg-orange-400 hover:text-white @endif flex items-center p-2 rounded-lg text-black hover:bg-gray-300 group">
               <svg class="@if(request()->is('admin/categories')) text-white @endif w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                  <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043z"/>
                </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Categories</span>
            </a>
         </li>

         <li>
            <a href="/admin/products" class="@if(request()->is('admin/products')) bg-orange-400 text-white hover:bg-orange-400 hover:text-white @endif flex items-center p-2 rounded-lg text-black hover:bg-gray-300 group">
               <svg class="@if(request()->is('admin/products')) text-white @endif w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 18">
                  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z"/>
               </svg>
                  
               <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
            </a>
         </li>

         <li>
            <a href="/admin/inventory" class="@if(request()->is('admin/inventory')) bg-orange-400 text-white hover:bg-orange-400 hover:text-white @endif flex items-center p-2 rounded-lg text-black hover:bg-gray-300 group">
               <svg class="@if(request()->is('admin/inventory')) text-white @endif w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z"/>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Inventory</span>
            </a>
         </li>
         <li>
            <a href="/admin/orders" class="@if(request()->is('admin/orders')) bg-orange-400 text-white hover:bg-orange-400 hover:text-white @endif flex items-center p-2 rounded-lg text-black hover:bg-gray-300 group">
               <svg class="@if(request()->is('admin/orders')) text-white @endif w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1"/>
               </svg>
            <span class="flex-1 ms-3 whitespace-nowrap">Orders</span>
            </a>
         </li>
         <li>
            <a href="/admin/delivery" class="@if(request()->is('admin/delivery')) bg-orange-400 text-white hover:bg-orange-400 hover:text-white @endif flex items-center p-2 rounded-lg text-black hover:bg-gray-300 group">
               <svg class="@if(request()->is('admin/delivery')) text-white @endif w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="1.4066 40.9658 252.9 173.776">
                  <circle cx="77.89" cy="68.42" r="7.5" transform="matrix(2.809999942779541, 0, 0, 2.809999942779541, 1.4065934419631956, 1.40659344196321)"></circle>
                  <circle cx="21.47" cy="68.42" r="7.5" transform="matrix(2.809999942779541, 0, 0, 2.809999942779541, 1.4065934419631956, 1.40659344196321)"></circle>
                  <path d="M 89.813 50.305 L 78.995 37.925 L 74.31 32.655 C 73.851 32.138 73.192 31.843 72.501 31.843 L 57.176 31.843 L 57.176 20.792 
                  C 57.174 17.084 54.735 14.078 51.727 14.078 L 5.448 14.078 C 2.439 14.078 0 17.084 0 20.792 L 0 65.529 C 0 67.317 1.176 68.766 2.626 68.766 
                  L 8.296 68.766 L 9.061 68.766 L 10.749 68.766 C 10.745 68.651 10.732 68.538 10.732 68.422 C 10.732 62.5 15.55 57.683 21.471 57.683 
                  C 27.392 57.683 32.21 62.5 32.21 68.422 C 32.21 68.538 32.196 68.651 32.193 68.766 L 35.728 68.766 L 57.174 68.766 L 57.174 68.767 L 64.993 68.767 
                  L 67.169 68.767 C 67.165 68.652 67.152 68.539 67.152 68.423 C 67.152 62.501 71.969 57.684 77.891 57.684 C 83.813 57.684 88.63 62.501 88.63 68.423 
                  C 88.63 68.456 88.625 68.488 88.625 68.521 C 89.436 68.129 90 67.306 90 66.346 L 90 51.226 C 90 50.906 89.932 50.595 89.813 50.305 Z M 69.74 50.305 
                  C 68.544 50.305 67.575 49.336 67.575 48.14 L 67.575 40.09 C 67.575 38.895 68.544 37.925 69.74 37.925 L 76.342 37.925 L 86.622 50.305 L 69.74 50.305 Z" 
                  transform="matrix(2.809999942779541, 0, 0, 2.809999942779541, 1.4065934419631956, 1.40659344196321)" stroke-linecap="round"></path>
               </svg>
               <span class="flex-1 ms-3 whitespace-nowrap">Delivery</span>
            </a>
         </li>
      </ul>
   </div>
</aside>