<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UDYOGAM Dashboard</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Color Palette */
        :root {
            --primary-color: #5cb85c;
            --primary-dark-color: #4cae4c;
            --light-bg: #f0f2f5;
            --card-bg: #FFFFFF;
            --text-dark: #343a40;
            --text-muted: #6c757d;
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
        }

        .header {
            background-color: var(--card-bg);
            padding: 1rem 1.5rem;
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

        .main-layout {
            display: flex;
            flex: 1;
            padding-top: 20px;
        }

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

        .main-content {
            flex: 1;
            background-color: var(--card-bg);
            box-shadow: 0 0 15px var(--shadow-medium);
            padding: 20px;
            border-radius: 8px;
            margin-right: 20px;
            margin-bottom: 20px;
        }

        .dashboard-card {
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.25rem !important;
            min-height: 180px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .dashboard-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .dashboard-card-primary {
            background: linear-gradient(to right, #4a00e0, #8e2de2);
            color: white;
        }

        .dashboard-card-secondary {
            background: linear-gradient(to right, #00b09b, #96c93d);
            color: white;
        }

        .dashboard-card .card-title {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .dashboard-card .card-text {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .dashboard-card .card-subtitle {
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }

        .list-group-item.job-item {
            border: 1px solid #e9ecef;
            border-left: 5px solid var(--primary-color);
            margin-bottom: 10px;
            background-color: var(--card-bg);
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
        }

        .list-group-item.job-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .status-badge {
            padding: 0.4em 0.7em;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 0.8em;
        }

        .status-submitted {
            background-color: var(--primary-color);
            color: #fff;
        }

        .row.g-4.mb-5 {
            margin-bottom: 1rem !important;
        }

        @media (max-width: 991px) {
            .main-layout {
                flex-direction: column;
                padding: 15px;
            }

            .sidebar {
                width: 100%;
                margin: 0 0 20px 0;
                position: static;
            }

            .main-content {
                margin: 0;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                padding: 1rem;
            }

            .row.g-4.mb-5 .col-md-3 {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="wholebody">
        <nav class="navbar navbar-expand-lg header">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <h1><strong><i>UDYOGAM</i></strong></h1>
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
                        <a class="nav-link active" href="/User/UserInfoDashBoard">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/User/AppliedJobs">
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
                <div class="container-fluid py-3">
                    <div class="row g-4 mb-5 justify-content-center">
                        <!-- Jobs Applied Card -->
                        <div class="col-md-3">
                            <div class="card dashboard-card dashboard-card-primary shadow-lg border-0">
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold text-white">
                                        <i class="bi bi-journal-check me-2"></i>Jobs Applied
                                    </h5>
                                    <p class="card-text fw-bolder text-white">
                                        {{ $details->jobs_applied ?? 0 }}
                                    </p>
                                    <p class="card-subtitle text-white-75">Total applications submitted.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Jobs Bookmarked Card -->
                        <div class="col-md-3">
                            <div class="card dashboard-card dashboard-card-secondary shadow-lg border-0">
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold text-white">
                                        <i class="bi bi-bookmark-star me-2"></i>Jobs Bookmarked
                                    </h5>
                                    <p class="card-text fw-bolder text-white">
                                        {{ $details->jobs_bookmarked ?? 0 }}
                                    </p>
                                    <p class="card-subtitle text-white-75">Saved for future consideration.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recently Applied Jobs Section -->
                    <div class="card dashboard-card p-4 bg-white shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title text-dark fw-bold border-bottom pb-2">Recently Applied Jobs</h5>
                            <ul class="list-group list-group-flush mt-4">
                                @forelse($jobdetails as $job)
                                    @php
                                        // Find the corresponding JobsApplied record for the current job_id
                                        $appliedJobStatus = $status->firstWhere('job_id', $job->job_id);
                                        $currentStatus = $appliedJobStatus->status ?? 'N/A'; // Get status or default

                                        // Determine the badge class based on the status
                                        $statusClass = '';
                                        switch (strtolower($currentStatus)) {
                                            case 'pending':
                                                $statusClass = 'status-pending bg-warning-subtle text-warning';
                                                break;
                                            case 'submitted':
                                                $statusClass = 'status-submitted bg-success-subtle text-success';
                                                break;
                                            case 'reviewed':
                                                $statusClass = 'status-reviewed bg-info-subtle text-info';
                                                break;
                                            case 'interview scheduled':
                                                $statusClass = 'status-interview bg-primary-subtle text-primary'; // Using primary for interview
                                                break;
                                            case 'accepted':
                                                $statusClass = 'status-accepted bg-success text-white'; // Solid green for accepted
                                                break;
                                            case 'rejected':
                                                $statusClass = 'status-rejected bg-danger text-white'; // Solid red for rejected
                                                break;
                                            case 'withdrawn':
                                                $statusClass = 'status-withdrawn bg-secondary text-white'; // Solid grey for withdrawn
                                                break;
                                            default:
                                                $statusClass = 'bg-secondary-subtle text-secondary'; // Default styling
                                                break;
                                        }
                                    @endphp
                                    <li
                                        class="list-group-item job-item d-flex align-items-center rounded-3 py-3 px-4 shadow-sm">
                                        <i class="bi bi-briefcase-fill text-primary me-4 fs-4"></i>
                                        <div class="d-flex flex-column flex-grow-1">
                                            <span class="fw-semibold text-dark">
                                                {{ $job->title ?? 'Job Title N/A' }} -
                                                {{-- Assuming company_name is available on $job or needs a relationship --}}
                                                {{ $job->company_name ?? 'Company Name N/A' }}
                                            </span>
                                            <small class="text-muted">Applied:
                                                {{ \Carbon\Carbon::parse($appliedJobStatus->created_at ?? now())->format('M d, Y') }}
                                                {{-- Using created_at from JobsApplied record for accurate application date --}}
                                            </small>
                                        </div>
                                        <span class="badge status-badge {{ $statusClass }} rounded-pill px-3 py-2">
                                            {{ $currentStatus }}
                                        </span>
                                    </li>
                                @empty
                                    <li class="list-group-item text-center text-muted p-4 border-0">
                                        No recent job applications found.
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
