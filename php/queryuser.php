<?php
    $username = "root";
    $password = "";
    $hostname = "localhost"; 

    //connection to the database
    $dbhandle = mysqli_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");

    //select a database to work with
    $selected = mysqli_select_db($dbhandle, "xshare")
    or die("Could not select xshare");

    //execute the SQL query and return records
    $result = mysqli_query($dbhandle,"SELECT * FROM users")
    or die("Could not select from xshare");
    //fetch the data from the database

    echo "<tr>";
    echo "<th>Id</th>";
    echo "<th>Username</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Email</th>";
    echo "<th>Admin</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo '<td>'.$row{'id'}.'</td>';
        echo '<td>'.$row{'username'}.'</td>';
        echo '<td>'.$row{'firstname'}.'</td>';
        echo '<td>'.$row{'lastname'}.'</td>';
        echo '<td>'.$row{'email'}.'</td>';
        echo '<td>'.$row{'admin'}.'</td>';
        echo "</tr>";
    }

    mysqli_close($dbhandle);
?>