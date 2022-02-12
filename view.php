<?php
require'member.php';

$member = new member();
$result = $member->viewMember();



$sms ='';
if(isset($_POST['btn'])){
  $member = new member();
  $sms = $member->InsertMember($_POST);
}
if(isset($_GET['delete'])){
  $deleteInfo = $_GET['id'];
  $member = new member();
  $member->deleteMemberInfo($deleteInfo);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Member Crud</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h2>All member Details information:</h2>
        <table class="table table-bordered border border-5 border-warning shadow-lg p-3 mb-5 bg-body rounded text-center">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Message</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while($data=mysqli_fetch_assoc($result)){?>
            <tr>
              <td><?php echo $data['name']?></td>
              <td><?php echo $data['email']?></td>
              <td><?php echo $data['phone']?></td>
              <td><?php echo $data['message']?></td>
              <td>
                <a href="edit.php?id=<?php echo $data['id'];?>" class="btn btn-success">Edit</a>
                <a href="?delete= false &&id=<?php echo $data['id'];?>"onclick="return confirm('are your sure to delete it');" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            <?php }?>
          </tbody>
        </table>
    </div>
    <div class="col-md-4">
    <h2>Enter new member:</h2>
      <form action ="" method ="POST" class ="shadow-lg p-3 mb-5 bg-body rounded border border-5 border border-Success">
          <div class="mb-3">
            <label class="form-label">Enter Your Name:</label>
            <input type="tex" name="name" class="form-control" placeholder ="Name" >
          </div>
          <div class="mb-3">
            <label class="form-label">Enter Your Email:</label>
            <input type="email" name="email" class="form-control" placeholder ="Email" >
          </div>
          <div class="mb-3">
            <label class="form-label">Enter Your Phone:</label>
            <input type="text" name="phone" class="form-control" placeholder ="Phone" >
          </div>
          <div class="mb-3">
            <label class="form-label">Enter Your Message:</label>
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Message"></textarea>
          </div>
           
          <button type="submit" name="btn" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>