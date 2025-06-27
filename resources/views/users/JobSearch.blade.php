<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Job Posts' }} - Mediguide</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-image: url({{ $background->url ?? '' }});
            background-color: {{ $backgroundColor->url ?? '#f0f2f5' }};
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        .header {
            background-color: #ffffff;
            /* White background for the header */
            padding: 20px 0;
            border-bottom: 1px solid #e9ecef;
            /* Light border at the bottom */
            box-shadow: 0 2px 4px rgba(0, 0, 0, .05);
            /* Subtle shadow for depth */
        }

        .header h1 {
            color: #343a40;
            /* Darker text for the title */
            margin-bottom: 0;
            /* Remove default margin */
            font-size: 1.75rem;
            /* Adjust title size */
        }

        .header .navbar-nav .nav-link {
            color: #007bff;
            /* Bootstrap primary blue for links */
            font-weight: 500;
            margin-right: 15px;
            /* Spacing between links */
            transition: color 0.3s ease;
            /* Smooth transition on hover */
        }

        .header .navbar-nav .nav-link:hover {
            color: #0056b3;
            /* Darker blue on hover */
        }

        .job-search-section,
        .section-card {
            /* Unified style for various content sections */
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, .08);
            /* More prominent shadow */
            margin-bottom: 30px;
            /* Space between sections */
        }

        .section-title {
            color: #343a40;
            margin-bottom: 25px;
            font-size: 2rem;
            text-align: center;
        }

        .job-card {
            border: none;
            /* Remove default card border */
            box-shadow: 0 0 15px rgba(0, 0, 0, .05);
            /* Lighter shadow for individual cards */
            border-radius: 8px;
            transition: transform 0.2s ease;
            height: 100%;
            /* Ensure cards in a row have same height */
        }

        .job-card:hover {
            transform: translateY(-5px);
            /* Lift effect on hover */
        }

        .job-card .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            background-color: #e6f2ff;
            /* Light blue background for job cards, similar to home page companies/featured jobs */
        }

        .job-card .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #343a40;
            /* Darker text for titles */
            margin-bottom: 0.5rem;
        }

        .job-card .card-subtitle {
            font-size: 1rem;
            color: #007bff;
            /* Primary blue for company names */
            margin-bottom: 1rem;
        }

        .job-card .job-meta {
            font-size: 0.95rem;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .job-card .job-meta i {
            margin-right: 0.5rem;
            color: #007bff;
            /* Icon color */
        }

        .job-card .job-description {
            font-size: 0.9rem;
            color: #343a40;
            margin-bottom: 1rem;
            max-height: 4.5em;
            /* Limit to approx 3 lines of text */
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* Number of lines to show before truncating */
            -webkit-box-orient: vertical;
        }

        .job-card .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-weight: 500;
            margin-top: auto;
            /* Push button to the bottom if content above varies in height */
            border-radius: 0.375rem;
            box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075);
        }

        .job-card .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .no-results {
            padding: 2.5rem;
            background-color: #fff;
            border-radius: 0.75rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            text-align: center;
            color: #6c757d;
        }

        .no-results h2 {
            color: #007bff;
            margin-bottom: 1rem;
        }


        /* Reusing styles from home page for consistency */
        .rounded-md {
            border-radius: 0.375rem !important;
        }

        .rounded-lg {
            border-radius: 0.5rem !important;
        }

        .shadow-sm {
            box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
        }

        .shadow {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }

        #skillSelect,
        #experienceSelect,
        #locationSelect {
            color: #333333;
            background-color: #ffffff;
        }

        #skillSelect option,
        #experienceSelect option,
        #locationSelect option {
            color: #333333;
            background-color: #f8f9fa;
        }

        #skillSelect option:hover,
        #skillSelect option:checked,
        #experienceSelect option:hover,
        #experienceSelect option:checked,
        #locationSelect option:hover,
        #locationSelect option:checked {
            background-color: #007bff;
            color: #ffffff;
        }

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
            color: white !important;
        }
    </style>
</head>

