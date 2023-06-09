<?php
	class DBConfig {

		// set attributes for database
		public $db_host = "localhost";
		public $db_user = "root";
		public $db_pass = "";
		public $db_name = "transactions_db";

		public function dbConn() {
			$conn = mysqli_connect($this->db_host, 
				$this->db_user, $this->db_pass, $this->db_name);

				if ($conn->connect_error) {
					echo "Cannot connect to database." . $conn->connect_error;
				} 
				else {
					return $conn;
				}
		}

		public function addTrans($date, $desc, $inc, $dec, $balance){
			$conn = $this->dbConn();
			$sql = "INSERT INTO tbl_trans VALUES
			(NULL, '$date', '$desc', '$inc', '$dec', '$balance')";
			$conn -> query($sql);
		}

		public function updateTrans($date, $desc, $inc, $dec, $balance){
			$conn = $this->dbConn();
			$sql = "UPDATE tbl_trans SET transDate=='$date', transDesc='$desc', transIncr='$inc', transDecr='$dec', transBalance='$balance' WHERE userID='$id'";
			$conn -> query($sql);
		}

		public function displayAll() {
			$conn = $this->dbConn();
			$sql = "SELECT * FROM tbl_trans";
			$res = $conn->query($sql);

			echo '<table class="table">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>Date</th>
							<th>Description.</th>
							<th>Increase</th>
							<th>Decrease</th>
							<th>Balance</th>
						</tr>
					</thead>';

			if($res) {
				if($res->num_rows > 0) {
					while ($row = $res->fetch_assoc()) {
						echo '<tr>
								<td>'. $row['userID'] .'</td>
								<td>'. $row['transDate'] .'</td>
								<td>'. $row['transDesc'] .'</td>
								<td>'. $row['transIncr'] .'</td>
								<td>'. $row['transDecr'] .'</td>
								<td>'. $row['transBalance'].'</td>
							  </tr>';
					}
				} else {
					echo "And here we display records... <h3>IF WE HAD ANY.</h3>";
				}
			}
			else {
				echo "Oops! Something went wrong.";
			}	
		}
	}
?>