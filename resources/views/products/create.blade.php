<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
    <div class="flex justify-center items-center h-screen">
        <div class="w-96 mx-auto border-black border-6">
            <div class="bg-gray-300 w-full pl-3 border-black border-2">
                <div class="text-center py-2 font-bold text-xl">
                <h1>Create a Product</h1>
                </div>
                <hr class="w-48 h-px mx-auto bg-gray-100 border-0 rounded dark:bg-gray-700">
                <div class="pt-2">
                    <form method="post" action="{{route('product.save')}}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="py-2 font-semibold">
                            <label>Image</label>
                            <input class="h-10"type="file" name="image" />
                        </div>
                        <div class="py-2 font-semibold">
                            <label>SKU</label>
                            <input type="text" name="sku" placeholder="SKU" />
                        </div>
                        <div class="py-2 font-semibold">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" />
                        </div>
                        <div class="py-2 font-semibold">
                            <label>Price</label>
                            <input type="number" name="price" placeholder="Price" />
                        </div>
                        <div class="py-2 font-semibold">
                            <label>Category ID</label>
                            <select name="category_id">
                                @forelse ($categoryList as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @empty
                                    <option value="0" disabled>Select Category</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="py-2 font-semibold">
                            <label>Description</label>
                            <input type="text" name="desc" placeholder="Description" />
                        </div>
                        <div class="flex justify-center py-3">
                            <input class="bg-orange-300 w-28 h-8 font-bold rounded-xl" type="submit" value="Add">
                        </div>
                        <div>
                            @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>