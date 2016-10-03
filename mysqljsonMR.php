<?php // note that this is not a complete page.
	
	$dbc = @mysqli_connect("localhost", "root", "root", "da_rep")
	       or die("Could not open wfb2007 db, " . mysqli_connect_error());
	$query = "select * from da_performances";				

	$result = mysqli_query($dbc, $query);
	if ( mysqli_num_rows( $result ) == 0 ) {
		die("bad query $query");
	}
	$performance_data = array();	// put the rows as objects in an array
	while ( $obj = mysqli_fetch_object( $result ) ) {
		$performance_data[] = $obj;
	}
	echo json_encode($performance_data);

	mysqli_close($dbc);
