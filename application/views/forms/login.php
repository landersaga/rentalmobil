

<!DOCTYPE html> 
<html >
  <head>
    <meta charset="UTF-8">
    <title>BCT Car Rent</title>
    
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/reset.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    
    
    
  </head>

  <body>

<center>
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>BCT Car Rent</h1><span> <i class='fa fa-paint-brush'></i><i class='fa fa-code'></i> <a href='http://andytran.me'></a></span>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
  </div>
  <div class="form">
      	<div><?php echo $this->session->flashdata('message') ?></div>
	<?php echo form_open('login/cekLogin') ?>
    <center><h2>Login to your account</h2></center>
    <form>

      <input type="text" name="username" placeholder='username'/>
      <input type="password" name="password" placeholder='password'/>
      <input type="submit" name="login" value="login">
    </form>
  </div>
</div>

    
</center>
    
  </body>
</html>