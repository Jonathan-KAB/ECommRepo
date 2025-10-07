<?php
// products.php - Product Catalog Page
session_start();
require_once __DIR__ . '/settings/core.php';
require_once __DIR__ . '/controllers/product_controller.php';
// Fetch products via controller (MVC)
$products = get_all_products_ctr();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Catalog - SeamLink</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .product-card { min-height: 100%; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border-radius: 12px; }
        .product-img { object-fit: cover; height: 180px; width: 100%; border-radius: 12px 12px 0 0; }
        .product-title { font-size: 1.1rem; font-weight: 600; }
        .product-price { color: #ffc107; font-weight: 700; font-size: 1.1rem; }
        .navbar-dark .navbar-brand { color: #fff !important; }
    </style>
</head>
<body>

        <!-- Navbar (dark, dashboard style) -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <i class="fas fa-link"></i> SeamLink
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> Cart</a></li>
                        <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="login/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    <div class="container mt-4 mb-5">
        <div class="row mb-4 align-items-center">
            <div class="col-md-6">
                <h1 class="mb-0"><i class="fas fa-shopping-bag text-warning"></i> Browse Products</h1>
            </div>
            <div class="col-md-6">
                <input type="text" id="searchInput" class="form-control" placeholder="Search products...">
            </div>
        </div>
        <div class="row" id="product-list">
            <?php if (empty($products)): ?>
                <div class="col-12"><p>No products available yet.</p></div>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                <div class="col-md-4 col-lg-3 mb-4 product-card-outer">
                    <div class="card product-card h-100">
                        <img src="<?= htmlspecialchars($product['image']) ?>" class="product-img card-img-top" alt="Product Image">
                        <div class="card-body d-flex flex-column">
                            <div class="product-title mb-1"><?= htmlspecialchars($product['name']) ?></div>
                            <div class="mb-2 text-muted" style="font-size:0.95rem; height:2.5em; overflow:hidden;"> <?= htmlspecialchars($product['description']) ?> </div>
                            <div class="product-price mb-2"><i class="fas fa-tag"></i> $<?= htmlspecialchars($product['price']) ?></div>
                            <div class="mt-auto d-flex gap-2">
                                <a href="product_details.php?id=<?= urlencode($product['id']) ?>" class="btn btn-primary btn-sm flex-fill"><i class="fas fa-eye"></i> View Details</a>
                                <form method="post" action="cart.php" class="d-inline-block flex-fill">
                                    <input type="hidden" name="add_to_cart" value="1">
                                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                                    <button type="submit" class="btn btn-warning btn-sm w-100"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Simple client-side search
    document.getElementById('searchInput').addEventListener('input', function() {
        const val = this.value.toLowerCase();
        document.querySelectorAll('.product-card-outer').forEach(function(card) {
            const text = card.innerText.toLowerCase();
            card.style.display = text.includes(val) ? '' : 'none';
        });
    });
    </script>
</body>
</html>
