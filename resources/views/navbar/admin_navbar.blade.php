<nav class="bg-orange-400 z-50">
  <div class="flex flex-wrap items-center mx-auto p-2.5">
      <div class="flex items-center justify-start rtl:justify-end">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-white rounded-lg sm:hidden hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-white dark:text-white dark:hover:bg-orange-500 dark:focus:ring-white">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
          </button>
      </div>
      <div>
        <a href="/" class="pl-5 flex space-x-3 rtl:space-x-reverse pr-8">
            <img src="/Img/logo1.png" class="h-12 w-12" alt="RFG Logo" />
        </a>
      </div>
      <div class="relative hidden md:block w-7/12">
          <!-- Search form for larger screens -->
          <form action="{{ route('search') }}">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                  </svg>
                  <span class="sr-only">Search icon</span>
              </div>
              <input name="search" type="search" id="search-navbar" class="block w-full p-2.5 ps-10 text-sm text-gray-900 border border-orange-200 rounded-lg bg-orange-200 focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
          </form>
      </div>
      <div class="flex md:order-2 ml-auto">
          <!-- Toggle button for small screens -->
          <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-white hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-white rounded-lg text-sm p-2.5 me-1">
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
              <span class="sr-only">Search</span>
          </button>
          <!-- Menu button for small screens -->
          <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-white" aria-controls="navbar-search" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
              </svg>
          </button>
      </div>
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 ml-auto" id="navbar-search">
          <!-- Search form for smaller screens -->
          <form action="{{ route('search') }}">
              <div class="relative mt-3 md:hidden">
                  <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                      <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                      </svg>
                  </div>
                  <input name="search" type="search" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
              </div>
          </form>
          <!-- Navigation links for smaller screens -->
          <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-orange-400">
              <li>
                  <a href="/" class="block py-2 px-3 text-white rounded hover:bg-orange-300 md:bg-transparent md:p-0 md:dark:hover:text-orange-500" aria-current="page">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                  </a>
              </li>
              <li>
                  <a href="#" class="block py-2 px-3 text-white rounded hover:bg-orange-300 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-orange-500 md:dark:hover:bg-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                  </a>
              </li>
              <li>
                  <a href="#" class="block py-2 px-3 text-white rounded hover:bg-orange-300 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-orange-500 md:dark:hover:bg-transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                  </a>
              </li>
              <!-- User dropdown for authenticated users -->
              @if (Auth::user()!=null)
                  <li>
                      <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0 md:w-auto dark:text-white md:dark:hover:text-orange-500 dark:focus:text-white dark:border-orange-600 dark:hover:bg-orange-500 md:dark:hover:bg-transparent">
                          {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                          <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                          </svg>
                      </button>
                      <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-white rounded-lg shadow w-44 dark:bg-orange-600 dark:divide-white">
                          <ul class="py-2 text-sm text-white dark:text-white" aria-labelledby="dropdownLargeButton">
                              <li>
                                  <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-orange-400 dark:hover:bg-orange-400 dark:hover:text-white">Dashboard</a>
                              </li>
                          </ul>
                          <div class="py-1">
                              <form method="POST" action="{{ route('logout') }}">
                                  @csrf
                                  <a class="block px-4 py-2 text-sm text-white hover:bg-orange-400 dark:hover:bg-orange-400 dark:text-white dark:hover:text-white">
                                      <input type="submit" value="Sign out">
                                  </a>
                              </form>
                          </div>
                      </div>
                  </li>
              @else
                  <!-- Login link for non-authenticated users -->
                  <li>
                      <a href="{{ route('login') }}" class="block py-2 px-3 text-white rounded md:bg-transparent md:p-0 md:dark:hover:text-orange-500" aria-current="page">Login</a>
                  </li>
              @endif
          </ul>
      </div>
  </div>
</nav>
