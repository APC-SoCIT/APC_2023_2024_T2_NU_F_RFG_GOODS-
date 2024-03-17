<div class="drop-shadow-md overflow-x-auto">
    <button id="backbutton">back</button>
    <div class="align-middle inline-block min-w-full overflow-x-auto">
        <div class="overflow-hidden">

            <table class="table-fixed min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Image
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Product Name
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Quantity
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Status
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            Price
                        </th>
                        {{-- <th scope="col" class="p-4 text-left text-xs font-medium text-black uppercase">
                            
                        </th> --}}

                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($orderItems as $orderItem)
                        <tr class="hover:bg-gray-100">
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $orderItem->image }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $orderItem->name }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $orderItem->quantity }}</td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">
                                <div class="flex items-center">
                                    <span>{{$orderItem->status}}</span>
                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 ml-2"></div>
                                </div>
                            </td>
                            <td class="p-4 whitespace-nowrap text-base font-medium text-gray-900">{{ $orderItem->price }}</td>
                            {{-- <td class="p-4 whitespace-nowrap space-x-2">
                                <button data-modal-target="view-order-modal" data-modal-toggle="view-order-modal" class="text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:ring-orange-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                    </svg>
                                    Go to Product
                                </button>

                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    <div class="pt-2 bg-gray-100">
        {!! $orderItems->links() !!}
    </div>

    <script>
        $(document).ready(function() {
            const showLoadingScreen = () => {
                $('tr').css('opacity', 0.5);
            };

            const hideLoadingScreen = () => {
                $('tr').css('opacity', 1);
            };

            const fetch_data = (page, search_term, filter_status, sort_by, payment_method) => {
                showLoadingScreen();
                if(status === undefined){status = "";}
                if(filter_status === undefined){filter_status = "";} 
                if(search_term === undefined){search_term = "";}
                if(sort_by === undefined){sort_by = "";}
                if(payment_method === undefined){payment_method = "";}
                $.ajax({
                    url:"/admin/orders/?",
                    data: {
                        page: page, 
                        search_term: search_term, 
                        filter_status: filter_status, 
                        sort_by: sort_by, 
                        payment_method: payment_method,
                        type : 'filters'
                    },
                    beforeSend: function(){
                        showLoadingScreen();
                    },
                    success:function(data){
                        const tempContainer = document.createElement('div');
                        tempContainer.innerHTML = data;

                        const viewButton = tempContainer.querySelectorAll('#view-order-button');
                        const backButton = tempContainer.querySelectorAll('#status.back');
                        const nextButton = tempContainer.querySelectorAll('#status.next');

                        viewButton.forEach(function (button) {
                            button.addEventListener('click', function() {
                                const orderData = JSON.parse(button.getAttribute('data-order'));
                                var page = $('#hidden_page').val();

                                const showLoadingScreen = () => {
                                        $('tr').css('opacity', 0.5);
                                    };

                                    const hideLoadingScreen = () => {
                                        $('tr').css('opacity', 1);
                                    };

                                const fetch_data = (page, orderid) => {
                                    $.ajax({
                                        url:"/admin/orders/?",
                                        data: {
                                            page: page,
                                            orderid: orderid,
                                            type: 'view',
                                        },
                                        beforeSend: function(){
                                            showLoadingScreen();
                                        },
                                        success:function(data){

                                            const tempContainer = document.createElement('div');
                                            tempContainer.innerHTML = data;

                                            $('#datatable').empty();
                                            $('#datatable').html(tempContainer);

                                        },
                                        complete: function(){
                                        hideLoadingScreen();
                                        },
                                        error: function (xhr, status, error) {
                                            console.error(xhr.responseText);
                                            console.error(error);
                                        }
                                    });
                                }
                                
                                console.log(orderData);
                                fetch_data(page, orderData)

                            });
                        });

                        var statusMapNext = {
                            'processing': 'confirmed',
                            'confirmed': 'preparing',
                            'preparing': 'scheduled',
                            'scheduled': 'intransit',
                            'intransit': 'received',
                            'received': 'torate',
                            'torate': 'completed'
                        };

                        var statusMapBack = {
                            'processing': 'processing', 
                            'confirmed': 'processing',
                            'preparing': 'confirmed',   
                            'scheduled': 'preparing',   
                            'intransit': 'scheduled',   
                            'received': 'intransit', 
                            'torate': 'received'
                        };

                        nextButton.forEach(function (button) {
                            button.addEventListener('click', function() {
                                var orderId = $(this).data('order-id');
                                var oldStatus = $(this).data('status');
                                var newStatus = statusMapNext[oldStatus] || 'completed';
                                console.log(orderId, newStatus);
                            });
                        });

                        backButton.forEach(function (button) {
                            button.addEventListener('click', function() {
                                var orderId = $(this).data('order-id');
                                var oldStatus = $(this).data('status');
                                var newStatus = statusMapBack[oldStatus] || 'completed';
                                console.log(orderId, newStatus);
                            });
                        });

                        $('#datatable').empty();
                        $('#datatable').html(tempContainer);
                    },
                    complete: function(){
                        hideLoadingScreen();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        console.error(error);
                    }
                });

            }

            $('body').on('click', '.pager a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var search_term = $('#searchInput').val();
                var filter_status = $('#filter_status').val();
                var sort_by = $('#sort_by').val();
                var payment_method = $('#payment_method').val();
                fetch_data(page, search_term, filter_status, sort_by, payment_method);
            });
            $('body').on('change', '#sort_by', function(){
                var page = $('#hidden_page').val();
                var search_term = $('#searchInput').val();
                var filter_status = $('#filter_status').val();
                var sort_by = $('#sort_by').val();
                var payment_method = $('#payment_method').val();
                fetch_data(page, search_term, filter_status, sort_by, payment_method);
            });
            $('body').on('keyup', '#searchInput', function(){
                var page = $('#hidden_page').val();
                var search_term = $('#searchInput').val();
                var filter_status = $('#filter_status').val();
                var sort_by = $('#sort_by').val();
                var payment_method = $('#payment_method').val();
                fetch_data(page, search_term, filter_status, sort_by, payment_method);
            });
            $('body').on('click', '#backbutton', function(){
                var page = $('#hidden_page').val();
                var search_term = $('#searchInput').val();
                var filter_status = $('#filter_status').val();
                var sort_by = $('#sort_by').val();
                var payment_method = $('#payment_method').val();
                fetch_data(page, search_term, filter_status, sort_by, payment_method);
            });
            $('body').on('change', '#filter_status', function(){
                var page = $('#hidden_page').val();
                var search_term = $('#searchInput').val();
                var filter_status = $('#filter_status').val();
                var sort_by = $('#sort_by').val();
                var payment_method = $('#payment_method').val();
                fetch_data(page, search_term, filter_status, sort_by, payment_method);
            });
            $('body').on('change', '#payment_method', function(){
                var page = $('#hidden_page').val();
                var search_term = $('#searchInput').val();
                var filter_status = $('#filter_status').val();
                var sort_by = $('#sort_by').val();
                var payment_method = $('#payment_method').val();
                fetch_data(page, search_term, filter_status, sort_by, payment_method);
            });
        });
    </script>
