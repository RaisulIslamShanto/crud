<?php
 //define class
 class User {

    private $con;

    //constructor for connection
    function __construct(){
        define("HOSTNAME","localhost");
        define("USERNAME","root");
        define("PASSWORD","");
        define("DBNAME","crud");

       $this->con =  mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);

       

       if (!$this->con) {
        echo "database connected successfully";
       } 
       
    }
      //data insert
    public function send($data){
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        


        $query = "INSERT INTO `user`(`name`,`email`,`password`) VALUES('$name','$email','$password')";
        $fire = mysqli_query($this->con , $query );

        if($fire){

          header("Location: index.php"); //redirect
        }

        if(!$fire){
          echo "data not inserted";
        }
    }


        //data show
        public function show(){
          return  $data = mysqli_query( $this->con , "SELECT*FROM `user`");
        }

        //delete
        public function delete_user($sl){
          

          $query = "DELETE FROM `user` WHERE `sl` = $sl "  ;
          $fire = mysqli_query( $this->con , $query);


          if ($fire) {
            header("Location: index.php");
          }
        }

        //edit user

        public function edit_user($sl){
          //echo $usl;
          $query = "SELECT * FROM `user` WHERE `sl`= '$sl'";

           return mysqli_query( $this->con , $query );
        }

        //update user

        public function update_user($data){
          //print_r($data);

          $sl = $data['sl'];
          $name = $data['name'];
          $email = $data['email'];
          $password = $data['password'];

          $sql = "UPDATE `user` SET `name`='$name',`email`='$email',`password`='$password' WHERE `sl`= ' $sl' ";
          $result = mysqli_query( $this->con, $sql);

         if($result){
          //echo "data update successful";
           header("Location: index.php");
         }
        }

 }

 


?>