<?php
include "connect.php";
    if(isset($_GET['customer_type'])){
        $customer_type = $_GET['customer_type'];   
        $sql = "SELECT * FROM user WHERE first_name LIKE '%$customer_type%' 
        OR last_name LIKE '%$customer_type%' OR address LIKE '%$customer_type%'";
    }
    else{
        $sql ="SELECT *FROM user";
    }
    
    $result = mysqli_query($conn,$sql);
    
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='shortcut icon'
        href='https://png.pngtree.com/png-vector/20190301/ourlarge/pngtree-vector-administration-icon-png-image_747092.jpg' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- <script src="main.js"></script> -->
    <title>PeaShop</title>
</head>

<body>
    <header class="navigation">
        <nav class="navbar navbar-expand-lg  " id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    Admin
                </a>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarsExample09">
                    <span class="fa fa-bars"></span>

                </button>


                <div class="collapse navbar-collapse text-center" id="navbarsExample09">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link " href="listCustomer.php">Danh s??ch kh??ch h??ng</a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="contact.php">Li??n h??? kh??ch h??ng</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">????ng xu???t</a></li>
                    </ul>

                </div>
            </div>


        </nav>
    </header>

    <div class="main-wrapper ">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">T??y ch???n</li>
                <li class="breadcrumb-item active" aria-current="page">Danh s??ch kh??ch h??ng</li>
            </ol>
        </nav>
        <div class="title_listcustomer my-4 container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <h2>Danh s??ch kh??ch h??ng</h2>

                </div>
                <div class="col-lg-3">
                    <a class="btn btn-primary" href="addcustomer.php"><i class="fa fa-plus"></i> Th??m kh??ch h??ng</a>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <h2 class="col-4">T??m ki???m kh??ch h??ng</h2>
                <div class="row col-8 my-3">
                    <table class="table ">
                        <form method="get">
                            <div class="input-group rounded">
                                <input type="text" class="search form-control rounded" name="customer_type"
                                    id="customer_type_info" placeholder="Nh???p t??? kh??a c???n t??m ..."
                                    value="<?php if (isset($_GET['customer_type'])){echo $_GET['customer_type'];} ?>" />
                                <span>
                                    <button id="btn_search_customer" class=" btn btn-primary" onclick="submit.php"
                                        type="submit">T??m ki???m</button>
                                </span>

                            </div>
                        </form>
                    </table>
                </div>


                <div class="table table_customer">
                    <table class="table table-hover table-bordered ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>H??? </th>
                                <th>T??n</th>
                                <th>Ng??y sinh</th>
                                <th>?????a ch???</th>
                                <th>S??? ??i???n tho???i</th>
                                <th>T??y ch???n</th>
                            </tr>
                        </thead>
                        <?php  while($row = mysqli_fetch_assoc($result))
                        {?>


                        <tbody class=" table_list_all_customer">



                            <tr>
                                <th><?php echo $row['id_customer']; ?></th>
                                <th class="first_name_customer"><?php echo $row['first_name']; ?>
                                </th>
                                <th class="last_name_customer"><?php echo $row['last_name']; ?></th>
                                <th class="dob_customer"><?php echo $row['dob']; ?></th>
                                <th class="address_customer"><?php echo $row['address']; ?></th>
                                <th class="phone_num_customer"><?php echo $row['phone_num']; ?></th>
                                <th>
                                    <a class="btn btn-success"
                                        href="edit_customer.php?this_id=<?php echo $row['id_customer']; ?>">
                                        S???a</a>
                                    <a class="btn btn-danger"
                                        href="delete_customer.php?this_id=<?php echo $row['id_customer']; ?>">
                                        X??a</a>

                                </th>

                            </tr>

                        </tbody>
                        <?php } ?>
                    </table>
                </div>

            </div>

        </div>


    </div>
    <hr class="mt-5 hr_login">
    <footer class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div>
                        <h4 class=" mb-4">V??? c??ng ty</h4>

                        <ul class="list-unstyled ">
                            <li><a href="#">??i???u kho???n v?? d???ch v???</a></li>
                            <li><a href="#">B???o m???t</a></li>
                            <li><a href="#">H??? tr???</a></li>
                            <li><a href="#">Lu???t</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <h4 class=" mb-4">Li??n h???</h4>

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