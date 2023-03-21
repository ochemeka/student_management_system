<?php 
require_once 'FPDF/fpdf.php';

require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>


<?php //echo "Student Management System" ?>


<?php 



$sql = "SELECT * FROM student_tbl WHERE stud_id = {$_SESSION['user_id']} AND status = 1" ;
$data = mysqli_query($connection, $sql);
 




if(isset($_POST['btn_pdf']))
{
    $pdf = new FPDF('p', 'mm', 'a4');
    $pdf->SetFont('arial', 'b', '12');
    //$pdf->Image('uploads/1643741600.jpg',0,0);
    $pdf->AddPage();

    while($row = mysqli_fetch_assoc($data)){
    $pdf->cell('70', '10', 'Last Update', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['time'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Fullname:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['fullname'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Username:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['username'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Gender:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['gender'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Student Personl Phone:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['phone'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Date of Birth:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['dob'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Email', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['email'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Address:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['address'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Fathers Name:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['father_name'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Fathers Occupation:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['father_occ'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Fathers Phone:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['father_phone'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Mother Name::', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['mother_name'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Mother Occupation:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['mother_occ'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Mothers Phone:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['mother_phone'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'LGA:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['lga'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'State:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['state'], '0', '1', 'L' );
   
    

    $pdf->cell('70', '10', 'Nationality:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['nationality'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Class Admitted to:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['class'], '0', '1', 'L' );

    $pdf->cell('70', '10', 'Date Admitted:', '0', '0', 'L' );
    $pdf->cell('70', '10', $row['addmission_date'], '0', '1', 'L' );

    }
    /*
    while($row = mysqli_fetch_assoc($data)){
    $pdf->cell('40', '10', $row['time'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['fullname'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['username'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['gender'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['phone'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['dob'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['email'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['address'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['father_name'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['father_occ'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['father_phone'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['mother_name'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['mother_occ'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['mother_phone'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['lga'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['state'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['nationality'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['class'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['fullname'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['fullname'], '0', '0', 'C' );
    $pdf->cell('40', '10', $row['fullname'], '0', '0', 'C' );


    }     */
        

    $pdf->Output();

  
    //$pdf->cell('40', '10', 'Title', '1', '0', 'C' );

}
?>