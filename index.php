<?php if(isset($_GET['msg']) && $_GET['msg'] == 0){?>
<p style="color:red;">Please Login to access this page.</p>
<?php }  ?>
<?php require_once('config.php');
$select = 'SELECT * FROM cateogory';
$query = mysqli_query($conn,$select);
?>
<!DOCTYPE html>
<html>
     <head>
 	  <meta charset="utf-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="css/custom.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
      <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
      <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

 	</head>
 	<style>
 		.alert p {
            font-family:  'Oswald', sans-serif;
 			color: #636363;
 			font-size: 33px;
 			letter-spacing: 3px;
 			word-spacing: 3px;
 			padding-top: 10px;
 			margin-top: 5px;
 		}
 	</style>
 	<body>
 		<div class="alert alert-dark" style="margin-bottom:0px">
             <p class="ap">Admin-Panel.</p>
               
 		</div>
 		<div class="container-fluid" style="padding:0px;">
 			<div class="row">
 			<div class="col-md-2 sb" style="height:700px;">
 			 <p class="h4 text-center pt-1 ft">CATEOGORY</p>
 			 <div class="dropdown dd ml-4">
  <button class="btn btn-dark dropdown-toggle ddf" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
    Products
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="product_add.php">Add</a>
    <a class="dropdown-item" href="product_view.php">View</a>
  </div>
</div>
 			</div>
 			<div class="col-md-10 navbar-expand-lg">
 			<button class="btn my-2 btn-dark" value="Add" role="button" data-toggle="modal" style="margin-left:920px;" data-target="#add_cat">Add  <i class="fas fa-plus-circle"></i></button>
 			 <table class="table table-hover table-bordered tablr-responsive " style="text-align:center;font-family: 'Lato', sans-serif;">
 				<tr>
 					<th>Sr.No</th>
 					<th>Cateogory</th>
          
 					<th colspan="2" style="text-align:center; ">Action</th>
 				 </tr>
 				 <?php $i=0; while($res = mysqli_fetch_assoc($query)){?>
 				 <tbody>
 					<tr>
 					<td><?php echo ++$i;?></td>
 					<td><?php echo $res['cat'];?></td>
          
          <td><a href="javascript:;" data-toggle="modal" data-target="#edit_cat" class="edit_btn" cat_id="<?php echo $res['id'];?>"><i class="fas fa-edit"></i></a></td>
 					<td><a href="cat_delete.php?id=<?php echo $res['id'];?>"><i class="fas fa-trash-alt"></i></a></td>
 				  </tbody>
 				  <?php }?>
 			   </tr>
 			  </table>

 			</div>
 		 </div>
 		</div>



 		<div class="modal fade" id="add_cat" role="dialog" class="currency_modal">
    <div class="modal-dialog  modal1">


        <div class="modal-content currency_modal_content">
            <div class="modal-header">
               <h3>Add category Name</h3><br><br>
                <button type="button" class="close closeup" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
             
              <form style="font-family: 'Acme', sans-serif;" class=""  method="POST" action="cateogory_insert.php">
                  <div class="form-group">
                  	<label>Add category :</label>
                  	<input value="" type="text" name="cat_name">
                    <input type="hidden"  value="">
                  </div>
                   <div class="form-group">
                    <button class="btn btn-md btn-dark" role="button" value="add">Submit</button>
                   	
                  </div>
              
            
            </div>
  
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="edit_cat" role="dialog" class="currency_modal">
    <div class="modal-dialog  modal1">


        <div class="modal-content currency_modal_content">
            <div class="modal-header">
                  <h3>New category</h3><br><br>
                <button type="button" class="close closeup" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form style="font-family: 'Acme', sans-serif;" method="POST" action="cat_update.php" enctype="multipart/formdata">
   NAME : &nbsp;<input style="border:1px solid black; border-radius:5px;" type="text" id="name" name="name" value="">
        <input type="hidden" id="edit_id" name="id" value="">
        <input class="btn btn-dark btn-md" type="submit" value="update" >
  </form>
            
            </div>
            
        </div>

    </div>




        
 		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">


      

          $('.edit_btn').click(function(){
           var cat_id = $(this).attr('cat_id');
           console.log(cat_id);

           $.ajax({
           url:'cat_edit.php',
           data:'cat_id='+cat_id,      //ask maam// doubt//
           type:'POST',
           dataType:'JSON',
              success: function(result){
                console.log(result);
                 $('#name').val(result.cat);
                 $('#edit_id').val(result.id);

              },

           });




    });
     
    </script>
 	</body>
</html>