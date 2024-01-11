<!-- Edit Product Modal -->
<div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="product-modal-{{ $product->id }}">
    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow relative">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">
                    Edit product
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal-{{ $product->id }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form method="post" action="{{route('product.update', ['product' => $product])}}" enctype="multipart/form-data">
                    <div class="grid grid-cols-6 gap-6">
                        @csrf
                        @method('put')
                        <div class="col-span-6 sm:col-span-3">
                            <label for="sku" class="text-sm font-medium text-gray-900 block mb-2">SKU</label>
                            <input value="{{$product->sku}}" type="text" name="sku" id="sku" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Name</label>
                            <input value="{{$product->name}}" type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="price" class="text-sm font-medium text-gray-900 block mb-2">Price</label>
                            <input value={{$product->price}} type="numer" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
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
                                    @if ($product->category_id == $category->id)
                                        <option value="{{$category->id}}" selected>{{$category->category}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endif
                                @empty
                                    <option value="0" disabled>Select Category</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="desc" class="text-sm font-medium text-gray-900 block mb-2">Description</label>
                            <input value="{{$product->desc}}" type="text" name="desc" id="desc" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="" required>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="image" class="text-sm font-medium text-gray-900 block mb-2">Image</label>
                            <input value={{$product->image}} type="file" name="image" id="image" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-.8" placeholder="">
                        </div>
                    </div> 
            </div>
            <!-- Modal footer -->
            <div class="items-center p-6 border-t border-gray-200 rounded-b">
                <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save all</button>
            </div>
            </form>
        </div>
    </div>
</div>