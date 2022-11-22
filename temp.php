<?php 
require("./Controllers/application_controller.php");


$ip_address = getenv("REMOTE_ADDR");
echo "$ip_address";
if(isset($_SESSION['user_role'])){
    $customerid = $_SESSION['user_id'];
    echo "$customer_id";
    $applications_list = select_all_applications_controller($customer_id, $ip_address);
    // echo "$applications_list";
    // contains app_id, cust_id, uni_id, ip_add, price, total

}else{
    $applications_list = select_all_applications_without_customer_id_controller($ip_address);
    echo "$ip_address";

}
// /* Looping through the array and printing out the values. */

// if ($applications_list->num_rows > 0){
//         // OUTPUT DATA OF EACH ROW
//     while($row = $applications_list->fetch_assoc()){
//         echo "Application ID" .
//         $row["app_id"]. " - IP Address: " .
//         $row["ip_add"]. " - Price: " .
//         $row["price"]. "<br>";
//         }
//         }
// else {
//     echo "0 results";
// }
foreach($applications_list as $x){
    echo "$x" ."<br>";
    // echo "{$x['app_id']}";
    // echo "{$x['ip_add']}";
    // echo "{$x['price']}";

}




?>
