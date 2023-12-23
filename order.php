<?php
  session_start();
  $email_address= $_SESSION['alogin'];
  include("Database/config.php");
  if(empty($email_address))
  {
    header("location:index.php");
  }
  
  include('header.php');
  if(isset($_POST['submit'])) {
    $itemNames = json_decode($_POST['all_items']);
    echo '<pre>';print_r($itemNames);die('okk');
    echo '<pre>';print_r($_POST);die('okk');
    
  }
?>
<div class="main-panel">        
  <div class="content-wrapper">
    <form name="add_name" id="add_name" method="post" action="" enctype="multipart/form-data">
      <div class="app-content">
        <section class="section">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Order</li>
            
          </ol>
          
          <div class="row">
            
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Order Details</h4>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <div class="col-md-3">
                      <button class="btn btn-success btn-xs" id="submit" name="submit" type="submit">Submit</button>
                    </div>
                  </div>
                  <div class="form-group row">
                    <table class="table table-bordered" id="dynamic_field">  
                      <table class="table table-bordered input_fields_wrap" id="dynamic_field">  
                        <tr>  
                          <td><select name="item_unit[]" class="form-control item_unit" required>
                            <option value="">Select Category</option><?php echo fill_unit_select_box($connect); ?>
                          </select></td> 
                          <td><input type="text" name="name[]" placeholder="Enter Product Name" class="form-control name_list" id="name" autofocus/></td> 
                          <td><input type="text" name="qty[]" placeholder="Enter Product Qty" class="form-control name_list" /></td>  
                          <td><button type="button" name="add" id="add" class="btn btn-success add_field_button">Add</button></td>  
                        </tr>  
                      </table>  
                      
                    </table>  
                    <p id="omsg" style="color: red;"></p>
                    
                  </style>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
  </form>
</div>
<?php include('footer.php'); ?>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
  <link href="http://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>  

  <script type="text/javascript">
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    var i=1;  //ininital remove button count
    var availableAttributes = <?php echo json_encode($yourArray);?>;
     $('#add').click(function(e){ //on add input button click
        e.preventDefault();
         
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><td><select name="item_unit[]" class="form-control item_unit" required><option value="">Select Category</option><?php echo fill_unit_select_box($connect); ?></select></td><td><input id="' + x + '" type="text" name="name[]" placeholder="Enter Product Name" id="name" class="form-control name_list" autofocus /></td><td><input type="text" name="qty[]" placeholder="Enter Product Qty." class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 
            
            $( "input[id="+ x +"]" ).autocomplete({
            source: availableAttributes
          }); 

          //HIDE BUTTON IF INPUT BOX IS EMPTY
          $("input[id="+ x +"]" ).change(function(){
           var show_id1 = $("input[id="+ x +"]").val();
         //alert(show_id1);
         if($("input[id="+ x +"]" ).val() == '')
         {
          //alert("null");
          $('#submit').prop('disabled', true);
         }else{
          //alert("not null");
          $('#submit').prop('disabled', false);
         }
      });

            //add input box
        }
    });

  $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           //alert(button_id);  
           $('#row'+button_id+'').remove();  
      });  
    
    $("input[name^='name']").autocomplete({
    source: availableAttributes
  }); 

  $('#submit').click(function(){  
      var Order =   $('#add_name').serialize();        
           $.ajax({  
                url:"getOrder.php",  
                method:"POST",  
                data:$('#add_name').serialize(),   
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      }); 

  $(document).ready(function(){
    $('#submit').prop('disabled', false);
  });
  </script>         