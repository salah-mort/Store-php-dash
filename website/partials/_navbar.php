<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="assets/images/header-logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>

        <?php

        include "../Dashboard/Data_con.php";
        $query = "SELECT * FROM category";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          $name=$row['name'];
          echo"<li class='nav-item'><a class='nav-link' href='products.php?id=".$row['id']."'>".$row['name']."</a></li>";
      }

        ?>


      </ul>
    </div>
  </div>
</nav>