<?php
  
 
  class db_class {  
    
    
  private $db_host = "localhost";  // Change as required
  private $db_user = "root";  // Change as required
  private $db_pass = "";  // Change as required
  private $db_name = "casa_sean";  // Change as required
 
    public function __construct(){
      $this->database_connect();
     
 
    }
    public function database_connect() {
    static $conn;
    if ($conn===NULL){ 
        $conn = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
    }
    return $conn;
    }
 
    public function create($category, $photo_name, $thumb_nail, $title ,$comment){
      $stmt = $this->conn->prepare("INSERT INTO photo ('category', 'photo_name','thumb_nail','title','comment') VALUES (?, ?, ?, ?, ?)") or die($this->conn->error);
      $stmt->bind_param("ss", $category, $photo_name, $thumb_nail, $title ,$comment);
      if($stmt->execute()){
        $stmt->close();
        $this->conn->close();
        return true;
      }
    }
 
    public function read(){
      $stmt = $this->conn->prepare("SELECT * FROM photo ORDER BY update_time ASC") or die($this->conn->error);
      if($stmt->execute()){
        $result = $stmt->get_result();
        return $result;
      }
    }
  
 
      /*** for login process ***/

        public function check_login($username, $password){
 

            $password = sha1($password);

            $sql2="SELECT aid from account WHERE name='$username' and password='$password'";

           

            //checking if the username is available in the table
            $conn = $this->database_connect();
            //$result = mysqli_query($this->connection,$sql2);
            $result = $conn->query($sql2);

            $user_data = mysqli_fetch_array($result);

            $count_row = $result->num_rows;
            $id = $user_data['aid'];
 

            if ($count_row == 1) {

                // this login var will use for the session thing

                $_SESSION['login'] = true;

                $_SESSION['aid'] = $user_data['aid'];

                return true;

            }

            else{
                return false;

            }

        }

 

        /*** for showing the username or fullname ***/

        public function get_fullname($uid){

            $sql3="SELECT name FROM account WHERE uid = $uid";
          
            $result = mysqli_query($this->connection,$sql3);

            $user_data = mysqli_fetch_array($result);

            echo $user_data['fullname'];

        }
        public function user_session($id){

            $sql3="SELECT name FROM account WHERE aid = $id";

            $result = mysqli_query($this->connection,$sql3);

            $user_data = mysqli_fetch_array($result);

            echo $user_data['name'];

        }

 

        /*** starting the session ***/

        public function get_session(){

            return $_SESSION['login'];

        }
 

        public function user_logout() {

            $_SESSION['login'] = FALSE;

            session_destroy();

        }

        public function get_total_visitors(){

            $sql4="SELECT count(*) total from visitor";
           
            $conn = $this->database_connect();
            $results = $conn->query($sql4);
            //$results = mysqli_query($this->connection,$sql4);

            $user_data = mysqli_fetch_array($results);

            echo $user_data['total'];


        }
        public function get_total_visits(){

            $sql5="SELECT sum(visits)  totalv from visitor";
            $conn = $this->database_connect();
            $results = $conn->query($sql5);

            $user_data = mysqli_fetch_array($results);

            echo $user_data['totalv'];

        }
         public function get_total_clicks(){

            $sql6="SELECT sum(clicks)  totalc from visitor";

            $conn = $this->database_connect();
            $results = $conn->query($sql6);

            $user_data = mysqli_fetch_array($results);

            echo $user_data['totalc'];

        }

        public function get_page_title(){

            $sql7="SELECT distinct category from photo";

            $conn = $this->database_connect();
            //$result7 = $conn->query($sql7);

            //$user_data = mysqli_fetch_array($result7);
           //$user_data['category'];
             
        }
         public function get_page_content($category){

            $sql8="SELECT * from photo where category='$category'";

           $conn = $this->database_connect();
            $result3 = $conn->query($sql8);

            //$user_data = mysqli_fetch_array($result3);

            return $result3;

        }
        function clean_data($data){
               $data=trim($data);
               $data=stripslashes($data);//
               $data=mysql_real_escape_string($data);
               $data=htmlspecialchars($data);
                return $data;
        }

        function clean_data2($data){
               $data=trim($data);
               $data=stripslashes($data);//
               $data=mysql_real_escape_string($data);
              //$data=htmlspecialchars($data);
               return $data;
        }

        function get_display_data($category){
               $conn = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
              $stmts = $this->$conn->prepare("SELECT * FROM photo where category='$category'") or die($this->$conn->error);
      if($stmts->execute()){
        $result = $stmts->get_result();
        return $result;
      }



            
        }



  } 

?>