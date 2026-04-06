<nav class="navbar navbar-expand-lg navbar-light" style="background: rgba(255,255,255,0.85); backdrop-filter: blur(12px); box-shadow:0 8px 25px rgba(0,0,0,0.1); border-radius:10px;">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="{{ url('/') }}" style="background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">
            Product Management
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link px-3 rounded" href="{{ route('products.index') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 rounded" href="{{ route('categories.index') }}">Categories</a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<style>
    /* Navbar Links Gradient Hover */
    .navbar .nav-link {
        color: #555;
        font-weight:500;
        transition: all 0.3s ease;
    }

    .navbar .nav-link:hover {
        background: linear-gradient(90deg,#ff4fa3,#8b5cf6,#3da5ff);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Toggler */
    .navbar-toggler {
        border: none;
    }

    .navbar-toggler-icon {
        filter: brightness(0.7);
    }
</style>