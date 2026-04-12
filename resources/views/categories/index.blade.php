@extends ('layouts.app')
@section('title', 'Category List')

@section ('content')

<style>
    /* Page Container */
    .page-container{
        max-width:700px;
        margin:40px auto;
        padding:30px;
        border-radius:18px;
        background: rgba(255,255,255,0.85);
        backdrop-filter: blur(12px);
        box-shadow:0 15px 40px rgba(0,0,0,0.15);
        border:1px solid rgba(255,255,255,0.3);
    }

    /* Page Title */
    h2{
        font-weight:600;
        margin-bottom:20px;
        background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff);
        background-clip: text;
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
    }
    /* Buttons */
    .btn-primary, .btn-secondary{
        border:none;
        border-radius:8px;
        font-weight:500;
        padding:8px 15px;
        transition: all 0.3s ease;
    }

    .btn-primary{
        background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff);
        color:white;
    }

    .btn-primary:hover{
        transform:translateY(-2px);
        box-shadow:0 6px 15px rgba(0,0,0,0.2);
    }

    .btn-secondary{
        background: #777;
        color:white;
    }

    .btn-secondary:hover{
        transform:translateY(-2px);
        box-shadow:0 6px 15px rgba(0,0,0,0.15);
    }

    /* List Group */
    .list-group-item{
        border-radius:12px;
        margin-bottom:10px;
        display:flex;
        justify-content:space-between;
        align-items:center;
        box-shadow:0 5px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .list-group-item:hover{
        background-color:#f6f3ff;
        transform:translateY(-2px);
    }

    /* Category Badge */
    .category-color{
        padding:6px 12px;
        border-radius:20px;
        font-size:12px;
        font-weight:500;
        box-shadow:0 2px 8px rgba(0,0,0,0.15);
    }

    .category-meta{
        display:flex;
        gap:0.75rem;
        align-items:center;
        flex-wrap:wrap;
        margin-top:8px;
    }

    .action-group{
        display:flex;
        gap:0.5rem;
        align-items:center;
    }

    .btn-edit, .btn-delete{
        border:none;
        border-radius:8px;
        font-size:13px;
        font-weight:500;
        padding:5px 12px;
        transition: all 0.3s ease;
    }

    .btn-edit{
        background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff);
        color:white;
    }

    .btn-delete{
        background: linear-gradient(90deg,#ff4a6b,#ff758c,#ffa3b1);
        color:white;
    }

    .btn-edit:hover, .btn-delete:hover{
        transform:translateY(-2px);
        box-shadow:0 6px 15px rgba(0,0,0,0.2);
    }

</style>

<div class="page-container">

<h2 class="mb-3">Categories</h2>

<a class="btn btn-secondary mb-2" href="{{ route('products.store') }}">Back</a><br>
<a class="btn btn-primary mb-3" href="{{ route('categories.create') }}">Add Category</a>

<ul class="list-group">
    @foreach($categories as $category)
    <li class="list-group-item">

        {{ $category->cat_name }}

        <div class="category-meta">
            <span class="category-color"
                  style="background-color: {{ $category->cat_color }}; color: {{ in_array(strtolower(trim($category->cat_color)), ['#ffffff','white','rgb(255,255,255)']) ? '#000' : '#fff' }};">
                {{ $category->cat_color }}
            </span>

            <div class="action-group">
                <a class="btn btn-edit btn-sm" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-delete btn-sm" type="submit" onclick="return confirm('Delete this category?')">Delete</button>
                </form>
            </div>
        </div>

    </li>
    @endforeach
</ul>

</div>

@endsection