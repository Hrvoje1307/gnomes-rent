<section class="header sm-container ">
  <nav class="navigation">
    <div class="logo">
      <ion-icon name="leaf-outline" class="logo-leaf"></ion-icon> <!-- remove/add "-outline" from name of icon if you want filled icon -->
      <p class="logo--name">GnomeAway</p>
    </div>
    <ul class="navigation--list">
      <li><a class="navigation--item link" href="index.php?page=home">Home</a></li>
      <li><a class="navigation--item link" href="index.php?page=aboutus">About us</a></li>
      <li><a class="navigation--item link" href="index.php?page=store">Store</a></li>
      <li><a class="navigation--item link" href="index.php?page=contactus">Contact us</a></li>
    </ul>
    <div class="btn">
      <?php
        if(isset($_SESSION["username"])){
          echo "
          <a href='index.php?page=account' class='link loggedin'>".$_SESSION['username']." </a>
          <a href='index.php?page=cart' class='action--btn link'>Cart</a>";
        }else {
          echo "<a href='index.php?page=login' class='action--btn link'>Get started</a>";
        }
      ?>
      
    </div>
  </nav>
  <div class="line sm-container"></div>
 
</section>