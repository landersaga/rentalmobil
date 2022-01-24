

<!DOCTYPE html> 
<html >
  <head>
    <meta charset="UTF-8">
    <title>BCT Car Rent</title>
    
    
    <link rel="stylesheet" href="assets/css/reset.css">

        <link rel="stylesheet" href="assets/css/stylelogin.css">

    
    
    
  </head>

  <body>

    
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
    <div class="tooltip">Click Me</div>
  </div>
  <div class="form">
      	<div><?php echo $this->session->flashdata('message') ?></div>
	<?php echo form_open('login/cekLogin') ?>
    <h2>Login to your account</h2>
    <form>

      <input type="text" name="username" placeholder='username'/>
      <input type="password" name="password" placeholder='password'/>
      <input type="submit" name="login" value="login">
    </form>
  </div>
  <div class="form">
    <h2>Create an account</h2>
    <form>
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
      <input type="email" placeholder="Email Address"/>
      <input type="tel" placeholder="Phone Number"/>
      <button>Register</button>
    </form>
  </div>
  <div class="cta"><a href="http://andytran.me">Forgot your password?</a></div>
</div>

    
    
    
  </body>
</html>