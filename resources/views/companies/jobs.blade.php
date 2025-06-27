<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Company Jobs – UDYOGAM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

    <style>
        :root {
            --primary: #28a745;
            --primary-dark: #218838;
            --bg: #f0f2f5;
            --white: #ffffff;
            --text-dark: #343a40;
            --gray: #6c757d;
            --card-shadow: rgba(0, 0, 0, 0.08);
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: var(--bg);
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background: var(--white);
            padding: 1rem 2rem;
            box-shadow: 0 2px 8px var(--card-shadow);
        }

        .header .navbar-brand h1 {
            font-weight: 800;
            color: var(--primary-dark);
            margin: 0;
        }

        .main-layout {
            display: flex;
            flex: 1;
            padding: 30px;
        }

        .sidebar {
            width: 250px;
            background: var(--white);
            border-radius: 10px;
            padding: 25px;
            margin-right: 25px;
            box-shadow: 0 0 10px var(--card-shadow);
            position: sticky;
            top: 20px;
        }

        .sidebar-heading {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 25px;
        }

        .sidebar-nav .nav-link {
            color: var(--text-dark);
            font-weight: 500;
            padding: 12px 16px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            transition: 0.2s ease;
        }

        .sidebar-nav .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .sidebar-nav .nav-link:hover,
        .sidebar-nav .nav-link.active {
            background: var(--primary);
            color: #fff;
        }

        .main-content {
            flex: 1;
            background: var(--white);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px var(--card-shadow);
        }

        .btn-primary {
            background: var(--primary);
            border: none;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        footer {
            background: #212529;
            color: #adb5bd;
            padding: 20px 0;
            text-align: center;
        }

        @media (max-width: 991px) {
            .main-layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    <nav class="header navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/company/dashboard">
                <h1><strong><i>UDYOGAM</i></strong></h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <span class="nav-link">Hi, {{ session('email') }}</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="/CompanyLogout">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Layout -->
    <div class="main-layout container-fluid">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h5 class="sidebar-heading">Navigation</h5>
            <ul class="nav flex-column sidebar-nav">
                <li class="nav-item"><a class="nav-link" href="/CompanyDashBoard"><i class="bi bi-speedometer2"></i>
                        Dashboard</a></li>
                <li class="nav-item"><a class="nav-link active" href="/company/jobs"><i class="bi bi-briefcase"></i>
                        Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="/company/orders"><i class="bi bi-receipt-cutoff"></i>
                        Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="/company/profile"><i class="bi bi-person-circle"></i> My
                        Profile</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="/CompanyLogout"><i
                            class="bi bi-box-arrow-right"></i> Log out</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">Jobs Posted</h2>
                <a href="/company/jobs/create" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Create New Job
                </a>
            </div>

            @if ($jobs->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Vacancies</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $index => $job)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->job_type }}</td>
                                    <td>{{ $job->vacancies }}</td>
                                    <td>{{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $job->view_status == 'pending' ? 'bg-warning text-dark' : 'bg-success' }}">
                                            {{ ucfirst($job->view_status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="/company/jobs/{{ $job->job_id }}/applicants"
                                            class="btn btn-sm btn-info me-2" title="View Applicants" style="margin: 5px">
                                            <i class="bi bi-people-fill"></i> <span
                                                class="d-none d-md-inline">Applicants</span>
                                        </a> &nbsp; <br>
                                        <a href="/company/jobs/{{ $job->job_id }}/shortlisted"
                                            class="btn btn-sm btn-success me-2" title="Shortlisted" style="margin: 5px">
                                            <i class="bi bi-person-check-fill"></i> <span
                                                class="d-none d-md-inline">Shortlisted</span>
                                        </a> &nbsp;<br>
                                        <form action="/company/jobs/{{ $job->job_id }}/delete" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure to delete this job?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete Job" style="margin: 5px">
                                                <i class="bi bi-trash-fill"></i> <span
                                                    class="d-none d-md-inline">Delete</span>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center py-4">No jobs posted yet.</p>
            @endif
        </main>
    </div>

    <!-- Footer -->
    <footer>
        UDYOGAM &copy; {{ date('Y') }} — empowering employers and talent.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
