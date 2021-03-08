<?php
    include './conn.php';
    
	$sql = "select id,groups from groups order by id ASC";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $arr[] = $row;
	    }
		echo json_encode($arr);
	} else {
	    echo "0";
	}
	$conn->close();
?>     