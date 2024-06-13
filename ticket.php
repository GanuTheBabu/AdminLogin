<?php
include 'headerforuser.php';
require_once './src/ticket.php';
require './src/helper-functions.php';

$err = '';
$msg = '';

// Database connection for ticket system
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpdesk-core-php";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Database connection for building data
$building_dbname = "building_db";
$building_conn = new mysqli($servername, $username, $password, $building_dbname);
if ($building_conn->connect_error) {
    die("Connection failed: " . $building_conn->connect_error);
}

// Fetch buildings
$buildings = [];
$building_sql = "SELECT id, name FROM buildings";
$building_result = $building_conn->query($building_sql);
if ($building_result->num_rows > 0) {
    while($row = $building_result->fetch_assoc()) {
        $buildings[] = $row;
    }
}

if(isset($_POST['submit'])){
    $id = rand(1000, 9999);
    $name = $_POST['name'];
    $location_id = $_POST['location'];
    $floor_id = $_POST['floor'];
    $room_id = $_POST['room'];
    $issue = $_POST['issue']; 
    $priority = $_POST['priority'];
    $staffid = $_POST['staffid'];
    $team = $_POST['Team'];
    // Fetch the names for location, floor, and room
    $location = fetchName($building_conn, "buildings", $location_id);
    $floor = fetchName($building_conn, "floors", $floor_id);
    $room = fetchName($building_conn, "rooms", $room_id);

    if(strlen($name) < 1) {
        $err = "Please enter requester name";
    } else if(strlen($location) < 1){
        $err = "Please enter location";
    } else {
        try{
            $sql_ticket = "INSERT INTO ticket (id, staff_id, name, issue, location, floor, room,team, priority, updated_at, status) 
            VALUES ($id, $staffid, '$name', '$issue', '$location', '$floor', '$room','$team','$priority', NOW(), 'open')";
            if ($conn->query($sql_ticket) === FALSE) {
                die("Error: " . $sql_ticket . "<br>" . $conn->error);
            }     
            $ch = curl_init();
            $url = "http://localhost:3000/send-email";
            $url .= "?staffid=" . urlencode($staffid);
            $url .= "&name=" . urlencode($name);
            $url .= "&location=" . urlencode($location);
            $url .= "&floor=" . urlencode($floor);
            $url .= "&room=" . urlencode($room);
            $url .= "&issue=" . urlencode($issue);
            $url .= "&priority=" . urlencode($priority);
            
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);

            if ($output) {
                $msg = "Ticket generated successfully and email sent.";
                $msg1="Ticketid is: $id";
            } else {
                $msg = "Ticket generated successfully but failed to send email.";
                
                $msg1="Ticketid is: $id";
            }
        }
         catch(Exception $e){
            $err = "Failed to create ticket: " . $e->getMessage();
        }
    }
}

function fetchName($conn, $table, $id) {
    $sql = "SELECT name FROM $table WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['name'];
    }
    return null;
}
$building_conn->close();
$conn->close();
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
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var floorGroup = document.getElementById("floorGroup");
            var roomGroup = document.getElementById("roomGroup");

            var buildingSelect = document.getElementById("buildingSelect");
            var floorSelect = document.getElementById("floorSelect");
            var roomSelect = document.getElementById("roomSelect");

            buildingSelect.addEventListener("change", function() {
                var buildingId = buildingSelect.value;
                fetch('fetch_floors.php?building_id=' + buildingId)
                    .then(response => response.json())
                    .then(data => {
                        floorSelect.innerHTML = '<option value="" disabled selected>Select Floor</option>';
                        roomSelect.innerHTML = '<option value="" disabled selected>Select Room</option>';
                        data.forEach(floor => {
                            var option = document.createElement("option");
                            option.value = floor.id;
                            option.textContent = floor.name;
                            floorSelect.appendChild(option);
                        });
                        floorGroup.classList.remove("hidden");
                    });
            });

            floorSelect.addEventListener("change", function() {
                var floorId = floorSelect.value;
                fetch('fetch_rooms.php?floor_id=' + floorId)
                    .then(response => response.json())
                    .then(data => {
                        roomSelect.innerHTML = '<option value="" disabled selected>Select Room</option>';
                        data.forEach(room => {
                            var option = document.createElement("option");
                            option.value = room.id;
                            option.textContent = room.name;
                            roomSelect.appendChild(option);
                        });
                        roomGroup.classList.remove("hidden");
                    });
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h2>Create New Ticket</h2>
        <?php if($err): ?>
            <div style="color:red;">
                <?php echo $err; ?>
            </div>
        <?php elseif($msg): ?>
            <div style="color:green;">
                <?php echo $msg; ?>
                <?php echo $msg1; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="staffid">Staff ID:</label>
                <input type="text" id="staffid" name="staffid" required>
            </div>
            <div class="form-group">
                <label for="name">Requester Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <select id="buildingSelect" name="location" required>
                    <option value="" disabled selected>Select Location</option>
                    <?php foreach($buildings as $building): ?>
                        <option value="<?php echo $building['id']; ?>"><?php echo $building['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div id="floorGroup" class="form-group hidden">
                <label for="floor">Floor:</label>
                <select id="floorSelect" name="floor" required>
                    <option value="" disabled selected>Select Floor</option>
                </select>
            </div>
            <div id="roomGroup" class="form-group hidden">
                <label for="room">Room:</label>
                <select id="roomSelect" name="room" required>
                    <option value="" disabled selected>Select Room</option>
                </select>
            </div>
            <div class="form-group">
                <label for="issue">Issue:</label>
                <input type="text" id="issue" name="issue" required>
            </div>
            <div class="form-group">
                <label for="priority">Priority:</label>
                <select id="priority" name="priority" required>
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Team">Team:</label>
                <select id="Team" name="Team" required>
                    <option value="Maintainence">Maintainence</option>
                    <option value="Safety">Safety</option>
                </select>
            </div>
            <div class="button-container">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>

