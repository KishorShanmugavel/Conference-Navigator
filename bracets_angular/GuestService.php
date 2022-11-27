<?php
    include"Guest.php";

    class GuestService{
        //private $tbname="cn_guest_tbl";
        private $conn;

        public function __construct($conn_db){
            $this->conn = $conn_db;
            
        }

        public function insert($guest){
            if($this->conn){
                $sql="INSERT INTO cn_guest_tbl (GUEST_Name_C,GUEST_Org_C,GUEST_Des_C,GUEST_Email_C,GUEST_Pass_C) 
                    VALUES ('$guest->name','$guest->org','$guest->des','$guest->email','$guest->pass')";
                $result=$this->conn->query($sql);
                //$guest=$result->fetch_object();
            }
            else{
                echo "Null Connection";
            }
            return $guest;

        }
        public function update($guest){
            if($this->conn){
                $sql="ALTER TABLE cn_guest_tbl SET GUEST_Name_C='$guest->name',GUEST_Org_C='$guest->org',GUEST_Des_C='$guest->des',GUEST_Email_C='$guest->email,GUEST_Pass_C='$guest->pass'
                    WHERE GUEST_ID=$guest->id";
                $result=$this->conn->query($sql);
                $guest=$result->fetch_object();
            }
            else{
                echo "Null Connection";
            }
            return $guest;

        }

        public function delete($guest){
            if($this->conn){
                $sql="DELETE FROM cn_guest_tbl WHERE GUEST_ID=$guest->id";
                $result=$this->conn->query($sql);
            }
            else{
                echo "Null Connection";
            }
        }
        public function findById($id){
            $guest;
            if(isset($id)){
                if($this->conn){
                    $sql = "SELECT GUEST_ID as id,GUEST_Name_C as name,GUEST_Org_C as org, GUEST_Des_C as des,GUEST_Email_C as email,GUEST_Pass_C as pass
                        FROM cn_guest_tbl WHERE GUEST_ID=$id";
                    $result = $this->conn->query($sql);
                    $guest=$result->fetch_object();
                }
                else{
                    echo "Find Failed";
                }

            }
            else{
                echo ' Expert Id not set!!!';
            }
            return $guest;
        }

        public function findByEmail($email){
            $guest;
            if(isset($email)){
                if($this->conn){
                    $sql = "SELECT GUEST_ID as id,GUEST_Name_C as name,GUEST_Org_C as org, GUEST_Des_C as des,GUEST_Email_C as email,GUEST_Pass_C as pass
                        FROM cn_guest_tbl WHERE GUEST_Email_C='$email'";
                    $result = $this->conn->query($sql);
                    $guest=$result->fetch_object();
                }
                else{
                    echo "Find Failed";
                }

            }
            else{
                echo ' Expert Id not set!!!';
            }
            return $guest;
        }

        public function findAll(){
            $result_array=array();
            if($this->conn){
                $sql = "SELECT GUEST_ID as id,GUEST_Name_C as name,GUEST_Org_C as org,GUEST_Des_C as des,GUEST_Email_C as email,GUEST_Pass_C as pass FROM cn_guest_tbl";
                $result = $this->conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row=mysqli_fetch_object($result,'Guest')) {
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