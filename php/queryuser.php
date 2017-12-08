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
    $result = mysqli_query($dbhandle,"SELECT id, username, firstname, lastname, email FROM users")
    or die("Could not select from xshare");
    //fetch the data from the database

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo '<td>'.$row{'id'}.'</td>';
        echo '<td>'.$row{'username'}.'</td>';
        echo '<td>'.$row{'firstname'}.'</td>';
        echo '<td>'.$row{'lastname'}.'</td>';
        echo '<td>'.$row{'email'}.'</td>';
        echo "</tr>";
    }

    mysqli_close($dbhandle);
?>