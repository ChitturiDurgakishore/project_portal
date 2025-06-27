<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UDYOGAM - Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons (Optional, for navigation icons) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa; /* Light grey background */
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure body takes full viewport height */
        }

        /* Header (Navbar) Styling */
        .admin-header.navbar {
            background-color: #343a40 !important; /* Dark background */
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }
        .admin-header .navbar-brand {
            color: #ffffff;
            font-weight: 600;
            font-size: 1.5rem;
        }
        .admin-header .navbar-text {
            color: rgba(255, 255, 255, 0.75);
            font-weight: 500;
        }
        .admin-header .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.5);
            color: rgba(255, 255, 255, 0.75);
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }
        .admin-header .btn-outline-light:hover {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff;
        }

        /* Main Wrapper for Sidebar and Content */
        #wrapper {
            display: flex;
            flex-grow: 1; /* Allows this section to fill available vertical space */
        }

        /* Sidebar Styling */
        #sidebar-wrapper {
            min-width: 250px; /* Fixed width for sidebar */
            max-width: 250px;
            background-color: #ffffff;
            border-right: 1px solid #dee2e6;
            transition: all 0.3s ease-in-out; /* Smooth transition for potential collapsing */
            padding-top: 1rem;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05); /* Subtle shadow */
            position: sticky; /* Sticky sidebar */
            top: 0; /* Stick to top of viewport */
            height: calc(100vh - 70px); /* Adjust height to fit viewport, subtract header height */
            overflow-y: auto; /* Enable scrolling for many menu items */
        }

        .sidebar-heading {
            padding: 1.5rem 1.25rem;
            font-size: 1.2rem;
            font-weight: 600;
            color: #343a40;
            background-color: #f8f9fa; /* Lighter background for heading */
            border-bottom: 1px solid #e9ecef;
            text-align: center;
        }

        .list-group-item-action {
            color: #495057;
            font-weight: 500;
            padding: 1rem 1.25rem;
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .list-group-item-action:hover {
            background-color: #e2e6ea; /* Lighter grey on hover */
            color: #007bff; /* Primary blue on hover */
        }
        .list-group-item-action.active {
            background-color: #007bff !important; /* Active item background */
            color: #ffffff !important; /* Active item text color */
            border-color: #007bff !important;
        }
        .list-group-item-action i {
            margin-right: 0.75rem;
        }


        /* Page Content Wrapper */
        #page-content-wrapper {
            flex-grow: 1; /* Allows content to take all remaining space */
            padding: 2rem; /* Consistent padding */
            background-color: #f0f2f5; /* Background for main content area */
            overflow-y: auto; /* Allow content scrolling */
        }

        /* Main Content Placeholders */
        .main-content-placeholder {
            min-height: 400px; /* Example min height for content area */
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 1.2rem;
            text-align: center;
            margin-top: 1.5rem;
        }

        /* Footer Styling */
        .admin-footer.footer {
            background-color: #343a40; /* Dark background */
            color: rgba(255, 255, 255, 0.75);
            font-weight: 400;
            padding: 1rem 0;
            text-align: center;
        }

        /* Responsive adjustments (optional, but good practice) */
        @media (max-width: 768px) {
            #sidebar-wrapper {
                min-width: 100%;
                max-width: 100%;
                height: auto; /* Allow sidebar to collapse naturally */
                position: relative; /* No longer sticky on small screens */
                border-right: none;
                border-bottom: 1px solid #dee2e6;
                box-shadow: none;
            }
            #wrapper {
                flex-direction: column; /* Stack sidebar and content vertically */
            }
            .navbar-collapse {
                margin-top: 1rem; /* Space below toggled header items */
            }
        }
    </style>
</head>
<body>
    <div class="d-flex flex-column min-vh-100">
        <!-- Header (Navbar) -->
        <nav class="navbar navbar-expand-lg navbar-dark admin-header">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">UDYOGAM Admin Dashboard</a>

                <!-- Toggler for smaller screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbarContent" aria-controls="adminNavbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="adminNavbarContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item me-3">
                            <span class="navbar-text">
                                <!-- Admin Email: This is a placeholder for dynamic content -->
                                {{ session('email') ?? 'admin@example.com' }}
                            </span>
                        </li>
                        <li class="nav-item">
                            <!-- Example Logout Form (replace action and add CSRF token for Laravel) -->

                                <a href="/admin/logout">LogOut</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content Area (Sidebar + Page Content) -->
        <div id="wrapper">
            <!-- Sidebar -->
            <div class="border-end" id="sidebar-wrapper">
                <div class="sidebar-heading">Admin Navigation</div>
                <div class="list-group list-group-flush">
                    <a href="/admin/orders" class="list-group-item list-group-item-action">
                        <i class="bi bi-cart"></i> Orders
                    </a>
                    <a href="/admin/users" class="list-group-item list-group-item-action">
                        <i class="bi bi-person-workspace"></i>USERS
                    </a>
                    <a href="/admin/companies" class="list-group-item list-group-item-action">
                        <i class="bi bi-person-workspace"></i>COMPANIES
                    </a>
                    <a href="/admin/skills" class="list-group-item list-group-item-action">
                        <i class="bi bi-currency-dollar"></i>Skills
                    </a>
                    <a href="/admin/job-categories" class="list-group-item list-group-item-action">
                        <i class="bi bi-tag"></i> Job Categories
                    </a>
                    <a href="/admin/job-posts" class="list-group-item list-group-item-action">
                        <i class="bi bi-journal-text"></i> Job Posts
                    </a>
                    <a href="/admin/job-roles" class="list-group-item list-group-item-action">
                        <i class="bi bi-person-workspace"></i> Job Roles
                    </a>
                    <a href="/admin/attributes" class="list-group-item list-group-item-action">
                        <i class="bi bi-sliders"></i> Attributes
                    </a>
                    <a href="/admin/locations" class="list-group-item list-group-item-action">
                        <i class="bi bi-geo-alt"></i> Locations
                    </a>
                    <a href="/admin/header-settings" class="list-group-item list-group-item-action">
                        <i class="bi bi-grip-horizontal"></i> Header Settings
                    </a>
                    <a href="/admin/footer-settings" class="list-group-item list-group-item-action">
                        <i class="bi bi-grip-vertical"></i> Footer Settings
                    </a>
                    <a href="/admin/background-settings" class="list-group-item list-group-item-action">
                        <i class="bi bi-person-workspace"></i> Back-Ground
                    </a>
                    <a href="/admin/price-plans" class="list-group-item list-group-item-action">
                        <i class="bi bi-currency-dollar"></i> Price Plans
                    </a>
                    <a href="/admin/database-options" class="list-group-item list-group-item-action">
                        <i class="bi bi-database"></i> Database Options
                    </a>
                </div>
            </div>

            <!-- Page Content Wrapper -->
            <div id="page-content-wrapper">
                <div class="container-fluid">

                    <div class="main-content-placeholder">

                       {{$MainContent}}

                       </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="admin-footer">
            <div class="container">
                <span class="text-muted">&copy; Kishore Copyright {{ date('Y') }}</span>
            </div>
        </footer>
    </div>

    <!-- Bootstrap Bundle with Popper JS (always place at end of body for performance) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
