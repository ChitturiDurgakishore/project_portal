<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apply for Job - Mediguide</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Mediguide Color Palette (from previous examples, adjusted for consistency) */
        :root {
            --primary-color: #007bff;
            /* A professional blue */
            --primary-dark-color: #0056b3;
            /* Darker shade for accents */
            --light-bg: #f0f2f5;
            /* Light grey background */
            --card-bg: #FFFFFF;
            /* White for cards/sections */
            --text-dark: #343a40;
            /* Dark grey for primary text */
            --text-muted: #6c757d;
            /* Muted text */
            --shadow-subtle: rgba(0, 0, 0, 0.05);
            --shadow-medium: rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Inter', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--light-bg);
            line-height: 1.6;
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Header Styling */
        .header {
            background-color: var(--card-bg);
            padding: 1.2rem 1.5rem;
            box-shadow: 0 2px 8px var(--shadow-subtle);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .navbar-brand h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0;
            color: var(--primary-dark-color);
        }

        /* Main Layout */
        .main-layout {
            display: flex;
            flex: 1;
            padding-top: 20px;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            min-width: 200px;
            background-color: var(--card-bg);
            box-shadow: 2px 0 8px var(--shadow-subtle);
            padding: 20px;
            border-radius: 8px;
            margin-left: 20px;
            margin-right: 20px;
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .sidebar-heading {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary-dark-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e9ecef;
        }

        .sidebar-nav .nav-link {
            padding: 10px 15px;
            color: var(--text-dark);
            font-weight: 500;
            transition: all 0.2s ease;
            border-radius: 5px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }

        .sidebar-nav .nav-link i {
            margin-right: 10px;
            color: var(--text-muted);
        }

        .sidebar-nav .nav-link:hover {
            background-color: var(--light-bg);
            color: var(--primary-dark-color);
        }

        .sidebar-nav .nav-link.active {
            background-color: var(--primary-color);
            color: var(--card-bg);
            box-shadow: 0 2px 5px rgba(0, 123, 255, 0.2);
            /* Updated shadow for primary blue */
        }

        .sidebar-nav .nav-link.active i {
            color: var(--card-bg);
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            background-color: var(--card-bg);
            box-shadow: 0 0 15px var(--shadow-medium);
            padding: 30px;
            border-radius: 8px;
            margin-right: 20px;
            margin-bottom: 20px;
        }

        /* Form Specific Styling */
        .apply-form-card {
            background-color: var(--card-bg);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px var(--shadow-medium);
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border-radius: 0.5rem;
            padding: 10px 15px;
            border: 1px solid #ced4da;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }

        .btn-submit {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: var(--card-bg);
            padding: 12px 25px;
            border-radius: 0.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .btn-submit:hover {
            background-color: var(--primary-dark-color);
            border-color: var(--primary-dark-color);
            transform: translateY(-2px);
        }

        /* Footer Styling */
        .footer-section {
            background-color: #343a40;
            color: #f8f9fa;
            padding: 40px 0;
            margin-top: 50px;
        }

        .footer-section a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #0056b3;
        }

        .text-muted {
            color: #e9ecef !important;
            /* Adjusted for better contrast on dark footer */
        }
    </style>
</head>

<body>
    <div class="wholebody">
        <nav class="navbar navbar-expand-lg header">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <h1><i><strong>Mediguide</strong></i></h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        {{-- Assuming $links is an array of objects with 'name' and 'url' properties --}}
                        @php
                            $navLinks = [
                                (object) ['name' => 'Home', 'url' => '/'],
                                (object) ['name' => 'Find Jobs', 'url' => '/jobs'],
                                (object) ['name' => 'Companies', 'url' => '/companies'],
                                (object) ['name' => 'Contact Us', 'url' => '/contact'],
                                // 'Login', 'Register', 'For employer' are intentionally excluded based on the job details page logic
                            ];
                        @endphp

                        @foreach ($navLinks as $link)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $link->url }}">{{ $link->name }}</a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link" href="/UserLogOut">LogOut</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/User/UserInfoDashBoard">{{ session('name') ?? 'User' }}</a>
                        </li>
                        <li>
                            <a href="/User/UserInfoDashBoard"><i class="bi bi-person-circle fs-4"
                                    style="color: black"></i>
                                <i class="bi bi-list fs-4" style="color: black"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="main-layout">
            <aside class="sidebar">
                <h5 class="sidebar-heading">Navigation</h5>
                <ul class="nav flex-column sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/LoggedDashBoard">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/User/AppliedJobs">
                            <i class="bi bi-journal-check"></i> Applied Jobs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/BookmarkedJobs">
                            <i class="bi bi-bookmark-fill"></i> Bookmarked
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/MyProfile">
                            <i class="bi bi-person-fill"></i> My Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="/UserLogOut">
                            <i class="bi bi-box-arrow-right"></i> Log out
                        </a>
                    </li>
                </ul>
            </aside>

            <main class="main-content">
                <div class="container py-2">
                    <h2 class="text-center mb-5 display-5 fw-bold text-dark">Apply for Job</h2>

                    <div class="apply-form-card mx-auto" style="max-width: 800px;">
                        {{-- Laravel Blade form example --}}
                        <form action="/ApplyJob/{{ $job_id ?? 'job_id_here' }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- Hidden input for job ID, if applicable --}}
                            {{-- <input type="hidden" name="job_id" value="{{ $job_id ?? '' }}"> --}}

                            <div class="mb-4">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="full_name"
                                    value="{{ old('full_name', session('name') ?? '') }}" required>
                                {{-- @error('full_name') <div class="text-danger mt-1">{{ $message }}</div> @enderror --}}
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', session('email') ?? '') }}" required>
                                {{-- @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror --}}
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="form-label">Phone Number (Optional)</label>
                                <input type="tel" class="form-control" id="phone" name="phone_number"
                                    value="{{ old('phone_number') }}">
                                {{-- @error('phone_number') <div class="text-danger mt-1">{{ $message }}</div> @enderror --}}
                            </div>

                            <div class="mb-4">
                                <label for="resume" class="form-label">Upload Resume (PDF, DOC, DOCX)</label>
                                <input type="file" class="form-control" id="resume" name="resume"
                                    accept=".pdf,.doc,.docx" required>
                                <div class="form-text">Max file size: 5MB.</div>
                                {{-- @error('resume') <div class="text-danger mt-1">{{ $message }}</div> @enderror --}}
                            </div>

                            <div class="mb-4">
                                <label for="coverLetter" class="form-label">Cover Letter (Optional)</label>
                                <textarea class="form-control" id="coverLetter" name="cover_letter" rows="7">{{ old('cover_letter') }}</textarea>
                                <div class="form-text">Tell us why you're a great fit for this role.</div>
                                {{-- @error('cover_letter') <div class="text-danger mt-1">{{ $message }}</div> @enderror --}}
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-submit">
                                    <i class="bi bi-check-circle-fill me-2"></i>Submit Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>

        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h5>About Us</h5>
                        {{-- Assuming $AboutUs is an object with a 'name' property --}}
                        <p class="text-muted">Mediguide is committed to connecting talent with opportunity in the
                            medical field.</p>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            {{-- Assuming $supportlinks is an array of objects with 'name' and 'url' properties --}}
                            @php
                                $supportlinks = [
                                    (object) ['name' => 'FAQ', 'url' => '/faq'],
                                    (object) ['name' => 'Privacy Policy', 'url' => '/privacy'],
                                    (object) ['name' => 'Terms of Service', 'url' => '/terms'],
                                ];
                            @endphp
                            @foreach ($supportlinks as $supportlink)
                                <li><a href="{{ $supportlink->url }}">{{ $supportlink->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5>Social Links</h5>
                        <ul class="list-unstyled">
                            {{-- Assuming $sociallinks is an array of objects with 'name' and 'url' properties --}}
                            @php
                                $sociallinks = [
                                    (object) ['name' => 'Facebook', 'url' => '#'],
                                    (object) ['name' => 'Twitter', 'url' => '#'],
                                    (object) ['name' => 'LinkedIn', 'url' => '#'],
                                ];
                            @endphp
                            @foreach ($sociallinks as $sociallink)
                                <li><a href="{{ $sociallink->url }}"><i
                                            class="bi bi-{{ strtolower($sociallink->name) }} me-2"></i>{{ $sociallink->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <hr class="my-4 border-secondary">
                <div class="text-center text-muted">
                    &copy; {{ date('Y') }} Mediguide. All rights reserved.
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
