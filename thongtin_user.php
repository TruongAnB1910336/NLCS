<?php 
    include_once("connect.php");
    session_start();
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
    
   

    // if(isset($_POST['xuly'])){
    //   $trangthai=$_POST['trangthai'];
    //   $madonhang=$_POST['madonhang'];
    //   $sql_xu_ly_don_hang=mysqli_query($conn,"update donhang set trangthai='$trangthai' where madonhang='$madonhang'");
    // }
    

    // if(isset($_GET['del_dh'])){
    //   $madh=$_GET['del_dh'];
    //   $sql_del_dh=mysqli_query($conn,"delete from donhang where madonhang='$madh'");
    // }

    
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="image/logo1.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <title>Thông Tin Khách Hàng</title>
    <link href="icon/css/all.css" rel="stylesheet">
    <link href="css/ad.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="css/css.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <script src="js/script.js" type="text/javascript"></script>
    <script src="js/js.js"></script>
</head>
<body style="background-color: white;">
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

    <main style="background-color: white;">
    
    <h5 style="color: black;">Thông tin cơ bản</h5>
    <?php
        $id_khachhang=$_SESSION['id_khachhang'];
        $sql_show_user=mysqli_query($conn,"select * from khachhang where id_khachhang='$id_khachhang'");
    ?>
        <?php
            while($row_show_user=mysqli_fetch_array($sql_show_user)){
        ?>
        <form action="hoadon.php" method="POST">
        <div class="mb-3">
    <label for="name" class="form-label"><b>Tên khách hàng</b></label>
    <input type="text" class="form-control" name="name" value="<?php echo $row_show_user['tenkh'] ?>">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label"><b>Số điện thoại</b></label>
    <input type="text" class="form-control" name="sdt" value="<?php echo $row_show_user['sdt'] ?>">
  </div>
   <div class="mb-3">
    <label for="address" class="form-label"><b>Địa chỉ</b></label>
    <input type="text" class="form-control" name="address" value="<?php echo $row_show_user['diachi'] ?>">
  </div>
  <div class="mb-3">
    <label for="email_user" class="form-label"><b>Email</b></label>
    <input type="text" class="form-control" name="email_user" value="<?php echo $row_show_user['email'] ?>">
  </div>
</form>
<?php }?>

    



<h2 style="text-align: center;margin-top:40px;margin: botton 30px;">Đơn hàng đang chờ giao</h2>
<form action="lietkekh.php" method="POST" style="margin-top: 40px;">
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Mã đơn hàng</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Địa chỉ giao hàng</th>
      <th scope="col">Ngày đặt hàng</th>
     
    </tr>
  </thead>
  <tbody>
  <?php 
    
      $id_khachhang=$_SESSION['id_khachhang'];
      $sql_show_chi_tiet_kh=mysqli_query($conn,"select kh.tenkh as tenkh,sp.tensp as tensp,sp.image as img,sp.giacu as giacu,kh.sdt as sdt,kh.diachi as diachi,dh.madonhang as madonhang,dh.thoigian as ngaydat,dh.soluong as soluong from sanpham sp,donhang dh,khachhang kh where dh.id_sanpham=sp.id and dh.id_khachhang=kh.id_khachhang and kh.id_khachhang='$id_khachhang' and dh.trangthai='0'");

  ?>
      <?php 
            if(isset($_SESSION['id_khachhang'])){
            $i=1;
            $tongdh=0;
            while($row_show_chi_tiet_don_hang=mysqli_fetch_array($sql_show_chi_tiet_kh)){
              $tongdh+=((float)$row_show_chi_tiet_don_hang['giacu']*1000000)*(int)$row_show_chi_tiet_don_hang['soluong'];
      ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row_show_chi_tiet_don_hang['tenkh'] ?></td>
      <td><?php echo $row_show_chi_tiet_don_hang['madonhang'] ?></td>
      <td><?php echo $row_show_chi_tiet_don_hang['tensp'] ?></td>
      <td><img style="width: 100px;" id="show_all_sp" src="<?php echo $row_show_chi_tiet_don_hang['img'] ?>"></td>
      <td><?php echo $row_show_chi_tiet_don_hang['giacu'] ?></td>
      <td><?php echo $row_show_chi_tiet_don_hang['soluong'] ?></td>
      <td><?php echo $row_show_chi_tiet_don_hang['sdt'] ?></td>
      <td><?php echo $row_show_chi_tiet_don_hang['diachi'] ?></td>
      <td><?php echo $row_show_chi_tiet_don_hang['ngaydat'] ?></td>
      
      <input type="hidden" name="madonhang" value="<?php echo $row_show_chi_tiet_don_hang['madonhang']?>">
    </tr>
    <?php $i++; } ?>
    <tr>
      <td colspan="10">
        Tổng đơn hàng: <?php echo number_format($tongdh). 'đ'?>
      </td>
    </tr>
    <?php } ?>

    </tr>
  </tbody>
