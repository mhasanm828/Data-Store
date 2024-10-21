<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collected Data</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"></script>
    <!-- Include jsPDF library for PDF export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- Include SheetJS library for Excel export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Collected Data</h2>
    <a href="index.php" class="btn btn-secondary mb-3">Input More Data</a>
    <div class="mb-3">
        <button class="btn btn-danger" onclick="exportToPDF()">Export to PDF</button>
        <button class="btn btn-success" onclick="exportToExcel()">Export to Excel</button>
        <a href="export_csv.php" class="btn btn-primary">Export to CSV</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Address</th>
                    <th>Password</th>
                    <th>Command</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $file = 'data.json';

            if (file_exists($file)) {
                $json_data = file_get_contents($file);
                $data = json_decode($json_data, true);

                if (!empty($data)) {
                    foreach ($data as $entry) {
                        echo "<tr>
                                <td>{$entry['id']}</td>
                                <td>{$entry['address']}</td>
                                <td>
                                    <input type='password' value='{$entry['password']}' class='form-control-plaintext' readonly>
                                    <button class='btn btn-outline-secondary btn-sm' onclick='togglePassword(this)'>
                                        <i class='bi bi-eye-slash'></i>
                                    </button>
                                </td>
                                <td>{$entry['command']}</td>
                                <td>
                                    <a href='edit.php?id={$entry['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                    <button class='btn btn-danger btn-sm' onclick='confirmDelete({$entry['id']})'>Delete</button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo '<tr><td colspan="5" class="text-center">No data available</td></tr>';
                }
            } else {
                echo '<tr><td colspan="5" class="text-center">No data available</td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this entry?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>
<br><br>


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
// Toggle password visibility in table
function togglePassword(button) {
    let input = button.previousElementSibling;
    let icon = button.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    } else {
        input.type = 'password';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    }
}

// Global variable to store the ID of the entry to delete
let deleteId = null;

// Show confirmation modal when the delete button is clicked
function confirmDelete(id) {
    deleteId = id;
    let deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
}

// Delete the entry from the JSON file if confirmed
document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
    if (deleteId !== null) {
        // Redirect to the delete script with the entry ID
        window.location.href = `delete.php?id=${deleteId}`;
    }
});

// Export to PDF using jsPDF
function exportToPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    doc.text("Collected Data", 20, 10);
    
    let table = document.getElementById("data-table");
    let rows = table.querySelectorAll("tr");
    let y = 20;

    rows.forEach(row => {
        let cols = row.querySelectorAll("td, th");
        let x = 20;
        cols.forEach(col => {
            doc.text(col.innerText, x, y);
            x += 40;
        });
        y += 10;
    });

    doc.save("data.pdf");
}

// Export to Excel using SheetJS
function exportToExcel() {
    let table = document.getElementById("data-table");
    let wb = XLSX.utils.table_to_book(table, {sheet: "Sheet 1"});
    XLSX.writeFile(wb, "data.xlsx");
}
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

</body>
</html>