@extends ('layouts.app')

@section('title', 'Products List')

@section ('content')

<style>

    /* Page Container */
    .page-container{
        max-width:950px;
        margin:40px auto;
        padding:30px;
        border-radius:18px;
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(10px);
        box-shadow:0 15px 40px rgba(0,0,0,0.15);
    }

    /* Page Title */
    h2{
        font-weight:600;
        margin-bottom:20px;
        background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff);
        background-clip:text;
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
    }

    /* Add Product Button */
    .btn-primary{
        border:none;
        border-radius:8px;
        font-weight:500;
        background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff);
        transition:all .3s ease;
    }

    .btn-primary:hover{
        transform:translateY(-2px);
        box-shadow:0 6px 15px rgba(0,0,0,0.2);
    }

    /* Table Styling */
    table{
        border-radius:10px;
        overflow:hidden;
        background:white;
    }

    .table-hover tbody tr:hover{
        background-color:#f6f3ff;
        transition:0.2s;
    }

    /* Gradient Table Header */
    .table thead th{
        background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff);
        color:white;
        border:none;
    }

    /* Category Badge */
    .category-badge{
        padding:6px 12px;
        border-radius:20px;
        color:white;
        font-size:12px;
        font-weight:500;
        box-shadow:0 2px 8px rgba(0,0,0,0.15);
    }

    /* Edit Button Gradient */
    .btn-edit{
        border:none;
        border-radius:8px;
        font-size:13px;
        font-weight:500;
        padding:5px 12px;
        background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff);
        color:white;
        transition: all 0.3s ease;
    }

    .btn-edit:hover{
        transform:translateY(-2px);
        box-shadow:0 6px 15px rgba(0,0,0,0.2);
    }

    /* Delete Button Gradient */
    .btn-delete{
        border:none;
        border-radius:8px;
        font-size:13px;
        font-weight:500;
        padding:5px 12px;
        background: linear-gradient(90deg,#ff4a6b,#ff758c,#ffa3b1);
        color:white;
        transition: all 0.3s ease;
    }

    .btn-delete:hover{
        transform:translateY(-2px);
        box-shadow:0 6px 15px rgba(0,0,0,0.2);
    }

</style>

<div class="page-container">

<h2 class="mb-3">Products</h2>

<a class="btn btn-primary mb-3" href="{{ route('products.create') }}">Add Product</a>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th width="180">Action</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>₱ {{ $product->price }}</td>
        <td>
            <span class="category-badge"
            style="background-color: {{ $product->category->cat_color ?? '#000000' }}">
            {{ $product->category->cat_name }}
            </span>
        </td>
        <td>
            <a class="btn btn-edit btn-sm"
            href="{{ route('products.edit', $product->id) }}">
            Edit
            </a>

            <form action="{{ route('products.destroy', $product->id) }}"
                method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

                <button class="btn btn-delete btn-sm" type="submit">
                Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

</div>

@endsection