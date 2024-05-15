
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="userpage.css" />

</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="logo.png" alt="Accessible Places Logo">
            </div>
            <a class="site-name" href="#">NaviAble</a>
            <div class="nav-links">
                <a href="#" onclick="redirectTo('form.php')">Register Your Place</a>
                <a href="#" onclick="redirectTo('final.php')">Logout</a>
            </div>
        </div>
    </header>
<div class="searchPlace">
        <form action="user_homepage.php" method="post">
        <label for="state">Enter state:</label>
        <input type="text" id="state" name="state" required>
<br></br>
            <div class="input_field">
                <input type="submit" value="Submit" class="btn" name="submit">
            </div>
    </form>
    <div id="search-results">
    <?php
        include("connection.php");

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the state from the form submission
            $state = $_POST["state"];

            $sql = "SELECT * FROM places WHERE state = '$state'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p><strong>Place Name:</strong> " . $row["name"] . "</p>";
                    echo "<p><strong>Mobile No:</strong> " . $row["mno"] . "</p>";
                    echo "<p><strong>Accessibility:</strong> " . $row["criteria"] . "</p>";
                    echo "<p><strong>Location:</strong> " . $row["location"] . "</p>";
                    echo "<p><strong>City:</strong> " . $row["city"] . "</p>";
                    echo "<p><strong>State:</strong> " . $row["state"] . "</p><br>";
                }
            } else {
                echo "<p>No results found</p>";
            }

            $conn->close();
        }
        ?>
    </div>
    <script src="script.js"></script>
    <script>
        function redirectTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
