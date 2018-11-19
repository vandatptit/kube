<?php
        class User{
                public $user_id;
                public $name;
                public $email;
                public $password;

                private $con;

                public function __construct($db){
                        $this->con=$db;
                }
                public function checkUser(){
                        $query = "SELECT * FROM users WHERE email=:email
                                        AND password=:password";
                        $stmt=$this->con->prepare($query);
                        $stmt ->bindParam(":email",$this->email);
                        $stmt ->bindParam(":password",$this->password);
                        $stmt->execute();
                        $numRow=$stmt->rowCount();
                        if($numRow>=1){
                                return true;
                        }else{
                                return false;
                        }
                }

                public function getUserByInfo(){
                        $query=" SELECT * FROM users Where email=:email LIMIT 0,1";
                        $stmt = $this ->con->prepare($query);
                        //Lam Sach
                        $this->password=htmlspecialchars(strip_tags($this->password));
			$stmt ->bindParam(":email",$this->email);
                        $stmt->execute();
                        $row=$stmt->fetch(PDO::FETCH_ASSOC);
                        return $row;
                }
        }





?>

