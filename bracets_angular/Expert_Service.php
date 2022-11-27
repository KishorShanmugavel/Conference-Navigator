<?php
    include"Expert.php";

    class ExpertService{
        //private $tbname="cn_sme_tbl";
        private $conn;

        public function __construct($conn_db){
            $conn = $conn_db;
            
        }

        public function insert($expert){
            //return  inserted epert object
            if($conn){
                $sql="INSERT INTO "
            }
        }
        public function update($expert){

        }

        public function delete($expert){

        }
        public function findById($id){
            $expert;
            if(isset($id)){
                if($conn){
                    $sql = "SELECT SME_ID as id,SME_Name_C as name,SME_Des_C as des,SME_Email_C as email,SME_Phone_N as phone,SME_Org_N as org FROM cn_sme_tbl WHERE SME_ID=$id";
                    $result = $conn->query($sql);
                    $expet=$result->fetch_object();
                }
                else{

                }

            }
            else{
                echo ' Expert Id not set!!!';
            }
            return expert;
        }

        public function findAll(){
            $result_array=array();
            if($conn){
                $sql = "SELECT SME_ID as id,SME_Name_C as name,SME_Des_C as des,SME_Email_C as email,SME_Phone_N as phone,SME_Org_N as org FROM cn_sme_tbl";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row=mysqli_fetch_object($result,'Expert')) {
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