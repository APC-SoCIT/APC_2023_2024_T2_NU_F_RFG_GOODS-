<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    @include('admin.partials.admin-sidebar')
  
  <div class="p-4 sm:ml-64">
     <div class="mt-16">

<div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
    <div class="mb-1 w-full">
        <div class="mb-4">
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="#" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">Products</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">List</span>
                    </div>
                </li>
                </ol>
            </nav>
            <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All products</h1>
        </div>
        <div class="sm:flex">
            <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                <form class="lg:pr-3" action="#" method="GET">
                <label for="products-search" class="sr-only">Search</label>
                <div class="mt-1 relative lg:w-64 xl:w-96">
                    <input type="text" name="email" id="products-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Search for Products">
                </div>
                </form>
                <div class="flex space-x-1 pl-0 sm:pl-2 mt-3 sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path></svg>
                    </a>
                    @if($errors->any())
                    <div class="flex items-center space-x-2">
                        @foreach($errors->all() as $error)
                            <div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                <span>{{$error}}</span>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                <button data-modal-target="add-product-modal" data-modal-toggle="add-product-modal"class="w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                    <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add product
                </button>
                <a href="#" class="w-1/2 text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                    <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path></svg>
                    Export
                </a>
            </div>
        </div>
    </div>
</div>
<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="shadow overflow-hidden">
                <table class="table-fixed min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                        class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                ID
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Image
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                SKU
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Name
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Price
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Category
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Description
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Stock
                            </th>
                            <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                Min | Max | ROP
                            </th>
                            <th scope="col" class="p-4">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $product)
                        <tr class="hover:bg-gray-100">
                            <td class="p-4 w-4">
                                <div class="flex items-center">
                                    <input id="checkbox-{{ $product->id }}" aria-describedby="checkbox-1" type="checkbox"
                                        class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                    <label for="checkbox-{{ $product->id }}" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $product->id }}</td>
                            <td class="p-4 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                                <img class="h-10 w-10 rounded-full" src="{{ asset('./products/'.$product->image )}}" alt="{{ $product->sku }} avatar">
                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $product->sku }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $product->name }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">₱{{ $product->price }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $product->category }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $product->desc }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                <div class="flex items-center">
                                    @if ($product->computed_quantity > $product->max_qty)
                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                    @elseif ($product->computed_quantity >= $product->min_qty && $product->computed_quantity <= $product->max_qty)
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                    @elseif ($product->computed_quantity < $product->reorder_pt)
                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
                                    @elseif ($product->computed_quantity < $product->min_qty)
                                    <div class="h-2.5 w-2.5 rounded-full bg-orange-500 mr-2"></div>
                                    @endif
                                    <span>{{ $product->computed_quantity }}</span>
                                </div>
                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $product->min_qty }} | {{ $product->max_qty }} | {{ $product->reorder_pt }}</td>
                            <td class="p-4 whitespace-nowrap space-x-2">
                                <button data-modal-target="product-modal-{{ $product->id }}" data-modal-toggle="product-modal-{{ $product->id }}" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                    Edit
                                </button>
                                <button data-modal-target="delete-product-modal-{{ $product->id }}" data-modal-toggle="delete-product-modal-{{ $product->id }}" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    Delete
                                </button>
                            </td>
                        </tr>

