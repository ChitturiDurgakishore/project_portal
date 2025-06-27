<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            /* Use null coalescing to prevent errors if $background or $backgroundColor are null */
            background-image: url({{ $background->url ?? '' }});
            background-color: {{ $backgroundColor->url ?? '' }};
        }

        .header {
            background-color: #ffffff;
            padding: 20px 0;
            border-bottom: 1px solid #e9ecef;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .05);
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

        /* Custom styles for category buttons */
        .category-button {
            display: block;
            /* Make them block elements to take full width of column */
            width: 100%;
            /* Ensure they fill the column */
            margin-bottom: 15px;
            /* Space between buttons */
            padding: 15px;
            text-align: center;
            border-radius: .5rem;
            text-decoration: none;
            color: #343a40;
            background-color: #e9ecef;
            /* Light grey background */
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-weight: 600;
        }

        .category-button:hover {
            background-color: #dee2e6;
            /* Slightly darker grey on hover */
            transform: translateY(-2px);
            /* Slight lift effect */
            color: #343a40;
            /* Keep text color same on hover */
        }

        .company-card,
        .job-card,
        .pricing-card {
            border: none;
            /* Remove default card border */
            box-shadow: 0 0 15px rgba(0, 0, 0, .05);
            /* Lighter shadow for individual cards */
            border-radius: 8px;
            transition: transform 0.2s ease;
            height: 100%;
            /* Ensure cards in a row have same height */
        }

        .company-card:hover,
        .job-card:hover,
        .pricing-card:hover {
            transform: translateY(-5px);
            /* Lift effect on hover */
        }

        .company-logo {
            max-width: 80px;
            height: auto;
            margin-bottom: 15px;
        }

        .pricing-card-header {
            background-color: #f0f2f5;
            /* Light background for header */
            border-bottom: 1px solid #e9ecef;
            padding: 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .pricing-card-body ul {
            list-style: none;
            padding: 0;
            margin-bottom: 20px;
        }

        .pricing-card-body ul li {
            padding: 8px 0;
            border-bottom: 1px dashed #e9ecef;
            color: #6c757d;
        }

        .pricing-card-body ul li:last-child {
            border-bottom: none;
        }

        .footer-section {
            background-color: #343a40;
            /* Dark background for footer */
            color: #f8f9fa;
            /* Light text color */
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

        .rounded-md {
            border-radius: 0.375rem !important;
            /* Bootstrap's default for rounded-3 is 0.3rem */
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

        /* Ensure font-weight for labels */
        .form-label.font-weight-bold {
            font-weight: 600;
            /* Inter SemiBold */
        }

        /* Specific styling for buttons to match your other elements */
        .btn-primary {
            /* Assuming Bootstrap classes for color, padding etc. */
            /* Adding shadow and border-radius here for consistency */
            border-radius: 0.375rem;
            /* Matches .rounded-md */
            box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075);
            /* Matches .shadow-sm */
        }

        #skillSelect {
            color: #333333;
            /* Dark grey font color for the selected option in the dropdown */
            background-color: #ffffff;
            /* White background for the dropdown */
        }

        /* Styling for the options within the dropdown */
        /* Note: Styling <option> elements consistently across all browsers is limited.
       Some browsers might apply background-color/color, others might not. */
        #skillSelect option {
            color: #333333;
            /* Dark grey font color for individual options */
            background-color: #f8f9fa;
            /* Very light grey background for options */
        }

        /* Styling for the option when it's hovered or selected within the opened dropdown list */
        #skillSelect option:hover,
        #skillSelect option:checked {
            background-color: #007bff;
            /* Primary blue background on hover/selection */
            color: #ffffff;
            /* White text on hover/selection */
        }

        /* Keep your existing custom styles for consistency */
        .rounded-md {
            border-radius: 0.375rem !important;
        }

        .shadow-sm {
            box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
        }
    </style>
</head>

