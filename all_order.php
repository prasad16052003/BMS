<?php
session_start();
$email_address= $_SESSION['alogin'];
include("Database/config.php");
if(empty($email_address))
{
  header("location:index.php");
}

include('header.php');
?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Order</h4>
                  <div class="table-responsive">
                    <table class="table" id="datatable">
                      <thead>
                        <tr>
                           <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Address</th>
                            <th scope="col">View Order</th>
                            <th scope="col">Date</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php 
                          $getOrders = "SELECT u.uname, u.umobile, u.address, oh.ohid, oh.addedon FROM order_header oh JOIN user u ON oh.uid = u.uid AND oh.iostatus = 0 ORDER BY oh.ohid DESC";
                          $getOrdersResult = mysqli_query($conn, $getOrders);
                          $i = 1;
                         while ($row = mysqli_fetch_array($getOrdersResult, MYSQLI_ASSOC))
                          {
                      ?>
                      <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row['uname']; ?></td>
                        <td><?= $row['umobile']; ?></td>
                        <td><?= $row['ohid']; ?></td>
                        <td><?= $row['address']; ?></td>
                        <td><button class="btn-info badge badge-info" title="View Order" onclick="ViewOrderDetails(<?= $row['ohid']; ?>)">View</button>
                          <button class="btn-info badge badge-success" title="View Order" onclick="UpdateStatus(<?= $row['ohid']; ?>)">Action</button>
                        </td>
                        <td><?= $row['addedon']; ?></td>
                      </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="modal" id="mymodel" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="modaltable" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="tbodydata"></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
      <?php include('footer.php'); ?>
      <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
<script type="text/javascript">
  function ViewOrderDetails(orderId){
    $.ajax({
      url : 'AjaxData.php',
        type : 'GET',
        data : {
            'order_id' : orderId,
            'action' : 'order_details'
        },
        dataType:'json',
          success : function(orderDetails) {              
              let i=1;
              $('#tbodydata').html('');
              if(orderDetails.status) {
                console.log('obj: ' + JSON.stringify(orderDetails));
                 $.each(orderDetails.data, function(index, obj) {
                      $('#tbodydata').append('<tr> <td>'+i+'</td> <td>'+obj.pname+'</td> <td>'+obj.price+'</td><td>'+obj.qty+'</td><td>'+obj.total+'</td></tr>');
                      i++;
                  }); 
              }else{
                  $('#tbodydata').append('<tr> <td colspan="7" style="text-align: center;"> <b> No products added yet. </b></td></tr>');
                      
              }
          },
          error : function(request,error)
          {
              console.log("Request: "+JSON.stringify(request));
          }
    });
    $('#mymodel').modal('show');
  }

function UpdateStatus(id) {
  let text = "Are you sure ?";
  if (confirm(text) == true) {
    $.ajax({
      url : 'AjaxData.php',
        type : 'GET',
        data : {
            'order' : id,
            'action' : 'update_order_status',
        },
        dataType:'json',
          success : function(eventDetails) {              
              if(eventDetails.status) {
                location.reload();
              }else{
                location.reload();    
              }
          },
          error : function(request,error)
          {
              console.log("Request: "+JSON.stringify(request));
          }
    });
  } else {
    text = "You canceled!" + id;
  }
  console.log(text);
}

</script>
