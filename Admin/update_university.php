<?php
require_once '../Controllers/university_controller.php';
if(isset($_GET['uni_id'])){
$uni_id = $_GET['uni_id'];  
$university = select_one_university_controller($uni_id); 
}else{
  //
  header("Location: ../Admin/add_university.html"); }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Update University</title>
    <link
      href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../assets/css/register.css" />
  </head>
  <body>
    <main>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6 login-section-wrapper">
            <div class="brand-wrapper">
              <img src="../assets/img/favicon.png" alt="logo" class="logo" />
            </div>

            <div class="login-wrapper my-auto">
              <h1 class="login-title">Update Existing University</h1>

              <form method="post" action="./update_university_process.php?uni_id=<?php echo $uni_id; ?>" id="form">
                <div class="error" id="error"></div>

                <div class="form-group">
                  <label for="name">Name</label>
                  <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    placeholder="University Name"
                    value="<?php echo $university['university_name'];?>"
                  />
                  <div id="name_error" class="val_error"></div>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    placeholder="universityemail@example.com"
                    value="<?php echo $university['university_email'];?>"
                    
                  />
                  <div id="email_error" class="val_error"></div>
                </div>
                <div class="form-group">
                  <label for="mission">Mission</label>
                  <textarea
                    name="mission"
                    class="form-control" 
                    id="mission" 
                    rows="1"><?php echo $university['mission'];?></textarea>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea 
                    name="description"
                    class="form-control" 
                    id="description" 
                    rows="3"><?php echo $university['university_description'];?></textarea>
                </div>
                <div class="form-group">
                  <label for="country">Country</label>
                  <input
                    type="text"
                    name="country"
                    id="country"
                    class="form-control"
                    placeholder="Ghana"
                    value="<?php echo $university['university_country'];?>"
                  />
                  <div id="country_error" class="val_error"></div>
                </div>
                <div class="form-group">
                  <label for="city">City</label>
                  <input
                    type="city"
                    name="city"
                    id="city"
                    class="form-control"
                    placeholder="Accra"
                    value="<?php echo $university['university_city'];?>"

                  />
                  <div id="city_error" class="val_error"></div>
                </div>
                <div class="form-group">
                  <label for="contact">Contact</label>
                  <input
                    type="text"
                    name="contact"
                    id="contact"
                    class="form-control"
                    placeholder="+233245556667"
                    value="<?php echo $university['university_contact'];?>"
                  />
                  <div id="contact_error" class="val_error"></div>
                  
                </div>
                <div class="form-group">
                  <label for="uni_id">ID</label>
                <input 
                name = "uni_id" 
                id = "uni_id"
                class="form-control" 
                type="text" 
                placeholder="<?php echo $uni_id; ?>"
                value = "<?php echo $uni_id; ?>"
                readonly>
                </div>

                <!-- <div class="form-group">
                  <label for="user-role">User role</label>
                  <input
                    type="tel"
                    name="user-role"
                    id="contact"
                    class="form-control"
                    placeholder="0592234913"
                    value="2"
                    readonly="readonly"
                  />
                </div> -->
                <button
                  name="addButton"
                  id="login"
                  class="btn btn-block login-btn"
                  type="submit"
                  value="Login"
                  onclick="return sub()"
                >
                  Update
                </button>
              </form>
            </div>
          </div>

          <div class="col-sm-6 px-0 d-none d-sm-block">
            <img
              src="../assets/img/register.jpg"
              alt="login image"
              class="login-img"
            />
          </div>
        </div>
      </div>
    </main>
    <script src="../Js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>
