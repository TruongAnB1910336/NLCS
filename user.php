<?php 
  include_once('connect.php');
  session_start();
  // echo $_SESSION['id_khachhang'];
  if(!$_SESSION['username']){
    header('Location: dangnhap.php');
  }
  if(isset($_GET['login'])){
    $dangxuat=$_GET['login'];
  }
  else{
    $dangxuat='';
  }

  if($dangxuat=='dangxuat'){
    unset($_SESSION['username']);
    unset($_SESSION['id_khachhang']);
    header('Location: dangnhap.php');
  }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="image/logo1.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <title>User</title>
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

            <li class="nav-item dropdown" style="top : -10%;">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['username'] ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="thongtin_user.php">Thông tin</a></li>
            <li><a class="dropdown-item" href="?login=dangxuat">Đăng xuất</a></li>
           </ul>
           </li>

          </ul>
          </ul>
        </nav>
    </header>
    <main class="container">
      <div class="row sli">
        <div class="col-sm-6">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="image/IPhone-11-1.jpg" class="d-block w-100" height="300px" width="300px" alt="">
              </div>
              <div class="carousel-item">
                <img src="image/iphone11-2.png" class="d-block w-100" height="300px" width="300px" alt="">
              </div>
              <div class="carousel-item">
                <img src="image/dongho.jpg" class="d-block w-100" height="300px" width="300px" alt="">
              </div>
              <div class="carousel-item">
                <img src="image/laptop1.jpg" class="d-block w-100" height="300px" width="300px" alt="">
              </div>
              <div class="carousel-item">
                <img src="image/banphim.jpg" class="d-block w-100" height="300px" width="300px" alt="">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="image/dt1.jpeg" class="d-block w-100" height="150" width="100" alt="">
                </div>
                <div class="carousel-item">
                  <img src="image/dt2.jpeg" class="d-block w-100" height="150" width="100" alt="">
                </div>
                <div class="carousel-item">
                  <img src="image/dt3.jpeg" class="d-block w-100" height="150" width="100" alt="">
                </div>
                <div class="carousel-item">
                  <img src="image/dt4.jpeg" class="d-block w-100" height="150" width="100" alt="">
                </div>
                <div class="carousel-item">
                  <img src="image/dt5.png" class="d-block w-100" height="150" width="100" alt="">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="row">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="image/dt6.jpeg" class="d-block w-100" height="150" width="100" alt="">
                </div>
                <div class="carousel-item">
                  <img src="image/dt7.jpeg" class="d-block w-100" height="150" width="100" alt="">
                </div>
                <div class="carousel-item">
                  <img src="image/dt8.png" class="d-block w-100" height="150" width="100" alt="">
                </div>
                <div class="carousel-item">
                  <img src="image/dt9.png" class="d-block w-100" height="150" width="100" alt="">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div>
        <a href="#" title="khuyến mãi lớn"><img src="image/khuyenmai.jpeg" class="w-100"></a>
      </div>
      <div class="container divgiamgia">
        <h4>Săn sale mỗi ngày</h4>

                  <?php 
                      $sql_sale=mysqli_query($conn,'select * from sanpham where loai="Săn sale mỗi ngày 1"')
                  ?>

        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row spgiamgia">
                   <?php 
                        while($row_sale=mysqli_fetch_array($sql_sale)){
                    ?>
                <div class="col-3">
                  <i>trả góp 0%</i>
                  <a href="#"><img src="<?php echo $row_sale['image']?>" width="100px" class="d-block" alt="">
                   <?php echo $row_sale['tensp'] ?> <br/>
                  <del><?php echo $row_sale['giacu'] ?></del><sup>đ</sup> <br/>
                  <b><?php echo $row_sale['giamoi'] ?><sup>đ</sup></b>
                </a>
                <div style="text-align: center;">
                  <span>
                  <form action="hoadon.php" method="POST">
                    Số Lượng: <input type="number" name="soluong" max="100" min="0" value="0" size="3">
                          <input type="hidden" name="id_sanpham" value="<?php echo $row_sale['id'] ?>">
                          <input type="hidden" name="tensp" value="<?php echo $row_sale['tensp'] ?>">
                          <input type="hidden" name="gia" value="<?php echo $row_sale['giacu'] ?>">
                          <input type="hidden" name="image" value="<?php echo $row_sale['image'] ?>">
                          
                    <button type="submit" name="themgiohang">Đặt Hàng</button>
                  </form>
                 </span>
                </div>
                </div>
              

                <?php }?>
               
              </div>
            </div>
                  <?php 
                      $sql_sale2=mysqli_query($conn,'select * from sanpham where loai="Săn sale mỗi ngày"')
                  ?>
            <div class="carousel-item">
            <div class="row spgiamgia">
                   <?php 
                        while($row_sale=mysqli_fetch_array($sql_sale2)){
                    ?>
                <div class="col-3">
                  <i>trả góp 0%</i>
                  <a href="#"><img src="<?php echo $row_sale['image']?>" width="100px" class="d-block" alt="">
                   <?php echo $row_sale['tensp'] ?> <br/>
                  <del><?php echo $row_sale['giacu'] ?></del><sup>đ</sup> <br/>
                  <b><?php echo $row_sale['giamoi'] ?><sup>đ</sup></b>
                </a>
                <div style="text-align: center;">
                <span>
                  <form action="hoadon.php" method="POST">
                    Số Lượng: <input type="number" name="soluong" max="100" min="0" value="0" size="3">
                          <input type="hidden" name="id_sanpham" value="<?php echo $row_sale['id'] ?>">
                          <input type="hidden" name="tensp" value="<?php echo $row_sale['tensp'] ?>">
                          <input type="hidden" name="gia" value="<?php echo $row_sale['giacu'] ?>">
                          <input type="hidden" name="image" value="<?php echo $row_sale['image'] ?>">
                          
                    <button type="submit" name="themgiohang">Đặt Hàng</button>
                  </form>
                 </span>
                </div>
                </div>
                <?php }?>
               
             </div>
            </div>
          </div>
          <button class="carousel-control-prev btnprev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: chartreuse;;"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next btnnext" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: chartreuse;"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <?php 
        $sql_dt=mysqli_query($conn,'select * from sanpham where loai="Điện Thoại Nổi Bật Nhất"')
      ?>
        <h4>Điện Thoại Nổi Bật Nhất</h4>
        <div class="dtnoibat row">
        <?php 
            while($row_dt=mysqli_fetch_array($sql_dt)){
        ?>
          <div class="c1">
            <a href="#"><img src="<?php echo $row_dt['image']?>">
            <?php echo $row_dt['tensp']?> <br>
              <i class="fas fa-check"> <?php echo $row_dt['content1']?></i> <br>
              <i class="fas fa-check"> <?php echo $row_dt['content2']?></i> <br>
              <b><?php echo $row_dt['giacu']?><sup>đ</sup></b>
            </a>
            <div style="text-align: center;">
            <span>
                  <form action="hoadon.php" method="POST">
                    Số Lượng: <input type="number" name="soluong" max="100" min="0" value="0" size="3">
                          <input type="hidden" name="id_sanpham" value="<?php echo $row_dt['id'] ?>">
                          <input type="hidden" name="tensp" value="<?php echo $row_dt['tensp'] ?>">
                          <input type="hidden" name="gia" value="<?php echo $row_dt['giacu'] ?>">
                          <input type="hidden" name="image" value="<?php echo $row_dt['image'] ?>">
                          
                    <button type="submit" name="themgiohang">Đặt Hàng</button>
                  </form>
                 </span>
            </div>
          </div>
          <?php }?>
          
        </div>
        <div>
          <div class="container divgiamgia">
            <h4>LapTop Nổi Bật Nhất</h4>
            <div id="carouselExampleInterval"  class="carousel slide" data-bs-touch="false" data-bs-interval="false" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row spgiamgia">
                <?php 
                  $sql_laptop=mysqli_query($conn,'select * from sanpham where loai="LapTop Nổi Bật Nhất 1"');
                ?>
                  <?php 
                    while($row_laptop=mysqli_fetch_array($sql_laptop)){
                  ?>
                    <div class="col-3"><a href="#"><img src="<?php echo $row_laptop['image'] ?>" height="300px" width="200px" class="d-block" alt="">
                    <?php echo $row_laptop['tensp']?><br/>
                       <button ><?php echo $row_laptop['content1'] ?></button>
                       <button ><?php echo $row_laptop['content2'] ?></button> <br>
                      <del><?php echo $row_laptop['giacu'] ?></del><sup>đ</sup> <br/>
                      <b>2<?php echo $row_laptop['giamoi'] ?><sup>đ</sup></b>
                    </a>
                    <div style="text-align: center;">
                    <span>
                  <form action="hoadon.php" method="POST">
                    Số Lượng: <input type="number" name="soluong" max="100" min="0" value="0" size="3">
                          <input type="hidden" name="id_sanpham" value="<?php echo $row_laptop['id'] ?>">
                          <input type="hidden" name="tensp" value="<?php echo $row_laptop['tensp'] ?>">
                          <input type="hidden" name="gia" value="<?php echo $row_laptop['giacu'] ?>">
                          <input type="hidden" name="image" value="<?php echo $row_laptop['image'] ?>">
                          
                    <button type="submit" name="themgiohang">Đặt Hàng</button>
                  </form>
                 </span>
                    </div>
                  </div>
                  <?php }?>
                   
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row spgiamgia">
                  <?php 
                  $sql_laptop=mysqli_query($conn,'select * from sanpham where loai="LapTop Nổi Bật Nhất"');
                  ?>
                  <?php 
                    while($row_laptop=mysqli_fetch_array($sql_laptop)){
                  ?>
                    <div class="col-3"><a href="#"><img src="<?php echo $row_laptop['image'] ?>" height="300px" width="200px" class="d-block" alt="">
                    <?php echo $row_laptop['tensp']?><br/>
                       <button ><?php echo $row_laptop['content1'] ?></button>
                       <button ><?php echo $row_laptop['content2'] ?></button> <br>
                      <del><?php echo $row_laptop['giacu'] ?></del><sup>đ</sup> <br/>
                      <b>2<?php echo $row_laptop['giamoi'] ?><sup>đ</sup></b>
                    </a>
                    <div style="text-align: center;">
                    <span>
                  <form action="hoadon.php" method="POST">
                    Số Lượng: <input type="number" name="soluong" max="100" min="0" value="0" size="3">
                          <input type="hidden" name="id_sanpham" value="<?php echo $row_laptop['id'] ?>">
                          <input type="hidden" name="tensp" value="<?php echo $row_laptop['tensp'] ?>">
                          <input type="hidden" name="gia" value="<?php echo $row_laptop['giacu'] ?>">
                          <input type="hidden" name="image" value="<?php echo $row_laptop['image'] ?>">
                          
                    <button type="submit" name="themgiohang">Đặt Hàng</button>
                  </form>
                 </span>
                    </div>
                  </div>
                  <?php }?>
                 
                 </div>
                </div>
              </div>
              <button class="carousel-control-prev btnprev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: chartreuse;;"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next btnnext" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: chartreuse;"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div>
            <h4>Đồng Hồ Thông Minh Bán Chạy Nhất</h4>
            <?php 
              $sql_dongho=mysqli_query($conn,'select * from sanpham where loai="Đồng Hồ Thông Minh Bán Chạy Nhất"');
            ?>
            <div class="dtnoibat row">
              <?php 
                  while($row_dongho=mysqli_fetch_array($sql_dongho)){
              ?>
              <div class="c1">
                <a href="#"><img src="<?php echo $row_dongho['image'] ?>">
                <?php echo $row_dongho['tensp'] ?> <br>
                  <i class="fas fa-check"> <?php echo $row_dongho['content1'] ?></i> <br>
                  <i class="fas fa-check"> <?php echo $row_dongho['content2'] ?></i> <br>
                  <b><?php echo $row_dongho['giacu'] ?><sup>đ</sup></b>
                </a>
                <div style="text-align: center;">
                <span>
                  <form action="hoadon.php" method="POST">
                    Số Lượng: <input type="number" name="soluong" max="100" min="0" value="0" size="3">
                          <input type="hidden" name="id_sanpham" value="<?php echo $row_dongho['id'] ?>">
                          <input type="hidden" name="tensp" value="<?php echo $row_dongho['tensp'] ?>">
                          <input type="hidden" name="gia" value="<?php echo $row_dongho['giacu'] ?>">
                          <input type="hidden" name="image" value="<?php echo $row_dongho['image'] ?>">
                          
                    <button type="submit" name="themgiohang">Đặt Hàng</button>
                  </form>
                 </span>
                </div>
              </div>
              <?php }?>

            </div>
          </div>
          <div class="row caption">
            <div class="col-sm-6">
              <img src="image/imgtrangchu/imgcaption4.jpg" height="300px" class="w-100">
            </div>
            <div class="col-sm-6">
              <img src="image/imgtrangchu/imgcaption2.png" height="300px" class="w-100">
            </div>
          </div>
          <div class="row caption">
            <div class="col-sm-6">
              <img src="image/imgtrangchu/imgcaption.jpg" height="300px" class="w-100">
            </div>
            <div class="col-sm-6">
              <img src="image/imgtrangchu/imgcaption3.png" height="300px" class="w-100">
            </div>
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