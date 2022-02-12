<?php
require'connection.php';

class member{
    //Member insert Info
    public function InsertMember($data){
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $message = $data['message'];
       

         $query = "INSERT INTO `mess_members`(`name`, `email`,`phone`, `message`) VALUES ('$name','$email','$phone','$message')";
         if(mysqli_query(connection::dbConnection(),$query)){
             $sms="Successfully save member information";
             return $sms;
         }else{
             echo 'Query problem';
         }
    }//end method

    public function viewMember(){
        $query = "SELECT * FROM `mess_members`";
        if(mysqli_query(connection::dbConnection(),$query)){
            $result = mysqli_query(connection::dbConnection(),$query);
            return $result;
        }else{
            echo 'Query problem';
        }
    }//end method

    public function idWiseMemberInfo($memberId){

        $query ="SELECT `id`,`name`, `email`,`phone`, `message` FROM `mess_members` WHERE id='$memberId'";
        if (mysqli_query(connection::dbConnection(),$query)) {
            $result = mysqli_query(connection::dbConnection(),$query);
            $memberData = mysqli_fetch_assoc($result);
            //  echo '<pre>';
            //  echo print_r($memberData);
            //  exit();
             return $memberData;

        }else{
            echo 'Query problem';
        }
    }//end method

    public function idWiseMemberUpdate($data){
        $id=$data['id'];
        $name= $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $message = $data['message'];

        $query="UPDATE `mess_members` SET `name`='$name',`email`='$email',`phone`='$phone',`message`='$message' WHERE id='$id'";

        if(mysqli_query(connection::dbConnection(),$query)){
            header("Location:view.php?msg=".urlencode('data update successfully'));
        }else{
            echo 'Query problem';
        }
    }//end method
  
    public function deleteMemberInfo($data){
        $query ="DELETE FROM `mess_members` WHERE id=$data";
        if(mysqli_query(connection::dbConnection(),$query)){
            header("Location:view.php?sms=".urlencode('data delete successfully'));
        }else{
            echo 'Query problem';
        }
    }//end method



}//end class



?>