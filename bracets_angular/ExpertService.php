<?php
    include"Expert.php";

    class ExpertService{
        //private $tbname="cn_sme_tbl";
        private $conn;

        public function __construct($conn_db){
            $this->conn =$conn_db;
            
        }

        public function insert($expert){
            if($this->conn){
                $sql="INSERT INTO cn_sme_tbl (SME_Name_C,SME_Des_C,SME_Email_C,SME_Phone_N,SME_Org_N) 
                    VALUES ('$expert->name','$expert->des','$expert->email','$expert->phone','$expert->org')";
                $result=$this->conn->query($sql);
                //$expert=$result->fetch_object();........bool
                //print_r($result);
            }
            else{
                echo "Null Connection";
            }
            return $expert;

        }
        public function update($expert){
            if($this->conn){
                $sql="UPDATE cn_sme_tbl SET SME_Name_C='$expert->name',SME_Des_C='$expert->des',SME_Email_C='$expert->email',SME_Phone_N='$expert->phone',SME_Org_N='$expert->org' 
                    WHERE SME_ID=$expert->id";
                $result=$this->conn->query($sql);
                //$expert=$result->fetch_object();........bool
                //print_r($result);
            }
            else{
                echo "Null Connection";
            }
            return $expert;

        }

        public function delete($expert){
            if($this->conn){
                $sql="DELETE FROM cn_sme_tbl WHERE SME_ID=$expert->id";
                $result=$this->conn->query($sql);
            }
            else{
                echo "Null Connection";
            }

        }
        public function findById($id){
            $expert;
            if(isset($id)){
                if($this->conn){
                    $sql = "SELECT SME_ID as id,SME_Name_C as name,SME_Des_C as des,SME_Email_C as email,SME_Phone_N as phone,SME_Org_N as org 
                        FROM cn_sme_tbl WHERE SME_ID=$id";
                    $result = $this->conn->query($sql);
                    $expert=$result->fetch_object();
                }
                else{
                    echo "Find Failed";
                }

            }
            else{
                echo ' Expert Id not set!!!';
            }
            return $expert;
        }

        public function findAll(){
            $result_array=array();
            if($this->conn){
                $sql = "SELECT SME_ID as id,SME_Name_C as name,SME_Des_C as des,SME_Email_C as email,SME_Phone_N as phone,SME_Org_N as org FROM cn_sme_tbl";
                $result = $this->conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row=mysqli_fetch_object($result,'Expert')) {
                        $result_array[]=$row;
                    }
                    print_r($result_array);
                } 
            }
            else{
                echo 'Null Connection Error!!!';
            }
             return $result_array;
        }
    }
    
?>