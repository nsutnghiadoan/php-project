<?php
    include "checklogin.php";
    include "connect.php";
     $sql = "SELECT * FROM user";
        $result = mysqli_query($conn,$sql);
    if(isset($_POST['filter_btn'])){
        $filter_side = $_POST['filter_side'];
        $filter_group = $_POST['filter_group'];
        $filter_age = $_POST['filter_age'];
        
        switch($filter_side){
            case "northside" :
                $sql ="SELECT * FROM user WHERE address IN ('Hà Nội', 'Hà Giang', 'Lào Cai','Yên Bái',' Điện Biên',' Cao Bằng',' Bắc Ninh','Hà Nam',' Hải Dương','Hải Phòng','Hưng Yên' )";
                $result = mysqli_query($conn,$sql);
                
                break;
            case "southside" :
                $sql ="SELECT * FROM user WHERE address IN ('Cần Thơ','Đồng Nai', 'Bình Dương', 'Đà Lạt','Bình Phước','TP. Hồ Chí Minh','Tây Ninh','Vĩnh Long',' Đồng Tháp')";
                $result = mysqli_query($conn,$sql);
                break;
            case "middleside":
                $sql ="SELECT * FROM user WHERE address IN ( 'Nghệ An', 'Thanh Hóa','Hà Tĩnh' ,'Quảng Bình',
                'Thừa Thiên Huế','Đà Nẵng','Quảng Trị ' )";
                $result = mysqli_query($conn,$sql);
                break;
        }
        switch($filter_group){
            case "potential" :
                $sql = "SELECT * FROM user WHERE 2<=(SELECT COUNT(*)FROM bill WHERE id_customer = user.id_customer)";
                $result = mysqli_query($conn,$sql);
                break;
            case "new" :
                $sql = "SELECT * FROM user WHERE 2>(SELECT COUNT(*)FROM bill WHERE id_customer = user.id_customer)";
                $result = mysqli_query($conn,$sql);
                break;
         
        }
        switch($filter_age){
            case "juvenile" :
                $sql ="SELECT * FROM `user` WHERE ((YEAR(CURDATE()) - YEAR(dob))<18)";
                $result = mysqli_query($conn,$sql);
                break;
            case "mature" :
                $sql ="SELECT * FROM `user` WHERE ((YEAR(CURDATE()) - YEAR(dob))>=18)";
                $result = mysqli_query($conn,$sql);
                break;
          
        }
    }
    

        

   
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PeaShop - Bài viết</title>
    <link rel='shortcut icon'
        href='https://png.pngtree.com/png-vector/20190301/ourlarge/pngtree-vector-administration-icon-png-image_747092.jpg' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>PeaShop</title>

</head>

<body>
    <header class="navigation">
        <nav class="navbar navbar-expand-lg  " id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    Pea<span>Shop</span>
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarsExample09">
                    <span class="fa fa-bars"></span>

                </button>


                <div class="collapse navbar-collapse text-center" id="navbarsExample09">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link " href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown text-center">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown">Thống
                                kê</a>
                            <ul class="dropdown-menu ">
                                <li><a class="dropdown-item" href="about.php">Vùng miền</a></li>
                                <li><a class="dropdown-item" href="topCustomer.php">Top khách hàng</a></li>
                            </ul>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="typeCustomer.php">Phân loại khách hàng</a>
                        </li>


                        <li class="nav-item"><a class="nav-link" href="logout.php">Đăng xuất</a></li>
                    </ul>

                </div>
            </div>


        </nav>
    </header>
    <div class="main-wrapper ">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Tùy chọn</li>
                <li class="breadcrumb-item active" aria-current="page">Phân loại khách hàng</li>
            </ol>
        </nav>
        <div class="container">
            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-3">
                        <label>Vùng miền</label>
                        <select name="filter_side" class="form-select">
                            <option value="">-----------------</option>
                            <option value="northside">MIền Bắc</option>
                            <option value="middleside">MIền Trung</option>
                            <option value="southside">Miền Nam</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label>Nhóm</label>
                        <select name="filter_group" class="form-select">
                            <option value="">-----------------</option>
                            <option value="potential">Tiềm năng</option>
                            <option value="new">Mới</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label>Độ tuổi</label>
                        <select name="filter_age" class="form-select">
                            <option value="">-----------------</option>
                            <option value="juvenile">Vị thành niên</option>
                            <option value="mature">Trưởng thành</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" name="filter_btn">Lọc <i class="fa fa-filter"></i></button>
                </div>
            </form>
        </div>
        <div class="table table_customer container my-4">
            <table class="table table-hover table-bordered ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ </th>
                        <th>Tên</th>
                        <th>Ngày sinh</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                    </tr>
                </thead>



                <tbody class=" table_list_all_customer">

                    <?php  while($row = mysqli_fetch_assoc($result))
                        {?>

                    <tr>
                        <th><?php echo $row['id_customer']; ?></th>
                        <th class="first_name_customer"><?php echo $row['first_name']; ?>
                        </th>
                        <th class="last_name_customer"><?php echo $row['last_name']; ?></th>
                        <th class="dob_customer"><?php echo $row['dob']; ?></th>
                        <th class="address_customer"><?php echo $row['address']; ?></th>
                        <th class="phone_num_customer"><?php echo $row['phone_num']; ?></th>


                    </tr>

                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
    <hr class="mt-5 hr_login">
    <footer class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div>
                        <h4 class=" mb-4">Về công ty</h4>

                        <ul class="list-unstyled ">
                            <li><a href="#">Điều khoản và dịch vụ</a></li>
                            <li><a href="#">Bảo mật</a></li>
                            <li><a href="#">Hỗ trợ</a></li>
                            <li><a href="#">Luật</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <h4 class=" mb-4">Liên hệ</h4>

                        <ul class="list-unstyled ">
                            <li><i class="fa fa-facebook-square mb-3 mr-3"></i> <a href="#">Facebook</a></li>
                            <li><i class="fa fa-instagram mb-3 mr-3"></i> <a href="#">Instagram</a></li>
                            <li><i class="fa fa-twitter mb-3 mr-3"></i> <a href="#">Twitter</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59615.843487499194!2d105.71730847201096!3d20.952907975988357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134532bef4bcdb7%3A0xbcc7a679fcba07f6!2zSMOgIMSQw7RuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1637828995657!5m2!1svi!2s"
                        width="100%" height="100%" style="border:1;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </footer>

    </div>

</body>

</html>