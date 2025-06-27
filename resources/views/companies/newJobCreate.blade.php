<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Create Job – UDYOGAM</title>
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

        .form-section {
            margin-bottom: 40px;
        }

        .form-section h4 {
            margin-bottom: 20px;
            font-weight: bold;
            border-bottom: 2px solid var(--primary);
            padding-bottom: 5px;
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
            <h2 class="fw-bold mb-4">Post a New Job</h2>

            <form action="/NewJobCreateCompany" method="POST">
                @csrf
                <input type="hidden" name="company_id" value="{{ session('company_id') }}">

                <!-- Job Details -->
                <div class="form-section">
                    <h4>Job Details</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select" required>
                                <option value="">Choose...</option>
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $key }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Vacancies</label>
                            <input type="number" name="vacancies" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Deadline</label>
                            <input type="date" name="deadline" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Job Type</label>
                            <select name="job_type" class="form-select">
                                <option value="full-time">Full-Time</option>
                                <option value="part-time">Part-Time</option>
                                <option value="internship">Internship</option>
                                <option value="remote">Remote</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Experience Required</label>
                            <input type="text" name="experience_req" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Education Required</label>
                            <input type="text" name="edu_req" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Location Details -->
                <div class="form-section">
                    <h4>Location Details</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Country</label>
                            <select name="country" class="form-select" required>
                                <option value="">Choose...</option>
                                @foreach ($country as $c)
                                    <option value="{{ $c }}">{{ $c }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">State</label>
                            <select name="state" class="form-select" required>
                                <option value="">Choose...</option>
                                @foreach ($state as $s)
                                    <option value="{{ $s }}">{{ $s }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">City</label>
                            <select name="city" class="form-select" required>
                                <option value="">Choose...</option>
                                @foreach ($city as $ct)
                                    <option value="{{ $ct }}">{{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Full Address</label>
                            <textarea name="address" class="form-control" rows="2" required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Salary & Benefits -->
                <div class="form-section">
                    <h4>Salary & Benefits</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Min Salary</label>
                            <input type="number" name="min_salary" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Max Salary</label>
                            <input type="number" name="max_salary" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Salary Type</label>
                            <select name="salary_type" class="form-select">
                                <option value="monthly">Monthly</option>
                                <option value="hourly">Hourly</option>
                                <option value="yearly">Yearly</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Benefits</label>
                            <textarea name="benefits" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Description & Tags -->
                <div class="form-section">
                    <h4>Description & Tags</h4>

                    <div class="mb-3">
                        <label class="form-label">Job Description</label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Skills Required</label>

                        <!-- Search Input -->
                        <input type="text" id="skill-search" class="form-control mb-2"
                            placeholder="Type to search skills...">

                        <!-- Skills List with Checkboxes -->
                        <div id="skills-list" class="border rounded p-2"
                            style="max-height: 200px; overflow-y: auto;">
                            @foreach ($skills as $skill)
                                <div class="form-check">
                                    <input class="form-check-input skill-checkbox" type="checkbox"
                                        value="{{ $skill->skillname }}" id="skill-{{ $loop->index }}">
                                    <label class="form-check-label" for="skill-{{ $loop->index }}">
                                        {{ $skill->skillname }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Selected Tags Preview -->
                        <div id="selected-skills" class="mt-3 d-flex flex-wrap gap-2"></div>

                        <!-- Hidden Inputs for Form Submission -->
                        <div id="skills-hidden-inputs" ></div>

                        <small class="text-muted">Search and select skills. Selected ones appear below and will be
                            submitted with the form.</small>
                    </div>



                    <div class="mb-3">
                        <label class="form-label">Tags (comma separated)</label>
                        <input type="text" name="tags" class="form-control">
                    </div>
                </div>


                <!-- Visibility & Featured -->
                <div class="form-section">
                    <h4>Visibility & Settings</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Featured</label>
                            <select name="featured" class="form-select">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary px-4">Create Job</button>
            </form>
        </main>
    </div>

    <!-- Footer -->
    <footer>
        UDYOGAM &copy; {{ date('Y') }} — empowering employers and talent.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const searchInput = document.getElementById('skill-search');
        const skillCheckboxes = document.querySelectorAll('.skill-checkbox');
        const selectedSkillsContainer = document.getElementById('selected-skills');
        const hiddenInputsContainer = document.getElementById('skills-hidden-inputs');

        function updateSelectedSkills() {
            selectedSkillsContainer.innerHTML = '';
            hiddenInputsContainer.innerHTML = '';

            skillCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    // Create visual tag
                    const tag = document.createElement('span');
                    tag.className = 'badge bg-success';
                    tag.innerText = checkbox.value;
                    selectedSkillsContainer.appendChild(tag);

                    // Create hidden input for form
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'skills_required[]';
                    input.value = checkbox.value;
                    hiddenInputsContainer.appendChild(input);
                }
            });
        }

        // Listen for checkbox changes
        skillCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateSelectedSkills);
        });

        // Live search/filter skills
        searchInput.addEventListener('input', function() {
            const filter = searchInput.value.toLowerCase();
            skillCheckboxes.forEach(checkbox => {
                const label = checkbox.nextElementSibling.innerText.toLowerCase();
                const parent = checkbox.closest('.form-check');
                parent.style.display = label.includes(filter) ? 'block' : 'none';
            });
        });

        // Update selected on page load (in case of repopulated values)
        updateSelectedSkills();
    </script>

</body>

</html>
