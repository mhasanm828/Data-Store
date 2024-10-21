<?php
$file = 'data.json';

// Get the current data from the file
if (file_exists($file)) {
    $json_data = file_get_contents($file);
    $data = json_decode($json_data, true);
} else {
    $data = [];
}

// Generate a new ID
$new_id = count($data) + 1;

// Collect form input data
$new_entry = [
    'id' => $new_id,
    'address' => $_POST['address'],
    'password' => $_POST['password'],
    'command' => $_POST['command'],
];

// Add the new entry to the array
$data[] = $new_entry;

// Write the updated data back to the JSON file
file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

// Redirect back to input form
header('Location: display.php');
exit();
?>