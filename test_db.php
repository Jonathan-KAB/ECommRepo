<?php
// Test database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'settings/db_class.php';

echo "<h2>Database Connection Test</h2>";

$db = new db_connection();
$connected = $db->db_connect();

if ($connected) {
    echo "<p style='color: green;'>✅ Database connection successful!</p>";
    echo "<p>Database: " . DATABASE . "</p>";
    echo "<p>Server: " . SERVER . "</p>";
    echo "<p>Username: " . USERNAME . "</p>";
    
    // Test if users table exists
    $query = "SHOW TABLES LIKE 'users'";
    $result = mysqli_query($db->db, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<p style='color: green;'>✅ Users table exists!</p>";
        
        // Check table structure
        $query = "DESCRIBE users";
        $result = mysqli_query($db->db, $query);
        echo "<h3>Users Table Structure:</h3>";
        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Field'] . "</td>";
            echo "<td>" . $row['Type'] . "</td>";
            echo "<td>" . $row['Null'] . "</td>";
            echo "<td>" . $row['Key'] . "</td>";
            echo "<td>" . $row['Default'] . "</td>";
            echo "<td>" . $row['Extra'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
    } else {
        echo "<p style='color: red;'>❌ Users table does not exist!</p>";
    }
    
} else {
    echo "<p style='color: red;'>❌ Database connection failed!</p>";
    echo "<p>Error: " . mysqli_connect_error() . "</p>";
}
?>