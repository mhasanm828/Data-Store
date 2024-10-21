<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Input</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Enter Data</h2>
    <form action="store.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" required>
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
<i class="bi bi-eye-slash" id="passwordIcon"></i>
                </button>
            </div>
        </div>
        <div class="mb-3">
            <label for="command" class="form-label">Command</label>
            <input type="text" class="form-control" id="command" name="command" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="display.php" class="btn btn-secondary">View Collected Data</a>
    </form>
</div>
<br><br><br>
        <!-- Developer section-->
<div class="col-lg-12 mb-4">
    <div class="text-center">
        <h4 style="color:black; text-align: center; padding:10px; background:#7FFFD4;">
            Connect with Developer 
            <a style="text-decoration:none; color: #f02;" href="https://api.whatsapp.com/send/?phone=8801723477809" target="_blank">
                🖤 Hasan 🖤
            </a>
        </h4>

        <a href="https://www.linkedin.com/in/mhasanm828" target="_blank" class="social-icon me-3">
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/linkedin.svg" alt="LinkedIn" style="width: 40px;">
        </a>
        <a href="https://github.com/mhasanm828" target="_blank" class="social-icon me-3">
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/github.svg" alt="GitHub" style="width: 40px;">
        </a>
        <a href="https://twitter.com/mhasanm828" target="_blank" class="social-icon me-3">
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/twitter.svg" alt="Twitter" style="width: 40px;">
        </a>
        <a href="https://www.fiverr.com/mhm42726" target="_blank" class="social-icon me-3">
            <img src="https://cdn.worldvectorlogo.com/logos/fiverr-1.svg" alt="Fiverr" style="width: 40px;">
        </a>
        <a href="https://www.behance.net/mhasanm828" target="_blank" class="social-icon me-3">
            <img src="https://cdn.worldvectorlogo.com/logos/behance-1.svg" alt="Behance" style="width: 40px;">
        </a>
    </div>
</div>
    </div>

<script>
// Toggle password visibility
document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('password');
    const passwordIcon = document.getElementById('passwordIcon');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordIcon.classList.replace('bi-eye-slash', 'bi-eye');
    } else {
        passwordInput.type = 'password';
        passwordIcon.classList.replace('bi-eye', 'bi-eye-slash');
    }
});
</script>
</body>
</html>