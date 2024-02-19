<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/dist/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
   @include('admin.partials.admin-sidebar')
  
   <div class="p-4 sm:ml-64">
      <div class="mt-16">
         
      <div class="grid grid-cols-3 gap-4 mb-4">
         <div class="flex items-center justify-between p-20 h-52 rounded-2xl bg-gray-50 dark:bg-gray-800">
            <p class="text-white h-24 w-24" >
               <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003zM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461z"/>
                </svg>
            </p>
            <div class="flex flex-col text-right gap-1">
               <p class="text-white text-5xl font-bold">10</p>
               <p class="text-white text-lg">PRODUCTS</p>
            </div>
         </div>
         <div class="flex items-center justify-between p-20 h-52 rounded-2xl bg-gray-50 dark:bg-gray-800">
            <p class="text-white h-24 w-24" >
               <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
                  <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
                </svg>
            </p>
            <div class="flex flex-col text-right gap-1">
               <p class="text-white text-5xl font-bold">5</p>
               <p class="text-white text-lg">NEW ORDERS</p>
            </div>
         </div>
         <div class="flex items-center justify-between p-20 h-52 rounded-2xl bg-gray-50 dark:bg-gray-800">
            <p class="text-white h-24 w-24" >
               <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
            </p>
            <div class="flex flex-col text-right gap-1">
               <p class="text-white text-5xl font-bold">1</p>
               <p class="text-white text-lg">NEW RATINGS</p>
            </div>
         </div>
      </div>

      <div class="grid grid-cols-2 gap-4 mb-4">
         <div class="flex flex-col items-center h-[22rem] rounded-2xl bg-gray-800 p-5">
            <p class="text-left w-full text-xl text-white">UPCOMING DELIVERIES</p>
            <div class="w-full flex flex-col items-center justify-center h-full gap-4 text-gray-950">
               <div class="flex flex-col w-full bg-gray-400 p-4 gap-2 rounded-2xl">
                  <p class="w-full text-center text-lg font-bold">TODAY</p>
                  <div id="container.list.usernames" class="flex justify-between">
                     <div id="container.usernames" class="flex flex-col justify-between py-1 text-lg">
                        <p>Order Number</p>
                        <p>Order Number</p>
                     </div>
                     <div id="container.date">
                        <p class="font-bold w-full text-center">Feb</p>
                        <p class="font-bold text-5xl">02</p>
                     </div>
                  </div>
               </div>
               <div class="flex flex-col w-full bg-gray-400 p-4 gap-2 rounded-2xl">
                  <div id="container.list.usernames" class="flex justify-between">
                     <div id="container.usernames" class="flex flex-col justify-between py-1 text-lg">
                        <p>Order Number</p>
                        <p>Order Number</p>
                     </div>
                     <div id="container.date">
                        <p class="font-bold w-full text-center">Feb</p>
                        <p class="font-bold text-5xl">06</p>
                     </div>
                  </div>
               </div>
            </div>

         </div>
         <div class="flex flex-col items-center justify-center h-[22rem] rounded-2xl bg-gray-800 p-5 gap-4">
            <div class="w-full">
               <div id="todayChart" class="h-[12rem] w-full bg-white"></div>

            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script>
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

               var options = {
                  chart: {
                     height: '100%',
                     type: 'bar'
                  },
                  plotOptions: {
                     bar: {
                        columnWidth: '60%'
                     }
                  },
                  colors: ['#00E396'],
                  dataLabels: {
                     enabled: false
                  },
                  legend: {
                     show: true,
                     showForSingleSeries: true,
                     customLegendItems: ['Total', 'Completed'],
                     markers: {
                        fillColors: ['#00E396', '#775DD0']
                     }
                  },
                  xaxis: {
                     categories: dateRange,
                  }
               };
            </script>

             </div>
             <div class="w-full flex justify-end">
               <form class="max-w-sm">
                  <select id="timeline" class=" bg-gray-800 border border-gray-800 text-white text-3xl rounded-lg focus:ring-orange-600 focus:border-orange-600 block w-full p-2.5 ">
                     <option class="peer" value="today" selected>TODAY</option>
                     <option value="weekly">WEEKLY</option>
                     <option value="monthly">MONTHLY</option>
                     <option value="yearly">YEARLY</option>
                  </select>
               </form>
               </div>
             </div>

             <script>
               var chart = new ApexCharts(document.querySelector("#todayChart"), options);

               const timelineSelect = document.getElementById('timeline');
               timelineSelect.addEventListener('change', function () {
                  const selectedOption = timelineSelect.options[timelineSelect.selectedIndex].value;
                  if (selectedOption == "today") {
                     chart.updateSeries([
                        {
                           name: 'Actual',
                           data: [
                              { x: dateRange[0], y: 12, goals: [{ name: 'Complete', value: 10, strokeHeight: 5, strokeColor: '#775DD0' }] },
                              { x: dateRange[1], y: 12, goals: [{ name: 'Complete', value: 10, strokeHeight: 5, strokeColor: '#775DD0' }] },
                              { x: dateRange[2], y: 12, goals: [{ name: 'Complete', value: 10, strokeHeight: 5, strokeColor: '#775DD0' }] },
                              { x: dateRange[3], y: 12, goals: [{ name: 'Complete', value: 10, strokeHeight: 5, strokeColor: '#775DD0' }] },
                              { x: dateRange[4], y: 12, goals: [{ name: 'Complete', value: 10, strokeHeight: 5, strokeColor: '#775DD0' }] },
                              { x: dateRange[5], y: 12, goals: [{ name: 'Complete', value: 10, strokeHeight: 5, strokeColor: '#775DD0' }] },
                              { x: dateRange[6], y: 12, goals: [{ name: 'Complete', value: 10, strokeHeight: 5, strokeColor: '#775DD0' }] },
                           ]
                        }
                     ]);
                     chart.render(); // Move chart rendering inside the if block
                  }
               });

               chart.render();
             </script>

         </div>
         <div class="flex items-center justify-center h-[22rem] rounded-2xl bg-gray-800">

         </div>
         <div class="flex items-center justify-center h-[22rem] rounded-2xl bg-gray-800">

         </div>
      </div>



   </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>