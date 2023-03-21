<table id="example1" width="100%" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                    <th>S/N</th>
                    <th>Subject</th>
                    <th>Topic </th>
                    <th>Week</th>
                    <th>Description</th>
                    <th>Action </th>
                  
                 

                  </tr>
                  </thead>
                  <tbody>
                  <?php  
	 $item_per_page      = 1000; //item to display per page
	 $page_url           = "<?php echo ADMIN_PATH ; ?>category";
	 if(isset($_GET["page"])){ //Get page number from $_GET["page"]
    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1; //if there's no page number, set it to 1
}


$results = $connection->query("SELECT COUNT(*) FROM school_syllabus "); //get total number of records from database
$get_total_rows = $results->fetch_row(); //hold total records in variable

$total_pages = ceil($get_total_rows[0]/$item_per_page); //break records into pages

################# Display Records per page ############################
$page_position = (($page_number-1) * $item_per_page); //get starting position to fetch the records
//Fetch a group of records using SQL LIMIT clause
$results = $connection->query("SELECT * FROM school_syllabus WHERE status = 1 ORDER BY id ASC LIMIT $page_position, $item_per_page");

//Display records fetched from database.
/*
"SELECT * 
				FROM class_tbl     
				ORDER BY cat_id desc";
*/


echo '<ul class="contents">';
while($row = $results->fetch_assoc()) {
	 
	 ?> 
                  <tr>
                  <th><?php echo $row['id']; ?></th>
                    <td><?php echo $row['sub_name']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['week']; ?></td>
                    <td><?php echo $row['sub_desc']; ?></td>
                    <td>
                    
                    <button oncontextmenu="return false" type="button" class="btn btn-success toastrDefaultSuccess">
                 
               
                      <?php 
                            $img_url = $row["files"];
                            $img_arr = explode(',', $img_url);
                            foreach($img_arr as $img_url1)		
                            {
                            ?>
                            
                            <?php  if(strlen($img_url1)>4){  ?>
                              <a  download="<?php echo $row['sub_name']; ?>&nbsp;<?php echo $row['week']; ?> " href="<?php echo IMAGE_PATH; ?>uploads/<?php echo $img_url1;  ?>">
                              <img src="<?php echo IMAGE_PATH; ?>uploads/<?php echo $img_url1;  ?>" 
                               height="2" width="30" /> <i  style="color:#FFF;" class="fas fa-download"> Download</i> </a>
          
                                 <?php } } ?></button>
         

                      <?php //echo $row['files']; ?>   
                  </td>
                   
                    
                   
                    
                  </tr>
                  <?php

}

?>    
                  </tbody>
                                
                  <tfoot>
                  <tr>
                  <th>S/N</th>
                    <th>Subject</th>
                    <th>Topic </th>
                    <th>Week</th>
                    <th>Description</th>
                    <th>Action </th>
                  
                  </tr>
                  </tfoot>
                </table>