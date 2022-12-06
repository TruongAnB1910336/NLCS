<?php
    include_once("connect.php");
    session_start();
    // session_destroy();
?>
<?php 
    if(isset($_POST['dangnhap'])){
      $email=$_POST['email'];
      $password=$_POST['password'];
      if($email== '' || $password==''){
        echo '<script>alert("Vui lòng nhập đủ email và mật khẩu")</script>';
      }
      else{
        $sql_admin_login=mysqli_query($conn,"select * from admin where email_admin='$email' and password_admin='$password' limit 1");
        $count=mysqli_num_rows($sql_admin_login);
        $row_admin_login=mysqli_fetch_array($sql_admin_login);
        
        $sql_user_login=mysqli_query($conn,"select * from khachhang where email='$email' and matkhau='$password' limit 1");
        $dem=mysqli_num_rows($sql_user_login);
        $row_user_login=mysqli_fetch_array($sql_user_login);
        if($count>0){
          $_SESSION['dangnhap']=$row_admin_login['ten_admin'];
          $_SESSION['id_admin']=$row_admin_login['id_admin'];
          header('Location: admin.php');
        }
        elseif($dem>0){
          $_SESSION['username']=$row_user_login['tenkh'];
          $_SESSION['id_khachhang']=$row_user_login['id_khachhang'];
          header('Location: user.php');
        }
        else{
          echo '<script>alert("Tài khoản hoặc mật khẩu không đúng!")</script>';
        }
      }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="image/logo1.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <title>Đăng Nhập</title>
    <link href="icon/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="css/css.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <script src="js/script.js" type="text/javascript"></script>
    <script src="js/js.js"></script>
</head>
<body>
<script>
    function cart(){
    window.location.href="hoadon.php";
    }
  </script>
    <header id="header">
        <a href="index.php"><img src="image/logo.ico" id="logo"></a>
        <form action="timkiem.html" id="frm">
            <input required type="text" placeholder="Bạn cần tìm kiếm sản phẩm gì..." id="search">
            <i class="fa fa-search" id="nuttimkiem"></i>
            <i class="fa fa-shopping-cart" id="cart" onclick="cart()"></i>
        </form>


         
        <nav class="nav">
          <ul class="menu">
            <li><a href="dienthoai.php"><i class="fas fa-mobile"></i> Điện Thoại</a></li>
            <li><a href="laptop.php"><i class="fas fa-laptop"></i> LapTop</a></li>
            <li><a href="ipad.php"><i class="fas fa-tablet-alt"></i> Ipad</a></li>
            <li><a href="#">Tìm Theo Hãng <i class="fas fa-chevron-down"></i></a>
              <div class="div1 row">
                <div class="col1">
                  <h5>Điện Thoại</h5>
                  <a href="#">Samsung</a>
                  <a href="#">iPhone</a>
                  <a href="#">Oppo</a>
                  <a href="#">Vivo</a>
                  <a href="#">Realme</a>
                  <a href="#">Vsmart</a>
                </div>
                <div class="col1">
                  <h5>LapTop</h5>
                  <a href="#">Macbook</a>
                  <a href="#">Dell</a>
                  <a href="#">Lenovo</a>
                  <a href="#">Asus</a>
                  <a href="#">Acer</a>
                  <a href="##">HP</a>
                </div>
                <div class="col1">
                  <h5>Ipad</h5>
                  <a href="#">Samsung</a>
                  <a href="#">Masstel</a>
                  <a href="#">Xiaomi</a>
                  <a href="#">Itel</a>
                  <a href="#">Asus</a>
                </div>
              </div>
            </li>
            <li><a href="dongho.php"><i class="fas fa-watch"></i> Đồng Hồ Thời Trang</a></li>
            <li><a href="tragop.php"><i class="fas fa-dollar-sign"></i> Trả Gớp 0%</a></li>
            <li><a href="maycu.php">Máy Cũ Giá Rẻ</a></li>
            <li><a href="dangky.php">Đăng Ký</a></li>
            <li><a href="dangnhap.php">Đăng Nhập</a></li>
          </ul>
          </ul>
        </nav>
    </header>
    
    <main>
        <br>
        <div class="form-dangky">      
            <div class="form-dangky-chil">
                <div class="text_center dangky">Đăng nhập</div>

                <form action="dangnhap.php" method="POST">
                    <table>

                        <tr>
                        <div class="mb-3" style="margin-left:30%";>
                           <label for="email" class="form-label"><b>Email</b></label>
                           <input type="text" class="form-control" name="email" placeholder="Nhập vào email" style="width:50%";>
                        </div>
                        </tr>


                        <tr>
                        <div class="mb-3" style="margin-left:30%";>
                           <label for="password" class="form-label"><b>Password</b></label>
                           <input type="password" class="form-control" name="password" placeholder="Nhập vào mật khẩu" style="width:50%";>
                        </div>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="checkbox"><b>Lưu thông tin đăng nhập</b></td>
                        </tr>

                        
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="dangnhap">Đăng nhập</button>
                                <button type="reset">Hủy</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </main>
    <br>

    <footer>
      <div class="row">
        <div class="col2">
          <h5 style="color: white;">Đăng Ký Để Nhận Thông Tin Khuyến Mãi Từ TheGioiDiDong</h5>
          <p><i style="color: white;">Đừng bỏ lỡ hàng ngàn sản phẩm và chương trình hấp dẩn</i></p>
          <form>
            <input type="text" placeholder="Nhập vào email của bạn" size="50" id="dangky">
            <button type="button" id="btdk">Đăng Ký</button><br/>
            <input type="checkbox"><b style="color: white;">Tôi đồng ý nhận email từ TheGioiDiDong</b>
          </form>
        </div>
      </div>
      <div class="container footer">
        <div class="row">
          <div class="col-3">
            <ul>
              <li><a href="#">Chính sách bảo hành</a></li>
              <li><a href="#">Chính sách đổi trả</a></li>
              <li><a href="#">Chính sách giao hàng</a></li>
              <li><a href="#">Tìm hiểu về mua trả gớp</a></li>
              <li><a href="#">Phương thức thanh toán</a></li>
            </ul>
          </div>
          <div class="col-3">
            <ul>
              <li><a href="#">Giới thiệu công ty</a></li>
              <li><a href="#">Trang tuyển dụng</a></li>
              <li><a href="#">Quy chế hoạt động website</a></li>
              <li><a href="#">Gửi ý kiến,khiếu nại</a></li>
              <li><a href="#">Cảnh báo giả mạo</a></li>
            </ul>
          </div>
          <div class="col-3">
            <ul>
              <b>Tổng đài hổ trợ(miển phí)</b>
              <li>Gọi mua: 1800.1111</li>
              <li>Kỹ thuật: 1800.2222</li>
              <li>Khiếu nại: 1800.3333</li>
              <li>Bảo hành: 1800.4444</li>
            </ul>
          </div>
          <div class="col-3">
            <a href="#"><i class="fab fa-facebook-square fa-2x" style="color: rgb(0, 68, 255);"></i></a>
            <a href="#"><i class="fab fa-youtube fa-2x" style="color: rgb(247, 34, 34);"></i></a>
           <a href="#"> <i class="fab fa-instagram-square fa-2x" style="color: rgb(245, 47, 235);"></i></a>
            <br/>
            <a href="#"><img src="image/congthuong.png" class="icon"></a>
           <a href="#"> <img src="image/ncsc.png" class="icon"></a>
          </div>
        </div>
      </div>
      <div class="container">
        <p style="font-size: 13px;color: white;">&copy;2018. Công ty cổ phần Thế Giới Di Động. GPDKKD: 0303217354 do sở KH & ĐT TP.HCM cấp ngày 02/01/2007. GPMXH: 238/GP-BTTTT do Bộ Thông Tin và Truyền Thông cấp ngày 04/06/2020.
          Địa chỉ: 128 Trần Quang Khải, P. Tân Định, Q.1, TP.Hồ Chí Minh. Điện thoại: 028 38125960. Email: cskh@thegioididong.com. Chịu trách nhiệm nội dung: Huỳnh Văn Tốt.</p>
      </div>
    </footer>
</body>
</html>