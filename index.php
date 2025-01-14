<?php

require "config.php";
use App\Pet;

$pets = Pet::list();
?>
<!DOCTYPE html>
<html>
   <head>
     <meta charset="UTF-8">
     <title>List of Pets</title>
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <link rel="icon" type="image/x-icon" href="favicon.png">
    </head>
   <body>
      <div class="container"><br><br>
         <h1 class="text-center mb-4">List of Pets</h1>
         <div class="row justify-content-center">
            <div class="col-md-8">
               <table class="table">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Owner</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                     </tr>
                  </thead>
                  <tbody>
				  	<?php foreach ($pets as $pet): ?>
                    <tr>
					<td><?php echo $pet->getName(); ?></td>
					<td><?php echo $pet->getGender(); ?></td>
					<td><?php echo $pet->getOwner(); ?></td>
               <td><?php echo $pet->getEmail(); ?></td>
               <td><?php echo $pet->getAddress(); ?></td>
               <td><?php echo $pet->getContactNumber(); ?></td>
                        <td>
                           <a href="edit-pet.php?id=<?php echo $pet->getId(); ?>" class="btn btn-sm btn-primary mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg> Edit</a>
                           <a class="btn btn-sm btn-danger"  onclick="delete_confirm()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg> Delete</a>
                        </td>
                     </tr>
					 <?php endforeach ?>
                  </tbody>
               </table>
			   <div class="text-center">
					<a href="register.php">Register your pet?</a>
			   </div>
   </body>
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
</script>