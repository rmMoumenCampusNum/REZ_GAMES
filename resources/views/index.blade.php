<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REZ'GAME</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<!-- Header -->
<header>
    <h1>REZ'GAME</h1>
    <nav>
        <a href="/index">Accueil</a>
        <a href="/Items">Produits</a>
    </nav>
</header>

<!-- Banner Section -->
<section class="banner">
    <div class="container">
        <h2>Welcome to the Best Online Store!</h2>
        <p>Discover the latest trends and amazing products at unbeatable prices.</p>
        <a href="/produits" class="button">Shop Now</a>
    </div>
</section>

<!-- Featured Products Section -->
<main>
    <div class="container">
        <h2>Featured Products</h2>
        <div class="product-grid">
            <!-- Product 1 -->
            <div class="product-card">
                <img src="https://via.placeholder.com/250x200" alt="Product 1" class="product-image">
                <div class="product-details">
                    <h2>Product 1</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p class="product-price">$29.99</p>
                    <a href="#" class="button">Buy Now</a>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="product-card">
                <img src="https://via.placeholder.com/250x200" alt="Product 2" class="product-image">
                <div class="product-details">
                    <h2>Product 2</h2>
                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p class="product-price">$39.99</p>
                    <a href="#" class="button">Buy Now</a>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="product-card">
                <img src="https://via.placeholder.com/250x200" alt="Product 3" class="product-image">
                <div class="product-details">
                    <h2>Product 3</h2>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    <p class="product-price">$49.99</p>
                    <a href="#" class="button">Buy Now</a>
                </div>
            </div>
            <!-- Product 4 -->
            <div class="product-card">
                <img src="https://via.placeholder.com/250x200" alt="Product 4" class="product-image">
                <div class="product-details">
                    <h2>Product 4</h2>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                    <p class="product-price">$59.99</p>
                    <a href="#" class="button">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer>
    <p>&copy; 2024 My E-commerce Site. All rights reserved.</p>
</footer>
</body>
</html>
