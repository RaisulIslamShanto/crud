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


 }

 


?>