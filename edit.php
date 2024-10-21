<?php
$file = 'data.json';
$id = $_GET['id'];

if (file_exists($file)) {
    $json_data = file_get_contents($file);
    $data = json_decode($json_data, true);
    $entry = null;

    foreach ($data as $key => $item) {
        if ($item['id'] == $id) {
            $entry = $data[$key];
            $index = $key;
            break;
        }
    }

    if ($entry) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Update the entry
            $data[$index]['address'] = $_POST['address'];
            $data[$index]['password'] = $_POST['password'];
            $data[$index]['command'] = $_POST['command'];

            // Write back to JSON file
            file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

            // Redirect to the display page
            header('Location: display.php');
            exit();
        }
    } else {
        die('Data not found.');
    }
} else {
    die('File not found.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Edit Data</h2>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $entry['address']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $entry['password']; ?>" required>
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                    <i class="bi bi-eye-slash" id="passwordIcon"></i>
                </button>
            </div>
        </div>
        <div class="mb-3">
            <label for="command" class="form-label">Command</label>
            <input type="text" class="form-control" id="command" name="command" value="<?php echo $entry['command']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="display.php" class="btn btn-secondary">Back</a>
    </form>
</div>

<script>
// Toggle password visibility in edit form
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