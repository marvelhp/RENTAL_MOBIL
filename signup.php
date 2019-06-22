<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Rental Mobil |</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!--Style CSS -->
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    
    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

</head>

<body style="background-color:#e6e6fa;">

    <div class="container-fluid">
        <div class="container">
        <center>
            <h2> APLIKASI RENTAL MOBIL</h2>
            <h3>SIGN UP </h3>
			
		</center>
          <br> <br>
            <div class="row">
                <div class= "text center">
            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7">
                <div class="col-md">
                    <form method="post" action="<?php echo base_url().'welcome/signup_act' ?>">
                        <fieldset>
                            <p class="text-uppercase pull-center"><b>SIGN UP : </b></p>
                            <?php echo $this->session->flashdata('alert1'); ?>
                            <div class="form-group">
                                <input type="text" name="nama_customer" class="form-control input-lg"
                                    placeholder="Nama Lengkap">
                            </div>

                            <div class="form-group">
                                <select name="gender" name="gender" class="form-control input-lg"
                                    placeholder="Jenis Kelamin">
                                    <option value="Laki-Laki">Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" name="no_telp" class="form-control input-lg" 
                                    placeholder="No Telepon">
                            </div>

                            <div class="form-group">
                                <input type="text" name="username" class="form-control input-lg"
                                    placeholder="Username">
                            </div>
    
                            <div class="form-group">
                                <input type="email" name="email" class="form-control input-lg"
                                    placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control input-lg"
                                    placeholder="Password">
                            </div>
                            <div>
                                <input type="submit" class="btn btn-outline-dark" value="Sign up">
                            </div>
                        </fieldset>
                    </form>
                </div>
    
                <div class="col-md-2">
                    <!-------null------>
                </div>
    
                
    
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>    


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/jquery/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>
    
    <script type="text/javascript">
		$('.alert').alert().delay(2800).slideUp('slow');
	</script>
    

</body>
</html>