@include('admin.partials.edit-product-modal', ['product' => $product, 'categoryList' => $categoryList])
@include('admin.partials.delete-product-modal', ['product' => $product, 'categoryList' => $categoryList])
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<div class="mx-auto grid grid-cols-1 sm:grid-cols-3 gap-3 py-14 mb-8 max-w-6xl">
@foreach ($products as $product)

    <div class="group mx-auto relative">
        <img class="h-[360px] rounded-3xl object-cover transition-opacity opacity-100 group-hover:opacity-30" src="/products/{{$product->image}}" />
        <div class="absolute top-0 left-0 p-4 w-full h-full opacity-0 group-hover:opacity-100 transition-opacity">
            <div class="h-full flex flex-col justify-between">
                <div class="line-clamp-2 text-center text-black text-[22px]/[30px] font-bold">{{$product->name}}</div>
                <div class="hover:visible">
                    <div class="grid grid-cols-2 gap-1">
                        <span class="text-black text-xl justify-self-start">SKU:</span>
                        <span class="text-black text-xl justify-self-end line-clamp-1">{{$product->sku}}</span>
                        <span class="text-black text-xl justify-self-start">PRICE:</span>
                        <span class="text-black text-xl justify-self-end line-clamp-1">₱{{$product->price}}</span>
                        <span class="text-black text-xl justify-self-start">CATEGORY:</span>
                        <span class="text-black text-xl justify-self-end line-clamp-1">{{$product->category}}</span>
                    </div>
                </div>
                <div id="chart_{{ $product->id }}">
                    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var chart_{{ $product->id }}_rendered = false; // Flag to check if the chart has been rendered

                            var container_{{ $product->id }} = document.querySelector("#chart_{{ $product->id }}").parentNode;

                            container_{{ $product->id }}.addEventListener("mouseover", function() {
                                if (!chart_{{ $product->id }}_rendered) {
                                    var options = {
                                        series: [
                                            {
                                                name: 'Stocks',
                                                data: [
                                                    {
                                                        x: '',
                                                        y: parseInt("{{ $product->computed_quantity ?? 0 }}"),
                                                        goals: [
                                                            {
                                                                name: 'ROP', value: parseInt("{{ $product->reorder_pt }}"), 
                                                                strokeWidth: 2, strokeDashArray: 2, strokeColor: '#ff0000'
                                                            },
                                                            {
                                                                name: 'MIN', value: parseInt("{{ $product->min_qty }}"), 
                                                                strokeWidth: 2, strokeDashArray: 2, strokeColor: '#FC6A03'
                                                            },
                                                            {
                                                                name: 'MAX', value: parseInt("{{ $product->max_qty }}"), 
                                                                strokeWidth: 2, strokeDashArray: 2, strokeColor: '#043927'
                                                            }
                                                        ]
                                                    },
                                                ]
                                            }
                                        ],
                                        chart: {
                                            height: 105,
                                            type: 'bar',
                                        },
                                        plotOptions: {
                                            bar: {
                                                horizontal: true,
                                            }
                                        },
                                        colors: ['#00E396'],
                                        dataLabels: {
                                            formatter: function(val, opt) {
                                                const computedQuantity = opt.w.config.series[opt.seriesIndex].data[opt.dataPointIndex].y;
                                                return computedQuantity;
                                            }
                                        },
                                        legend: {
                                            show: true,
                                            showForSingleSeries: true,
                                            customLegendItems: ['Stocks', 'ROP', 'MIN', 'MAX'],
                                            markers: {
                                                fillColors: ['#00E396', '#ff0000', '#FC6A03', '#043927']
                                            }
                                        }
                                    };

                                    var chart_{{ $product->id }} = new ApexCharts(document.querySelector("#chart_{{ $product->id }}"), options);
                                    chart_{{ $product->id }}.render();
                                    chart_{{ $product->id }}_rendered = true; // Update the flag
                                }
                            });

                            container_{{ $product->id }}.addEventListener("mouseout", function() {
                                if (chart_{{ $product->id }}_rendered) {
                                    // If chart exists, destroy it
                                    chart_{{ $product->id }}.destroy();
                                    chart_{{ $product->id }} = null; // Reset the chart variable
                                }
                            });
                            
                        });
                    </script>
                </div>
                {{-- <div class="grid grid-cols-2 gap-1">
                    <p class="text-black text-xl justify-self-start">STOCK:</p>
                    <div class="flex justify-self-end items-center">
                        <div class="h-2.5 w-2.5 rounded-full justify-self-center
                            @if ($product->computed_quantity == null)
                            bg-gray-500
                            @elseif ($product->computed_quantity > $product->max_qty)
                            bg-red-500 mr-2
                            @elseif ($product->computed_quantity >= $product->min_qty && $product->computed_quantity <= $product->max_qty)
                            bg-green-500 mr-2
                            @elseif ($product->computed_quantity < $product->reorder_pt)
                            bg-red-500 mr-2
                            @elseif ($product->computed_quantity < $product->min_qty)
                            bg-orange-500 mr-2
                            @endif
                            ">
                        </div>
                        <span>{{ $product->computed_quantity }}</span>
                    </div>
                    <p class="text-black text-xl justify-self-start">MAX:</p>
                    <p class="text-black text-xl font-medium justify-self-end line-clamp-1">{{$product->max_qty}}</p>
                    <p class="text-black text-xl justify-self-start">MIN:</p>
                    <p class="text-black text-xl font-medium justify-self-end line-clamp-1">{{$product->min_qty}}</p>
                    <p class="text-black text-xl justify-self-start">ROP:</p>
                    <p class="text-black text-xl font-medium justify-self-end line-clamp-1">{{$product->reorder_pt}}</p>
                </div> --}}

                <div class="flex flex-col justify-between">
                    <button class="bg-blue-400 rounded-3xl">
                        <div class="px-5 text-center text-black text-xl">Description</div>
                    </button>
                    <button class="bg-green-400 rounded-3xl my-3">
                        <div class="px-5 text-center text-black text-xl">Edit</div>
                    </button>
                    <button class="bg-red-500 rounded-3xl">
                        <div class="px-5 text-center text-black text-xl">Delete</div>
                    </button>
                </div>
            </div>

        </div>
    </div>
