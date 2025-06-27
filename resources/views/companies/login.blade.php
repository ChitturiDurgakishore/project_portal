<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Company Login – UDYOGAM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e9f5ee, #f1f8f4);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-card {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            transition: all 0.3s ease-in-out;
        }

        .login-card h3 {
            font-weight: 700;
            color: #2f855a;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 500;
            color: #444;
        }

        .form-control {
            border-radius: 8px;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #28a745;
            box-shadow: none;
        }

        .btn-login {
            background-color: #28a745;
            color: #fff;
            font-weight: 600;
            border-radius: 8px;
            padding: 10px 0;
            margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #218838;
        }

        .register-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 0.95rem;
            color: #28a745;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
            color: #218838;
        }

        .alert {
            font-size: 0.95rem;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h3 class="text-center">Company Login</h3>

        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <form action="/CompanyLogin" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter company email"
                    required
                    autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Enter password"
                    required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-login">Login</button>
            </div>

            <a href="/CompanyRegister" class="register-link">Don't have an account? Register</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
