<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Applied Jobs - UDYOGAM</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* UDYOGAM Color Palette (Copied from provided Bookmarked Jobs page) */
        :root {
            --primary-color: #5cb85c;
            /* A professional green */
            --primary-dark-color: #4cae4c;
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
            box-shadow: 0 2px 5px rgba(92, 184, 92, 0.2);
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

        /* Table Specific Styling (adapted from Bookmarked Jobs) */
        .table-responsive {
            margin-top: 20px;
        }

        .job-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px; /* Space between rows */
        }

        .job-table th {
            background-color: var(--primary-color);
            color: var(--card-bg);
            padding: 15px 20px;
            text-align: left;
            font-weight: 600;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .job-table tbody tr {
            background-color: var(--card-bg);
            border-radius: 8px;
            box-shadow: 0 2px 5px var(--shadow-subtle);
            transition: all 0.2s ease-in-out;
        }

        .job-table tbody tr:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px var(--shadow-medium);
        }

        .job-table td {
            padding: 15px 20px;
            vertical-align: middle;
            border-top: none;
            border-bottom: none;
        }

        .job-table td:first-child {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .job-table td:last-child {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .job-title {
            font-weight: 600;
            color: var(--primary-dark-color);
        }

        .company-info {
            font-size: 0.9em;
            color: var(--text-muted);
        }

        .job-description-brief {
            font-size: 0.85em;
            color: var(--text-dark);
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .job-meta-tag {
            display: inline-flex;
            align-items: center;
            background-color: var(--light-bg);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8em;
            color: var(--text-muted);
            margin-right: 8px;
            margin-bottom: 5px;
        }

        .job-meta-tag i {
            margin-right: 5px;
            color: var(--primary-color);
        }

        .action-buttons .btn {
            border-radius: 0.5rem;
            font-weight: 500;
            padding: 8px 15px;
            font-size: 0.9em;
        }

        /* Status badges (adapted to UDYOGAM's green primary color where applicable) */
        .status-badge {
            padding: 0.5em 0.8em;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 0.85em;
        }

        .status-pending { background-color: #ffc107; color: #343a40; } /* Yellow */
        .status-submitted { background-color: var(--primary-color); color: #fff; } /* Primary Green */
        .status-reviewed { background-color: #17a2b8; color: #fff; } /* Info Blue (general color) */
        .status-interview { background-color: #6f42c1; color: #fff; } /* Purple (general color) */
        .status-accepted { background-color: #28a745; color: #fff; } /* Green */
        .status-rejected { background-color: #dc3545; color: #fff; } /* Red */
        .status-withdrawn { background-color: #6c757d; color: #fff; } /* Grey */


        /* Footer Styling */
        .footer-section {
            background-color: #343a40;
            color: #f8f9fa;
            padding: 40px 0;
            margin-top: 50px;
        }

        .footer-section a {
            color: var(--primary-color);
            /* Links in footer use primary color */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--primary-dark-color);
        }

        .text-muted {
            color: #e9ecef !important;
        }
    </style>
</head>

<body>
    <div class="wholebody">
        <nav class="navbar navbar-expand-lg header">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <h1><i><strong>UDYOGAM</strong></i></h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
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
                            <i class="bi bi-speedometer2"></i> Search Job
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/User/UserInfoDashBoard">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/User/AppliedJobs">
                            <i class="bi bi-journal-check"></i> Applied Jobs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/User/Bookmark">
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
                <div class="container-fluid py-2">
                    <h2 class="text-center mb-4 display-5 fw-bold text-dark">Your Applied Jobs</h2>

                    {{-- Conditional rendering for the table and empty message --}}
                    @if ($details->isNotEmpty()) {{-- Check if $details has any items --}}
                        <div class="table-responsive">
                            <table class="table job-table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 25%;">Job Title</th>
                                        <th scope="col" style="width: 25%;">Company & Location</th>
                                        <th scope="col" style="width: 15%;">Application Date</th>
                                        <th scope="col" style="width: 15%;">Status</th>
                                        <th scope="col" style="width: 20%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details as $appliedJob)
                                        <tr>
                                            <td>
                                                <div class="job-title">{{ $appliedJob->title ?? 'Job Title Not Available' }}</div>
                                                <p class="job-description-brief mt-1">
                                                    {{ Str::limit($appliedJob->description ?? 'No description available.', 70) }}
                                                </p>
                                            </td>
                                            <td>
                                                <div class="company-info">
                                                    {{ $appliedJob->company_name ?? 'Company Name Not Available' }}
                                                </div>
                                                <div class="company-info">
                                                    <i class="bi bi-geo-alt-fill me-1"></i>{{ $appliedJob->city ?? 'Location Not Available' }}
                                                </div>
                                            </td>
                                            <td>
                                                {{-- Assuming application_date exists and is a Carbon instance or parseable string --}}
                                                {{ \Carbon\Carbon::parse($appliedJob->application_date ?? now())->format('M d, Y') }}
                                            </td>
                                            <td>
                                                @php
                                                    $status = strtolower($appliedJob->status ?? 'N/A');
                                                    $statusClass = '';
                                                    switch ($status) {
                                                        case 'pending': $statusClass = 'pending'; break;
                                                        case 'submitted': $statusClass = 'submitted'; break;
                                                        case 'reviewed': $statusClass = 'status-reviewed'; break;
                                                        case 'interview': $statusClass = 'status-interview'; break;
                                                        case 'accepted': $statusClass = 'status-accepted'; break;
                                                        case 'rejected': $statusClass = 'status-rejected'; break;
                                                        case 'withdrawn': $statusClass = 'status-withdrawn'; break;
                                                        default: $statusClass = ''; break;
                                                    }
                                                @endphp
                                                <span class="status-badge {{ $statusClass }}">
                                                    {{ $appliedJob->application_status ?? 'N/A' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="action-buttons d-flex flex-column gap-2">
                                                    {{-- Link to view full job details (assuming a route for this exists) --}}
                                                    <a href="/User/Job-Details/{{ $appliedJob->job_id ?? '#' }}" class="btn btn-outline-primary">
                                                        <i class="bi bi-eye-fill me-2"></i>View Details
                                                    </a>
                                                    {{-- Form to withdraw application --}}
                                                    {{-- Adjust action URL and method based on your Laravel routes --}}
                                                    <form action="/WithdrawApplication/{{ $appliedJob->job_id ?? '#' }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-secondary w-100">
                                                            <i class="bi bi-box-arrow-right me-2"></i>Withdraw
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="col-md-10 offset-md-1 mx-auto"> {{-- Added mx-auto for centering in absence of table rows --}}
                            <div class="alert alert-info text-center p-4 shadow-sm rounded-3" role="alert">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                You haven't applied for any jobs yet. Start exploring and applying!
                            </div>
                        </div>
                    @endif
                </div>
            </main>
        </div>

        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h5>About Us</h5>
                        {{-- Dummy data for About Us, replace with your actual Laravel $AboutUs variable if needed --}}
                        <p class="text-muted">UDYOGAM is dedicated to connecting talent with opportunity.</p>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            {{-- Dummy data for support links, replace with your actual Laravel $supportlinks variable --}}
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
                            {{-- Dummy data for social links, replace with your actual Laravel $sociallinks variable --}}
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
                    &copy; {{ date('Y') }} UDYOGAM. All rights reserved.
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS CDN (Bundle with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
