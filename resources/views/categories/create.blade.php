<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>

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

        /* Save Button Gradient */
        .btn-primary{
            border:none;
            border-radius:10px;
            font-weight:500;
            padding:10px;
            background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff);
            color:white;
            transition: all .3s ease;
        }

        .btn-primary:hover{
            transform:translateY(-3px);
            box-shadow:0 8px 20px rgba(0,0,0,0.2);
        }

    </style>

</head>
<body>

<div class="form-container">

<h2>Add Category</h2>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf

    <input class="form-control" type="text" name="cat_name" placeholder="Category Name"><br>

    <input class="form-control" type="text" name="cat_color" placeholder="Category Color"><br>

    <button class="btn btn-primary w-100" type="submit">Save</button>
</form>

</div>

</body>
</html>