<?php
//Initialise all variables.
$db_images = '';
$k = 1;
if( (isset($_POST['file_go']) && isset($_FILES['file_1']) && strlen($_FILES['file_1']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_2']) && strlen($_FILES['file_2']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_3']) && strlen($_FILES['file_3']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_4']) && strlen($_FILES['file_4']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_5']) && strlen($_FILES['file_5']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_6']) && strlen($_FILES['file_6']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_7']) && strlen($_FILES['file_7']['name']) > 1) ||
	(isset($_POST['file_go']) && isset($_FILES['file_8']) && strlen($_FILES['file_8']['name']) > 1) )
{		
		do{
			$field_name = 'file_' . $k;
			if(isset($_FILES[$field_name]) && strlen($_FILES[$field_name]['name']) > 5)
			{
				$position[] = $k;
			}
			$k = $k + 1;
		}while($k <= 8);

		//Check for error on upload
		foreach($position as $j)
		{
			$file = 'file_' . $j;
			$checked = check_image($file);
			if($checked == FALSE)
			{
				$errors[] = 'Images does not meet our specification. Images must be gif, 
						  jpg, jpeg, mp4, pdf, txt or png and must not exceed 10000KB (10.0MB) in size';
			}
		}
		
		//If no error upload images
		if(!isset($error))
		{
				$db_images = '';
				foreach($position as $w)
				{
					$name = 'file_' . $w;
					$imgurl_x = imageuploader($name, 'uploads');
					if($imgurl_x != FALSE)
					{
						$db_images .= $imgurl_x . ',';
					}else{
						$errors[] = 'Unable to Upload Images';
					}
					sleep(1);
				}
		}
		
}



if(isset($_REQUEST["file_go"])){
    // Get parameters
    $file = urldecode($_REQUEST["file_go"]); // Decode URL-encoded string


	$sql="SELECT * school_syllabus WHERE id=$file";
	$result = mysqli_query($connection,$query);
	$file  = mysqli_fetch_assoc($result);

    /* Test whether the file name contains illegal characters
    such as "../" using the regular expression */
    if(preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $file)){
        $filepath = "uploads/" . $file;

        // Process download
        if(file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
			
			$newCount = $file['downloads'] + 1 ;

			$updateQuery = "UPDATE files SET downloads=$newCount WHERE id = $file";
			mysqli_query($connection,$updateQuery)	;


            die();
        } else {
            http_response_code(404);
	        die();
        }
    } else {
        die("Invalid file name!");
    }
}

