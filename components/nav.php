<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background: #7B68EE!important;">
    <div class="container">
  <a class="navbar-brand" href="#">CMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if(isset($_SESSION['userId'])): ?>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">logout</a>
      </li>
<?php else: ?>
<li class="nav-item active">
        <a class="nav-link" href="index.php">Register</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Login</a>
      </li>
<?php endif; ?>
     
    </ul>
  </div>
    </div>
</nav>