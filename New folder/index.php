		<?php
		include "database.php";
		
		//insert data query ..............................................................................
		$db = new database();
		if (isset($_POST['submit'])){
			$names  = $_POST['name'];
			$price = $_POST['price'];
			
			if (isset($_FILES['image']['tmp_name'])) {
				$tmp_name = $_FILES['image']['tmp_name'];
  				$target = "imagess/.";
  				$name = $_FILES["image"]["name"];
  				move_uploaded_file($tmp_name, "$target/$name");	
  			}
  			$image = $name;
  			

			if ($names == ''|| $price == '' ) {
				$msg = "Field must not be empty";
			}else{
				$uery = "INSERT INTO crud1(name,price,image) VALUES('$names','$price','$image')";
				$insert = $db->insert($uery);
			}

		}

		//show all data query.............................................................................
		$db = new database();
		$query = "SELECT * FROM crud1";
		$read = $db->select($query);


		//edit data by id query..............................................................................

		if (isset($_GET['edit'])) {
			$id = $_GET['edit'] ;
			$db = new Database();
			$query = "SELECT * FROM crud1 WHERE id = $id";
			$data = $db->edit($query)->fetch_assoc();

		}
		//update data.......................................................................................

		if (isset($_POST['update'])){
			$id = $_POST['id'];
			$name  = $_POST['name'];
			$price = $_POST['price'];
			$db = new database();
			$update = "UPDATE  crud1 SET name ='$name', price ='$price' WHERE id= $id";
			$save = $db->update($update);
		
		}


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
			<div class="container"></br>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">Enter Prodict Deatails</div>
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
								<form method="POST" action="index.php" enctype="multipart/form-data">
									<table class="table table-hover">
										<tr>
											<td>Employee Name :</td>
											<td>
												<input type="text" class="form-control" value="<?php if(isset($_GET['edit'])) echo $data['name']; ?>" name="name" placeholder="Enter product name">
												<input type="hidden"  value="<?php if(isset($_GET['edit'])) echo $data['id']; ?>" name="id" >
											</td>
	
										</tr>
										<tr>
											<td>Salarie/Price :</td>
											<td>
												<input type="taxt" class="form-control" name="price" value="<?php if(isset($_GET['edit'])) echo $data['price']; ?>" placeholder="Enter Product Price" >
											</td>
										</tr>
										<tr>
											<td>Images/Files:</td>
											<td>
												<input type="file" class="form-control" name="image" value="<?php if(isset($_GET['edit'])) echo $data['image']; ?>" placeholder="Enter Product image" >
											</td>
										</tr>

										<tr>
											<td colspan="2" align="content">
											<?php if (isset($_GET['edit'])) { ?>
												<input type="submit" class="btn btn-primary" name="update" value="Update">
											 
											<?php  } else {?>
													<input type="submit" class="btn btn-primary" name="submit" value="Save">

											<?php } ?>
											</td>
											
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container"></br>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="panel panel-primary">
							<table class="table table-bordered">
								<tr>
									<th>ID</th>
									<th>EmployeeName</th>
									<th>Salarie/Price</th>
									<th>Images/Files</th>
									<th>Action</th>
								</tr>
								<?php if ($read) { ?>

									<?php while($row = $read->fetch_assoc()) {  ?>
										<tr>	
											<td>
											   <img src="<?php echo 'imagess/'.$row['image'];?>" width="80px" height="80px" />
											</td>
											<td>
											   <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>	
											</td>
										</tr>
									<?php } ;?>
								<?php } ;?>
								
							</table>
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>		
		</body>
		</html>