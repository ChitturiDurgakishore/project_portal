<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Candidate Details – UDYOGAM</title>
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

        .detail-row {
            margin-bottom: 15px;
        }

        .detail-label {
            font-weight: 600;
        }

        .skill-badge {
            background: var(--primary);
            color: white;
            margin: 5px 5px 0 0;
        }

        footer {
            background: #212529;
            color: #adb5bd;
            padding: 20px 0;
            text-align: center;
        }

        @media (max-width: 768px) {
            .detail-row {
                flex-direction: column;
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
            <h2 class="fw-bold text-success mb-4">Candidate Profile</h2>

            @if ($details)
                <div class="row detail-row">
                    <div class="col-md-6">
                        <span class="detail-label">Name:</span> {{ $details->name }}
                    </div>
                    <div class="col-md-6">
                        <span class="detail-label">Email:</span> {{ $details->email }}
                    </div>
                </div>

                <div class="row detail-row">
                    <div class="col-md-6">
                        <span class="detail-label">Phone:</span> {{ $details->phone }}
                    </div>
                    <div class="col-md-6">
                        <span class="detail-label">Experience:</span> {{ $details->experience }} years
                    </div>
                </div>

                <div class="row detail-row">
                    <div class="col-md-6">
                        <span class="detail-label">Current Title:</span> {{ $details->title }}
                    </div>
                    <div class="col-md-6">
                        <span class="detail-label">Website:</span>
                        <a href="{{ $details->website }}" target="_blank">{{ $details->website }}</a>
                    </div>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Address:</span> {{ $details->location ?? 'N/A' }}
                </div>

                <div class="mt-4 mb-4">
                    <h5 class="mb-2 text-primary">Skills:</h5>
                    @if ($skills->count())
                        @foreach ($skills as $skill)
                            <span class="badge rounded-pill bg-dark text-white">{{ $skill->skill_name }}</span>
                        @endforeach
                    @else
                        <p class="text-muted">No skills added yet.</p>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="mt-4">
                    <form action="/company/candidate/{{ $details->user_id }}/shortlist/{{$job_id}}" method="POST"
                        class="d-inline-block me-2">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-hand-thumbs-up-fill"></i> Shortlist
                        </button>
                    </form>

                    <form action="/company/candidate/{{ $details->user_id }}/reject/{{$job_id}}" method="POST"
                        class="d-inline-block">
                        @csrf

                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-x-circle-fill"></i> Reject
                        </button>
                    </form>
                </div>
            @else
                <p class="text-danger">Candidate details not found.</p>
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
