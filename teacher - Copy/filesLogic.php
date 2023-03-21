<?php 

$conn = mysqli_connect("localhost", "root", "emeka1109", "school_management_system") ;

if (isset($_POST['save']))
{
    $filename = $_FILES['myfile']['name'] ;

    $destination = 'uploads/' . $filename;


    $extension = pathinfo($filename,PATHINFO_EXTENSION);

    $file = $_FILES['myfile']['tmp_name'];

    $size = $_FILES['myfile']['size'];

    if(!in_array($extension,['zip','pdf']))
    {
        echo "Your file extension must be .zip, .pdf, .doc, .docx, .txt, .png, .jpeg, .jpeg, .gif or .mp4";
    }
    elseif($_FILES['myfile']['size'] > 2000000);
    {
        echo "file is too large";
    


        if(move_uploaded_file('$file', '$destination'))
        {
            $sql = "INSERT INTO school_syllabus (files,size,download)
            VALUES('$filename', '$size', '0')
            ";
           
           if(mysqli_query($conn,$sql))
           {
            echo "<script type='text/javascript'>alert('added successfully !')</script>";
           }else{
                    echo "fail to upload file";
                }
           
        }

    }



}

?>