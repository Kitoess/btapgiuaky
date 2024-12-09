<?php
require ('connect.php');
$sql = "SELECT * FROM table_students";
if(isset($_POST['search']))
        {
            $name = $_POST['nd'];
            $sql = "SELECT * FROM table_students WHERE fullname LIKE '%$name' OR hometown LIKE '%$name%'";
        }

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<head>
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div>
<h1 style="text-align: center;">Danh sách sinh viên</h1>
<div class="mar">
        <div class="insert">
        <a class="them" href="them.php"><i class="fa-solid fa-user-plus"></i>     Thêm sinh viên</a>
        </div>
        <div class="ds">
        <form method="post">
        <input class="border" type = "text" name="nd" placeholder="Nhập tên hoặc quê quán để tìm kiếm...">
        <button class="search" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i>Tìm kiếm</button>
        </form>
        </div>
        <table>
        <tr>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Quê quán</th>
            <th>Trình độ học vấn</th>
            <th>Nhóm</th>
            <th>Thao tác</th>
        </tr>
            <?php
            
            while($row = $result->fetch_assoc())
            {
                if($row['level']==0)
                {
                    $level = "Tiến sĩ";
                }
                else if($row['level']==1)
                {
                    $level = "Thạc sỹ";
                }
                else if($row['level']==2)
                {
                    $level = "Kỹ sư";
                }
                else
                {
                    $level = "Khác";
                }
                switch($row['grp'])
                {
                    case 1:
                        $grp = "Nhóm 1";
                        break;
                    case 2:
                        $grp = "Nhóm 2";
                        break;
                    case 3:
                        $grp = "Nhóm 3";
                        break;
                    case 4:
                        $grp = "Nhóm 4";
                        break;
                    case 5:
                        $grp = "Nhóm 5";
                        break;
                    case 6:
                        $grp = "Nhóm 6";
                        break;
                    case 7:
                        $grp = "Nhóm 7";
                        break;
                    case 8:
                        $grp = "Nhóm 8";
                        break;
                    case 9:
                        $grp = "Nhóm 9";
                        break;
                    default: 
                     $grp = "Không Có Nhóm";
                }
                if($row['gender']==1)
            {
                $gender = "Nam";
            }
            else
            {
                $gender = "Nữ";
            }
            $date_from_db = $row['dob'];
            $formatted_date = date('d/m/Y', strtotime($date_from_db));
                echo 
                "<tr>
                <td>".$row['fullname']."</td>
                <td>".$formatted_date."</td>
                <td>".$gender."</td>
                <td>".$row['hometown']."</td>
                <td>".$level."</td>
                <td>".$grp."</td>
                <td style='width: 120px;'>
                    <a class='button_update' href='update.php?id=".$row['id']."'><i class='fa-solid fa-pencil'></i>  Sửa</a>
                    <a class='button_delete' href='delete.php?id=".$row['id']."'><i class='fa-solid fa-trash'></i>  Xóa</a>
                </td>
                ";
            }
            ?>
    </table>
</div>
    </div>
</body>
