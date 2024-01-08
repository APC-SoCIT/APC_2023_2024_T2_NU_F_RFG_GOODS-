<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create a Product</h1>
    <form method="post" action="{{route('product.save')}}" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div>
            <label>Image</label>
            <input type="file" name="image" />
        </div>
        <div>
            <label>SKU</label>
            <input type="text" name="sku" placeholder="SKU" />
        </div>
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" />
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price" placeholder="Price" />
        </div>
        <div>
            <label>Category ID</label>
            <select name="category_id">
                @forelse ($categoryList as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                @empty
                    <option value="0" disabled>Select Category</option>
                @endforelse
            </select>
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="desc" placeholder="Description" />
        </div>
        <div>
            <input type="submit" value="Add">
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