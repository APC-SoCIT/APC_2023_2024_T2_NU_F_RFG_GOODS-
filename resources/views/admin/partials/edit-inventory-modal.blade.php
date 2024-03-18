<!-- Add Product Modal -->
<div tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="inventory-modal-{{ $inventory->id }}">
    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow relative">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">
                    Edit Inventory
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="inventory-modal-{{ $inventory->id }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form method="post" action="{{route('inventory.update',['inventory' => $inventory])}}">
                    <div class="grid grid-cols-6 gap-6">
                        @csrf
                        @method('put')
                        <div class="col-span-6 sm:col-span-3">
                            <div class="flex">
                                <label for="product_id" class="text-sm font-medium text-gray-900 block mb-2 mr-1">Product</label>
                                <a href="/admin/products">
                                    <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                            <select name="product_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                @forelse ($products as $product)
                                    @if($inventory->product_id == $product->id)
                                    <option value="{{$product->id}}" selected>{{$product->sku}} | {{$product->name}}</option>
                                    @else
                                    <option value="{{$product->id}}" >{{$product->sku}} | {{$product->name}}</option>
                                    @endif
                                @empty
                                    <option value="0" disabled>Select Product</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="is_received" class="text-sm font-medium text-gray-900 block mb-2">Transaction Type</label>
                            <select name="is_received" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                                    <option value="1" @if($inventory->is_received == 1) selected @endif>Received</option>
                                    <option value="0" @if($inventory->is_received == 0) selected @endif>Shipped</option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="quantity" class="text-sm font-medium text-gray-900 block mb-2">Quantity</label>
                            <input value="{{ $inventory->quantity }}"type="text" name="quantity" id="quantity" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                        </div>
                    </div> 
            </div>
            <!-- Modal footer -->
            <div class="items-center p-6 border-t border-gray-200 rounded-b">
                <button class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-2 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save all</button>
            </div>
            </form>
        </div>
    </div>
</div>