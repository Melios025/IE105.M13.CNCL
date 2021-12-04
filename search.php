<?php 
session_start();  
        include "connect.php";
        $search_value = $_POST["search"];

        $sql = "select Title from CONTENT where Title like '%$search_value%'";

        $res = $connect->query($sql);

        while ($row = $res->fetch_array()) {
            $_SESSION['searchResult'] = $row[0];
        }
        header("location:index.php")
        ?>