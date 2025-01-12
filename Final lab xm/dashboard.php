<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
$conn = new mysqli("localhost", "root", "", "shop_management");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] == 'delete') {
        $name = $_POST['name'];
        $conn->query("DELETE FROM employees WHERE name = $name");
    }


    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    
    <script>
        function searchEmployee() {
            let search = document.getElementById("search").value;
            $.ajax({
                url: "search.php",
                method: "POST",
                data: { search: search },
                success: function(data) {
                    document.getElementById("employeeTable").innerHTML = data;
                }
            });
        }
    </script>
</head>
<body>
    <h2>Welcome, Admin</h2>
    <input type="text" id="search" placeholder="Search employees" onkeyup="searchEmployee()">
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="employeeTable">
            <?php
            $result = $conn->query("SELECT * FROM employees");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['contact']}</td>
                        <td>{$row['username']}</td>
                        <td>
                            <form method='POST'>
                                <input type='hidden' name='name' value='{$row['name']}'>
                                <button name='action' value='delete'>Delete</button>
                            </form>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
