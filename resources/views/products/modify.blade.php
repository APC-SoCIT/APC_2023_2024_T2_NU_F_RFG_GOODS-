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
    <form method="post" action="{{route('product.save')}}">
        @csrf
        @method('post')
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
            <input type="text" name="category" placeholder="Category" />
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" />
        </div>
        <div>
            <input type="submit" value="Save">
        </div>
    </form>
</body>
</html>