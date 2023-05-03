<?php

require "config.php";

use App\Pet;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$birthdate = $_POST['birthdate'];
	$owner = $_POST['owner'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$contact_number = $_POST['contact_number']; 
    Pet::register($name, $gender, $birthdate, $owner, $email, $address, $contact_number);
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pet Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">Pet Registration</h3>
          </div>
          <div class="card-body">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" id="addRegister" method="POST">
              <div class="form-group">
                <label for="name">Pet Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="form-group">
                <label for="gender">Pet's Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                  <option value="">Select gender...</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="form-group">
                <label for="birthdate">Birthday</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
              </div>
              <div class="form-group">
                <label for="owner">Owner Name</label>
                <input type="text" class="form-control" id="owner" name="owner" required>
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
              </div>
              <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" required>
              </div><br>
              <div class="text-center">
                <button type="button" onclick="success()" class="btn btn-primary">Submit</button>
                <a  class="btn btn-secondary" href="index.php">Back</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div><br><br>
  </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js "></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">

<script>
function success(){
   let timerInterval
    Swal.fire({
      title: 'Data has been created!',
      html: 'You will be redirected in <b></b> milliseconds.',
      timer: 2000,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading()
        const b = Swal.getHtmlContainer().querySelector('b')
        timerInterval = setInterval(() => {
          b.textContent = Swal.getTimerLeft()
        }, 100)
      },
      willClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      document.getElementById('addRegister').submit();
    })
}
</script>