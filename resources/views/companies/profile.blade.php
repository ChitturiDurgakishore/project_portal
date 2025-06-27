<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Company Profile – UDYOGAM</title>
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

        .card {
            border: none;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            box-shadow: 0 0 10px var(--card-shadow);
        }

        .card-header {
            background-color: var(--bg);
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--primary-dark);
        }

        label {
            font-weight: 600;
            margin-bottom: 0.3rem;
        }

        .form-control,
        .form-select {
            border-radius: 6px;
        }

        .btn-save {
            background-color: var(--primary);
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-save:hover {
            background-color: var(--primary-dark);
            color: white;
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
                <li class="nav-item"><a class="nav-link" href="/CompanyDashBoard"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/company/jobs"><i class="bi bi-briefcase"></i> Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="/company/orders"><i class="bi bi-receipt-cutoff"></i> Orders</a></li>
                <li class="nav-item"><a class="nav-link active" href="/company/profile"><i class="bi bi-person-circle"></i> My Profile</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="/CompanyLogout"><i class="bi bi-box-arrow-right"></i> Log out</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <h2 class="mb-4 fw-bold">Company Profile</h2>

            <form action="/Company/updateProfile" method="POST" enctype="multipart/form-data" novalidate>
                @csrf

                <!-- Company Information -->
                <div class="card">
                    <div class="card-header">Company Information</div>
                    <div class="card-body row g-3">
                        <div class="col-md-6">
                            <label for="company_name">Company Name</label>
                            <input type="text" id="company_name" name="company_name" class="form-control" value="{{ old('company_name', $details->company_name) }}" />
                        </div>
                        <div class="col-md-6">
                            <label for="industry_type">Industry Type</label>
                            <select id="industry_type" name="industry_type" class="form-select">
                                @foreach ($industrytype as $type)
                                    <option value="{{ $type->category }}" {{ $details->industry_type == $type->category ? 'selected' : '' }}>
                                        {{ $type->category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="org_type">Organization Type</label>
                            <input type="text" id="org_type" name="org_type" class="form-control" value="{{ old('org_type', $details->org_type) }}" />
                        </div>
                        <div class="col-md-6">
                            <label for="team_size">Team Size</label>
                            <input type="text" id="team_size" name="team_size" class="form-control" value="{{ old('team_size', $details->team_size) }}" />
                        </div>
                        <div class="col-md-6">
                            <label for="established_date">Established Date</label>
                            <input type="date" id="established_date" name="established_date" class="form-control" value="{{ old('established_date', $details->established_date) }}" />
                        </div>
                        <div class="col-md-6">
                            <label for="logo">Logo</label>
                            <input type="file" id="logo" name="logo" class="form-control" />
                            @if ($details->logo)
                                <small>Current: <img src="{{ asset('storage/'.$details->logo) }}" alt="Logo" style="height: 40px;"></small>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="banner">Banner</label>
                            <input type="file" id="banner" name="banner" class="form-control" />
                            @if ($details->banner)
                                <small>Current: <img src="{{ asset('storage/'.$details->banner) }}" alt="Banner" style="height: 40px;"></small>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="bio">Bio</label>
                            <textarea id="bio" name="bio" rows="4" class="form-control">{{ old('bio', $details->bio) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="card">
                    <div class="card-header">Contact Information</div>
                    <div class="card-body row g-3">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $details->email) }}" />
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $details->phone) }}" />
                        </div>
                        <div class="col-md-6">
                            <label for="website">Website</label>
                            <input type="url" id="website" name="website" class="form-control" value="{{ old('website', $details->website) }}" />
                        </div>
                    </div>
                </div>

                <!-- Location -->
                <div class="card">
                    <div class="card-header">Location</div>
                    <div class="card-body row g-3">
                        <div class="col-md-4">
                            <label for="country">Country</label>
                            <select id="country" name="country" class="form-select">
                                @foreach ($locations->pluck('country')->unique() as $country)
                                    <option value="{{ $country }}" {{ $details->country == $country ? 'selected' : '' }}>
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="state">State</label>
                            <select id="state" name="state" class="form-select">
                                @foreach ($locations->pluck('state')->unique() as $state)
                                    <option value="{{ $state }}" {{ $details->state == $state ? 'selected' : '' }}>
                                        {{ $state }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="city">City</label>
                            <select id="city" name="city" class="form-select">
                                @foreach ($locations->pluck('city')->unique() as $city)
                                    <option value="{{ $city }}" {{ $details->city == $city ? 'selected' : '' }}>
                                        {{ $city }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $details->address) }}" />
                        </div>
                        <div class="col-12">
                            <label for="map_link">Map Link</label>
                            <input type="url" id="map_link" name="map_link" class="form-control" value="{{ old('map_link', $details->map_link) }}" />
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-save btn-lg">Update Profile</button>
                </div>
            </form>
        </main>
    </div>

    <!-- Footer -->
    <footer>
        UDYOGAM &copy; {{ date('Y') }} — empowering employers and talent.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