</table>
</form>


<h2 style="text-align: center;margin-top:40px;margin: botton 30px;">Đơn hàng đã giao</h2>
<form action="lietkekh.php" method="POST" style="margin-top: 40px;">
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Mã đơn hàng</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Địa chỉ giao hàng</th>
      <th scope="col">Ngày đặt hàng</th>
     
    </tr>
  </thead>
  <tbody>
  <?php 
    if(isset($_SESSION['id_khachhang'])){
      $id_khachhang=$_SESSION['id_khachhang'];
      $sql_show_chi_tiet_kh=mysqli_query($conn,"select kh.tenkh as tenkh,sp.tensp as tensp,sp.image as img,sp.giacu as giacu,kh.sdt as sdt,kh.diachi as diachi,dh.madonhang as madonhang,dh.thoigian as ngaydat,dh.soluong as soluong from sanpham sp,donhang dh,khachhang kh where dh.id_sanpham=sp.id and dh.id_khachhang=kh.id_khachhang and kh.id_khachhang='$id_khachhang' and dh.trangthai='1'");

    }

  ?>
      <?php 
            if(isset($_SESSION['id_khachhang'])){
            $i=1;
            $tongdh=0;
            while($row_show_chi_tiet_don_hang=mysqli_fetch_array($sql_show_chi_tiet_kh)){
              $tongdh+=((float)$row_show_chi_tiet_don_hang['giacu']*1000000)*(int)$row_show_chi_tiet_don_hang['soluong'];
      ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row_show_chi_tiet_don_hang['tenkh'] ?></td>
      <td><?php echo $row_show_chi_tiet_don_hang['madonhang'] ?></td>
      <td><?php echo $row_show_chi_tiet_don_hang['tensp'] ?></td>
      <td><img style="width: 100px;" id="show_all_sp" src="<?php echo $row_show_chi_tiet_don_hang['img'] ?>"></td>
      <td><?php echo $row_show_chi_tiet_don_hang['giacu'] ?></td>
      <td><?php echo $row_show_chi_tiet_don_hang['soluong'] ?></td>
      <td><?php echo $row_show_chi_tiet_don_hang['sdt'] ?></td>
      <td><?php echo $row_show_chi_tiet_don_hang['diachi'] ?></td>
      <td><?php echo $row_show_chi_tiet_don_hang['ngaydat'] ?></td>
      
      <input type="hidden" name="madonhang" value="<?php echo $row_show_chi_tiet_don_hang['madonhang']?>">
    </tr>
    <?php $i++; } ?>
    <tr>
      <td colspan="10">
        Tổng đơn hàng: <?php echo number_format($tongdh). 'đ'?>
      </td>
    </tr>
    <?php } ?>

    </tr>
  </tbody>
</table>
</form>


    </main>
    <footer style="background-color: white;">
      
    </footer>
</body>
</html>