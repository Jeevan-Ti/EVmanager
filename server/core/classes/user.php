<?php
class User 
{


		protected $pdo;

	function __construct($pdo){
		$this->pdo = $pdo;
	}


		public function checkInput($var){
		$var = htmlspecialchars($var);
		$var = trim($var);
		$var = stripcslashes($var);
		return $var;
	}


	public function login($id,$password){
       $stmt = $this->pdo->prepare("SELECT `id` FROM `users` WHERE `rid` = :rid  AND `password` = :password");
       $stmt->execute(array('rid' =>$id ,'password'=>$password));
       $user=$stmt->fetch(PDO::FETCH_OBJ);
       $count=$stmt->rowCount();
       if ($count>0) {
            $_SESSION['user_id']=$user->id;
            return true;            
       }else{
         return false;
       }

   }
               public function userData($user_id){
      $stmt= $this->pdo->prepare("SELECT * FROM `users` WHERE `id` = :user_id");
      $stmt->bindParam(":user_id",$user_id,PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_OBJ);
   }


                  public function userDataByCID($user_id){
      $stmt= $this->pdo->prepare("SELECT * FROM `users` WHERE `cid` = :user_id");
      $stmt->bindParam(":user_id",$user_id,PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_OBJ);
   }


   	

          public function loggedIn(){
      return (isset($_SESSION['user_id'])) ? true : false;
   }


               public function update($table , $user_id, $fields = array()){
      $columns = '';
      $i = 1;
      foreach($fields as $name => $value){
      $columns .= "`{$name}` = :{$name}";
      if ($i<count($fields)) {
           $columns .= ', ';
      }
      $i++; 
      }
      $sql = "UPDATE {$table} SET {$columns} WHERE `id` = {$user_id}";
      if ($stmt = $this->pdo->prepare($sql)) {
         foreach($fields as $key=> $value){
            $stmt->bindValue(':'.$key, $value);
         }
         $stmt->execute();
      }

   }


                  public function apiupdate($table , $cid, $fields = array()){
      $columns = '';
      $i = 1;
      foreach($fields as $name => $value){
      $columns .= "`{$name}` = :{$name}";
      if ($i<count($fields)) {
           $columns .= ', ';
      }
      $i++; 
      }
      $sql = "UPDATE {$table} SET {$columns} WHERE `cid` = {$cid}";
      if ($stmt = $this->pdo->prepare($sql)) {
         foreach($fields as $key=> $value){
            $stmt->bindValue(':'.$key, $value);
         }
         $stmt->execute();
      }

   }


}