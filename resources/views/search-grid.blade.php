{{-- product for loop start --}}
<div class="grid md:grid-cols-4 grid-cols-2 gap-4 h-full min-w-[60rem]">
    
    @forelse($products as $product)

        <div id="{{$product->id}}" name="product_grid_item" class="bg-white w-60 h-[23rem] flex-col drop-shadow-md">
            <a href="{{route('product.get',['product' => $product])}}" class="flex flex-col h-full border-2 border-transparent hover:border-rfg-accent transition-colors duration-200">
                <img src="{{ asset('./products/'.$product->image )}}" 
                class="flex-shrink-0 object-center object-contain w-full max-h-[14rem]"
                @if ($product->stock==0 || $product->stock==null)
                    class="opacity-0" 
                @endif
                alt="">
                <div class="p-2 flex flex-col flex-grow justify-between">
                    <div class="pt-3">
                        <p class="text-s line-clamp-2">{{ Str::ucfirst($product->name) }}</p>
                        <p class="text-xs line-clamp-1">{{ $product->category }}</p>
                    </div>
                    <div class="grid grid-cols-2">
                        @php
                            $avgRating = $product->avg_rating;
                            $maxRating = 5;

                            $filledStars = min(round($avgRating), $maxRating);
                            $emptyStars = $maxRating - $filledStars;
                        @endphp
                        <ul class="flex mr-2 place-items-center">
                            @for ($i = 0; $i < $filledStars; $i++)
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-red-500 dark:text-black bi bi-star-fill " viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                </li>
                            @endfor
                            @for ($i = 0; $i < $emptyStars; $i++)
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-red-500 dark:text-black bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                    </svg>
                                </li>
                            @endfor
                        </ul>
                        <p class="relative pl-4">
                            @if ($product->avg_rating == null) 
                                No reviews
                            @else ()
                                {{$product->avg_rating}}
                            @endif
                        </p>
                        <p class="font-bold">₱{{ $product->price}}</p>
                        <form id="addToCartForm{{ $product->id }}" action="{{ route('product.addtocart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="@if(Auth::user() != null) {{ Auth::user()->id }} @else @endif">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @if($product->stock == 0 || $product->stock < 1 ) 
                                <button id="" class="bg-gray-400 w-28 text-black font-semibold rounded-xl" >Out of Stock</button>
                            @else
                                <button id="addtocartsubmit{{ $product->id }}" type="submit" class="bg-orange-400 w-28 text-white font-semibold rounded-xl hover:bg-white hover:text-orange-400" >Add to Cart</button>
                            @endif
                            
                        </form>
                        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                        <script>
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                        </script>
                        <script>
                            $(document).ready(function() {
                                $('#addToCartForm{{ $product->id }}').submit(function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        type: 'POST',
                                        url: '/addtocart',
                                        data: $(this).serialize(),
                                        success: function(response) {
                                            var currentColor = $('#addtocartsubmit{{ $product->id }}').css('background-color');
                                            $('#addtocartsubmit{{ $product->id }}').text(response);
                                                setTimeout(function() {
                                                    $('#addtocartsubmit{{ $product->id }}').text('Add to Cart');
                                                }, 3000);
                                        },
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <p class="col-span-4 text-center">No Results Found</p>
    @endforelse
</div>
<div class="pt-2 flex justify-center pb-11">
    {!! $products->links() !!}
</div>
{{-- product for loop end --}}