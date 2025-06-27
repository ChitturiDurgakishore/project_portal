<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $details->title ?? 'Job Details' }} - Mediguide</title>
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
            padding: 20px 0;
            border-bottom: 1px solid #e9ecef;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .05);
        }

        .header h1 {
            color: #343a40;
            margin-bottom: 0;
            font-size: 1.75rem;
        }

        .header .navbar-nav .nav-link {
            color: #007bff;
            font-weight: 500;
            margin-right: 15px;
            transition: color 0.3s ease;
        }

        .header .navbar-nav .nav-link:hover {
            color: #0056b3;
        }

        .section-card {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, .08);
            margin-bottom: 30px;
        }

        .section-title {
            color: #343a40;
            margin-bottom: 25px;
            font-size: 2rem;
            text-align: center;
        }

        .job-details-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .job-details-header h1 {
            font-size: 2.5rem;
            color: #0056b3;
            margin-bottom: 10px;
        }

        .job-details-header h2 {
            font-size: 1.5rem;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .job-meta-list {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .job-meta-list li {
            font-size: 1.1rem;
            color: #343a40;
            display: flex;
            align-items: center;
            background-color: #e9ecef;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .05);
        }

        .job-meta-list li i {
            margin-right: 10px;
            color: #007bff;
        }

        .company-about {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-top: 30px;
        }

        .company-about img {
            max-width: 120px;
            height: auto;
            margin-bottom: 20px;
            border-radius: 50%;
            border: 3px solid #007bff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, .1);
        }

        .company-about h3 {
            color: #343a40;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .company-about p {
            color: #6c757d;
            font-size: 1rem;
            line-height: 1.6;
            max-width: 800px;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }

        .action-buttons .btn {
            font-size: 1.1rem;
            padding: 12px 30px;
            border-radius: 0.375rem;
            box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075);
            transition: all 0.3s ease;
        }

        .action-buttons .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .action-buttons .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
            transform: translateY(-2px);
        }

        .action-buttons .btn-outline-secondary {
            color: #6c757d;
            border-color: #6c757d;
        }

        .action-buttons .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: #ffffff;
            transform: translateY(-2px);
        }

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

        .text-muted {
            color: white !important;
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

        /* Custom styles for skill tags */
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            /* Space between skill tags */
            margin-top: 15px;
            margin-bottom: 15px;
            justify-content: center;
            /* Center the skill tags */
        }

        .skill-tag {
            background-color: darkslategrey;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 0.9em;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="wholebody">
        <nav class="navbar navbar-expand-lg header">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <h1><i><strong>{{ $title->name ?? 'Mediguide' }}</strong></i></h1>
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

        <div class="container mt-5 mb-5">
            <div class="section-card">
                <div class="job-details-header">
                    <h1>{{ $details->title ?? 'Job Title Not Available' }}</h1>
                    <h2><i class="bi bi-building me-2"></i>{{ $details->company_name ?? 'Company Name N/A' }}
                    </h2>
                    <ul class="job-meta-list">
                        <li><i class="bi bi-geo-alt"></i>
                            {{ implode(', ', array_filter([$details->city, $details->state, $details->country])) ?: 'Location Not Specified' }}
                        </li>
                        <li><i class="bi bi-calendar-event"></i>Posted:
                            {{ \Carbon\Carbon::parse($details->created_at)->format('M d, Y') }}</li>
                        <li><i class="bi bi-briefcase"></i>Experience:
                            {{ $details->experience_req ?? 'N/A' }}</li>
                        <li><i class="bi bi-cash-stack"></i>Salary:
                            @if ($details->min_salary && $details->max_salary)
                                ${{ number_format($details->min_salary) }} -
                                ${{ number_format($details->max_salary) }}
                                {{ $details->salary_type ? '/ ' . $details->salary_type : '' }}
                            @elseif ($details->min_salary)
                                From ${{ number_format($details->min_salary) }}
                                {{ $details->salary_type ? '/ ' . $details->salary_type : '' }}
                            @else
                                Negotiable
                            @endif
                        </li>
                        <li><i class="bi bi-calendar-x"></i>Deadline:
                            @if ($details->deadline)
                                {{ \Carbon\Carbon::parse($details->deadline)->format('M d, Y') }}
                            @else
                                N/A
                            @endif
                        </li>
                        <li><i class="bi bi-person-fill"></i>Vacancies:
                            {{ $details->vacancies ?? 'N/A' }}
                        </li>
                        <li><i class="bi bi-hourglass-split"></i>Job Type:
                            {{ $details->job_type ?? 'N/A' }}
                        </li>
                    </ul>
                    @if ($details->tags)
                        <div class="mt-4">
                            <h4 class="text-primary">Keywords:</h4>
                            <div class="skills-container">
                                @foreach (explode(',', $details->tags) as $tag)
                                    @if (trim($tag) !== '')
                                        <span class="skill-tag">{{ trim($tag) }}</span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <hr>

                <div class="row mt-4">
                    <div class="col-lg-8">
                        <h3 class="text-primary mb-3">Job Description</h3>
                        <p class="text-secondary" style="font-size: 1.05rem; line-height: 1.8;">
                            {{ $details->description ?? 'No detailed description available.' }}
                        </p>

                        @if ($details->skills_required && $skills->isEmpty())
                            {{-- This block handles skills if they are stored as a string in 'skills_required' --}}
                            <h3 class="text-primary mt-4 mb-3">Skills Required</h3>
                            <div class="skills-container justify-content-start">
                                @foreach (explode(';', $details->skills_required) as $skill)
                                    @if (trim($skill) !== '')
                                        <span class="skill-tag">{{ trim($skill) }}</span>
                                    @endif
                                @endforeach
                            </div>
                        @elseif ($skills->isNotEmpty())
                            {{-- This block handles skills if they are passed as a collection named $skills --}}
                            <h3 class="text-primary mt-4 mb-3">Skills Required</h3>
                            <div class="skills-container justify-content-start">
                                @foreach ($skills as $skill)
                                    <span class="skill-tag">{{ $skill->skill_name ?? ($skill->name ?? 'N/A') }}</span>
                                @endforeach
                            </div>
                        @endif


                        <h3 class="text-primary mt-4 mb-3">Responsibilities</h3>
                        @if ($details->responsibilities)
                            <ul class="list-group list-group-flush mb-4">
                                @foreach (explode(';', $details->responsibilities) as $responsibility)
                                    @if (trim($responsibility) !== '')
                                        <li class="list-group-item ps-0 border-0" style="color:#495057;">
                                            <i
                                                class="bi bi-check-circle-fill text-success me-2"></i>{{ trim($responsibility) }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p class="text-secondary">Responsibilities not specified.</p>
                        @endif

                        <h3 class="text-primary mt-4 mb-3">Education Requirements</h3>
                        @if ($details->edu_req)
                            <ul class="list-group list-group-flush mb-4">
                                @foreach (explode(';', $details->edu_req) as $edu_req)
                                    @if (trim($edu_req) !== '')
                                        <li class="list-group-item ps-0 border-0" style="color:#495057;">
                                            <i class="bi bi-mortarboard-fill text-info me-2"></i>{{ trim($edu_req) }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p class="text-secondary">Education requirements not specified.</p>
                        @endif

                        <h3 class="text-primary mt-4 mb-3">Benefits</h3>
                        @if ($details->benefits)
                            <ul class="list-group list-group-flush mb-4">
                                @foreach (explode(';', $details->benefits) as $benefit)
                                    @if (trim($benefit) !== '')
                                        <li class="list-group-item ps-0 border-0" style="color:#495057;">
                                            <i class="bi bi-award-fill text-warning me-2"></i>{{ trim($benefit) }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p class="text-secondary">No benefits listed.</p>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <div class="company-about section-card p-4">
                            <h3 class="text-primary mb-3">About the Company</h3>
                            <img src="{{ $details->company_logo ?? 'https://placehold.co/120x120/ADD8E6/007bff?text=Logo' }}"
                                class="img-fluid rounded-circle mb-3" alt="Company Logo">
                            <h4>{{ $details->company_name ?? 'N/A Company' }}</h4>
                            <a href="{{ $details->website ?? '#' }}" target="_blank"
                                class="btn btn-outline-primary btn-sm mt-3">
                                Visit Website <i class="bi bi-box-arrow-up-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <form action="/SaveJob/{{$details->job_id}}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="bi bi-bookmark-fill me-2"></i>Save Job
                        </button>
                    </form>
                     <form action="/User/Job-Apply/{{$details->job_id}}" method="get" style="display: inline;">
                         @csrf
                     <button type="submit" class="btn btn-outline-secondary">
                        <i class="bi bi-send-fill me-2"></i>Apply Now
                     </button>
                    </form>
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
