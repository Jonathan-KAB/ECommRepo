# ECommRepo

A repository for the SeamLink E-Commerce MVP — a platform connecting African fashion designers and artisans with global buyers.

## Project Overview

**SeamLink** is an e-commerce platform designed to empower African fashion creators by providing them with access to international markets. The MVP focuses on core features that can be realistically achieved within a semester, laying the foundation for future expansion.

## MVP Features

- **Home Page**: Introduction to SeamLink, mission statement, and featured products/designers.
- **User Registration & Login**: Basic authentication for buyers and sellers.
- **Product Listings**: Sellers can add products with images, descriptions, and prices.
- **Product Catalog**: Buyers can browse and search products by category or designer.
- **Product Details Page**: View detailed information and images for each product.
- **Shopping Cart**: Add/remove products, view cart summary.
- **Checkout (Mocked)**: Simple checkout form (no real payment integration for MVP).
- **Order Confirmation**: Confirmation page after checkout.
- **Seller Dashboard**: Sellers can view and manage their own products and orders.
- **Admin Panel (Basic)**: Admin can approve sellers and moderate listings.

## Pages Structure

- `/` — Home
- `/register` — User registration
- `/login` — User login
- `/products` — Product catalog
- `/products/:id` — Product details
- `/cart` — Shopping cart
- `/checkout` — Checkout form
- `/dashboard` — Seller dashboard
- `/admin` — Admin panel

## Tech Stack

- **Backend**: PHP (XAMPP), MySQL
- **Frontend**: HTML, CSS, JavaScript (optionally Bootstrap)
- **Authentication**: PHP sessions
- **Deployment**: Local XAMPP server

## How to Run

1. Clone the repository.
2. Place the project in your XAMPP `htdocs` directory.
3. Import the provided SQL file into your MySQL database.
4. Start Apache and MySQL via XAMPP.
5. Access the app at `http://localhost/ECommRepo/`.

## Future Improvements

- Real payment integration (e.g., Paystack, Stripe)
- Advanced logistics and order tracking
- Messaging between buyers and sellers
- Enhanced admin controls
- Mobile responsiveness

---

*This MVP is designed for a semester project and focuses on core e-commerce functionality. Contributions and feedback are welcome!*