<?php 
    include_once("connect.php");
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location: dangnhap.php');
    }

    if(isset($_GET['login'])){
        $dangxuat=$_GET['login'];
    }
    else{
        $dangxuat='';
    }

    if($dangxuat=='dangxuat'){
        session_destroy();
        header('Location: dangnhap.php');
    }


    if(isset($_POST['themsp'])){
        $tensp=$_POST['tensp'];
        $img=$_FILES['img']['name'];
        $path="addimg/".$_FILES['img']['name'];
        $giagoc=$_POST['giagoc'];
        $giakm=$_POST['giakm'];
        $content1=$_POST['content1'];
        $content2=$_POST['content2']; 
        $loai=$_POST['loai'];
        $sql_themsp=mysqli_query($conn,"insert into sanpham(tensp,image,giacu,giamoi,content1,content2,loai) values('$tensp','$path','$giagoc','$giakm','$content1','$content2','$loai')");
        move_uploaded_file($_FILES['img']['tmp_name'],$path);
    }
    
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="image/logo1.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <title>Thêm sản phẩm</title>
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
            <li><a href="?login=dangxuat">Đăng xuất</a></li>
          </ul>
          </ul>
        </nav>
    </header>

    <main style="background-color: white;">
    <h1 style="padding:20px";><b>Thêm Sản Phẩm</b></h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sản phẩm
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="themsp.php">Thêm sản phẩm</a></li>
            <li><a class="dropdown-item" href="quanlysp.php">Quản lý sản phẩm</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Đơn hàng
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="lietkekh.php">Liệt kê đơn hàng</a></li>
            <li><a class="dropdown-item" href="quanlydh.php">Quản lý đơn hàng</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Khách hàng
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="lietkedh.php">Liệt kê khách hàng</a></li>
            <li><a class="dropdown-item" href="quanlydh.php">Quản lý khách hàng</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


    <form action="themsp.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3" style="margin-left:30%";>
            <label for="tensp" class="form-label"><b>Tên sản phẩm</b></label>
            <input type="text" class="form-control" name="tensp" placeholder="Nhập vào tên sản phẩm cần thêm" style="width:70%";>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <label for="img" class="form-label"><b>Hình ảnh</b></label>
            <input type="file" class="form-control" name="img" style="width:70%";>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <label for="giagoc" class="form-label"><b>Giá gốc</b></label>
            <input type="text" class="form-control" name="giagoc" placeholder="Nhập vào giá gốc của sản phẩm" style="width:70%";>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <label for="giakm" class="form-label"><b>Giá khuyến mãi</b></label>
            <input type="text" class="form-control" name="giakm" placeholder="Nhập vào khuyến mãi của sản phẩm" style="width:70%";>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <label for="content1" class="form-label"><b>Giới thiệu 1</b></label>
            <input type="text" class="form-control" name="content1" style="width:70%";>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <label for="content2" class="form-label"><b>Giới thiệu 2</b></label>
            <input type="text" class="form-control" name="content2" style="width:70%";>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <select name="loai" class="form-control" style="width:70%";>
                <option value="0">Chọn nơi thêm sản phẩm vào</option>   
                <option value="Điện Thoại Nổi Bật Nhất">Điện Thoại Nổi Bật Nhất</option>   
                <option value="Đồng Hồ Thông Minh Bán Chạy Nhất">Đồng Hồ Thông Minh Bán Chạy Nhất</option>
            </select>
        </div>
        <div class="mb-3" style="margin-left:30%";>
            <input type="submit" class="form-control btn-primary" name="themsp" style="width:70%"; value="Thêm sản phẩm">
        </div>
    </form>

    </main>
    <footer style="background-color: white;">
      
    </footer>
</body>
</html>