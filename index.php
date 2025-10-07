<!-- Reverted to previous version: restoring button and night mode styles from two edits prior to white-on-white correction. -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SeamLink | Home</title>
	   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
	   <link href="style.css" rel="stylesheet">
			</head>
			<body>
							<nav class="navbar navbar-expand-lg navbar-light">
								<div class="container-fluid px-4">
									<a class="navbar-brand" href="#">SeamLink</a>
									<form class="d-none d-md-flex navbar-search" role="search">
										<input class="form-control" type="search" placeholder="Search products" aria-label="Search">
										<button class="btn" type="submit"><i class="fas fa-search"></i></button>
									</form>
									<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
										<span class="navbar-toggler-icon"></span>
									</button>
									<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
										<ul class="navbar-nav align-items-center">
											<li class="nav-item"><a class="nav-link" href="login/login.php">Login</a></li>
											<li class="nav-item"><a class="nav-link" href="login/register.php">Register</a></li>
											<li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a></li>
											<li class="nav-item ms-2">
												<div class="dropdown">
													<button class="btn btn-sm btn-outline-secondary dropdown-toggle" id="nightModeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
														<i class="fas fa-moon"></i> <span id="nightModeLabel">Auto</span>
													</button>
													<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="nightModeDropdown">
														<li><a class="dropdown-item night-toggle" href="#" data-mode="auto">Auto</a></li>
														<li><a class="dropdown-item night-toggle" href="#" data-mode="on">On</a></li>
														<li><a class="dropdown-item night-toggle" href="#" data-mode="off">Off</a></li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</nav>
	<?php
	// Dynamically load main content managed by admin
	if (file_exists('main_content.html')) {
		include 'main_content.html';
	} else {
	?>
		<section class="hero-section">
			<div class="container">
				<h1>Discover African Fashion, Seamlessly</h1>
				<p>Shop authentic kente, ankara, and more from top African designers. SeamLink connects you to the continent's best styles.</p>
				<a href="#products" class="btn">Shop Now</a>
			</div>
		</section>
		<section class="featured-products" id="products">
			<div class="container">
				<h2 class="mb-4 text-center fw-bold">Featured Products</h2>
				<div class="row g-4">
					<div class="col-md-4 col-12">
						<div class="card product-card">
							<img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" class="product-img" alt="Kente Fabric">
							<div class="card-body">
								<div class="product-title">Kente Fabric</div>
								<div class="product-price">GHC 540.00</div>
								<button class="btn btn-sm btn-outline-success mt-2">Add to Cart</button>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-12">
						<div class="card product-card">
							<img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=600&q=80" class="product-img" alt="Ankara Dress">
							<div class="card-body">
								<div class="product-title">Ankara Dress</div>
								<div class="product-price">GHC 720.00</div>
								<button class="btn btn-sm btn-outline-success mt-2">Add to Cart</button>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-12">
						<div class="card product-card">
							<img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=600&q=80" class="product-img" alt="Beaded Necklace">
							<div class="card-body">
								<div class="product-title">Beaded Necklace</div>
								<div class="product-price">GHC 300.00</div>
								<button class="btn btn-sm btn-outline-success mt-2">Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
							   <footer class="text-center py-4">
								&copy; 2025 SeamLink. All rights reserved.
							</footer>

						<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
						<script>
							// Night mode logic
							function getSystemNightMode() {
								return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
							}
							function applyNightMode(mode) {
								document.body.classList.remove('night-mode');
								if (mode === 'on' || (mode === 'auto' && getSystemNightMode())) {
									document.body.classList.add('night-mode');
								}
								document.getElementById('nightModeLabel').textContent =
									mode === 'auto' ? 'Auto' : (mode === 'on' ? 'On' : 'Off');
								// Highlight selected
								document.querySelectorAll('.night-toggle').forEach(function(el) {
									el.classList.remove('active');
									if (el.getAttribute('data-mode') === mode) el.classList.add('active');
								});
							}
							function setNightMode(mode) {
								localStorage.setItem('nightMode', mode);
								applyNightMode(mode);
							}
							function initNightMode() {
								let mode = localStorage.getItem('nightMode') || 'auto';
								applyNightMode(mode);
								if (mode === 'auto') {
									window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
										applyNightMode('auto');
									});
								}
								// Dropdown click handlers
								document.querySelectorAll('.night-toggle').forEach(function(el) {
									el.addEventListener('click', function(e) {
										e.preventDefault();
										setNightMode(el.getAttribute('data-mode'));
									});
								});
							}
							document.addEventListener('DOMContentLoaded', initNightMode);
						</script>
				</body>
				</html>
