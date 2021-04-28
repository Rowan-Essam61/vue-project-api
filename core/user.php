<?php

    class user{
        private $conn;
        private $table ='users';
        public $username;
        public $firstname;
        public $lastname;
        public $age;
        public $password;
        public $email;
        public $address;
        public $phone;
        public $gender;
    public function __construct($db){
            $this->conn=$db;
    }
    public function read(){
        $sql=$this->conn-> query("SELECT * FROM users");
        $row = $sql->fetch();
        $count=count($row);
        return $sql;
   }
     public function read_single(){
   $sql2='SELECT * FROM users WHERE User_Name=?';
   $stmt=$this->conn->prepare($sql2);
   $stmt->bindParam(1,$this->username);
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $this->username =$row['User_Name'];
   $this->firstname =$row['First_Name'];
   $this->lastname =$row['Last_Name'];
   $this->age =$row['Age'];
   $this->password =$row['Password'];
   $this->email =$row['Email'];
   $this->address =$row['Address'];
   $this->phone =$row['Phone'];
   $this->gender =$row['Gender'];
  
  
  }

   public function create(){
   $sql3="INSERT INTO users (User_Name,First_Name,Last_Name,Age,Password,Email,Address,Phone,Gender)  VALUES 
   (? , ?, ? , ? ,?, ?,?,?,?)";
   $stmt=$this->conn->prepare($sql3);
 $this->username        =htmlspecialchars(strip_tags($this->username));
 $this->firstname       =htmlspecialchars(strip_tags($this->firstname));
 $this->lastname        =htmlspecialchars(strip_tags($this->lastname));
 $this->age             =htmlspecialchars(strip_tags($this->age));
 $this->password        =htmlspecialchars(strip_tags($this->password));
 $this->email           =htmlspecialchars(strip_tags($this->email));
 $this->address         =htmlspecialchars(strip_tags($this->address));
 $this->phone           =htmlspecialchars(strip_tags($this->phone));
 $this->gender          =htmlspecialchars(strip_tags($this->gender));

 
  $stmt->bindParam(1,$this->username);
  $stmt->bindParam(2,$this->firstname);
  $stmt->bindParam(3,$this->lastname);
  $stmt->bindParam(4,$this->age);
  $stmt->bindParam(5,$this->password);
  $stmt->bindParam(6,$this->email);
  $stmt->bindParam(7,$this->address);
  $stmt->bindParam(8,$this->phone);
  $stmt->bindParam(9,$this->gender);


  if ($stmt->execute()) { 
  echo  "4atateeer";
  return true;
} else {
   printf("erorrr ya fa444lll");
   return false;
}

  //if($stmt->execute()){
  //return true;
  //}
  //else {
	//printf("erorrr ya fa444lll");
  //return false;
//}


  }
   
      public function update(){
 $sql4="UPDATE users SET First_Name=?,Last_Name=?,Age=?,Password=?,Email=?,Address=?,Phone=?,Gender=? WHERE
 User_Name=?";

   $stmt=$this->conn->prepare($sql4);
 $this->username        =htmlspecialchars(strip_tags($this->username));
 $this->firstname       =htmlspecialchars(strip_tags($this->firstname));
 $this->lastname        =htmlspecialchars(strip_tags($this->lastname));
 $this->age             =htmlspecialchars(strip_tags($this->age));
 $this->password        =htmlspecialchars(strip_tags($this->password));
 $this->email           =htmlspecialchars(strip_tags($this->email));
 $this->address         =htmlspecialchars(strip_tags($this->address));
 $this->phone           =htmlspecialchars(strip_tags($this->phone));
 $this->gender          =htmlspecialchars(strip_tags($this->gender));

 
  $stmt->bindParam(1,$this->firstname);
  $stmt->bindParam(2,$this->lastname);
  $stmt->bindParam(3,$this->age);
  $stmt->bindParam(4,$this->password);
  $stmt->bindParam(5,$this->email);
  $stmt->bindParam(6,$this->address);
  $stmt->bindParam(7,$this->phone);
  $stmt->bindParam(8,$this->gender);
  $stmt->bindParam(9,$this->username);

  if ($stmt->execute()) { 
  echo  "4atateeer update";
  return true;
} else {
   printf("erorrr ya fa444lll");
   return false;
}

  //if($stmt->execute()){
  //return true;
  //}
  //else {
	//printf("erorrr ya fa444lll");
  //return false;
//}


  }
   public function delete(){
   $sql5="DELETE FROM users WHERE User_Name=?";
    $stmt=$this->conn->prepare($sql5);
 $this->username        =htmlspecialchars(strip_tags($this->username));
  $stmt->bindParam(1,$this->username);
   if ($stmt->execute()) { 
  echo  "4atateeer deleted";
  return true;
} else {
   printf("erorrr ya fa444lll");
   return false;
}
   }
   
   
   
   
   }
  
  

   
?>