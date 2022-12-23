<?php

$link = mysqli_connect("localhost", "root", "", "myschool");

$username = "";
if (isset($_POST["Username"])) {
    $username = $_POST["Username"];
}

if ($username != "") {
   
    $stmt = mysqli_prepare($link, "SELECT * FROM students, courses, classes WHERE students.sno=classes.sno AND classes.cno=courses.cno AND students.username=?");
   
    mysqli_stmt_bind_param($stmt, "s", $username);
   
    mysqli_stmt_execute($stmt);
   
    $result = mysqli_stmt_get_result($stmt);

    $total_rows = mysqli_num_rows($result);

    if ($total_rows >= 1) {
        echo "<table border=1>";
        $total_fields = mysqli_num_fields($result);
        while ($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            for ($i = 0; $i <= $total_fields - 1; $i++) {
                echo "<td>" . $row[$i] . "</td>";
            }
            echo "</tr>";
        }
       
   }
         
               
      }   else {
         
       
      }
      mysqli_close($link);  // 關閉資料庫連接  
   

?>
