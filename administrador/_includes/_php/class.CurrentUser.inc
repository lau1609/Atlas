<?php
// error_reporting(0);


class current_user{

	public $user_id;
	public $user_username;
	public $user_pwd;

	public function __construct(){

		global $connectMySql;
        
        // Verificamos si existe la sesión
        if (isset($_SESSION['EC_Username'])) {
            // Query
            $sql_query = sprintf("SELECT * FROM users_tb WHERE name_user = '%s' AND status_user = 0;", 
                                 mysqli_real_escape_string($connectMySql, $_SESSION['EC_Username']));
            $LoginRS = mysqli_query($connectMySql, $sql_query);
            $rowData = mysqli_fetch_assoc($LoginRS);
            $loginFoundUser = mysqli_num_rows($LoginRS);

            if ($loginFoundUser) {
                $this->user_id = $rowData['user_id'];
                $this->user_username = $rowData['name_user'];
                $this->user_pwd = $rowData['contra_user'];
            } else {
                $this->user_id = null;
                $this->user_username = null;
                $this->user_pwd = null;
            }
        }

	}
}

?>