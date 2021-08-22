<?php


	/**
 	* 
	 */
	class user
	{
		public $connection;

		function __construct()
		{
			// $user ='fundbox';
			// $pass='oracle';
			// $db='localhost/XE';
			// $connection = oci_connect($user, $pass, $db);
		}
		/**
		* USer registration System 
		*/
		public function userRegistraion($name, $email, $pass1,$phone)
		{	//echo "Here";
			$user ='fundbox';
			$pass='oracle';
			$db='localhost/XE';
			$connection = oci_connect($user, $pass, $db);

			$sql = "SELECT MAX(ID) FROM USERINFOS";
			$data = oci_parse($connection, $sql);
			oci_execute($data);
			$row = oci_fetch_array($data, OCI_ASSOC);
			$id = $row['MAX(ID)'];
			// echo " id is ";
			// echo $id ;
			$id = $id + 1 ;
			$sql1 = "INSERT INTO USERINFOS (ID,NAME, EMAIL, PASSWORD, PHONE, TYPE, STATUS) VALUES ($id,'$name','$email','$pass1','$phone',4,1)";
			$data1 = oci_parse($connection, $sql1);
			oci_execute($data1);
	
			if($data1){
				return true;
			}else{
			return false;
			}
		}

		/**
		* Email check 
		*/
		public function emailCheck($email)
		{
			$user ='fundbox';
			$pass='oracle';
			$db='localhost/XE';
			$connection = oci_connect($user, $pass, $db);
			$sql = "SELECT * FROM USERINFOS WHERE EMAIL = '$email'";
			$data = oci_parse($connection, $sql);
			oci_execute($data);
			$count =0;
			while (($res = oci_fetch_array($data, OCI_ASSOC)) != false) {
				//echo htmlentities($res['EMAIL']) . "<br>";
				$count = $count+1;
				//echo $count;
   			}

			if( $count == 1 ){
				return false;
			}else{
				return true;
			}

		}
		public function allUser()
		{
			$user ='fundbox';
			$pass='oracle';
			$db='localhost/XE';
			$connection = oci_connect($user, $pass, $db);
			$sql = "SELECT * FROM USERINFOS WHERE STATUS=1";
			$data = oci_parse($connection, $sql);
			oci_execute($data);
			
			// while (($res = oci_fetch_array($data, OCI_ASSOC)) != false) {
			// 	//echo htmlentities($res['EMAIL']) . "<br>";
			// 	$count = $count+1;
			// 	//echo $count;
			// $single_user_data = array(oci_fetch_array($data));
			// echo $single_user_data;
   			
			return oci_fetch_array($data, OCI_ASSOC);

		
			

		}


		/**
		 * User Login System 
		 */

		public function userLoginSystem($email, $pass)
		{

			$user ='fundbox';
			$Upass='oracle';
			$db='localhost/XE';
			$connection = oci_connect($user, $Upass, $db);
			$sql = "SELECT * FROM USERINFOS WHERE email = '$email'";
			$data = oci_parse($connection, $sql);
			oci_execute($data);

			$single_user_data = oci_fetch_array($data);


				if($single_user_data){
					if( $single_user_data['STATUS']== 1 ){
						//if( password_verify( $pass , $single_user_data['pass'] ) == true ){
						if( $pass == $single_user_data['PASSWORD'] ){
							if ($single_user_data['TYPE']==1) {
								header("location:adminDashboard.php");
							}
							elseif ($single_user_data['TYPE']==2) {
								header("location:organizationDashboard.php");
							}
							elseif ($single_user_data['TYPE']==3) {
								header("location:sponsorDashboard.php");
							}
							elseif ($single_user_data['TYPE']==4) {
								header("location:userDadhboard.php");
							}
							else
							{
								header("location:login.php");
							}
		
		
						}else{
		
							return "<p style='color:red;text-align:center; font-size:14px; font-weight:normal;'> Wrong Password !</p>";
		
		
						}
		
					}else {
						return "<p style='color:red;text-align:center; font-size:14px; font-weight:normal;'> Wrong email address !</p>";
					}
				}
				else{
					return "<p style='color:red;text-align:center; font-size:14px; font-weight:normal;'> Wrong email address !</p>";
				}

		}

		public function allAdminCount()
		{
			$user ='fundbox';
			$pass='oracle';
			$db='localhost/XE';
			$connection = oci_connect($user, $pass, $db);
			$data = oci_parse($connection, "BEGIN
											:returnValue := totalAdmin();
		 									END;");
		  	oci_bind_by_name($data,":returnValue",$returnValue);
			oci_execute($data);

			return $returnValue;
		}
		public function allSponsorCount()
		{
			$user ='fundbox';
			$pass='oracle';
			$db='localhost/XE';
			$connection = oci_connect($user, $pass, $db);
			$data = oci_parse($connection, "BEGIN
											:returnValue := totalSponsor();
		 									END;");
		  	oci_bind_by_name($data,":returnValue",$returnValue);
			oci_execute($data);

			return $returnValue;
		}
		public function allOrganisationrCount()
		{
			$user ='fundbox';
			$pass='oracle';
			$db='localhost/XE';
			$connection = oci_connect($user, $pass, $db);
			$data = oci_parse($connection, "BEGIN
											:returnValue := totalOrg();
		 									END;");
		  	oci_bind_by_name($data,":returnValue",$returnValue);
			oci_execute($data);

			return $returnValue;
		}
		public function allUserCount()
		{
			$user ='fundbox';
			$pass='oracle';
			$db='localhost/XE';
			$connection = oci_connect($user, $pass, $db);
			$data = oci_parse($connection, "BEGIN
											:returnValue := totalUser();
		 									END;");
		  	oci_bind_by_name($data,":returnValue",$returnValue);
			oci_execute($data);

			return $returnValue;
		}


}




?>