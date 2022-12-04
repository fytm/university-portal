<?php 

  echo '    <header id="header" class="header d-flex align-items-center fixed-top">
        <div
          class="container-fluid container-xl d-flex align-items-center justify-content-between"
        >
          <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="d-flex align-items-center">Afrika Konnect</h1>
          </a>

          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

          <nav id="navbar" class="navbar">
            <ul>
              <form method="post" action="./View/search.php">

              <div class="input-group">
                <div class="form-outline">
                <input name="searchInput" pe="search"  id="form1" class="form-control" />
                <!-- <label class="form-label" for="form1">Search</label> -->
                </div>
              <button type="submit" name="searchbutton" class="btn btn-primary"><i class="fas fa-search"></i></button>
              </div>

              </form>
        

              <li><a href="./index.php" class="active">Home</a></li>
              <li><a href="./View/universities.php">Universities</a></li>
              <li><a href="./View/applications.php">Applications</a></li>
              <li><a href="./Login/logout.php">Logout</a></li>
            </ul>
          </nav>
        </div>
      </header>';


?>