<body>
    <div class="wholebody">
        <nav class="navbar navbar-expand-lg header">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <h1><i><strong>{{ $title->name?? 'UDYOGAM' }}</strong></i></h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                     <ul class="navbar-nav">
                        @foreach ($links as $link)
                            @if ($link->name !== 'Login' && $link->name !== 'Register' && $link->name !== 'For employer')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ $link->url }}">{{ $link->name }}</a>
                                </li>
                            @endif
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link" href="/UserLogOut">LogOut</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/UserDashBoard">{{ session('name') }}</a>
                        </li>
                        <li>
                            <a href="/UserDashBoard"><i class="bi bi-person-circle fs-4" style="color: black"></i>
                                <i class="bi bi-list fs-4" style="color: black"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="job-search-section">
                <h1 class="section-title">Find Your Next Opportunity</h1>
                <form action="/JobSearch" method="get" class="row g-3 justify-content-center">
                    {{-- No @csrf for GET requests if it's just for filtering/search --}}
                    <div class="col-md-4">
                        <label for="skillSelect" class="form-label visually-hidden">Skill</label>
                        <select name="skill" id="skillSelect" class="form-select rounded-md shadow-sm">
                            <option value="">Select Skill</option>
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->skillname }}"
                                    {{ request('skill') == $skill->skillname ? 'selected' : '' }}>
                                    {{ $skill->skillname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="experienceSelect" class="form-label visually-hidden">Experience</label>
                        <select name="experience" id="experienceSelect" class="form-select rounded-md shadow-sm">
                            <option value="">Select Experience</option>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}"
                                    {{ request('experience') == $i ? 'selected' : '' }}>
                                    {{ $i }} year{{ $i > 1 ? 's' : '' }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="locationSelect" class="form-label visually-hidden">Location</label>
                        <select name="location" id="locationSelect" class="form-select rounded-md shadow-sm">
                            <option value="">Select City</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->city }}"
                                    {{ request('location') == $location->city ? 'selected' : '' }}>
                                    {{ $location->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary rounded-md shadow">Search Jobs</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container mb-5">
            <div class="section-card">
                <h2 class="section-title">All Job Listings</h2>
                @if ($jobs->isEmpty())
                    <div class="no-results">
                        <h2><i class="bi bi-x-circle me-2"></i>No Jobs Found</h2>
                        <p class="lead">We couldn't find any job listings matching your search criteria at the
                            moment.</p>
                        <p>Please try adjusting your search terms or check back later!</p>
                    </div>
                @else
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach ($jobs as $job)
                            <div class="col">
                                <div class="card h-100 job-card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $job->title ?? 'N/A Job Title' }}</h5>
                                        <h6 class="card-subtitle">
                                            <i class="bi bi-building me-1"></i>
                                            {{ $job->company_name ?? 'N/A Company' }}
                                        </h6>
                                        <p class="job-meta">
                                            <i class="bi bi-geo-alt me-1"></i>
                                            {{
                                                implode(', ', array_filter([$job->city, $job->state, $job->country]))
                                                ?: 'Location Not Specified'
                                            }}
                                        </p>
                                        <p class="job-meta">
                                            <i class="bi bi-currency-dollar me-1"></i> Salary:
                                            @if ($job->min_salary && $job->max_salary)
                                                ${{ number_format($job->min_salary) }} -
                                                ${{ number_format($job->max_salary) }}
                                                {{ $job->salary_type ? '/ ' . $job->salary_type : '' }}
                                            @elseif ($job->min_salary)
                                                From ${{ number_format($job->min_salary) }}
                                                {{ $job->salary_type ? '/ ' . $job->salary_type : '' }}
                                            @else
                                                Negotiable
                                            @endif
                                        </p>
                                        <div class="job-description">
                                            <p>{{ $job->description ?? 'No detailed description available.' }}</p>
                                        </div>
                                        <a href="/jobs/{{ $job->job_id }}"
                                            class="btn btn-primary mt-auto stretched-link">
                                            View Details <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h5>About Us</h5>
                        @if ($AboutUs)
                            <p class="text-muted" style="color:#e9ecef">{{ $AboutUs->name }}</p>
                        @endif
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            @foreach ($supportlinks as $supportlink)
                                <li><a href="{{ $supportlink->url }}">{{ $supportlink->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5>Social Links</h5>
                        <ul class="list-unstyled">
                            @foreach ($sociallinks as $sociallink)
                                <li><a href="{{ $sociallink->url }}">{{ $sociallink->name }}</a></li>
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
