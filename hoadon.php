<?php 
  session_start();
  include_once('connect.php');
?>
<?php 

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



    if(isset($_POST['themgiohang'])){
      $id_sp=$_POST['id_sanpham'];
      $tensp=$_POST['tensp'];
      $gia=$_POST['gia'];
      $image=$_POST['image'];
      $soluong=$_POST['soluong'];
      // echo $id_sp;
      // echo $tensp;
      // echo $gia;
      // echo $image;
      $sql_kt=mysqli_query($conn,"select * from giohang where id_giohang='$id_sp'");
      $num_sql_kt=mysqli_num_rows($sql_kt);
        if($num_sql_kt>0){
          $row_kt=mysqli_fetch_array($sql_kt);
          $soluong=$soluong+$row_kt['soluong'];
          $sql_giohang=mysqli_query($conn,"update giohang set soluong='$soluong' where id_giohang='$id_sp'");
        }
        else{
          $sql_giohang=mysqli_query($conn,"insert into giohang(id_giohang,image,tensp,giasp,soluong) values('$id_sp','$image','$tensp','$gia','$soluong')");
        }
      
    }
    elseif(isset($_GET['xoa'])){
      $id_del=$_GET['xoa'];
      $sql_del=mysqli_query($conn,"delete from giohang where id_giohang='$id_del'");
    }
    elseif(isset($_POST['thanhtoan'])){
      $tenkh=$_POST['name'];
      $sdt=$_POST['sdt'];
      $diachi=$_POST['address'];
      
      // echo $tenkh;
      // echo $sdt;
      // echo $diachi;
      // $sql_thanhtoan=mysqli_query($conn,"insert into khachhang(id_khachhang,tenkh,sdt,diachi) values('','$tenkh','$sdt','$diachi')");
      if(! isset($_SESSION['username'])){
           $sql_thanhtoan=mysqli_query($conn,"insert into khachhang(tenkh,sdt,diachi) values('$tenkh','$sdt','$diachi')");
      }
      
      if(isset($sql_thanhtoan)){
        $sql_kh=mysqli_query($conn,"select * from khachhang order by id_khachhang desc limit 1");
        $row_kh=mysqli_fetch_array($sql_kh);
        $id_khachhang=$row_kh['id_khachhang'];
        $madon=rand(0,9999);
        $sql_count_sp=mysqli_query($conn,"select count(id_giohang) as slsp from giohang");
        $row_count_sp=mysqli_fetch_array($sql_count_sp);
        for($i=0;$i<$row_count_sp['slsp'];$i++){
          $id_sp=$_POST['id_cart'][$i];
          $soluong=$_POST['sl'][$i];
          $sql_donhang=mysqli_query($conn,"insert into donhang(id_donhang,madonhang,id_sanpham,soluong,id_khachhang) values('','$madon','$id_sp','$soluong','$id_khachhang')");
          $sql_del_cart=mysqli_query($conn,"delete from giohang where id_giohang='$id_sp'");
        }
      }
      elseif(isset($_SESSION['id_khachhang'])){
        $id_khachhang=$_SESSION['id_khachhang'];
        $sql_kh=mysqli_query($conn,"select * from khachhang where id_khachhang='$id_khachhang' limit 1");
        $row_kh=mysqli_fetch_array($sql_kh);
        // $id_khachhang=$row_kh['id_khachhang'];
        $madon=rand(0,9999);
        $sql_count_sp=mysqli_query($conn,"select count(id_giohang) as slsp from giohang");
        $row_count_sp=mysqli_fetch_array($sql_count_sp);
        for($i=0;$i<$row_count_sp['slsp'];$i++){
          $id_sp=$_POST['id_cart'][$i];
          $soluong=$_POST['sl'][$i];
          $sql_donhang=mysqli_query($conn,"insert into donhang(id_donhang,madonhang,id_sanpham,soluong,id_khachhang) values('','$madon','$id_sp','$soluong','$id_khachhang')");
          $sql_del_cart=mysqli_query($conn,"delete from giohang where id_giohang='$id_sp'");
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
        <title>Hóa Đơn</title>
        <link href="icon/css/all.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="css/css.css" rel="stylesheet">
        <script src="js/script.js" type="text/javascript"></script>
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
            <?php
              if(isset($_SESSION['username'])){
                $username=$_SESSION['username'];
                echo '
                <li class="nav-item dropdown" style="top : -10%;">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">'."$username".
              
             '</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="thongtin_user.php">Thông tin</a></li>
            <li><a class="dropdown-item" href="?login=dangxuat">Đăng xuất</a></li>
           </ul>
           </li>
                ';
              }
            ?>
          </ul>
          </ul>
        </nav>
    </header>
    <main class="container">
        <h1>CHI TIẾT ĐƠN HÀNG</h1>
            <div class="hoadon">
            <table style="width:100%" class="table table-bordered">
                <thead style="text-align: center;">
                    <th>Ảnh Sản Phẩm</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    <th>Thành Tiền</th>
                    <th> Xóa </th>
                </thead>
                <tbody id="mycart" style="height: 200px;">
                   <?php 
                      $sql_showcart=mysqli_query($conn,"select * from giohang");
                   ?>
                   <?php 
                          $tongtien=0;
                        while($row_showcart=mysqli_fetch_array($sql_showcart)){
                          $thanhtien=((float)$row_showcart['giasp']*1000000)*(int)$row_showcart['soluong'];
                          $tongtien+=$thanhtien;
                   ?>

                          <tr>
                                <td id="anhhoadon"> <img height="100px" src="<?php echo $row_showcart['image'] ?>"></td>
                                <td><?php echo $row_showcart['tensp'] ?></td>
                                <td><?php echo $row_showcart['soluong'] ?></td>
                                <td><?php echo number_format((int)$row_showcart['giasp']*1000000). 'vnd' ?></td>
                                
                                <td><?php echo number_format($thanhtien). 'vnd' ?></td>
                                <td ><a onclick="return del_sp('<?php echo $row_showcart['tensp'] ?>')" href="?xoa=<?php echo $row_showcart['id_giohang'] ?>"><i class="fas fa-trash-alt" id="nutxoasp"></i></a></td>
                          </tr>
                       <?php }?>
                </tbody>
                <tr>
                            <td colspan="6" style="text-align: center;">Tổng đơn hàng: <?php echo number_format($tongtien). 'vnd'?></td>
                          </tr>
            </table>
        </div>
        
        <h5 style="color: black;">Địa chỉ giao hàng</h5>
        <form action="hoadon.php" method="POST">
        <div class="mb-3">
    <label for="name" class="form-label"><b>Tên khách hàng</b></label>
    <input type="text" class="form-control" name="name" placeholder="Vui lòng điền vào tên khách hàng">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label"><b>Số điện thoại</b></label>
    <input type="text" class="form-control" name="sdt" placeholder="Vui lòng nhập vào số điện thoại">
  </div>
   <div class="mb-3">
    <label for="address" class="form-label"><b>Địa chỉ giao hàng</b></label>
    <input type="text" class="form-control" name="address" placeholder="Vui lòng nhập vào địa chỉ giao hàng">
  </div>
        <?php 
          $sql_get_cart=mysqli_query($conn,"select * from giohang order by id_giohang desc");
        ?>
  <?php
        while($row_get_cart=mysqli_fetch_array($sql_get_cart)){
  ?>  
          <input type="hidden" class="form-control" name="id_cart[]" value="<?php echo $row_get_cart['id_giohang'] ?>">  
          <input type="hidden" class="form-control" name="sl[]" value="<?php echo $row_get_cart['soluong'] ?>">  

        <?php } ?>
          

  <button type="submit" name="thanhtoan" class="btn btn-success" style="margin-bottom: 20px;">Thanh Toán</button>
</form>

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
  <script>
    function del_sp(name){
      return confirm("Bạn có chắc muốn xóa sản phẩm "+name+ "?");
    }
  </script>  

</body>
</html>
