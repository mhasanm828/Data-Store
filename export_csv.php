<?php
$file = 'data.json';

if (!file_exists($file)) {
    die('No data found.');
}

// Load JSON data
$json_data = file_get_contents($file);
$data = json_decode($json_data, true);

// CSV export
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="data.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Address', 'Password', 'Command']);

foreach ($data as $entry) {
    fputcsv($output, [$entry['id'], $entry['address'], $entry['password'], $entry['command']]);
}

fclose($output);
exit();
?>