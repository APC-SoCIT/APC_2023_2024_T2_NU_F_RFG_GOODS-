<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <script src="https://cdn.tailwindcss.com"></script>
   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
   @vite('resources/css/app.css')
   <?php
      $rfg_canvas = '#FFFFFF';
   ?>
</head>
<body class="bg-gray-100">
   @include('admin.partials.admin-sidebar')

   <div class="p-4 sm:ml-64">
      <div class="mt-16">

         {{-- First Column Start --}}

         <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4 ">
            <div class="flex items-center justify-between p-1 h-52 rounded-2xl bg-white drop-shadow-md">
               <div class="flex w-2/4 justify-end">
                  <p class="text-rfg-accent h-24 w-24" >
                     <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
                        <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
                     </svg>
                  </p>
               </div>
               <div class="flex flex-col text-center gap-1 w-full">
                  <div class="h-3"></div>
                  <p class="font-mono text-black text-5xl font-bold">5</p>
                  <p class="text-black text-lg">NEW ORDERS</p>
                  <div class="flex justify-center text-center items-end gap-1 text-red-600">
                     <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                     </svg>
                  <p class="font-mono text-red-600 text-base">-2.00%</p>
               </div>
               </div>
            </div>
            <div class="flex items-center justify-between p-1 h-52 rounded-2xl bg-white drop-shadow-md">
               <div class="flex w-2/4 justify-end">
                  <p class="text-rfg-accent h-24 w-24" >
                     <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-piggy-bank-fill" viewBox="0 0 16 16">
                        <path d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069q0-.218-.02-.431c.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a1 1 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.74.74 0 0 0-.375.562c-.024.243.082.48.32.654a2 2 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595m7.173 3.876a.6.6 0 0 1-.098.21l-.044-.025c-.146-.09-.157-.175-.152-.223a.24.24 0 0 1 .117-.173c.049-.027.08-.021.113.012a.2.2 0 0 1 .064.199m-8.999-.65a.5.5 0 1 1-.276-.96A7.6 7.6 0 0 1 7.964 3.5c.763 0 1.497.11 2.18.315a.5.5 0 1 1-.287.958A6.6 6.6 0 0 0 7.964 4.5c-.64 0-1.255.09-1.826.254ZM5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0"/>
                     </svg>
                  </p>
               </div>
               <div class="flex flex-col text-center gap-1 w-full">
                  <div class="h-3"></div>
                  <p class="font-mono text-black text-5xl font-bold">₱13,000</p>
                  <p class="text-black text-lg">TOTAL REVENUE</p>
                  <div class="flex justify-center text-center gap-1 text-green-600">
                     <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                     </svg>
                     <p class="font-mono text-green-600 text-base">+2.00%</p>
                  </div>
               </div>
            </div>
            <div class="flex items-center justify-between p-1 h-52 rounded-2xl bg-white drop-shadow-md">
               <div class="flex w-2/4 justify-end">
                  <p class="text-rfg-accent h-24 w-24" >
                     <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                     </svg>
                  </p>
               </div>
               <div class="flex flex-col text-center gap-1 w-full">
                  <div class="h-3"></div>
                  <p class="font-mono text-black text-5xl font-bold">1</p>
                  <p class="text-black text-lg">NEW RATINGS</p>
                  <div class="flex justify-center text-center items-center gap-1 text-green-600">
                     <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                     </svg>
                     <p class="font-mono text-green-600 text-base">+2.00%</p>
                  </div>
               </div>
            </div>
         </div>

         {{-- First Column End --}}

         {{-- Second Column Start --}}

         <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="flex flex-col items-center h-[22rem] rounded-2xl bg-white drop-shadow-md p-5">
               <p class="text-left w-full text-xl text-black mb-4">UPCOMING DELIVERIES</p>
               <div class="w-full flex flex-col items-center justify-end h-full gap-4 text-rfg-text">
                  <div class="flex flex-col w-full bg-gray-200 p-4 gap-2 rounded-2xl">
                     <p class="w-full text-center text-lg font-bold text-black">TODAY</p>
                     <hr class="border-black">

                     <script>
                        function changeBackgroundColor(element) {
                           document.getElementById(element).style.backgroundColor = '<?php echo $rfg_canvas;?>';
                        }
                        
                        function resetBackgroundColor(element) {
                           document.getElementById(element).style.backgroundColor = '';
                        }
                     </script>

                     <div id="container.list.usernamest" class="flex justify-between gap-2 rounded-lg">
                        <div id="container.usernamest" class="flex flex-col w-full justify-between text-lg">
                           <div class="flex h-full w-full hover:bg-white pl-2 rounded-lg">
                              <a href="" class="flex items-center h-full w-full">
                                 <p id="ordernumber1" class="text-black">Order Number</p>
                              </a>
                              <button class="hover:bg-rfg-accent hover:text-rfg-text h-full padding-top: 100% px-2 rounded-lg">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-copy" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                                 </svg>
                              </button>
                           </div>
                           <div class="flex h-full w-full hover:bg-white pl-2 rounded-lg">
                              <a href="" class="flex items-center h-full w-full">
                                 <p id="ordernumber2" class="text-black">Order Number</p>
                              </a>
                              <button class="hover:bg-rfg-accent hover:text-rfg-text h-full padding-top: 100% px-2 rounded-lg">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-copy" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                                 </svg>
                              </button>
                           </div>
                        </div>
                        <div id="container.date" class="rounded-lg px-1 hover:bg-white" onmouseover="changeBackgroundColor('container.list.usernamest')" onmouseout="resetBackgroundColor('container.list.usernamest')">
                           <a href="">
                              <p class="font-bold w-full text-center text-black">Feb</p>
                              <p class="font-bold text-5xl text-black text-center flex item-center pt-[-1rem]">02</p>
                           </a>
                        </div>
                     </div>
                  </div>

                  <div class="flex flex-col w-full bg-gray-200 p-4 gap-2 rounded-2xl">
                     <div id="container.list.usernamesb" class="flex justify-between gap-2 rounded-lg">
                        <div id="container.usernamesb" class="flex flex-col w-full justify-between text-lg">
                           <div class="flex h-full w-full hover:bg-white pl-2 rounded-lg">
                              <a href="" class="flex items-center h-full w-full">
                                 <p id="ordernumber3" class="text-black">Order Number</p>
                              </a>
                              <button class="hover:bg-rfg-accent hover:text-black h-full padding-top: 100% px-2 rounded-lg">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-copy" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                                 </svg>
                              </button>
                           </div>
                           <div class="flex h-full w-full hover:bg-white pl-2 rounded-lg">
                              <a href="" class="flex items-center h-full w-full">
                                 <p id="ordernumber4 "class="text-black">Order Number</p>
                              </a>
                              <button class="hover:bg-rfg-accent hover:text-black h-full padding-top: 100% px-2 rounded-lg">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-copy" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                                 </svg>
                              </button>
                           </div>
                        </div>
                        <div id="container.date" class="rounded-lg px-1 hover:bg-white" onmouseover="changeBackgroundColor('container.list.usernamesb')" onmouseout="resetBackgroundColor('container.list.usernamesb')">
                           <a href="">
                              <p class="font-bold w-full text-center text-black">Feb</p>
                              <p class="font-bold text-5xl text-center flex item-center pt-[-1rem] text-black">06</p>
                           </a>
                        </div>
                     </div>
                  </div>

               </div>
            </div>

            <div class="flex flex-col items-center h-[22rem] rounded-2xl bg-white p-5">
               <p class="text-left w-full text-xl text-black mb-4">ITEMS LOW ON STOCK</p>
               <div class="w-full flex flex-col items-center justify-end h-full gap-4 text-rfg-text">
                  <div class="flex flex-col w-full h-full bg-gray-200 p-4 gap-2 rounded-2xl overflow-hidden overflow-x-auto">
                     <table class="table-fixed min-w-full divide-y divide-gray-200">
                        <thead class="">
                           <tr>
                              <th scope="col" class="p-4">
                                 <div class="flex items-center">
                                    <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                       class="text-rfg-accent bg-rfg-text border-rfg-text focus:ring-1 focus:ring-rfg-primary h-4 w-4 rounded">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                 </div>
                              </th>
                              <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                                 Stock
                              </th>
                              <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                                 
                              </th>
                              <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                                 Item Name
                              </th>
                              <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                                 Category
                              </th>
                              <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                                 Actions
                              </th>
                              
                           </tr>
                           
                        </thead>
                        
                        <tbody>
                           
                           <tr>
                              
                              <td class="p-4 w-4">
                                 
                                 <div class="flex items-center">
                                    <input id="checkbox-1" aria-describedby="checkbox-1" type="checkbox"
                                       class="text-rfg-accent bg-white border-rfg-text focus:ring-1 focus:ring-rfg-primary h-4 w-4 rounded">
                                    <label for="checkbox-1" class="sr-only">checkbox</label>
                                 </div>
                              </td>
                              <td class="p-4 whitespace-nowrap text-base font-medium text-black ">3</td>
                              <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                 <img class="h-10 w-10 rounded-full" src="{{ asset('./products/sdf' )}}" >
                              </td>
                              <td class="p-4 whitespace-nowrap text-base font-medium text-black ">Item Name</td>
                              <td class="p-4 whitespace-nowrap text-base font-medium text-black ">Category</td>
                              <td class="p-4 whitespace-nowrap space-x-2">
                                 <button data-modal-target="product-modal-edit" data-modal-toggle="product-modal-edit" class="text-rfg-text bg-rfg-accent hover:bg-rfg-accent focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                 </button>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>

         {{-- Second Column End --}}

         {{-- Third Column Start --}}
         
         <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="flex flex-col h-[22rem] rounded-2xl bg-white p-5 gap-4 drop-shadow-md">
               <div class="w-full">
                  <div class="w-full flex justify-between">
                     <div>
                        <p class=" text-black text-xl my-auto text-left h-full">SALES REPORT</p>
                     </div>
                     <div>
                        <form class="max-w-sm">
                           <select id="salesTimeline" class=" hover:bg-gray-300 bg-gray-200 border-none text-black text-xl rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5 ">
                              <option value="today">TODAY</option>
                              <option value="weekly" selected>WEEKLY</option>
                              <option value="monthly">MONTHLY</option>
                              <option value="yearly">YEARLY</option>
                           </select>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="w-full h-full">
                  <div id="salesChart" class="h-full w-full rounded-3xl  "></div>
               </div>
            </div>
            <div class="flex flex-col h-[22rem] rounded-2xl bg-white drop-shadow-md p-5 gap-4">
               <div class="w-full">
                  <div class="w-full flex justify-between">
                     <div>
                        <p class=" text-black text-xl my-auto text-left h-full">ORDER HISTORY</p>
                     </div>
                     <div>
                        <form class="max-w-sm">
                           <select id="salesTimeline" class=" hover:bg-gray-300 bg-gray-200 border-none text-black text-xl rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5 ">
                              <option value="today">TODAY</option>
                              <option value="weekly" selected>WEEKLY</option>
                              <option value="monthly">MONTHLY</option>
                              <option value="yearly">YEARLY</option>
                           </select>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="flex flex-col w-full h-full bg-gray-200 text-rfg-text p-4 gap-2 rounded-2xl overflow-hidden overflow-x-auto">
                  <table class="table-fixed min-w-full divide-y divide-gray-200">
                     <thead class="">
                        <tr>
                           <th scope="col" class="p-4">
                              <div class="flex items-center">
                                 <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                    class="text-rfg-accent bg-rfg-text border-rfg-text focus:ring-1 focus:ring-rfg-primary h-4 w-4 rounded">
                                 <label for="checkbox-all" class="sr-only">checkbox</label>
                              </div>
                           </th>
                           <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                              Order Number
                           </th>
                           <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                              Payment
                           </th>
                           <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                              Revenue
                           </th>
                           <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                              Status
                           </th>
                           <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                              Actions
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="p-4 w-4">
                              <div class="flex items-center">
                                 <input id="checkbox-1" aria-describedby="checkbox-1" type="checkbox"
                                    class="text-rfg-accent bg-rfg-text border-rfg-text focus:ring-1 focus:ring-rfg-primary h-4 w-4 rounded">
                                 <label for="checkbox-1" class="sr-only">checkbox</label>
                              </div>
                           </td>
                           <td class="p-4 whitespace-nowrap text-base font-medium text-black">Order Number</td>
                           <td class="p-4 whitespace-nowrap text-base font-medium text-black">Payment Method</td>
                           <td class="p-4 whitespace-nowrap text-base font-medium text-black">₱100</td>
                           <td class="p-4 whitespace-nowrap text-base font-medium text-black">Pending</td>
                           <td class="p-4 whitespace-nowrap space-x-2">
                              <button data-modal-target="product-modal-edit" data-modal-toggle="product-modal-edit" class="text-rfg-text bg-rfg-accent hover:bg-orange-500 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                 <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                              </button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            </div>
         </div>

         {{-- Third Column End --}}

      </div>
   </div>

   {{-- Date Script Start --}}

   <script>

      function generateMonthDateRange() {
         const dateArray = [];
         const currentDate = new Date();
         
         // Set the date to the first day of the current month
         currentDate.setDate(1);

         // Loop until the next month starts
         while (currentDate.getMonth() === new Date().getMonth()) {
            const formattedDate = `${currentDate.getDate().toString().padStart(2, '0')}`;
            dateArray.push(formattedDate);

            currentDate.setDate(currentDate.getDate() + 1);
         }

         return dateArray;
      }

      const monthRange = generateMonthDateRange();
      console.log(monthRange);

      function generateDateRange(n) {
         const dateArray = [];
         const currentDate = new Date();
         for (let i = n; i >= 0; i--) {
            const date = new Date(currentDate);
            date.setDate(currentDate.getDate() - i);
            const formattedDate = `${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')}`;
            dateArray.push(formattedDate);
         }
         return dateArray;
      }
      const dateRange = generateDateRange(6);

      function generateYearRange(n) {
         const yearsArray = [];
         const currentDate = new Date();

         for (let i = n; i >= 0; i--) {
            const date = new Date(currentDate);
            date.setFullYear(currentDate.getFullYear() - i);

            const year = date.getFullYear();
            yearsArray.push(year);
            console.log(year);
         }
         return yearsArray;
      }

      const yearsArray = generateYearRange(4);
      console.log(yearsArray);
   </script>

   {{-- Date Script End --}}

   {{-- Chart Script Start --}}
   <script>
      var options = {
         series: [],
         theme: {
            mode: 'dark'
         },
         chart: { height: '100%', type: 'bar', background: 'transparent'},
         plotOptions: { bar: { columnWidth: '60%' } },
         colors: ['#00E396'],
         dataLabels: { enabled: true },
         legend: { show: true, showForSingleSeries: true,
            customLegendItems: ['Completed', 'Total'],
            markers: { fillColors: ['#00E396', '#f2b472'] }
         }
      };

      var areaoptions = {
         series: [],
         theme: {
            mode: 'dark'
         },
         chart: {
            height: '100%',
            type: 'area',
            zoom: { enabled: false },
            background: 'transparent'
         },
         dataLabels: {
            enabled: false
         },
         stroke: {
            curve: 'smooth'
         },
         xaxis: {
            type: 'category',
            categories: []
         },
      };
      
      var salesChart = new ApexCharts(document.querySelector("#salesChart"), areaoptions);
      salesChart.render();
   </script>

   <script>

      document.addEventListener("DOMContentLoaded", function () {
         const salesTimeline = document.getElementById('salesTimeline');
         const strokeHeight = 5;
         const name = 'Total';
         const strokeColor = '#f2b472';

         function handleTimelineChange(timeline, anyChart) {
            const selectedOption = timeline.options[timeline.selectedIndex].value;
            if (selectedOption == "weekly") {
               anyChart.updateSeries([
                  {
                     name: 'Total',
                     data: [30,31,32,33,34,35,36]
                  }, {
                     name: 'Completed',
                     data: [16,11,3,19,29,20,1]
                  }
                     
               ]);
               anyChart.updateOptions({
                  xaxis: {
                     type: 'datetime',
                     categories: dateRange
                  }
               });
            } else if (selectedOption == "today") {
               anyChart.updateSeries([
                  {
                     name: 'Total',
                     data: [36]
                  }, {
                     name: 'Completed',
                     data: [1]
                  }
                     
               ]);
               anyChart.updateOptions({
                  xaxis: {
                     type: 'category',
                     categories: dateRange[6]
                  }
               });
            } else if (selectedOption == "yearly") {
               const Months = [
                  "Jan", "Feb", "Mar", "Apr",
                  "May", "Jun", "Jul", "Aug",
                  "Sep", "Oct", "Nov", "Dec"
                  ];
               // anyChart.updateSeries([
               //    {
               //       name: 'Completed',
               //       data: [
               //          { x: Months[0], y: 12, goals: [{ name: name, value: 30, strokeHeight: strokeHeight, strokeColor: strokeColor }] },
               //          { x: Months[1], y: 12, goals: [{ name: name, value: 30, strokeHeight: strokeHeight, strokeColor: strokeColor }] },
               //          { x: Months[2], y: 12, goals: [{ name: name, value: 30, strokeHeight: strokeHeight, strokeColor: strokeColor }] },
               //          { x: Months[3], y: 12, goals: [{ name: name, value: 30, strokeHeight: strokeHeight, strokeColor: strokeColor }] },
               //          { x: Months[4], y: 12, goals: [{ name: name, value: 30, strokeHeight: strokeHeight, strokeColor: strokeColor }] },
               //          { x: Months[5], y: 12, goals: [{ name: name, value: 30, strokeHeight: strokeHeight, strokeColor: strokeColor }] },
               //          { x: Months[6], y: 12, goals: [{ name: name, value: 30, strokeHeight: strokeHeight, strokeColor: strokeColor }] },
               //          { x: Months[7], y: 12, goals: [{ name: name, value: 30, strokeHeight: strokeHeight, strokeColor: strokeColor }] },
               //          { x: Months[8], y: 12, goals: [{ name: name, value: 30, strokeHeight: strokeHeight, strokeColor: strokeColor }] },
               //          { x: Months[9], y: 12, goals: [{ name: name, value: 30, strokeHeight: strokeHeight, strokeColor: strokeColor }] },
               //          { x: Months[10], y: 12, goals: [{ name: name, value: 30, strokeHeight: strokeHeight, strokeColor: strokeColor }] },
               //          { x: Months[11], y: 12, goals: [{ name: name, value: 30, strokeHeight: strokeHeight, strokeColor: strokeColor }] },
               //       ]
               //    }
               // ]);
            } else if (selectedOption == "monthly") {

               // First random number generator (produces 29 numbers between 25 and 40)
               const randomNumbersInRange = Array.from({ length: 29 }, () => Math.floor(Math.random() * (40 - 25 + 1) + 25));

               console.log("First set of random numbers:", randomNumbersInRange);

               // Second random number generator (produces 10 numbers with maximum values based on the corresponding numbers from the first set)
               const secondRandomNumbers = randomNumbersInRange.map((maxValue) => Math.floor(Math.random() * (maxValue - 10 + 1) + 10));

               console.log("Second set of random numbers:", secondRandomNumbers);


               anyChart.updateSeries([
                  {
                     name: 'Total',
                     data: randomNumbersInRange
                  }, {
                     name: 'Completed',
                     data: secondRandomNumbers
                  }
               ]);
               anyChart.updateOptions({
                  xaxis: {
                     type: 'category',
                     categories: monthRange
                  }
               });

               // anyChart.updateSeries([
               //    {
               //          name: 'Completed',
               //          data: monthlyData
               //    }
               // ]);
            }
         }

         handleTimelineChange(salesTimeline, salesChart);

         salesTimeline.addEventListener('change', function () {
            handleTimelineChange(salesTimeline, salesChart)
         });
      });

   </script>
   {{-- Chart Script End --}}


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>