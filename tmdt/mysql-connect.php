<?php
        class Database{
                //Khai bao cac thuoc tinh cua CSDL
                public $host="mysql.default.svc.cluster.local";
                public $dbname="Galileo";
                public $user="root";
                public $pass="varMyRootPass";

                public $con =null;
                /**

                 * Phuong thuc tao doi tuong PDO

                 */
                public function getConnection(){
                        try{
                                $this->con=new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=UTF8",$this->user,$this->pass);
                        }catch(PDOException $ex){
                                die("Loi: ". $ex->getMessage());
                        }
                        return $this->con;
                }
        }
?>
