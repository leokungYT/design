<?php include("head.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลสถิติ</title>
    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:last-child {
            border-bottom: 2px solid #ddd;
        }
    </style>
</head>
<body>
    <?php
    require_once("config/connect.php");
    $sql1 = mysqli_query($conn, "SELECT COUNT(*) as book FROM tb_book");
    $bookamout = mysqli_fetch_assoc($sql1);
    $sql2 = mysqli_query($conn, "SELECT COUNT(*) as borrow FROM tb_borrow_book");
    $borrow = mysqli_fetch_assoc($sql2);
    $sql3 = mysqli_query($conn, "SELECT COUNT(*) as user FROM tb_member");
    $user = mysqli_fetch_assoc($sql3);
    $sql4 = mysqli_query($conn, "SELECT COUNT(*) as borrow FROM tb_borrow_book WHERE br_date_rt IS NULL");
    $return = mysqli_fetch_assoc($sql4);
    ?>
    <h1>ข้อมูลสถิติ</h1>
    <table>
        <tr>
            <th>จำนวนหนังสือ</th>
            <th>จำนวนการยืม</th>
        </tr>
        <tr>
            <td><?php echo $bookamout["book"]; ?></td>
            <td><?php echo $borrow["borrow"]; ?></td>
        </tr>
        <tr>
            <th>สมาชิกทั้งหมด</th>
            <th>หนังสือค้างส่ง</th>
        </tr>
        <tr>
            <td><?php echo $user["user"]; ?></td>
            <td><?php echo $return["borrow"]; ?></td>
        </tr>
    </table>
</body>
</html>
