<?php include("head.php") ?>

<title>คืนหนังสือ</title>
<?php
require_once("config/connect.php");
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST["bookid"])){
    if($_POST["bookid"] == ""){
        $_SESSION["booking_RT"]["b_id"] = "";
        $_SESSION["booking_RT"]["b_name"] = "";
    }else{
    $sql = "SELECT * FROM tb_borrow_book AS borrow
    JOIN tb_member as member
    JOIN tb_book as book
    ON borrow.m_user = member.m_user
    AND borrow.b_id = book.b_id WHERE borrow.b_id = '".$_POST["bookid"]."' AND borrow.br_date_rt IS NULL  ORDER BY borrow.br_date_br DESC LIMIT 1";
    $bookquery = mysqli_query($conn,$sql);
    $book = mysqli_fetch_assoc($bookquery);
    // $select_borrow = $dbcon->prepare();
    // $select_borrow ->execute();
    // $book = $select_borrow->fetch(PDO::FETCH_ASSOC);
    if(empty($book)){
        echo "<script>alert('ไม่พบหนังสือ')</script>";
        $_SESSION["booking_RT"] = "";
        $_SESSION["booking_RT"] = "";
    }else{
        $_SESSION["booking_RT"] = $book;
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
    <h2>คืนหนังสือ</h2><br><br>
    <form method="post">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รหัสหนังสือที่ต้องการคืน: <input name="bookid" type="text"
            placeholder="กรอกรหัสหนังสือ">&nbsp;&nbsp;<button class="btn1">ตกลง</button></form><br><a href="action/clear.php"><button class="btn1">ล้างข้อมูล</button></a>
            <table border="0" class="tablee">
        <td>รหัสหนังสือ:</td>
        <td style="width:300px;"><?php if(isset($_SESSION["booking_RT"])){echo $_SESSION["booking_RT"]["b_id"];}; ?></td>
        <tr>
            <td>ชื่อหนังสือ:</td>
            <td style="width:300px;"><?php if(isset($_SESSION["booking_RT"])){echo $_SESSION["booking_RT"]["b_name"];}; ?></td>
        <tr>
            <td>ผู้ยืมหนังสือ:</td>
            <td style="width:300px;"><?php if(isset($_SESSION["booking_RT"])){echo  $_SESSION["booking_RT"]["m_name"];}; ?>
            </td>
        <tr>
            <td>วันที่ยืมหนังสือ:</td>
            <td style="width:300px;"><?php if(isset($_SESSION["booking_RT"])){echo  $_SESSION["booking_RT"]["br_date_br"];}; ?>
            </td>
        <tr>
        <form method="post" action="action/return.php">
            <td>ค่าปรับ:</td>
            <td style="width:300px;"><input type="number" name="fine" min="0" value="0" style="width:100%">
            </td>
        <tr>
        
                <input type="hidden" name="bookid" value="<?php echo $_SESSION["booking_RT"]["id"]; ?>">
            <td colspan="3">
                <center><button class="btn1">คืนหนังสือ</button></center>
            </td>
            </form>
    </table>

</center>