<?php include "header.php"; ?>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2">
        <br>
        <div class="box">
          <br>
          <h1 align="center">
           Sistema di prenotazione stanze: Ospedale
           <img src="img/bastone.jpg" class="img-responsive center-block" height="100" width="100" alt="bastone">
         </h1>
         <br><br>

         <form class="navbar-form text-center " role="search" method="POST" action="login.php">
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          <input type="text" class="form-control" placeholder="Username" name="username">
          <br>
          <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>    
          <input type="password" class="form-control" placeholder="Password" name="password">
          <br>
          <br>
          <button type="submit" class="btn btn-primary"> Accedi </button>
        </form>
        <br>
      </div>
    </div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>