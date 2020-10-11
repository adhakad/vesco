<?php
		include "database.php";
		
		//insert data query ..............................................................................
		$db = new database();
		if (isset($_POST['submit'])){
			
			
			if (isset($_FILES['image']['tmp_name'])) {
				$tmp_name = $_FILES['image']['tmp_name'];
  				$target = "imagess/.";
  				$name = $_FILES["image"]["name"];
  				move_uploaded_file($tmp_name, "$target/$name");	
  			}
  			$image = $name;
  			

			
				$uery = "INSERT INTO crud1(image) VALUES('$image')";
				$insert = $db->insert($uery);
			

		}

                //show all data query.............................................................................
		$db = new database();
		$query = "SELECT * FROM crud1";
		$read = $db->select($query);
                
                //delect data........................................................................................

		if (isset($_GET['delete'])) {
			$id = $_GET['delete'] ;
			$connection = new Database();
			$del = "DELETE FROM crud1 WHERE id=$id";
			$connection->delete($del);
		}
                
		?>
		<!DOCTYPE html>
		<html>
		<head>

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
			<title>Your Website</title>
			<link rel="stylesheet" href="" type="text/css" />
			<script type="text/javascript"></script>
		</head>

		<body>
                    
			
                    <div class="row" style="margin-top: 50px;margin-left: 30px;">
					
					<div class="col-md-4">
                                            <div class="panel panel-primary">
							<div class="panel-heading text-center"style="background: linear-gradient(to bottom, #f3d400,#ff6600);height: 70px;color: #000;">Main Home Image Slider</div>
							<div class="panel-body">
								<div style="color: red;">
									<samp>
									<?php 
									if (isset($_GET['msg'])) {
										echo " " .$_GET['msg'];
									}


									?>
								</samp>
							</div>
						</br>
                                                <form method="POST" action="admin.php" enctype="multipart/form-data">
                                                    <table style="margin-bottom: 50px;">
										
												
												<input type="hidden"  value="<?php if(isset($_GET['edit'])) echo $data['id']; ?>" name="id" >
											
										<tr>
											<td>Images/Files:</td>
											<td>
												<input type="file" class="form-control" name="image" value="<?php if(isset($_GET['edit'])) echo $data['image']; ?>" placeholder="Enter Product image" >
											        
                                                                                        </td>
                                                                                        <td colspan="2" align="content">
											    <input type="submit" class="btn"style="background: linear-gradient(to bottom, #23ff66,#00ffa9);margin-left: 30px;width: 100px;height: 35px;" name="submit" value="Save">
											</td>
										</tr>

										
											
											
										
									</table>
                                                    <table class="" style="width: 400px;border: 1px solid #f38900;margin-left: 15px; ">
                                                        <tr style="height: 50px;border: 1px solid #f38900;color: #000; background: linear-gradient(to bottom, #f3d400,#f38900);">
                                                            <th class="text-center">Images/Files</th>
                                                            <th class="text-center" style="border: 1px solid #f38900; ">Action</th>
							</tr>
								<?php if ($read) { ?>

									<?php while($row = $read->fetch_assoc()) {  ?>
										<tr style="border: 1px solid #f38900; ">	
											<td style="border: 1px solid #f38900; ">
                                                                                            <img src="<?php echo 'imagess/'.$row['image'];?>" width="220px" height="120px " style="margin-bottom: 10px;margin-left: 30px;" />
											</td>
                                                                                        <td style="width: 120px;">
                                                                                            <a href="admin.php?delete=<?php echo $row['id']; ?>" class="btn " style="margin-left: 28px;background:linear-gradient(to bottom, #ff3300, #ff7700);color: #fff;">Delete</a>	
											</td>
										</tr>
									<?php } ;?>
								<?php } ;?>
								
							</table>
								</form>
                           
				                            
			
							</div>
						</div>
					</div>
				</div>
                            </div>
                    
		</body>
		</html>
