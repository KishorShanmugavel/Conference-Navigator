<?php
    include"Session.php";

    class SessionService{
        //private $tbname="cn_sess_tbl";
        private $conn;

        public function __construct($conn_db){
            $this->conn = $conn_db;
            
        }

        public function insert($session){
            if($this->conn){
                $sql="INSERT INTO cn_sess_tbl (SESS_Name_C,SESS_Venue_C,SESS_From_D,SESS_End_D) 
                    VALUES ('$session->name','$session->venue','$session->fdate','$session->edate')";
                $result=$this->conn->query($sql);   
                //$session=$result->fetch_object();

            }
            else{
                echo "Null Connection";
            }
            return $session;

        }
        public function update($session){
            if($this->conn){
                $sql="UPDATE cn_sess_tbl SET SESS_Name_C='$session->name',SESS_Venue_C='$session->venue',SESS_From_D='$session->fdate',SESS_End_D='$session->edate'
                    WHERE SESS_ID=$session->id";
                $result=$this->conn->query($sql);
                //$session=$result->fetch_object();

            }
            else{
                echo "Null Connection";
            }
            return $session;

        }

        public function delete($session){
            if($this->conn){
                $sql="DELETE FROM cn_sess_tbl WHERE SESS_ID=$session->id";
                $result=$this->conn->query($sql);
            }
            else{
                echo "Null Connection";
            }

        }
        public function findById($id){
            $session;
            if(isset($id)){
                if($this->conn){
                    $sql = "SELECT SESS_ID as id,SESS_Name_C as name,SESS_Venue_C as venue,SESS_From_D as fdate,SESS_End_D as edate
                        FROM cn_sess_tbl WHERE SESS_ID=$id";
                    $result = $this->conn->query($sql);
                    $session=$result->fetch_object();
                }
                else{
                    echo "Find Failed";
                }

            }
            else{
                echo ' Expert Id not set!!!';
            }
            return $session;
        }

        public function findAll(){
            $result_array=array();
            if($this->conn){
                $sql = "SELECT SESS_ID as id,SESS_Name_C as name,SESS_Venue_C as venue,SESS_From_D as fdate,SESS_End_D as edate FROM cn_sess_tbl";
                $result = $this->conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row=mysqli_fetch_object($result,'Session')) {
                        $result_array[]=$row;
                    }
                    //print_r($result_array);
                } 
            }
            else{
                echo 'Null Connection Error!!!';
            }
             return $result_array;
        }
    }
    
?>