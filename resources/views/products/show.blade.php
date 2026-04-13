@extends('layouts.app')

@section('title', 'Product Details')

@section('content')

<style>
    /* Page Container */
    .product-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 40px;
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* Title */
    .product-title {
        font-size: 32px;
        font-weight: 600;
        margin-bottom: 10px;
        background: linear-gradient(90deg, #ff4fa3, #8b5cf6, #3da5ff);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Product Info Row */
    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #e5e5e5;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 600;
        color: #666;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-value {
        font-size: 16px;
        color: #333;
        font-weight: 500;
    }

    /* Price Styling */
    .price-value {
        font-size: 28px;
        background: linear-gradient(90deg, #ff4fa3, #8b5cf6);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: 700;
    }

    /* Category Badge */
    .category-badge {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 20px;
        color: white;
        font-size: 14px;
        font-weight: 500;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    /* Timestamps */
    .timestamps {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 2px solid #f0f0f0;
        font-size: 12px;
        color: #999;
    }

    .timestamp-item {
        margin: 8px 0;
    }

    /* Buttons Container */
    .button-container {
        display: flex;
        gap: 12px;
        margin-top: 30px;
    }

    /* Edit Button */
    .btn-edit {
        flex: 1;
        border: none;
        border-radius: 10px;
        font-weight: 500;
        padding: 12px;
        background: linear-gradient(90deg, #ff4fa3, #8b5cf6, #3da5ff);
        color: white;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s ease;
    }

    .btn-edit:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        color: white;
    }

    /* Back Button */
    .btn-back {
        flex: 1;
        border: 2px solid #3da5ff;
        border-radius: 10px;
        font-weight: 500;
        padding: 12px;
        background: transparent;
        color: #3da5ff;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background: #3da5ff;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(61, 165, 255, 0.3);
    }

    /* Metadata */
    .metadata {
        background: linear-gradient(135deg, rgba(255, 79, 163, 0.05), rgba(139, 92, 246, 0.05));
        padding: 15px;
        border-radius: 10px;
        border-left: 4px solid #8b5cf6;
    }
</style>

<div class="product-container">
    <h1 class="product-title">{{ $product->name }}</h1>

    <div class="info-row">
        <span class="info-label">Price</span>
        <span class="price-value">₱ {{ number_format($product->price, 2) }}</span>
    </div>

    <div class="info-row">
        <span class="info-label">Category</span>
        <span class="category-badge"
            style="background-color: {{ $product->category->cat_color ?? '#888888' }}">
            {{ $product->category->cat_name }}
        </span>
    </div>

    <div class="metadata">
        <div class="timestamps">
            <div class="timestamp-item">
                <strong>Created:</strong> {{ $product->created_at->format('M d, Y • h:i A') }}
            </div>
            <div class="timestamp-item">
                <strong>Last Updated:</strong> {{ $product->updated_at->format('M d, Y • h:i A') }}
            </div>
        </div>
    </div>

    <div class="button-container">
        <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">
            ✎ Edit Product
        </a>
        <a href="{{ route('products.index') }}" class="btn-back">
            ← Back to Products
        </a>
    </div>
</div>

@endsection
