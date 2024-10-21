<?php
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $file = 'data.json';

    if (file_exists($file)) {
        $json_data = file_get_contents($file);
        $data = json_decode($json_data, true);

        // Filter out the entry with the matching ID
        $new_data = array_filter($data, function ($entry) use ($id) {
            return $entry['id'] != $id;
        });

        // Re-index the array to maintain correct order
        $new_data = array_values($new_data);

        // Save the updated data back to the JSON file
        file_put_contents($file, json_encode($new_data, JSON_PRETTY_PRINT));

        // Redirect back to the display page after deletion
        header('Location: display.php');
        exit();
    }
}
?>