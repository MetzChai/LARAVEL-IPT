<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>

    <!-- Bootstrap CSS -->
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
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            border:1px solid rgba(255,255,255,0.3);
        }

        /* Title */
        h2{
            text-align:center;
            margin-bottom:30px;
            font-weight:600;
            letter-spacing:0.5px;
            background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff);
            background-clip: text;
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        /* Inputs */
        .form-control,
        .form-select{
            border-radius:10px;
            padding:10px;
            border:1px solid #e5e5e5;
            transition:all .3s ease;
        }

        .form-control:focus,
        .form-select:focus{
            border-color:#a18cd1;
            box-shadow:0 0 8px rgba(161,140,209,0.3);
        }

        /* Button */
        .btn-primary{
            border:none;
            border-radius:10px;
            font-weight:500;
            padding:10px;
            background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff);
            transition:all .3s ease;
        }

        .btn-primary:hover{
            transform:translateY(-3px);
            box-shadow:0 8px 20px rgba(0,0,0,0.2);
        }

        /* Error Messages */
        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Input Error Border */
        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: #dc3545 !important;
            box-shadow: 0 0 8px rgba(220, 53, 69, 0.3) !important;
        }

        /* Form Group Spacing */
        .form-group {
            margin-bottom: 18px;
        }

        /* Success Alert */
        .alert-success {
            border-radius: 10px;
            border: none;
            margin-bottom: 20px;
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.1), rgba(40, 167, 69, 0.05));
            color: #155724;
            border-left: 4px solid #28a745;
        }

    </style>

</head>
<body>

<div class="form-container">

<h2>Add Product</h2>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <strong>⚠ Validation Error!</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('products.store') }}" novalidate>
    @csrf

    <div class="form-group">
        <input class="form-control @error('name') is-invalid @enderror" 
               type="text" 
               name="name" 
               placeholder="Product Name"
               value="{{ old('name') }}"
               required>
        @error('name')
            <div class="error-message">
                <span>✕</span> {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <input class="form-control @error('price') is-invalid @enderror" 
               type="text" 
               name="price" 
               placeholder="Price"
               value="{{ old('price') }}"
               required>
        @error('price')
            <div class="error-message">
                <span>✕</span> {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <select class="form-select @error('category_id') is-invalid @enderror" 
                name="category_id"
                required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->cat_name }}
            </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="error-message">
                <span>✕</span> {{ $message }}
            </div>
        @enderror
    </div>

    <button class="btn btn-primary w-100" type="submit">Save</button>

</form>

</div>

</body>
</html>