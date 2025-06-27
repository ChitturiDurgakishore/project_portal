<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Profile – UDYOGAM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS/Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #5cb85c;
            --primary-dark-color: #4cae4c;
            --light-bg: #f0f2f5;
            --card-bg: #ffffff;
            --text-dark: #343a40;
            --text-muted: #6c757d;
            --shadow-subtle: rgba(0, 0, 0, 0.05);
            --shadow-medium: rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--light-bg);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: var(--card-bg);
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px var(--shadow-subtle);
        }

        .header .navbar-brand h1 {
            font-weight: 700;
            color: var(--primary-dark-color);
            margin: 0;
        }

        .main-layout {
            flex: 1;
            display: flex;
            padding: 20px;
        }

        .sidebar {
            width: 250px;
            background: var(--card-bg);
            border-radius: 8px;
            padding: 20px;
            margin-right: 20px;
            box-shadow: 2px 0 8px var(--shadow-subtle);
            position: sticky;
            top: 20px;
            align-self: flex-start;
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
            color: var(--text-dark);
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            transition: background .2s;
        }

        .sidebar-nav .nav-link.active,
        .sidebar-nav .nav-link:hover {
            background: var(--primary-color);
            color: var(--card-bg);
        }

        .sidebar-nav .nav-link:hover i,
        .sidebar-nav .nav-link.active i {
            color: var(--card-bg);
        }

        .main-content {
            flex: 1;
            background: var(--card-bg);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px var(--shadow-medium);
        }

        .profile-section {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 10px var(--shadow-subtle);
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
        }

        .form-control:focus,
        .form-select:focus {
            box-shadow: none;
            border-color: var(--primary-color);
        }

        .btn-save {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-save:hover {
            background-color: var(--primary-dark-color);
        }

        @media (max-width: 991px) {
            .main-layout {
                flex-direction: column;
                padding: 10px;
            }

            .sidebar {
                width: 100%;
                margin-bottom: 20px;
                position: static;
            }

            .main-content {
                margin: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    <nav class="header navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <h1><strong><i>UDYOGAM</i></strong></h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/User/UserInfoDashBoard">Hi,
                            {{ session('name') ?? 'User' }}</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="/UserLogOut">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-layout">

        <!-- Sidebar -->
        <aside class="sidebar">
            <h5 class="sidebar-heading">Navigation</h5>
            <ul class="nav flex-column sidebar-nav">
                <li class="nav-item"><a class="nav-link" href="/LoggedDashBoard"><i class="bi bi-speedometer2 me-2"></i>
                        Search Job</a></li>
                <li class="nav-item"><a class="nav-link" href="/User/UserInfoDashBoard"><i
                            class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/User/AppliedJobs"><i
                            class="bi bi-journal-check me-2"></i> Applied Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="/User/Bookmark"><i class="bi bi-bookmark-fill me-2"></i>
                        Bookmarked</a></li>
                <li class="nav-item"><a class="nav-link active" href="/MyProfile"><i class="bi bi-person-fill me-2"></i>
                        My Profile</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="/UserLogOut"><i
                            class="bi bi-box-arrow-right me-2"></i> Log out</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content container-fluid">
            <h2 class="text-center display-5 fw-bold mb-4">My Profile</h2>
            <form action="/User/UpdateProfile" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ session('user_id') }}">

                <!-- Basic Info -->
                <div class="profile-section">
                    <div class="section-title">Basic Information</div>
                    <div class="row g-3">
                        <div class="col-md-3 text-center">
                            @if (!empty($user->profile_pic) && \Illuminate\Support\Facades\Storage::disk('public')->exists($user->profile_pic))
                                <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="Profile Picture"
                                    class="img-thumbnail mb-2" style="width:120px; height:120px; object-fit:cover;">
                            @else
                                <img src="/default-avatar.png" alt="Profile Picture" class="img-thumbnail mb-2"
                                    style="width:120px; height:120px; object-fit:cover;">
                            @endif
                            <input type="file" name="profile_pic" class="form-control mt-2">
                        </div>
                        <div class="col-md-9">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $user->name ?? '' }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $user->title ?? '' }}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Personal Details -->
                <div class="profile-section">
                    <div class="section-title">Personal Details</div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" value="{{ $user->dob ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Gender</label>
                            <select name="gender" class="form-select">
                                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Location</label>
                            <input type="text" name="location" value="{{ $user->location ?? '' }}"
                                class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Contact & Web -->
                <div class="profile-section">
                    <div class="section-title">Contact & Web</div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>Contact</label>
                            <input type="text" name="contact" value="{{ $user->contact ?? '' }}"
                                class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Website / Portfolio</label>
                            <input type="url" name="website" value="{{ $user->website ?? '' }}"
                                class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Professional Info -->
                <div class="profile-section">
                    <div class="section-title">Professional Information</div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>Experience (years)</label>
                            <input type="number" name="experience" min="0"
                                value="{{ $user->experience ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Availability</label>
                            <select name="availability" class="form-select">
                                <option value="Yes" {{ $user->availability == 'yes' ? 'selected' : '' }}>Immediate
                                </option>
                                <option value="No" {{ $user->availability == 'no' ? 'selected' : '' }}>Not
                                    Immediate
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Resume Upload -->
                <div class="profile-section">
                    <div class="section-title">Resume</div>
                    <div class="mb-3">
                        @if (!empty($user->resume) && \Illuminate\Support\Facades\Storage::disk('public')->exists($user->resume))
                            <p>Current Resume:
                                <a href="{{ asset('storage/' . $user->resume) }}" target="_blank"
                                    rel="noopener noreferrer">
                                    {{ basename($user->resume) }}
                                </a>
                            </p>
                        @else
                            <p>No resume uploaded yet.</p>
                        @endif
                        <label for="resume" class="form-label">Upload Resume (PDF, DOC, DOCX)</label>
                        <input class="form-control" type="file" name="resume" id="resume"
                            accept=".pdf,.doc,.docx">
                    </div>
                </div>

                <!-- Bio -->
                <div class="profile-section">
                    <div class="section-title">About You</div>
                    <label>Bio</label>
                    <textarea name="bio" rows="5" class="form-control" placeholder="Tell us about yourself…">{{ $user->bio ?? '' }}</textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-save btn-lg px-4">Save Changes</button>
                </div>
            </form>
        </main>
    </div>

    <!-- Footer -->
    <footer class="mt-auto bg-dark text-light py-4">
        <div class="container text-center small">
            UDYOGAM &copy; {{ date('Y') }} — connecting talent with opportunity.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
