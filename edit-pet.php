<?php

require "config.php";

use App\Pet;

$pets = Pet::list();

$pet_id = $_GET['id'];

$pet = Pet::getById($pet_id);
?>
<!DOCTYPE html>
<html>
   <head>
   <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
   	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Edit Pet Information</title>
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <div class="container my-5">
        <h1 class="text-center mb-4">Edit Pet Information</h1>
        <form action="save-changes.php" id="editChange" method="POST">
			<input type="hidden" name="id" value="<?php echo $pet->getId(); ?>">
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Pet Name:</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $pet->getName();?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-sm-3 col-form-label">Pet Gender:</label>
                <div class="col-sm-9">
                    <select name="gender" class="form-control" id="gender">
					
                        <option <?php if($pet->getGender() == "Male"){ echo "selected";}?>>Male</option>
                        <option  <?php if($pet->getGender() == "Female"){ echo "selected";}?>>Female</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="birthdate" class="col-sm-3 col-form-label">Pet Birthday:</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="birthdate"  id="birthdate" value="<?php echo $pet->getBirthdate();?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="owner" class="col-sm-3 col-form-label">Owner Name:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"name="owner"  id="owner" value="<?php echo $pet->getOwner();?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email Address:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control"  name="email" id="email" value="<?php echo $pet->getEmail();?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-3 col-form-label">Address:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="address"  id="address" value="<?php echo $pet->getAddress();?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="contact_number" class="col-sm-3 col-form-label">Contact Number:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="contact_number"  id="contact_number" value="<?php echo $pet->getContactNumber();?>" >
                </div>
            </div><br><br>
            <div class="form-group text-center">
                <button type="button" onclick="saved()" class="btn btn-primary mx-2">Save Changes</button>
                <a class="btn btn-danger mx-2"  onclick="delete_confirm()">Delete</a>
                <button type="button" class="btn btn-secondary mx-2" onclick="window.history.back()">Cancel</button>
            </div>
        </form>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js "></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
<script>
function delete_confirm(){
   Swal.fire({
   title: 'Are you sure?',
   text: "You won't be able to revert this!",
   icon: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
   if (result.isConfirmed) {
      Swal.fire(
         'Deleted!',
         'Row has been deleted.',
         'success'
      )
      window.location.href = "delete-pet.php?id=<?php echo $pet->getId();?>";
   }
   });
}

function saved(){
   let timerInterval
    Swal.fire({
      title: 'Success!',
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
      document.getElementById('editChange').submit();
    })
}

</script>