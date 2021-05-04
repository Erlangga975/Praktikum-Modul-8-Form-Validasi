<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title></title>
	<style>
		.warning {color: #ff0000;}
	</style>
</head>
<body>
	<?php
	$error_nama = "";
	$error_email = "";
	$error_web = "";
	$error_pesan = "";
	$error_telp = "";

	$nama = "";
	$email = "";
	$web = "";
	$pesan = "";
	$telp = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["nama"]))
	  {
	      $erorr_name = "Nama tidak boleh kosong";
	  }
	  else
	  {
	      $nama = cek_input($_POST["nama"]);
	      if (!preg_match("/^[a-zA-Z]*$/",$nama))
	      {
	          $namaErr = "Inputan Hanya boleh huruf dan spasi";
	      }
	  }

	  if (empty($_POST["email"]))
	  {
	      $error_email = "Email tidak boleh kosong";
	  }
	  else 
	  {
	      $email = cek_input($_POST["email"]);
	      if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	      {
	          $error_email = "Format email Invalid";
	      }
	  }
	  
	  if (empty($_POST["pesan"]))
	  {
	      $error_pesan = "Pesan tidak boleh kosong";
	  }
	  else 
	  {
	      $pesan = cek_input($_POST["pesan"]);
	  }

	  if (empty($_POST["web"]))
	  {
	      $error_web = "Website tidak boleh kosong";
	  }
	  else
	  {
	      $web = cek_input($_POST["web"]);

	      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $web))
	      {
	          $error_web = "URL tidak valid";
	      }
	  }

	  if (empty($_POST["telp"]))
	  {
	      $error_telp = "Telp tidak boleh kosong";
	  }
	  else
	  {
	      $telp = cek_input($_POST["telp"]);

	      if (!is_numeric($telp))
	      {
	          $error_telp = 'Nomor HP hanya boleh angka';
	      }
	  }
	}

	function cek_input($data) {
	 $data = trim($data);
	 $data = stripslashes($data);
	 $data = htmlspecialchars($data);
	 return $data;
	}
	?>

	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-herder">
					Contoh Validasi Form dengan PHP
				</div>
				<div class="card-body">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <div class="form-group row">
						<label form="nama" class="col-sm-2 col-form-label">Nama</label> 
						<div class="col-sm-10">
							<input type="text" name="nama" class="form-control <?php echo($error_nama !="" ? "is-nvalid" : ""); ?>" id="nama" placehorder="Nama" value="<?php echo $nama; ?>"><span class="warning"><?php echo $error_nama; ?></span>
							
						</div>
						
					</div>
						<div class="form-group row">
							<label form="email" class="col-sm-2 col-form-label">email</label>
							<div class="col-sm-10">
							<input type="text" name="email" class="form-control <?php echo($error_email !="" ? "is-nvalid" : ""); ?>" id="email" placehorder="email" value="<?php echo $email; ?>"><span class="warning"><?php echo $error_email; ?></span>
							
							</div>
						</div>

				
						<div class="form-group row">
							<label form="web" class="col-sm-2 col-form-label">web</label>
							<div class="col-sm-10">
							<input type="text" name="web" class="form-control <?php echo($error_web !="" ? "is-nvalid" : ""); ?>" id="web" placehorder="web" value="<?php echo $web; ?>"><span class="warning"><?php echo $error_web; ?></span>
							
							</div>
						</div>

						<div class="form-group row">
							<label form="telp" class="col-sm-2 col-form-label">Telp</label>
							<div class="col-sm-10">
							<input type="text" name="telp" class="form-control <?php echo($error_web !="" ? "is-nvalid" : ""); ?>" id="telp" placehorder="telp" value="<?php echo $telp; ?>"><span class="warning"><?php echo $error_telp; ?></span>
							
							</div>
						</div>

						<div class="form-group row">
							<label form="pesan" class="col-sm-2 col-form-label">Pesan</label>
							<div class="col-sm-10">
							<textarea name="pesan" class="from-control <?php echo($error_pesan !="" ? "is-invalid" : ""); ?>"><?php echo $pesan; ?></textarea><span class="warning"><?php echo $error_pesan; ?></span>
						
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-10">
								<button type="submite" class="btn btn-primary">Sign in</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
	echo "<h2>Your input:</h2>";
	echo "Nama = ".$nama;
	echo "<br>";
	echo "Email = ".$email;
	echo "<br>";
	echo "Telp = ".$telp;
	echo "<br>";
	echo "Pesan = ".$pesan;
	?>
	
</body>
</html>