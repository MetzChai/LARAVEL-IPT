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

    /* View Button Gradient */
    .btn-view {
        border: none;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        padding: 5px 12px;
        background: linear-gradient(90deg, #17a2b8, #20c997);
        color: white;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-view:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        color: white;
    }

    /* Action Buttons Container */
    .action-buttons {
        display: flex;
        gap: 8px;
        align-items: center;
        flex-wrap: wrap;
    }

    .action-buttons form {
        display: inline;
        margin: 0;
    }

    .action-buttons .btn-sm {
        padding: 6px 14px;
        font-size: 12px;
        font-weight: 600;
        border: none;
    }

    /* Delete Confirmation Modal */
    .delete-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(4px);
    }

    .delete-modal.show {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        max-width: 400px;
        text-align: center;
        animation: slideIn 0.3s ease-out;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-icon {
        font-size: 48px;
        margin-bottom: 15px;
    }

    .modal-title {
        font-size: 22px;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
    }

    .modal-text {
        color: #666;
        font-size: 14px;
        margin-bottom: 25px;
        line-height: 1.5;
    }

    .modal-product-name {
        font-weight: 600;
        color: #ff4fa3;
        display: block;
        margin: 10px 0 20px 0;
    }

    .modal-buttons {
        display: flex;
        gap: 12px;
        justify-content: center;
    }

    .modal-btn {
        padding: 10px 24px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .modal-btn-cancel {
        background: #e0e0e0;
        color: #333;
    }

    .modal-btn-cancel:hover {
        background: #d0d0d0;
    }

    .modal-btn-delete {
        background: linear-gradient(90deg, #ff4a6b, #ff758c);
        color: white;
    }

    .modal-btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(255, 74, 107, 0.3);
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
            <div class="action-buttons">
                <a class="btn btn-view btn-sm" href="{{ route('products.show', $product->id) }}" title="View product details">
                    👁 View
                </a>
                <a class="btn btn-edit btn-sm" href="{{ route('products.edit', $product->id) }}" title="Edit product">
                    ✎ Edit
                </a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-delete btn-sm delete-btn" type="button" title="Delete product" data-product-name="{{ $product->name }}" data-product-id="{{ $product->id }}">
                        🗑 Delete
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

</div></div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="delete-modal">
    <div class="modal-content">
        <div class="modal-icon">⚠️</div>
        <div class="modal-title">Delete Product?</div>
        <div class="modal-text">
            Are you sure you want to delete this product?
            <span class="modal-product-name" id="productName"></span>
            This action cannot be undone.
        </div>
        <div class="modal-buttons">
            <button class="modal-btn modal-btn-cancel" id="cancelBtn">Cancel</button>
            <button class="modal-btn modal-btn-delete" id="confirmDeleteBtn">Delete Permanently</button>
        </div>
    </div>
</div>

<script>
    const deleteModal = document.getElementById('deleteModal');
    const cancelBtn = document.getElementById('cancelBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    const productNameSpan = document.getElementById('productName');
    let currentDeleteForm = null;

    // Open modal when delete button is clicked
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            productNameSpan.textContent = '"' + this.getAttribute('data-product-name') + '"';
            currentDeleteForm = this.closest('.delete-form');
            deleteModal.classList.add('show');
        });
    });

    // Close modal when cancel button is clicked
    cancelBtn.addEventListener('click', function() {
        deleteModal.classList.remove('show');
        currentDeleteForm = null;
    });

    // Close modal when clicking outside the modal
    deleteModal.addEventListener('click', function(e) {
        if (e.target === deleteModal) {
            deleteModal.classList.remove('show');
            currentDeleteForm = null;
        }
    });

    // Submit form when confirm delete is clicked
    confirmDeleteBtn.addEventListener('click', function() {
        if (currentDeleteForm) {
            currentDeleteForm.submit();
        }
    });
</script>

@endsection