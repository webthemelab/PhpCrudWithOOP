<?php
require'member.php';

$memberId = $_GET['id'];
$member = new member();
$memberData = $member->idWiseMemberInfo($memberId);

if(isset($_POST['sub'])){
    $member = new member();
    $member->idWiseMemberUpdate($_POST);
}



?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <title>Edit member info</title>
 </head>
 <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Enter your correct information:</h2>
                <form action ="" method ="POST"  class ="shadow-lg p-3 mb-5 bg-body rounded border border-5 border border-Success">
                
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Member Name:</label>
                        <input type="text" name="name" value="<?php echo $memberData['name'];?>"  class="form-control" placeholder="Name">
                        <input type="hidden" name="id" value="<?php echo $memberData['id'];?>"
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Enter Your Email:</label>
                        <input type="text" name="email" value="<?php echo $memberData['email'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Enter Your Phone:</label>
                        <input type="text" name="phone" value="<?php echo $memberData['phone'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Enter Your Message:</label>
                        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"><?php echo $memberData['message'];?></textarea>
                    </div>
                    <button type="submit" name="sub" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
 </body>
 </html>