@endforeach

                    

</div>
{{-- <div class="bg-white sticky sm:flex items-center w-full sm:justify-between bottom-0 right-0 border-t border-gray-200 p-4">
    <div class="flex items-center mb-4 sm:mb-0">
        <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        </a>
        <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center mr-2">
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </a>
        <span class="text-sm font-normal text-gray-500">Showing <span class="text-gray-900 font-semibold">1-20</span> of <span class="text-gray-900 font-semibold">2290</span></span>
    </div>
    <div class="flex items-center space-x-3">
        <a href="#" class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
            <svg class="-ml-1 mr-1 h-5 w-5"" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            Previous
        </a>
        <a href="#" class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
            Next
            <svg class="-mr-1 ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </a>
    </div>
</div> --}}

<!-- Add Product Modal -->
<div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="add-product-modal">
    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow relative">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">
                    Add new product
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="add-product-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form method="post" action="{{route('product.save')}}" enctype="multipart/form-data">
                    <div class="grid grid-cols-6 gap-6">
                        @csrf
                        @method('post')
                        <div class="col-span-6 sm:col-span-3">
                            <label for="sku" class="text-sm font-medium text-gray-900 block mb-2">SKU</label>
                            <input type="text" name="sku" id="sku" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Name</label>
                            <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Price</label>
                            <input type="numer" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <div class="flex">
                                <label for="category_id" class="text-sm font-medium text-gray-900 block mb-2 mr-1">Category ID</label>
                                <a href="/admin/categories">
                                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                            <select name="category_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                @forelse ($categoryList as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @empty
                                    <option value="0" disabled>Select Category</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="desc" class="text-sm font-medium text-gray-900 block mb-2">Description</label>
                            <input type="text" name="desc" id="desc" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="image" class="text-sm font-medium text-gray-900 block mb-2">Image</label>
                            <input type="file" name="image" id="image" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-.8" placeholder="" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="min_qty" class="text-sm font-medium text-gray-900 block mb-2">Minimum Quantity</label>
                            <input type="text" name="min_qty" id="min_qty" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="max_qty" class="text-sm font-medium text-gray-900 block mb-2">Maximum Quantity</label>
                            <input type="text" name="max_qty" id="max_qty" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="reorder_pt" class="text-sm font-medium text-gray-900 block mb-2">Reorder Point</label>
                            <input type="text" name="reorder_pt" id="reorder_pt" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                        </div>
                    </div> 
            </div>
            <!-- Modal footer -->
            <div class="items-center p-6 border-t border-gray-200 rounded-b">
                <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Add product</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

</body>
</html>