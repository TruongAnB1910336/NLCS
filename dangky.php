<?php 
    include_once("connect.php");

    if(isset($_POST['dangky'])){
        $tenkh=$_POST['hoten'];
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $diachi=$_POST['diachi'];
        $mk=$_POST['mk'];
        $sql_user_dk=mysqli_query($conn,"insert into khachhang(tenkh,sdt,diachi,email,matkhau) values('$tenkh','$sdt','$diachi','$email','$mk')");

    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="image/logo1.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <title>Đăng Ký</title>
    <link href="icon/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="css/css.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/js.js"></script>
    <script type="text/javascript">
        $.validator.setDefaults({
            submitHandler: function () { alert("submitted!"); }
        });


        $(document).ready(function (){
            $("#frm-dk").validate({
                rules: {
                    hoten: {required: true, minlength: 3},
                    sdt: {required: true, minlength: 10, maxlength: 10},
                    email: {required: true, email: true},
                    ngaysinh: {required: true},
                    diachi: {required: true, minlength: 5},
                    mk: {required: true, minlength: 8},
                    nlmk: {required: true, minlength: 8, equalTo: "#mk"}
                    
                },
                messages: {
                    hoten: {
                        required: "Bạn chưa nhập vào họ tên",
                        minlength: "Tên đăng nhập phải có ít nhất 3 ký tự"
                    },
                    sdt: {
                        required: "Bạn chưa nhập vào số điện thoại",
                        minlength: "Số điện thoại phải có ít nhất 10 ký tự số",
                        maxlength: "Số điện thoại không quá 10 ký tự số"
                    },
                    email: "Email không hợp lệ",
                    ngaysinh: "Ngày sinh không hợp lệ",
                    diachi: {
                        required: "Bạn chưa nhập vào tên địa chỉ",
                        minlength: "Tên địa chỉ phải có ít nhất 5 ký tự"
                    },
                    mk: {
                        required: "Bạn chưa nhập mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 8 ký tự"
                        
                    },
                    nlmk: {
                        required: "Bạn chưa nhập mật khẩu",
                        minlength: "Mật khẩu phải có ít nhất 8 ký tự",
                        equalTo: "Mật khẩu không trùng với mật khẩu đã nhập"
                    },
                    
                    errorPlacement: function (error, element) {
                        error.addClass("invalid-feedback");
                        if (element.prop("type") === "checkbox") {
                            error.insertAfter(element.siblings("label"));
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    
                },
            });
        });
    </script>




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
                  <a href="##">Vivo</a>
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
                  <a href="#">HP</a>
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
        <form action="dangky.php" method="POST">

        <div class="form-dangky">      
            <div class="form-dangky-chil">
                <div class="text_center dangky">Thông tin Đăng ký</div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <div class="card">

                                <div class="card-body">
                                    <!-- <form action="dangky.php" method="POST" id="frm-dk" class="form-horizontal" onsubmit="return checkForm(this);"> -->

                                        <table class="form-group row tablee">
                                            <tr>
                                                <td>
                                                    <label class="col-sm-6 col-form-label" for="hoten"><b>Họ tên</b></label>
                                                </td>
                                                <td class="col-sm-5">
                                                    <input type="text" class="form-control" name="hoten" id="hoten" placeholder="Họ tên">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="col-sm-6 col-form-label"  for="sdt"><b>Số Điện Thoại</b></label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="sdt" id="sdt" placeholder="Số Điện Thoại">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="col-sm-6 col-form-label"  for="email"><b>Email</b></label>
                                                </td>
                                                <td>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="col-sm-6 col-form-label"  for="ngaysinh"><b>Ngày sinh</b></label>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" name="ngaysinh" id="ngaysinh">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="col-sm-6 col-form-label"  for="diachi"><b>Địa chỉ</b></label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="diachi" id="diachi" placeholder="Địa chỉ">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="col-sm-6 col-form-label"  for="mk"><b>Mật khẩu</b></label>
                                                </td>
                                                <td>
                                                    <input type="password" class="form-control" name="mk" id="mk" placeholder="Mật khẩu">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label class="col-sm-6 col-form-label"  for="nlmk"><b>Nhập lại mật khẩu</b></label>
                                                </td>
                                                <td>
                                                    <input type="password" class="form-control" name="nlmk" id="nlmk" placeholder="Nhập lại mật khẩu">
                                                </td>
                                            </tr>



                                            <tr>
                                                <td></td>
                                                <td>
                                                    <button type="submit" name="dangky"><b>Đăng ký</b></button>
                                                    <button type="reset"><b>Hủy</b></button>
                                                </td>
                                            </tr>
                                        </table>
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
        </form>
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


