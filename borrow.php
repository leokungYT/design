<?php include("head.php") ?>

<title>ยืมหนังสือ</title>
<?php
require_once("config/connect.php");
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST["borrowuser"])){
    if($_POST["borrowuser"] == ""){
        $_SESSION["user"]["m_name"] = "";
    }else{
    $select_borrow = $dbcon->prepare("SELECT * FROM tb_member WHERE m_user = '".$_POST["borrowuser"]."'");
    $select_borrow ->execute();
    $username = $select_borrow->fetch(PDO::FETCH_ASSOC);
    if(empty($username)){
        echo "<script>alert('ไม่พบผู้ใช้')</script>";
        $_SESSION["user"]["m_name"] = "";
        }else{
        $_SESSION["user"] = $username;
        }
    }
}
if(isset($_POST["bookid"])){
    if($_POST["bookid"] == ""){
        $_SESSION["booking"]["b_id"] = "";
        $_SESSION["booking"]["b_name"] = "";
    }else{
    $select_borrow = $dbcon->prepare("SELECT * FROM tb_book WHERE b_id = '".$_POST["bookid"]."'");
    $select_borrow ->execute();
    $book = $select_borrow->fetch(PDO::FETCH_ASSOC);
    if(empty($book)){
        echo "<script>alert('ไม่พบหนังสือ')</script>";
        $_SESSION["booking"]["b_id"] = "";
        $_SESSION["booking"]["b_name"] = "";
    }else{
        $_SESSION["booking"] = $book;
    }}
}
?>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>
<center>
    <br>
    <h2>ยืมหนังสือ</h2><br><br>
    <form method="post">ผู้ใช้ที่ต้องการยืม: <input name="borrowuser" type="text"
            placeholder="กรอกชื่อผู้ใช้" >&nbsp;&nbsp;<button class="btn1">ตกลง</button></form>
    <form method="post">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รหัสหนังสือ: <input name="bookid" type="text" class="ozxx"
            placeholder="กรอกรหัสหนังสือ">&nbsp;&nbsp;<button class="btn1">ตกลง</button></form><br><a href="action/clear.php"><button class="btn3">ล้างข้อมูล</button></a>
    <table border="0" class="tablee">
        <td>ชื่อ-สกุลผู้ยืม:</td>
        <td style="width:300px;"><?php if(isset($_SESSION["user"])){echo $_SESSION["user"]["m_name"];}; ?></td>
        <tr>
            <td>รหัสหนังสือ:</td>
            <td style="width:300px;"><?php if(isset($_SESSION["booking"])){echo $_SESSION["booking"]["b_id"];}; ?></td>
        <tr>
            <td>ชื่อหนังสือ:</td>
            <td style="width:300px;"><?php if(isset($_SESSION["booking"])){echo  $_SESSION["booking"]["b_name"];}; ?>
            </td>
        <tr>
            <form method="post" action="action/borrow.php">
                <input type="hidden" name="userid" value="<?php echo $_SESSION["user"]["m_user"]; ?>">
                <input type="hidden" name="bookid" value="<?php echo $_SESSION["booking"]["b_id"]; ?>">
                <td colspan="3">


                    <center><button class="btn3">ยืมหนังสือ</button></center>

                </td>
            </form>
    </table>

</center>