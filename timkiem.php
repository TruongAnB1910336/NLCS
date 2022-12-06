<?php 
  include_once("connect.php");
    if(isset($_POST['timkiem'])){
        $data=$_POST['test'];
        echo $data;
    //     echo $data;
        // $sql_search=mysqli_query($conn,"select * from sanpham where tensp like '%iphone%'");
        // $text=$datasearch;
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="image/logo1.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <title>Tìm Kiếm</title>
    <link href="icon/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="css/css.css" rel="stylesheet">
</head>
<body>
<script>
    function cart(){
    window.location.href="hoadon.php";
    }
  </script>
  
    <header id="header">
        <a href="index.php"><img src="image/logo.ico" id="logo"></a>
        <form action="timkiem.php" id="frm" method="POST">
            <input required type="text" placeholder="Bạn cần tìm kiếm sản phẩm gì..." id="search" name="data">
            <button type="button" name="timkiem" style="padding: 0%;border-radius:5px;"><a href="timkiem.php"><i class="fa fa-search" id="nuttimkiem"></i></a></button>
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
                  <a href="##">Samsung</a>
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


    <div class="dtnoibat row">
        <?php 
            
            $sql_search=mysqli_query($conn,"select * from sanpham where tensp like '%iphone%'");
            while($row_search=mysqli_fetch_array($sql_search)){
        ?>

          <div class="c1">
            <a href="#"><img src="<?php echo $row_search['image']?>">
            <?php echo $row_search['tensp']?> <br>
              <i class="fas fa-check"> <?php echo $row_search['content1']?></i> <br>
              <i class="fas fa-check"> <?php echo $row_search['content2']?></i> <br>
              <b><?php echo $row_search['giacu']?><sup>đ</sup></b>
            </a>
            <div style="text-align: center;">
            <span>
                  <form action="hoadon.php" method="POST">
                    Số Lượng: <input type="number" name="soluong" max="100" min="0" value="0" size="3">
                          <input type="hidden" name="id_sanpham" value="<?php echo $row_search['id'] ?>">
                          <input type="hidden" name="tensp" value="<?php echo $row_search['tensp'] ?>">
                          <input type="hidden" name="gia" value="<?php echo $row_search['giacu'] ?>">
                          <input type="hidden" name="image" value="<?php echo $row_search['image'] ?>">
                          
                    <button type="submit" name="themgiohang">Đặt Hàng</button>
                  </form>
                 </span>
            </div>
          </div>
          <?php }?>
         
        </div>


    </main>
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
           <a href="#logo" id="top"><i class="fas fa-arrow-circle-up fa-3x"></i></a>
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