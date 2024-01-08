<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($message = Session::get('success'))
    <div>
        <p>{{$message}}</p>
    </div>
    @endif
    <h1>Products</h1>
    <a href="/admin/product/create">Create a New Product</a>
    <a href="/admin/product/categorycreate">Manage Categories</a>
    <div>
        <table border="1">
            <tr>
                <th>id</th>
                <th>image</th>
                <th>sku</th>
                <th>name</th>
                <th>price</th>
                <th>category</th>
                <th>description</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>
                        <img src="{{ asset('./products/'.$product->image )}}" alt="" width="50" height="50">
                    </td>
                    <td>{{$product->sku}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->desc}}</td>
                    <td>
                        <a href="{{route('product.edit',['product' => $product])}}">Edit</a>
                    </td>
                    <td>
                        <a href="{{route('product.destroy',['product' => $product])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            
        </table>
    </div>
</body>
</html>