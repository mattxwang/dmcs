<?php
  require("common.php");
	function pull_posts(){
		$query = "
     SELECT * FROM posts WHERE 1
    ";

		// execute query
    try
    {
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    }
    catch(PDOException $ex)
    {
        die("Failed to run query: " . $ex->getMessage());
    }

		$data = [];
		while($row = mysql_fetch_row($result)) {
			array_push($data, $row);
		}

		return(json_encode($data));
		mysql_free_result($result);
		mysql_close($connection);
	}
	echo pull_posts();
?>