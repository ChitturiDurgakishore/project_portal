<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - UDYOGAM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Updated Color Palette */
        :root {
            --primary-color: #5cb85c; /* A professional green */
            --primary-dark-color: #4cae4c; /* Darker shade for accents */
            --light-bg: #f0f2f5; /* Light grey background */
            --card-bg: #FFFFFF; /* White for cards */
            --text-dark: #343a40; /* Dark grey text */
            --text-muted: #6c757d; /* Muted text */
            --shadow-subtle: rgba(0, 0, 0, 0.05);
            --shadow-medium: rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Inter', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--light-bg);
            line-height: 1.6;
            color: var(--text-dark);
            min-height: 100vh; /* Ensure full viewport height */
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center content vertically */
            align-items: center; /* Center content horizontally */
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            padding: 20px; /* Add some padding around the whole page */
        }

        /* Title specific styling */
        .page-title {
            font-size: 3rem; /* Larger font size for prominence */
            font-weight: 700;
            color:black;
            margin-bottom: 2rem; /* Space below the title */
            text-align: center;
            background-color: #4cae4c;
            width: 100%;
            padding: 5px;
            border-radius: 20px;
        }

        /* Login Card Styling */
        .login-card {
            background-color: var(--card-bg);
            padding: 3rem;
            border-radius: 12px;
            box-shadow: 0 6px 20px var(--shadow-medium);
            max-width: 450px;
            width: 100%;
            text-align: center;
        }

        .login-card h2 {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--primary-dark-color);
            margin-bottom: 2rem;
        }

        /* Form Control Enhancements */
        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1.25rem;
            border: 1px solid #ced4da;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(92, 184, 92, 0.25);
        }

        /* Button Styling */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(92, 184, 92, 0.2);
            transition: all 0.2s ease;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark-color);
            border-color: var(--primary-dark-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(92, 184, 92, 0.3);
        }

        /* Link Styling */
        .link-muted {
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .link-muted:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1 class="page-title"><i><strong>UDYOGAM</strong></i></h1>

    <div class="login-container">
        <div class="login-card">
            <h2>Welcome Back!</h2>
            <form action="/LoggingIn" method="get"> <div class="mb-3 text-start">
                    <label for="email" class="form-label visually-hidden">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required autocomplete="email">
                    </div>
                </div>
                <div class="mb-4 text-start">
                    <label for="password" class="form-label visually-hidden">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check text-start">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <a href="#" class="link-muted">Forgot Password?</a>
                </div>
                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                </div>
                <p class="text-muted">Don't have an account?
                    <a href="/User/Register" class="link-muted fw-bold ms-1">Register here</a>
                </p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
