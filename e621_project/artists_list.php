<!DOCTYPE html>
<html>
<!-- Tests to show a artists list geting data from mine database based on a tutorial.
Discontinued cause I start tring to use the e621 API -->
<head>
    <title>Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        } 
        th {
            background-color: #588c7e;
            color: white;
        }
        tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>nameAbbr</th>
            <th>status</th>
            <th>bDay</th>
            <th>description</th>
            <th>site</th>
            <th>tags</th>
            <th>focusTags</th>
        </tr>
        <?php
        $conn = mysqli_connect("database.cpanel.formaweb.com.br", "cairo_testes", "", "TABLE 1");
        if ($conn-> connect_error) {
            die("Connection failed:". $conn-> connect_error);
        }

        $sql = "SELECT id, username, password from login";
        $result = $conn-> query($sql);
        if ($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()){
                echo "<tr><td>" . $row["id"] "<tr><td>" . $row["name"] . "<tr><td>" . $row["nameAbbr"] . "<tr><td>" . $row["status"] . "<tr><td>" . $row["bDay"] . "<tr><td>" . $row["edscription"] . "<tr><td>" . $row["site"] . "<tr><td>" . $row["tags"] . "<tr><td>" . $row["facusTags"] . "</td></tr>"; 
            }
            echo "</table>";
        }
        else {
            echo "0 result";
        }

        $conn-> close();
        ?>
    </table>
</body>
</html>