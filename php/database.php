<?php include_once("config.php"); ?>
<?php 

class Database {
	public $dsn;
	public $db;
	public $query;
	public $table;
	public $where;
	public $select;
	public $get;
	public $order;

	public function __construct(){
		$this->dsn = "mysql:host=".$GLOBALS['hostname'].";dbname=".$GLOBALS['dbname'];
		$this->db = new PDO($this->dsn, $GLOBALS['username'], $GLOBALS['password']);
		$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$this->query = "";
		$this->table = "";
		$this->where = "";
		$this->select = "";
		$this->get = "";
		$this->order = "";
	}

	public function get($fields){
		foreach ($fields as  $value) {
			if (empty($this->get)){
				$this->get .= "`".$value."`";
			}else{
				$this->get .= ",`".$value."`";
			}
		}
	}

	public function where($ass_array){
		foreach ($ass_array as $key => $value) {
			if(empty($where)){
				$this->where .= "`".$key. "` = '" .$value."' ";
			}else{
				$this->where .= "&& `". $key. "` = '" .$value."' ";
			}
		}
	}

	public function table($table){
		$this->table = $table;
	}

	private function reset_values(){
		$this->query = "";
		$this->table = "";
		$this->where = "";
		$this->select = "";
		$this->get = "";
		$this->order = "";
	}

	public function select($table){

		$this->query = "SELECT";
		if(empty($this->get)){
			$this->query .=" * ";
		}else{
			$this->query .= " ".$this->get;
		}

		$this->query .= " FROM `".$table."` ";

		if(!empty($this->where)){
			$this->query .= " WHERE ".$this->where .";";
		}
		$result = $this->db->query($this->query);
		// $this->db->closeCursor();
		$this->reset_values();
		return $result;
	}

	public function insert($table,$fields){
		$this->query .= "INSERT INTO ";

		$this->query .= "`".$table."` ";

		$keys = "";
		$values = "";
		foreach ($fields as $key => $value) {
			if(empty($keys)){
				$keys .= "`".$key."`";
			}else{
				$keys .= ",`".$key."`";
			}

			if(empty($values)){
				$values .= "'".$value."'";
			}else{
				$values .= ",'".$value."'";
			}
		}

		$this->query .= "(".$keys.") VALUES (".$values.");";
		$result = $this->db->query($this->query);
		// $this->db->closeCursor();
		$this->reset_values();
		return $result;
	}

	public function delete($table, $fields){
		
		$this->query .= "DELETE FROM ";

		$this->query .= "`".$table."` ";

		if($fields == NULL){
			$this->query .= "WHERE ". $this->where.";";
		}else{
			$where = "";
			foreach ($fields as $key => $value) {
				if(empty($where)){
					$where .= $key. " = " .$value." ";
				}else{
					$where .= "&& ".$key. " = " .$value." ";
				}
			}
			$this->query .= "WHERE ".$where." ;";
		}
		$result = $this->db->query($this->query);
		// $this->db->closeCursor();
		$this->reset_values();
		return $result;
	}

	public function update($table,$fileds,$where){
		$this->query .= "UPDATE ".$table." SET ";
		$set = "";

		foreach ($fileds as $key => $value) {
			if(empty($set)){
				$set .= "`".$key."` = '".$value."' ";
			}else{
				$set .= ", `".$key."` = '".$value."' ";
			}
		}
		$this->query .= $set." WHERE ";
		$w = "";
		foreach ($where as $key => $value) {
			if(empty($w)){
				$w .= "`".$key."` = '".$value."' ";
			}else{
				$w .= "&& `".$key."` = '".$value."' ";
			}
		}

		$this->query .= $w.";";
		$result = $this->db->query($this->query);
		// $this->db->closeCursor();
		$this->reset_values();
		return $result;
	}

}

	$con = new Database();
 ?>