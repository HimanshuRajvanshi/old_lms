<?php
session_start();


class Login{

    private $dbhost = 'localhost'; // host name

    private $dbname = 'trilasof_intranet'; // database name

    private $dbuser = 'trilasof_dba'; // database username

    private $dbpass = 'redsky@123456'; // database password

    private $usertable = 'user';

    private $connect;

    private $result_to;

    private $data;

    

    public $dbresponse;

    public $response;


    public function __construct(){

        $this->connect = mysql_connect($this->dbhost, $this->dbuser, $this->dbpass);

        if(!$this->connect){

            echo "<h4>There is Database connectivity error. check your hostname, username or password</h4>";

        }else{

            mysql_select_db($this->dbname);

            //echo "<h4>Database connect properly</h4>";

        }

    }


    public function  __destruct() {

        mysql_close($this->connect);

    }


    public function query_execute($query){

        $this->result_to = mysql_query($query);

        if(!$this->result_to){

            //echo '<h4>query could not executed</h4';

        }else{

            return $this->result_to;

        }
                
    }
    

    public function fetch_data($result){

        if(!$result){

            $rows = NULL;

        }else{

            $row = mysql_fetch_array($result);

            return $row;

        }

    }


    public function login_user($username, $password){
        
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);

        $password = md5($password);
        
        

        $sql = "select * from employee where username = '$username' and password = '$password' limit 1";

        $result = $this->query_execute($sql);

        $this->data = $this->fetch_data($result);

        if(!$this->data){

            return 'Please enter correct username and password';

        }else{
        	


            $_SESSION['username'] = $this->data['username'];
            $_SESSION['permission'] = 'yes';
            $sessid = session_id();
            $_SESSION['sessid']= $sessid;
            $empid =  $this->data['empid'];
            $type =  $this->data['type'];
            $_SESSION['empid'] = $empid;
            $_SESSION['type'] = $type;   
            //$date = date("Y-m-d");
			date_default_timezone_set('Asia/Kolkata');
        //$sql = "INSERT into `attendance` (`date`,`intime`, `empid`) VALUES ('$date', NOW(), '$empid')";
        //$result = $this->query_execute($sql);
            
            if($_POST['remember']==true)
            {
            
            $hour = time() + 60*60*24*30; 
            SETCOOKIE(trilauser, $username, $hour);
            SETCOOKIE(trilapass, $password, $hour);
            SETCOOKIE(empid, $empid, $hour);
            SETCOOKIE(type, $type, $hour);
            }
            header('location: securearea.php?sessid='.$sessid);
            header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1

            //echo $_SESSION['username'];
        }

    }

    public function logout(){
    	date_default_timezone_set('Asia/Kolkata');
       foreach($_COOKIE AS $key => $value) {
      $date = date("Y-m-d");
$sql = "INSERT into `attendance` (`date`, `outtime`, `empid`) VALUES ( '$date', NOW(), '".$_SESSION['empid']."')";
$result = $this->query_execute($sql);      
       	
     SETCOOKIE($key,$value,time()-60*60*24*30);
}
        if(isset($_SESSION['permission'])) {
			unset($_SESSION['permission']);

			if(isset( $_SESSION['sessid']))
				unset( $_SESSION['sessid']);
			
			if(isset( $_SESSION['empid']))
				unset( $_SESSION['empid']);	
			
			if(isset( $_SESSION['type']))
				unset( $_SESSION['type']);	
			
			session_destroy();
	}
        
        //session_destroy();
        return 'you are now logged out';

    }

    public function session_check() {

                

                

		if($_SESSION['permission'] != 'yes') {

                   header("location: index.php");

                    return 'you have no permission to see this page';
                    
                }else{
                    //header("location: securearea.php");
                    return $_SESSION['username'];

                }
      
    }
}

?>
