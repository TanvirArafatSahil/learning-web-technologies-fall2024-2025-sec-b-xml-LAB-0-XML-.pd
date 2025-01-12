<?php
$conn = new mysqli("localhost", "root", "", "shop_management");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = $_POST['search'];
    $result = $conn->query("SELECT * FROM employees WHERE name LIKE '%$search%' OR username LIKE '%$search%'");

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['contact']}</td>
                <td>{$row['username']}</td>
                <td>
                    <form method='POST'>
                        <input type='hidden' name='id' value='{$row['id']}'>
                        <button name='action' value='delete'>Delete</button>
                    </form>
                </td>
            </tr>";
    }
}
?>
