
<?php

class user{
	private $UserId, $UserName, $UserEmail, $UserPassword, $cpassword;

	public function getUserId(){
		return $this->UserId;
	}
	public function setUserId($UserId){
		$this->UserId=$UserId;
	}
	//
	public function getUserName(){
		return $this->UserName;
	}
	public function setUserName($UserName){
		$this->UserName=$UserName;
	}
	//
	public function getUserEmail(){
		return $this->UserEmail;
	}
	public function setUserEmail($UserEmail){
		$this->UserEmail=$UserEmail;
	}
	//
	public function getUserPassword(){
		return $this->UserPassword;
	}
	public function setUserPassword($UserPassword){
		$this->UserPassword=$UserPassword;
	}
	//
	public function getcpassword(){
		return $this->cpassword;
	}
	public function setcpassword($cpassword){
		$this->cpassword=$cpassword;
	}

	public function InsertUser(){
		include "conn.php";
		$req=$bdd->prepare("INSERT INTO users (UserName,UserEmail,UserPassword,cpassword) VALUES(:UserName,:UserEmail,:UserPassword,:cpassword)");
		$req->execute(array(
			'UserName'=>$this->getUserName(),
			'UserEmail'=>$this->getUserEmail(),
			'UserPassword'=>$this->getUserPassword(),
			'cpassword'=>$this->getcpassword(),
		));
	}
	public function Userlogin(){
		include "conn.php";
		$req=$bdd->prepare("SELECT * FROM users WHERE UserEmail=:UserEmail AND UserPassword=:UserPassword");

		$req->execute(array(
			'UserEmail'=>$this->getUserEmail(),
			'UserPassword'=>$this->getUserPassword()
		 ));
		if($req->rowCount()==0){
			header("Location:index.php?error=1");
			return false;
		}else{
			while($data=$req->fetch()){
				$this->setUserId($data['UserId']);
				$this->setUserName($data['UserName']);
				$this->setUserEmail($data['UserEmail']);
				$this->setUserPassword($data['UserPassword']);
				header("Location:Home.php");
				return true;
			}
		}
	}
}

class chat{
	private $ChatId, $ChatUserId, $ChatText;

	public function getChatId(){
		return $this->ChatId;
	}
	public function setChatId($ChatId){
		$this->ChatId = $ChatId;
	}
	//
	public function getChatUserId(){
		return $this->ChatUserId;
	}
	public function setChatUserId($ChatUserId){
		$this->ChatUserId = $ChatUserId;
	}
	// 
	public function getChatText(){
		return $this->ChatText;
	}
	public function setChatText($ChatText){
		$this->ChatText = $ChatText;
	}

	public function InsertChatMessage(){
		include "conn.php";
		$req=$bdd->prepare("INSERT INTO chats(ChatUserId,ChatText) VALUES(:ChatUserId, :ChatText)");
		$req->execute(array(
			'ChatUserId'=>$this->getChatUserId(),
			'ChatText'=>$this->getChatText(),
		)); 
	}
	public function DisplayMessage(){
		include "conn.php";
		$ChatReq=$bdd->prepare("SELECT * FROM chats ORDER BY ChatId");
		$ChatReq->execute();

		while($DataChat=$ChatReq->fetch()){
			$UserReq=$bdd->prepare("SELECT * FROM users WHERE UserId=:UserId");
			$UserReq->execute(array(
				'UserId'=>$DataChat['ChatUserId']
			));
			$DataUser = $UserReq->fetch();
			?>
			<span class="UserNameS" style="color: #e8ff9e; padding: 10px;"><?php echo $DataUser['UserName'];?> :</span> <br>
			<span class="UserMessageS" style="color: #ebccff; border-radius: 5px; padding: 1.5px; margin: 25px; border: 0.5px solid #00ffff; font-family: sans-serif; font-size: 17px; padding-right: 5px; padding-left: 5px
			"><?php echo htmlspecialchars($DataChat['ChatText']);?></span><br><br>
			<?php
		} 
	}
}
?>