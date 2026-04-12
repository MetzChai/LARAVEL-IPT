<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Gradient Background */
        body{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            background: linear-gradient(135deg,#ff9ecf,#c6a4ff,#8ec5ff);
            font-family: 'Poppins', sans-serif;
        }

        /* Glassmorphism Card */
        .form-container{
            width:420px;
            padding:40px;
            border-radius:18px;
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(12px);
            box-shadow:0 15px 40px rgba(0,0,0,0.15);
            border:1px solid rgba(255,255,255,0.3);
        }

        /* Title */
        h2{
            text-align:center;
            margin-bottom:30px;
            font-weight:600;
            letter-spacing:0.5px;
            background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff);
            -webkit-background-clip:text;
            background-clip: text;
            -webkit-text-fill-color:transparent;
        }

        /* Inputs */
        .form-control{
            border-radius:10px;
            padding:10px;
            border:1px solid #e5e5e5;
            transition:all .3s ease;
        }

        .form-control:focus{
            border-color:#a18cd1;
            box-shadow:0 0 8px rgba(161,140,209,0.35);
        }

        /* Buttons */
        .btn-primary, .btn-secondary{
            border:none;
            border-radius:10px;
            font-weight:500;
            padding:10px;
            transition: all .3s ease;
        }

        .btn-primary{
            background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff);
            color:white;
        }

        .btn-secondary{
            background:#777;
            color:white;
        }

        .btn-primary:hover, .btn-secondary:hover{
            transform:translateY(-3px);
            box-shadow:0 8px 20px rgba(0,0,0,0.2);
        }

        .form-footer{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:10px;
            flex-wrap:wrap;
        }
    </style>

</head>
<body>

<div class="form-container">

<h2>Edit Category</h2>

<form method="POST" action="{{ route('categories.update', $category->id) }}">
    @csrf
    @method('PUT')

    <input class="form-control" type="text" name="cat_name" value="{{ old('cat_name', $category->cat_name) }}" placeholder="Category Name"><br>
    @error('cat_name')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <input class="form-control" type="text" name="cat_color" value="{{ old('cat_color', $category->cat_color) }}" placeholder="Category Color (e.g. #FF0000)"><br>
    @error('cat_color')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <div class="form-footer">
        <a class="btn btn-secondary" href="{{ route('categories.index') }}">Cancel</a>
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
</form>

</div>

</body>
</html>