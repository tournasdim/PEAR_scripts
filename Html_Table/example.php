<?php

// Include the "HtmlTable.Class.php" file first 
require_once("HtmlTable.Class.php") ;

echo "<h3>First example</h3>" ; 

/*
This array contains all required parameters . 
While the order of these parameters is not important , an exception-error will be thrown if they are misspelled (also case-sensitive) .

*/	
$config = array(
				"db_Host" => "localhost",
				"db_User" => "root" ,
				"db_Passwd" => "" ,
				"db_Name" => "test" ,
				"tbl_Name" => "customers" ,
				"tbl_ColumnOrder" => "cust_id"				
				) ;
$columnNames = array( "cust_id" , "first_name" , "last_name" , "country") ; 
  try {
$custom_Table = new HtmlTable($config , $columnNames) ; 
unset($custom_Table) ;      
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(),"";
    }	
	
	
	
	
echo "<h3>Second example </h3> " ;  
/*
An example of all required and optional parameters  .
*/
$config2 = array(
				"db_Host" => "localhost",
				"db_User" => "root" ,
				"db_Passwd" => "" ,
				"db_Name" => "test" ,
				"tbl_Name" => "committee_members" ,
				"tbl_ColumnOrder" => "PLAYERNO"	 ,
				"tbl_Border" =>22 ,
				"orderBy" => "DESC" ,
				"tbl_Limit" => "3 , 9" 
				) ;
$columnNames2 = array( "PLAYERNO" , "BEGIN_DATE" , "END_DATE" , "POSITION") ; 
  try {
$custom_Table2 = new HtmlTable($config2 , $columnNames2) ; 
unset($custom_Table2) ;      
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(),"";
    }
 ?>