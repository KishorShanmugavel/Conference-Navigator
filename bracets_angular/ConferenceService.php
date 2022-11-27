<?php
    include"Conference.php";

    class ConferenceService{
        //private $tbname="cn_conf_tbl";
        private $conn;

        public function __construct($conn_db){
            $this->conn = $conn_db;
            
        }

        public function insert($conference){
            if($this->conn){
                $sql="INSERT INTO cn_conf_tbl (CONF_Name_C,CONF_Venue_C,CONF_Start_D,CONF_End_D) 
                    VALUES ('$conference->name','$conference->venue','$conference->fdate','$conference->edate')";
                $result=$this->conn->query($sql);
                //$conference=$result->fetch_onject();
            }
            else{
                echo "Null Connection";
            }
            return $conference;

        }
        public function update($conference){
            if($this->conn){
                $sql="UPDATE cn_conf_tbl SET CONF_Name_C='$conference->name',CONF_Venue_C='$conference->venue',CONF_Start_D='$conference->fdate',CONF_End_D='$conference->edate'
                    WHERE CONF_ID=$conference->id";
                $result=$this->conn->query($sql);
                //$conference=$result->fetch_object();
            }
            else{
                echo "Null Connection";
            }
            return $conference;

        }

        public function delete($conference){
            if($this->conn){
                $sql="DELETE FROM cn_conf_tbl WHERE CONF_ID=$conference->id";
                $result=$this->conn->query($sql);
            }
            else{
                echo "Null Connection";
            }
        }
        public function findById($id){
            $conference;
            if(isset($id)){
                if($this->conn){
                    $sql = "SELECT CONF_ID as id,CONF_Name_C as name,CONF_Venue_C as venue, CONF_Start_D as fdate,CONF_End_D as edate
                        FROM cn_conf_tbl WHERE CONF_ID=$id";
                    $result = $this->conn->query($sql);
                    $conference=$result->fetch_object();
                }
                else{
                    echo "Find Failed";
                }

            }
            else{
                echo ' Expert Id not set!!!';
            }
            return $conference;
        }

        public function findAll(){
            $result_array=array();
            if($this->conn){
                $sql = "SELECT CONF_ID as id,CONF_Name_C as name,CONF_Venue_C as venue,CONF_Start_D as fdate,CONF_End_D as edate FROM cn_conf_tbl";
                $result = $this->conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row=mysqli_fetch_object($result,'Conference')) {
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