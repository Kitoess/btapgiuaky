<?php
require('connect.php');

if(isset($_POST['input']))
{
    echo "Đã gửi thông tin";
    echo "<br>";
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $hometown = $_POST['hometown'];
    $level = $_POST['level'];
    $grp = $_POST['grp'];
    $sql = "INSERT INTO `table_students`(`fullname`,`dob`,`gender`,`hometown`,`level`,`grp`)
            VALUES ('$fullname','$dob','$gender','$hometown','$level','$grp')";
    if($conn->query($sql)===TRUE)
    {
        header("Location:hienthi.php");
    }
    else 
    {
        echo "Lỗi {$sql}".$conn->error;
    }
}

?>