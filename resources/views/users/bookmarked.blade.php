<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookmarked Jobs - UDYOGAM</title> {{-- Updated Title --}}
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> {{-- Corrected integrity attribute --}}
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* UDYOGAM Color Palette */
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
                        <a class="nav-link" href="/User/AppliedJobs"> {{-- This link is now for Applied Jobs --}}
                            <i class="bi bi-journal-check"></i> Applied Jobs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/User/Bookmark">
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
                    <h2 class="text-center mb-4 display-5 fw-bold text-dark">Your Bookmarked Jobs</h2>

                    {{-- Conditional rendering for the table and empty message --}}
                    @if ($bookmarked->isNotEmpty()) {{-- Check if $bookmarked has any items --}}
                        <div class="table-responsive">
                            <table class="table job-table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 25%;">Job Title</th>
                                        <th scope="col" style="width: 30%;">Company & Location</th>
                                        <th scope="col" style="width: 25%;">Details</th>
                                        <th scope="col" style="width: 20%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookmarked as $job)
                                        <tr>
                                            <td>
                                                <div class="job-title">{{ $job->title ?? 'Job Title Not Available' }}</div>
                                            </td>
                                            <td>
                                                <div class="company-info">
                                                    {{ $job->company_name ?? 'Company Name Not Available' }}
                                                </div>
                                                <div class="company-info">
                                                    <i class="bi bi-geo-alt-fill me-1"></i>{{ $job->city ?? 'Location Not Available' }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-wrap">
                                                    <span class="job-meta-tag">
                                                        <i class="bi bi-briefcase"></i> {{ $job->job_type ?? 'Full-time' }}
                                                    </span>
                                                    <span class="job-meta-tag">
                                                        <i class="bi bi-currency-dollar"></i>
                                                        {{ $job->min_salary ?? 'Not Disclosed' }}
                                                        @if ($job->min_salary && $job->max_salary)
                                                            -
                                                        @endif
                                                        {{ $job->max_salary ?? '' }}
                                                    </span>
                                                </div>
                                                <p class="job-description-brief mt-2"> {{-- Changed from job-description to brief --}}
                                                    {{ Str::limit($job->description ?? 'No description available.', 70) }} {{-- Adjusted limit for brevity --}}
                                                </p>
                                            </td>
                                            <td>
                                                <div class="action-buttons d-flex flex-column gap-2">
                                                    <form action="/RemoveBookmark/{{$job->job_id }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger w-100">
                                                            <i class="bi bi-bookmark-x-fill me-2"></i>Remove
                                                        </button>
                                                    </form>
                                                    <a href="/User/Job-Apply/{{$job->job_id}}" class="btn btn-primary w-100"> {{-- Changed to btn-primary --}}
                                                        <i class="bi bi-send-fill me-2"></i>Apply Now
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="col-md-10 offset-md-1 mx-auto">
                            <div class="alert alert-info text-center p-4 shadow-sm rounded-3" role="alert">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                You haven't bookmarked any jobs yet. Start exploring and saving!
                            </div>
                        </div>
                    @endif
                </div>
            </main>
        </div>
