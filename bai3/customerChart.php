<?php
  include "connect.php";

  $sql1= "SELECT MAX(id_customer) FROM bill";
     $result4 = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_array($result4);

    for($i=1;$i<=$row['0'];$i++){

        $sql = "SELECT SUM(total_price) FROM bill WHERE id_customer= $i";
        $result5= mysqli_query($conn,$sql);
        $row1 = mysqli_fetch_array($result5);
        $customerChart = array();
            if($row1[0]!=NULL){

             $sqli = "SELECT* FROM user WHERE id_customer = $i";
             $result6 = mysqli_query($conn,$sqli);
             $row5 = mysqli_fetch_assoc($result6);
             $str ='["'.$row5['last_name'].'",'.$row1[0].'],';


              }else{
                    continue;
                }
                 $customerChart[] = $str;
                     foreach($customerChart as $value){
                       echo $value;
                    }
               }

?>