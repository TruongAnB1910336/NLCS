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
        <title>H??a ????n</title>
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
            <input required type="text" placeholder="B???n c???n t??m ki???m s???n ph???m g??..." id="search">
            <i class="fa fa-search" id="nuttimkiem"></i>
            <i class="fa fa-shopping-cart" id="cart" onclick="cart()"></i>
        </form>


         
        <nav class="nav">
          <ul class="menu">
            <li><a href="dienthoai.php"><i class="fas fa-mobile"></i> ??i???n Tho???i</a></li>
            <li><a href="laptop.php"><i class="fas fa-laptop"></i> LapTop</a></li>
            <li><a href="ipad.php"><i class="fas fa-tablet-alt"></i> Ipad</a></li>
            <li><a href="#">T??m Theo H??ng <i class="fas fa-chevron-down"></i></a>
              <div class="div1 row">
                <div class="col1">
                  <h5>??i???n Tho???i</h5>
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
            <li><a href="dongho.php"><i class="fas fa-watch"></i> ?????ng H??? Th???i Trang</a></li>
            <li><a href="tragop.php"><i class="fas fa-dollar-sign"></i> Tr??? G???p 0%</a></li>
            <li><a href="maycu.php">M??y C?? Gi?? R???</a></li>
            <li><a href="dangky.php">????ng K??</a></li>
            <li><a href="dangnhap.php">????ng Nh???p</a></li>
            <?php
              if(isset($_SESSION['username'])){
                $username=$_SESSION['username'];
                echo '
                <li class="nav-item dropdown" style="top : -10%;">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">'."$username".
              
             '</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="thongtin_user.php">Th??ng tin</a></li>
            <li><a class="dropdown-item" href="?login=dangxuat">????ng xu???t</a></li>
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
        <h1>CHI TI???T ????N H??NG</h1>
            <div class="hoadon">
            <table style="width:100%" class="table table-bordered">
                <thead style="text-align: center;">
                    <th>???nh S???n Ph???m</th>
                    <th>T??n S???n Ph???m</th>
                    <th>S??? L?????ng</th>
                    <th>Gi??</th>
                    <th>Th??nh Ti???n</th>
                    <th> X??a </th>
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
                            <td colspan="6" style="text-align: center;">T???ng ????n h??ng: <?php echo number_format($tongtien). 'vnd'?></td>
                          </tr>
            </table>
        </div>
        
        <h5 style="color: black;">?????a ch??? giao h??ng</h5>
        <form action="hoadon.php" method="POST">
        <div class="mb-3">
    <label for="name" class="form-label"><b>T??n kh??ch h??ng</b></label>
    <input type="text" class="form-control" name="name" placeholder="Vui l??ng ??i???n v??o t??n kh??ch h??ng">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label"><b>S??? ??i???n tho???i</b></label>
    <input type="text" class="form-control" name="sdt" placeholder="Vui l??ng nh???p v??o s??? ??i???n tho???i">
  </div>
   <div class="mb-3">
    <label for="address" class="form-label"><b>?????a ch??? giao h??ng</b></label>
    <input type="text" class="form-control" name="address" placeholder="Vui l??ng nh???p v??o ?????a ch??? giao h??ng">
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
          

  <button type="submit" name="thanhtoan" class="btn btn-success" style="margin-bottom: 20px;">Thanh To??n</button>
</form>

    </main>

    <footer>
        <div class="row">
          <div class="col2">
            <h5 style="color: white;">????ng K?? ????? Nh???n Th??ng Tin Khuy???n M??i T??? TheGioiDiDong</h5>
            <p><i style="color: white;">?????ng b??? l??? h??ng ng??n s???n ph???m v?? ch????ng tr??nh h???p d???n</i></p>
            <form>
              <input type="text" placeholder="Nh???p v??o email c???a b???n" size="50" id="dangky">
              <button type="button" id="btdk">????ng K??</button><br/>
              <input type="checkbox"><b style="color: white;">T??i ?????ng ?? nh???n email t??? TheGioiDiDong</b>
            </form>
          </div>
        </div>
        <div class="container footer">
          <div class="row">
            <div class="col-3">
              <ul>
                <li><a href="#">Ch??nh s??ch b???o h??nh</a></li>
                <li><a href="#">Ch??nh s??ch ?????i tr???</a></li>
                <li><a href="#">Ch??nh s??ch giao h??ng</a></li>
                <li><a href="#">T??m hi???u v??? mua tr??? g???p</a></li>
                <li><a href="#">Ph????ng th???c thanh to??n</a></li>
              </ul>
            </div>
            <div class="col-3">
              <ul>
                <li><a href="#">Gi???i thi???u c??ng ty</a></li>
                <li><a href="#">Trang tuy???n d???ng</a></li>
                <li><a href="#">Quy ch??? ho???t ?????ng website</a></li>
                <li><a href="#">G???i ?? ki???n,khi???u n???i</a></li>
                <li><a href="#">C???nh b??o gi??? m???o</a></li>
              </ul>
            </div>
            <div class="col-3">
              <ul>
                <b>T???ng ????i h??? tr???(mi???n ph??)</b>
                <li>G???i mua: 1800.1111</li>
                <li>K??? thu???t: 1800.2222</li>
                <li>Khi???u n???i: 1800.3333</li>
                <li>B???o h??nh: 1800.4444</li>
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
          <p style="font-size: 13px;color: white;">&copy;2018. C??ng ty c??? ph???n Th??? Gi???i Di ?????ng. GPDKKD: 0303217354 do s??? KH & ??T TP.HCM c???p ng??y 02/01/2007. GPMXH: 238/GP-BTTTT do B??? Th??ng Tin v?? Truy???n Th??ng c???p ng??y 04/06/2020.
            ?????a ch???: 128 Tr???n Quang Kh???i, P. T??n ?????nh, Q.1, TP.H??? Ch?? Minh. ??i???n tho???i: 028 38125960. Email: cskh@thegioididong.com. Ch???u tr??ch nhi???m n???i dung: Hu???nh V??n T???t.</p>
        </div>
      </footer>
  <script>
    function del_sp(name){
      return confirm("B???n c?? ch???c mu???n x??a s???n ph???m "+name+ "?");
    }
  </script>  

</body>
</html>
