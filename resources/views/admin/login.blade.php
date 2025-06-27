<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UDYOGAM - Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif; /* Using Inter font */
            background-color: #f0f2f5; /* A slightly darker light grey background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Full viewport height */
            margin: 0;
        }
        .login-container {
            max-width: 450px; /* Max width for the login card */
            width: 90%; /* Responsive width */
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px; /* More rounded corners */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /* Stronger, softer shadow */
            animation: fadeIn 0.5s ease-out; /* Simple fade-in animation */
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header h2 {
            color: #343a40; /* Dark text for title */
            font-weight: 700; /* Bold title */
            margin-bottom: 5px;
        }
        .login-header p {
            color: #6c757d; /* Muted text for subtitle */
        }
        .form-label {
            font-weight: 500;
            color: #495057;
        }
        .form-control {
            border-radius: 8px; /* Rounded input fields */
            padding: 12px 15px;
            border: 1px solid #ced4da;
        }
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px 20px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.2s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: translateY(-2px); /* Slight lift on hover */
        }
        .text-muted a {
            color: #007bff;
            text-decoration: none;
        }
        .text-muted a:hover {
            text-decoration: underline;
        }

        /* Animation Keyframes */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2 class="mb-2">UDYOGAM</h2>
            <p class="text-muted">Admin Login</p>
        </div>
        <form action="/Logging" method="POST">
            @csrf
            <div class="mb-3">
                <label for="adminEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="adminEmail" name="email" placeholder="admin@udyogam.com" required>
            </div>
            <div class="mb-4">
                <label for="adminPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="adminPassword" name="password" placeholder="Enter your password" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="text-center mt-4">
                <p class="text-muted">Forgot password? <a href="#">Reset here</a></p>
            </div>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
