<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #ffffff;
            --secondary-color: #89c4e6;
            --footer-color: #010717;
        }

        body {
            background-color: var(--primary-color);
            font-family: 'Segoe UI', sans-serif;
        }

        a {
            text-decoration: none !important;
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #6fb2dc;
            border-color: #6fb2dc;
            color: #fff;
        }

        .hero {
            position: relative;
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            padding: 2rem;
            border-radius: 1rem;
        }

        .category-card:hover,
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        footer {
            background-color: var(--footer-color);
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid #333;
            padding-top: 1rem;
        }

        #navbarContent.collapse:not(.show) {
            display: none !important;
        }

        #navbarContent.show {
            display: block !important;
            width: 100%;
            margin-top: 1rem;
        }

        @media (max-width: 767.98px) {

            #navbarContent nav,
            #navbarContent form,
            #navbarContent .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }

            #navbarContent form {
                flex-direction: column;
            }

            #navbarContent form input {
                margin-right: 0 !important;
                margin-bottom: 0.5rem;
            }
        }

        .whatsapp-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }

        .whatsapp-widget a {
            display: flex;
            align-items: center;
            background-color: #25D366;
            color: white;
            padding: 10px 16px;
            border-radius: 50px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .whatsapp-widget a:hover {
            background-color: #1ebc59;
        }

        .whatsapp-widget svg {
            margin-right: 8px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="py-3 border-bottom shadow-sm">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h4 text-dark mb-0">E-Book Store</h1>
                <div class="collapse d-md-flex flex-md-row gap-3 align-items-center" id="navbarContentFullScreen">
                    <nav class="nav flex-column flex-md-row">
                        <a class="nav-link text-dark" href="#">Home</a>
                        <a class="nav-link text-dark" href="#">Books</a>
                        <a class="nav-link text-dark" href="#">Categories</a>
                        <a class="nav-link text-dark" href="#">Contact</a>
                    </nav>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search books..."
                            aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                    <a href="#" class="btn btn-primary">Login</a>
                </div>
                <button class="btn btn-primary d-md-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarContent">
                    Menu
                </button>
            </div>
            <div class="collapse d-md-flex flex-md-row justify-content-md-between align-items-md-center mt-3 mt-md-0"
                id="navbarContent">
                <nav class="nav flex-column flex-md-row mb-3 mb-md-0">
                    <a class="nav-link text-dark" href="#">Home</a>
                    <a class="nav-link text-dark" href="#">Books</a>
                    <a class="nav-link text-dark" href="#">Categories</a>
                    <a class="nav-link text-dark" href="#">Contact</a>
                </nav>
                <form class="d-flex flex-row" role="search">
                    <div class="col-9 me-2">
                        <input class="form-control me-2" type="search" placeholder="Search books..." aria-label="Search">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
                <a href="#" class="btn btn-primary ms-md-3">Login</a>
            </div>
        </div>
    </header>

    <!-- Hero / Slider Section -->
    <section class="hero">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/1920x500" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4 fw-bold">Explore Limitless Stories</h2>
                        <p class="lead">Discover, Read, and Enjoy from our curated e-book collection</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1920x500/cccccc" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4 fw-bold">A World of Knowledge Awaits</h2>
                        <p class="lead">Browse thousands of e-books in every category</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Our New Books -->
    <section class="py-5">
        <div class="container">
            <h3 class="mb-4 text-dark">Our New Books</h3>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/200x300" class="card-img-top" alt="Book Cover">
                        <div class="card-body">
                            <h5 class="card-title">Book Title</h5>
                            <p class="card-text">Author Name</p>
                            <a href="#" class="btn btn-primary w-100">Buy Now</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat card for more books -->
            </div>
        </div>
    </section>

    <!-- New Books Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Our New Books</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Book 1">
                        <div class="card-body">
                            <h5 class="card-title">Book Title 1</h5>
                            <p class="card-text">Short description of the book.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Book 2">
                        <div class="card-body">
                            <h5 class="card-title">Book Title 2</h5>
                            <p class="card-text">Short description of the book.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Book 3">
                        <div class="card-body">
                            <h5 class="card-title">Book Title 3</h5>
                            <p class="card-text">Short description of the book.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Books Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4 text-center">Our New Books</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Book 1">
                        <div class="card-body">
                            <h5 class="card-title">Book Title 1</h5>
                            <p class="card-text">Short description of the book.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Book 2">
                        <div class="card-body">
                            <h5 class="card-title">Book Title 2</h5>
                            <p class="card-text">Short description of the book.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Book 3">
                        <div class="card-body">
                            <h5 class="card-title">Book Title 3</h5>
                            <p class="card-text">Short description of the book.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="#" class="btn btn-primary">View All Books</a>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="py-5 bg-light">
        <div class="container">
            <h3 class="mb-4 text-dark">Categories</h3>
            <div class="row g-4">
                <div class="col-md-2">
                    <div class="card text-center p-3 category-card border border-0 shadow-sm">
                        <strong>Fiction</strong>
                    </div>
                </div>
                <!-- Repeat for more categories -->
            </div>
        </div>
    </section>

    <!-- Upcoming Books -->
    <section class="py-5">
        <div class="container">
            <h3 class="mb-4 text-dark">Upcoming Books</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Upcoming Book">
                        <div class="card-body">
                            <h5 class="card-title">Upcoming Book Title</h5>
                            <p class="card-text">Coming soon in May 2025</p>
                            <button class="btn btn-primary w-100" disabled>Coming Soon</button>
                        </div>
                    </div>
                </div>
                <!-- Repeat for more upcoming books -->
            </div>
        </div>
    </section>

    <!-- Message Us -->
    <section class="py-5 bg-light">
        <div class="container">
            <h3 class="mb-4 text-dark">Message Us</h3>
            <form>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="Your Email">
                    </div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" rows="4" placeholder="Your Message"></textarea>
                </div>
                <button class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>E-Book Store</h5>
                    <p>Read your favorite books anytime, anywhere. Explore thousands of titles.</p>
                    <div>
                        <a href="#" class="text-white me-3">Facebook</a>
                        <a href="#" class="text-white me-3">Twitter</a>
                        <a href="#" class="text-white">Instagram</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Important Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Privacy Policy</a></li>
                        <li><a href="#" class="text-white">Terms & Conditions</a></li>
                        <li><a href="#" class="text-white">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Contact Us</h5>
                    <p>123, Book Street, Knowledge City</p>
                    <p>Email: support@sazumme.com</p>
                    <p>Phone: +880 1234 567890</p>
                </div>
            </div>
            <div class="text-center footer-bottom">
                <p class="mb-0">&copy; 2025 SazUmme E-Book Store. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <div class="whatsapp-widget">
        <a href="https://wa.me/8801234567890" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path d="M13.601 2.326a7.875 7.875 0 0 0-11.194 0 7.875 7.875 0 0 0-1.97 8.049L.07 15.927l5.656-1.48a7.875 7.875 0 0 0 7.875-12.121zM8.075 13.37a6.236 6.236 0 0 1-3.365-.979l-.242-.146-3.347.877.892-3.26-.158-.27a6.225 6.225 0 1 1 11.383-1.987 6.225 6.225 0 0 1-5.163 5.765zm3.578-4.745c-.198-.099-1.17-.577-1.351-.642-.18-.066-.312-.099-.444.099-.132.198-.51.642-.624.774-.115.132-.23.148-.429.05-.198-.099-.837-.308-1.594-.984a5.93 5.93 0 0 1-1.099-1.35c-.116-.198-.012-.305.087-.403.089-.088.198-.23.297-.346.099-.115.132-.198.198-.33.066-.132.033-.248-.017-.347-.05-.099-.444-1.072-.609-1.47-.16-.384-.323-.332-.444-.338a.73.73 0 0 0-.396.033c-.132.066-.347.132-.53.33-.182.198-.694.678-.694 1.653s.71 1.918.81 2.05c.099.132 1.397 2.134 3.392 2.992.474.204.843.326 1.131.417.475.15.91.129 1.253.078.382-.057 1.17-.478 1.336-.939.165-.462.165-.857.116-.939-.05-.082-.182-.132-.38-.231z" />
            </svg>
            Chat with us
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
