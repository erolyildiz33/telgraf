<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/style.css">
    <title>
        Login Page

    </title>
     <link rel="icon" href="https://web.telegram.org/z/favicon.svg" type="image/svg+xml">
</head>
<body>

    <div class="loginBox"> <img class="user" src="https://web.telegram.org/z/favicon.svg" height="100px" width="100px">
        <h3>Sign in here</h3>
        <form action="<?=base_url('auth');?>/login" method="post">
            <div class="inputBox"> <input id="username" type="text" name="username" placeholder="Username"> <input id="pass" type="password" name="password" placeholder="Password"> </div> <input type="submit" name="" value="Login">
        </form> 
         <?php if ($this->session->flashdata('error')) { ?> 
            <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">

  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div class="mr-1">
   <?=$this->session->flashdata('error')?>
  </div>
</div>
        <?php } ?>
    </div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>


