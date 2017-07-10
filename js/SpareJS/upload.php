<?php
/*
Server-side PHP file upload code for HTML5 File Drag & Drop demonstration
Featured on SitePoint.com
Developed by Craig Buckler (@craigbuckler) of OptimalWorks.net
*/
$output = '<script>console.log("im in php");</script>';
echo "in php";
$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);

if ($fn) {
    echo $output;
	// AJAX call
	file_put_contents(
		'../editing/' . $fn,
		file_get_contents('php://input')
	);
	echo "$fn uploaded";
	exit();

}
else {
	echo "$fn not uploaded";
	// form submit
	$files = $_FILES['fileselect'];

	foreach ($files['error'] as $id => $err) {
		if ($err == UPLOAD_ERR_OK) {
			$fn = $files['name'][$id];
			move_uploaded_file(
				$files['tmp_name'][$id],
				'../editing/' . $fn
			);
			echo "<p>File $fn uploaded.</p>";
		}
	}

}