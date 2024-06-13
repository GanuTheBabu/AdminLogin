<?php
include './header.php';
require_once './src/ticket.php';
require './src/helper-functions.php';
$err = '';
$msg = '';
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpdesk-core-php";
$conn = new mysqli($servername, $username, $password, $dbname);
$id=$_GET["id"];
if ($_SERVER['REQUEST_METHOD']=='GET'){
 
    if(!isset($_GET["id"])){
      
    }
    
}
// Check connection

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .button-container {
            text-align: center;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .hidden {
            display: none;
        }
        .date{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            padding-top: 10px;
            margin-bottom: 5px;
        }
        .time{
            padding-top: 15px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            margin-bottom: 5px;
        }

    </style>
    
</head>
<body>
<?php 
               $sname= "localhost";
                           $unmae= "root";
                           $password = "";
                           $db_name = "helpdesk-core-php";
                           $conn = mysqli_connect($sname, $unmae, $password, $db_name);
                           if (!$conn) {
                            echo "Connection failed!";
                        } 
                        $sql = "SELECT * FROM ticket WHERE id=$id";

                        
                       $result = $conn->query($sql);
                        if(!$result){
                            die("Invalid query:".$connction->error);
                    
                        }
                        $row =$result->fetch_assoc();
                        
?>

    <div class="container">
        <h2>Ticket Details</h2>
        <?php if($err): ?>
            <div style="color:red;">
                <?php echo $err; ?>
            </div>
        <?php elseif($msg): ?>
            <div style="color:green;">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="staffid">Staff ID:</label>
                <?php   print "<p>".$row["staff_id"]."</p>"?>
            </div>
            <div class="form-group">
                <label for="name">Requester Name:</label>
             <?php   print "<p>".$row["name"]."</p>"?>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <?php   print  "<p>".$row["location"]."</p>" ?>
            </div>
            <div class="form-group">
                <label for="floor">Floor</label>
                <?php   print  "<p>".$row["floor"]."</p>" ?>
            </div>
            <div class="form-group">
                <label for="Room">Room:</label>
                <?php   print  "<p>".$row["room"]."</p>" ?>
            </div>
            <div class="form-group">
                <label for="issue">Issue:</label>
                <?php   print "<p>".$row['Issue']."</p>" ?>
            </div>
            <div class="form-group">
                <label for="issue">Team</label>
                <?php   print "<p>".$row['team']."</p>" ?>
            </div>
            <div class="form-group">
                <label for="priority">Status:</label>
                <?php   print "<p>".$row["status"]."</p>" ?>
            </div>
           
        </form>
    </div>
</body>
</html>

                    