<body>
    <div class="wholebody">
        <nav class="navbar navbar-expand-lg header">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h1><i><strong>{{ $title->name }}</strong></i></h1>
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
                            <a class="nav-link" href="/User/UserInfoDashBoard">{{ session('name') }}</a>
                        </li>
                        <li>
                            <a href="/User/UserInfoDashBoard"><i class="bi bi-person-circle fs-4" style="color: black"></i>
                                <i class="bi bi-list fs-4" style="color: black"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="job-search-section">
                <h1 class="section-title">Job Search</h1>
                <form action="/JobSearch" method="get" class="row g-3 justify-content-center">
                    @csrf {{--  Add CSRF token for security --}}
                    <div class="col-md-4">
                        <label for="skillSelect" class="form-label visually-hidden">Skill</label> {{-- Added label --}}
                        <select name="skill" id="skillSelect" class="form-select rounded-md shadow-sm">
                            {{-- Added classes and name/id --}}
                            <option value="">Select Skill</option> {{-- Default option --}}
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->skillname }}">{{ $skill->skillname }}</option>
                                {{-- Assuming skill->name now --}}
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="experienceSelect" class="form-label visually-hidden">Experience</label>
                        <select name="experience" id="experienceSelect" class="form-select rounded-md shadow-sm">
                            {{-- Added classes --}}
                            <option value="">Select Experience</option>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }} year{{ $i > 1 ? 's' : '' }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="locationSelect" class="form-label visually-hidden">Location</label>
                        <select name="location" id="locationSelect" class="form-select rounded-md shadow-sm">
                            <option value="">Select City</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->city }}">{{ $location->city }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary rounded-md shadow">Search</button>
                        {{-- Added classes for consistency --}}
                    </div>
                </form>
            </div>
        </div>


        <div class="container">
            <div class="section-card">
                <h2 class="section-title">Job Categories</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
                    {{-- Loop through your categories here --}}
                    @foreach ($categories as $category)
                        <div class="col">
                            <div
                                class="p-3 bg-primary text-white rounded-lg shadow-sm h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="mb-2">
                                        <i class="bi bi-briefcase me-3"></i> {{ $category->category }}
                                    </h5>
                                </div>
                                <div class="text-end pt-2 mt-auto"> {{-- mt-auto pushes it to the bottom if content above is short --}}
                                    <span class="badge bg-light text-primary rounded-pill px-3 py-2">
                                        Jobs Available : {{ $category->count ?? 0 }} {{-- Display count, default to 0 if null --}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="container mt-5"> {{-- Added margin-top to separate sections --}}
            <div class="section-card"> {{-- This div might not be necessary if using direct row/cols --}}
                <h2 class="section-title text-primary mb-4 text-center">Featured Companies</h2> {{-- Added text-primary, mb, text-center --}}
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    {{-- Loop through your featured companies here --}}
                    @foreach ($companies as $company)
                        {{-- Example loop for 6 companies --}}
                        <div class="col">
                            <div class="card company-card text-center h-100 shadow-sm rounded-lg border-0">
                                {{-- Added shadow, rounded corners, no border --}}
                                <div
                                    class="card-body d-flex flex-column align-items-center justify-content-center p-4 bg-info-subtle">
                                    {{-- Increased padding, light blue background for company cards --}}
                                    <img src="https://placehold.co/80x80/ADD8E6/007bff?text=Logo" {{-- Using placeholder for logo --}}
                                        class="img-fluid company-logo rounded-circle mb-3 border border-primary border-2"
                                        alt="Company Logo"> {{-- Added border to logo --}}
                                    <h5 class="card-title text-dark mb-1">{{ $company->company_name }}</h5>
                                    <p class="card-text small mb-2"><small>{{ $company->industry_type }}</small></p>
                                    <p class="card-text text-dark mb-4">{{ $company->bio }}
                                    </p>
                                    <a href="{{ $company->website }}"
                                        class="btn btn-sm btn-outline-primary mt-auto rounded-md shadow-sm">View
                                        Jobs</a> {{-- mt-auto pushes button to bottom --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="container">
            <div class="section-card">
                <h2 class="section-title">Featured Jobs</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    {{-- Loop through your featured jobs here --}}
                    @foreach ($featuredjobs as $featuredjob)
                        <div class="col">
                            <div class="card job-card h-100 shadow-sm rounded-lg border-0"> {{-- Added shadow, rounded corners, no border --}}
                                <div class="card-body d-flex flex-column p-4 bg-info-subtle"> {{-- Changed to light blue background --}}
                                    <h5 class="card-title text-dark mb-2">{{ $featuredjob->title }}</h5>
                                    <h6 class="card-subtitle mb-3 text-primary" style="color: #007bff !important;">
                                        {{ $featuredjob->company_name }}
                                    </h6>
                                    <p class="card-text  small mb-2"> {{-- Increased mb for spacing --}}
                                        <i class="bi bi-geo-alt me-2"></i> {{ $featuredjob->city ?? 'N/A' }},
                                        {{ $featuredjob->state ?? 'N/A' }}
                                    </p>
                                    <p class="card-text  small mb-3"> {{-- Increased mb for spacing --}}
                                        <i class="bi bi-currency-dollar me-2"></i>
                                        @if ($featuredjob->min_salary && $featuredjob->max_salary)
                                            {{ number_format($featuredjob->min_salary) }} -
                                            {{ number_format($featuredjob->max_salary) }}
                                            ({{ $featuredjob->salary_type ?? 'N/A' }})
                                        @else
                                            Negotiable
                                        @endif
                                    </p>
                                    <p class="card-text mb-4 text-dark small"> {{-- Increased mb for spacing --}}
                                        <small>Skills: {{ $featuredjob->tags ?? 'N/A' }}</small><br>
                                        {{-- Using tags as skills example, adjust if you have a separate skills column --}}
                                        <small>Experience: {{ $featuredjob->experience_req ?? 'N/A' }}</small><br>
                                        <small>Posted:
                                            {{ \Carbon\Carbon::parse($featuredjob->created_date)->format('M d, Y') }}</small>
                                    </p>
                                    {{-- Consider truncating description for card view --}}

                                    <a href="/User/Job-Apply/{{$featuredjob->job_id}}"
                                        class="btn btn-primary mt-auto rounded-md shadow-sm">Apply Now</a>
                                    {{-- mt-auto pushes button to bottom --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>

        <div class="container">
            <div class="section-card">
                <h2 class="section-title">Our Pricing Plans</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                    {{-- Loop through your pricing plans here --}}
                    @php
                        $plans = [
                            [
                                'name' => 'Basic',
                                'price' => '$29',
                                'features' => ['5 Job Listings', 'Basic Analytics', 'Standard Support'],
                            ],
                            [
                                'name' => 'Standard',
                                'price' => '$59',
                                'features' => [
                                    '20 Job Listings',
                                    'Advanced Analytics',
                                    'Priority Support',
                                    'Featured Listing',
                                ],
                            ],
                            [
                                'name' => 'Premium',
                                'price' => '$99',
                                'features' => [
                                    'Unlimited Listings',
                                    'Comprehensive Analytics',
                                    '24/7 Dedicated Support',
                                    'Top Featured Listing',
                                    'Recruiter Profile',
                                ],
                            ],
                        ];
                    @endphp

                    @foreach ($plans as $plan)
                        <div class="col">
                            <div class="card pricing-card h-100">
                                <div class="pricing-card-header text-center">
                                    <h4 class="my-0 fw-normal">{{ $plan['name'] }}</h4>
                                    <h1 class="card-title pricing-card-title">{{ $plan['price'] }}<small
                                            class="text-muted fw-light">/mo</small></h1>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <ul class="text-start mb-4">
                                        @foreach ($plan['features'] as $feature)
                                            <li><i class="bi bi-check-lg text-success me-2"></i>{{ $feature }}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="w-100 btn btn-lg btn-outline-primary mt-auto">Sign
                                        up for {{ $plan['name'] }}</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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
                    &copy; {{ date('Y') }} YourJobPortal. All rights reserved.
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>

</html>
