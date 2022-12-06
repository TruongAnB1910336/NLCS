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
    
   
//     INSERT INTO `sanpham` (`id`, `tensp`, `image`, `giacu`, `giamoi`, `content1`, `content2`, `loai`) VALUES
// (1, 'iPhone12 Pro', 'image/imgtrangchu/iphone12.jpg', '24.990.000', '24.000.000', '', '', 'Săn sale mỗi ngày 1');
    if(isset($_GET['edit'])){
        session_start();
        $_SESSION['edit']=$_GET['edit'];
        header('Location: capnhatsp.php');

    }
    if(isset($_POST['capnhat'])){
            $tensp=$_POST['tensp'];
            $img=$_FILES['img']['name'];
            $path="image/imgtrangchu/".$_FILES['img']['name'];
            $giagoc=$_POST['giagoc'];
            $giakm=$_POST['giakm'];
            $content1=$_POST['content1'];
            $content2=$_POST['content2']; 
            $loai=$_POST['loai'];
            $id_sp=$_SESSION['edit'];
            // echo $path;
            if(!$img){
                $sql_themsp=mysqli_query($conn,"update sanpham set tensp='$tensp',giacu='$giagoc',giamoi='$giakm',content1='$content1',content2='$content2',loai='$loai' where id='$id_sp'");
            }
            else{
                $sql_themsp=mysqli_query($conn,"update sanpham set tensp='$tensp',image='$path',giacu='$giagoc',giamoi='$giakm',content1='$content1',content2='$content2',loai='$loai' where id='$id_sp'");
                move_uploaded_file($_FILES['img']['tmp_name'],$path);
            }
        // echo '<script>alert("Cập nhật thành công!")</script>';
    }

    if(isset($_GET['delete'])) {
        $id_sp_del=$_GET['delete'];
        $sql_del_sp=mysqli_query($conn,"delete from sanpham where id='$id_sp_del'");
    }
    

    
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="image/logo1.jpg" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <title>Quản lý sản phẩm</title>
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
    <h1 style="padding:20px";><b>Wellcom To Admin</b></h1>
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
            <li><a class="dropdown-item" href="lietkedh.php">Liệt kê đơn hàng</a></li>
            <li><a class="dropdown-item" href="quanlydh.php">Quản lý đơn hàng</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Khách hàng
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="lietkekh.php">Liệt kê khách hàng</a></li>
            <li><a class="dropdown-item" href="quanlydh.php">Quản lý khách hàng</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php 
    $sql_show_all_sp=mysqli_query($conn,"select * from sanpham");
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Giá gốc</th>
      <th scope="col">Giá khuyến mãi</th>
      <th scope="col">Chú thích 1</th>
      <th scope="col">Chú thích 2</th>
      <th scope="col">Loại sản phẩm</th>
      <th scope="col">Cập nhật</th>
    </tr>
  </thead>
  <tbody>
      <?php 
                $i=1;
            while($row_show_all_sp=mysqli_fetch_array($sql_show_all_sp)){
      ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row_show_all_sp['tensp'] ?></td>
      <td><img style="width: 100px;" id="show_all_sp" src="<?php echo $row_show_all_sp['image'] ?>"></td>
      <td><?php echo $row_show_all_sp['giacu'] ?></td>
      <td><?php echo $row_show_all_sp['giamoi'] ?></td>
      <td><?php echo $row_show_all_sp['content1'] ?></td>
      <td><?php echo $row_show_all_sp['content2'] ?></td>
      <td><?php echo $row_show_all_sp['loai'] ?></td>
      <td><a href="?edit=<?php echo $row_show_all_sp['id']?>">Sửa</a>||<a onclick="return del_sp('<?php echo $row_show_all_sp['tensp'] ?>')" href="?delete=<?php echo $row_show_all_sp['id'] ?>">Xóa</a></td>
    </tr>

    <?php $i++; } ?>
  </tbody>
</table>
<script>
    function del_sp(name){
      return confirm("Bạn có chắc muốn xóa sản phẩm "+name+ "?");
    }
  </script> 

    </main>
    <footer style="background-color: white;">
      
    </footer>
</body>
</html>