<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit a Product</h1>
    <form method="post" action="{{route('product.update', ['product' => $product])}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>Image</label>
            <input type="file" name="image" />
        </div>
        <div>
            <label>SKU</label>
            <input type="text" name="sku" placeholder="SKU" value="{{$product->sku}}"/>
        </div>
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name"  value="{{$product->name}}"/>
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price" placeholder="Price"  value="{{$product->price}}"/>
        </div>
        <div>
            <label>Category</label>
            <select name="category_id">
                @forelse ($categoryList as $category)
                    @if ($product->category_id == $category->id)
                        <option value="{{$category->id}}" selected>{{$category->category}}</option>
                    @else
                        <option value="{{$category->id}}">{{$category->category}}</option>
                    @endif
                @empty
                    <option value="0" disabled>No Category Available</option>
                @endforelse
            </select>
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="desc" placeholder="Description"  value="{{$product->desc}}"/>
        </div>
        <div>
            <input type="submit" value="Update">
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
</body>
</html>