<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Company Register – UDYOGAM</title>
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

        .register-card {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            transition: all 0.3s ease-in-out;
        }

        .register-card h3 {
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

        .btn-register {
            background-color: #28a745;
            color: #fff;
            font-weight: 600;
            border-radius: 8px;
            padding: 10px 0;
            margin-top: 10px;
        }

        .btn-register:hover {
            background-color: #218838;
        }

        .login-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 0.95rem;
            color: #28a745;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
            color: #218838;
        }

        .alert {
            font-size: 0.95rem;
        }
    </style>
</head>
<body>

    <div class="register-card">
        <h3 class="text-center">Company Registration</h3>

        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <form action="/CompanyRegister" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter company email" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-enter password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-register">Register</button>
            </div>

            <a href="/CompanyLogin" class="login-link">Already have an account? Login</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
