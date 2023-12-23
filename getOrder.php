   <?php  
 //include("Database/config.php");
 $conn = new PDO('mysql:host=localhost;dbname=cdr_bms','root', '');
error_reporting(E_ALL);
ini_set('display_errors', '1');
 $number = count($_POST["name"]);  
echo '<pre>';print_r($number);
echo '<pre>';print_r($_POST);//die('ok');
 if($number > 0 ) {
  $user_name = $_POST['userName'];

   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $statement = $conn->prepare("INSERT INTO order_header (uid) VALUES (:uid)");
      
    $statement->execute(
      array(
          ':uid'               =>  $user_name
      )
    );
      
      $statement = $conn->query("SELECT LAST_INSERT_ID()");
      $order_id = $statement->fetchColumn();

      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST["name"][$i] != '') )  
           {  
               echo "In loop". "<br>";
                //GET PRICE OF ITEM
               $getPriceSQL = "SELECT pprice FROM product WHERE pcid = '".$_POST["item_unit"][$i]."' AND pname = '".$_POST["name"][$i]."' ";
               $getPriceResult = mysqli_query($connect, $getPriceSQL);  
               $getRowDetail = mysqli_fetch_array($getPriceResult, MYSQLI_ASSOC);
               $total_price = $getRowDetail['pprice'] * $_POST["qty"][$i];
               echo "In loop total price: ". $total_price ."<br>";

               $sql = "INSERT INTO order_details
                              (ohid, pname, price, qty, total, addedon) 
                         VALUES
                              ($order_id, '".$_POST["name"][$i]."', '".$getRowDetail['pprice']."', '".$_POST["qty"][$i]."', $total_price, $date)";  
               echo "<pre>";print_r($sql);die('Okay');
               mysqli_query($connect, $sql);  
           }  
      }  


  die('okay 1');
 }else{
  die('okay 2');
 }
 ?> 