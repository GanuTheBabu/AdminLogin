<?php
    include './header.php';
    require_once './src/ticket.php';
    require_once './src/user.php';
    $ticket = new Ticket();
    $allTicket = $ticket::findByStatus('pending');
   // print_r($allTicket);die();
    $user = new User();
?>
<div id="content-wrapper">

  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Floor</th>
                                <th>Room</th>
                                <th>Issue</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
               $sname= "localhost";
                           $unmae= "root";
                           $password = "";
                           $db_name = "helpdesk-core-php";
                           $conn = mysqli_connect($sname, $unmae, $password, $db_name);
                           if (!$conn) {
                            echo "Connection failed!";
                        } 
                        $sql = "SELECT * FROM ticket WHERE status='pending'"; 
                       $result = $conn->query($sql);
                        if(!$result){
                            die("Invalid query:".$connction->error);
                    
                        }
                        while($row =$result->fetch_assoc()){
                            print "
                        <tbody>
                        <tr>
                            <td>".$row["name"]."</td>
                            <td>".$row["location"]."</td>
                            <td>".$row["floor"]."</td>
                            <td>".$row["room"]."</td>
                            <td><a href='./ticket-details.php'>".$row['issue']."</a></td>
                            <td>".$row["team"]."</td>
                            <td><button class='btn btn-danger'>".$row["status"]."</button></td>
                            <td>".$row["created_at"]."</td>
                            <td width='100px'>
                                    <div class='btn-group' role='group' aria-label='Button group with nested dropdown'>
                                        <div class='btn-group' role='group'>
                                            <button id='btnGroupDrop1' type='button'
                                                class='btn btn-outline-primary dropdown-toggle' data-toggle='dropdown'
                                                aria-haspopup='true' aria-expanded='false'>
                                                Action
                                            </button>
                                            <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
                                                <a class='dropdown-item' href='#'>View</a>
                                                <a class='dropdown-item' href='#'>Update</a>
                                                <a class='dropdown-item' href='#'>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                            </td>
</tr>
 </tbody>";
}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

  </div>
  <!-- /.container-fluid -->

  <!-- Sticky Footer -->
  <footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright © Your Website 2019</span>
      </div>
    </div>
  </footer>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="./index.php">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src
