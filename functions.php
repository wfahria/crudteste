<?php    
	
	/* *************************************************************************************/
    /* eoMariaDB; 
    /* *************************************************************************************/
	class eoMariaDB { 
		#Example: $db = new eoMariaDB($eo_dbname,$eo_dbserver,$eo_username,$eo_password);
		protected $realpath;
		protected $lc_dbname   = ''; 
		protected $lc_username = '';
		protected $lc_password = '';
		protected $lc_dbserver = '';
		protected $db_resource;
		protected $lc_sSql = '';
		protected $lc_toReturn = true;
		protected $lc_pdo = null; 
		
		function __construct(){
            try {
					$ar_path = explode("/",$_SERVER['SCRIPT_FILENAME']);
					foreach($ar_path as $key=>$vl){ if($vl!='' and $vl=='public_html' and $vl!='index.php'){ $app_path .= $vl ."/"; break; } else { $app_path .= $vl ."/"; }}        
					$db_absolute_path = $app_path .'common/config/config.inc.php';
					$ar=require($db_absolute_path);
					$this->db_resource = $this->Connect($ar['components']['db']['connectionString'], $ar['components']['db']['username'], $ar['components']['db']['password']); 
				
            } catch(PDOException $e){
                print("<pre><strong>[MariaDB]: __construct." .$e->getMessage() ."</strong></pre>");
				exit();
            }
		}

		public function Connect($im_dbname, $im_usdb, $im_pwdb){
			try {
				$this->db_resource = new PDO($im_dbname, $im_usdb, $im_pwdb);
				$this->db_resource->exec("set names utf8");
			} catch(PDOException $e) {
				print("<pre><strong>[MariaDB]: Method Connect." .$e->getMessage() ."</strong></pre>");
				exit();
			}
			return $this->db_resource;
		}

		public function Query($sSql){
			try {
				$sql_return = $this->db_resource->query($sSql);
			} catch(PDOException $e) {
				print("<pre><strong>[MariaDB]: Method Query." .$e->getMessage() ."</strong></pre>");
				exit();
			}
			$this->lc_sSql = $sSql;
			settype($sql_return, 'object');	
			return $sql_return;
		}

		public function Add($sTabela, $arDados){
			$sql_formatada = '';
			foreach($arDados as $ncampo=>$vcampo){ $sql_formatada .= "`" .$ncampo ."`='" .$vcampo ."', "; }
			$sql_formatada = substr($sql_formatada, 0, strlen($sql_formatada)-2);
			$sql_string = "INSERT INTO " .$sTabela ." SET " .$sql_formatada .";";  
			try {
				$this->db_resource->query($sql_string); 
			} catch(PDOException $e) {
				print("<pre><strong>[MariaDB]: Method ADD." .$e->getMessage() ."</strong></pre>");
			}
			return $this->db_resource->lastInsertId();
		}

		public function Del($sTabela, $iId){
			try {
				$this->db_resource->query("DELETE FROM " .$sTabela ." WHERE id='" .$iId ."'");
			} catch(PDOException $e) {
				print("<pre><strong>[MariaDB]: Method DEL." .$e->getMessage() ."</strong></pre>");
			}
			return true; 
		}

		public function Upd($sTabela, $arDados, $iId,$campoChave='id'){
			$sql_formatada = '';
			foreach($arDados as $campo => $valor){
				$sql_formatada .= "`" .$campo ."`='" .$valor ."', ";	
			}
			$sql_formatada = substr($sql_formatada,0,strlen($sql_formatada)-2);
			$sql_string = "UPDATE  " .$sTabela ." SET " .$sql_formatada ." WHERE " .$campoChave ."='" .$iId ."'";
			try {
				$sql_return = $this->db_resource->query($sql_string);
			} catch(PDOException $e) {
				print("<pre><strong>[MariaDB]: Method UPD." .$e->getMessage() ."</strong></pre>");
			}
			return $sql_return;
		}

	}





?>