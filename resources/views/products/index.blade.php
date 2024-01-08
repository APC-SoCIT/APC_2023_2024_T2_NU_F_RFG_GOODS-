<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    @if($message = Session::get('success'))
    <div>
        <p>{{$message}}</p>
    </div>
    @endif
    <div class="container">
        <h1>Products</h1>
        <a href="/admin/product/create">Create a New Product</a>
        <a href="/admin/product/category">Manage Categories</a>
        <table class="table table-bordered">
            <thead>
                <th>id</th>
                <th>image</th>
                <th>sku</th>
                <th>name</th>
                <th>price</th>
                <th>category</th>
                <th>description</th>
            </thead>
            <tbody>
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
            </tbody>
            
        </table>
    </div>
  
</body>
</html>