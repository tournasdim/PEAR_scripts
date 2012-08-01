<?php
 /**
 * Html_table  
 * 
 * http://tournasdimitrios1.wordpress.com
 * 
 * @copyright Tournas Dimitiros 2012
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * @author Tournas Dimitrios <tournasdimitrios@gmail.com>
 * @version 0.3
 * 
 */
 /**
 * @Including PEAR library
 */
require_once("PEAR.php") ;
require_once("HTML/Table/Matrix.php");



class HtmlTable {
// Initialize Variables
private $columnMeta = array() ;
private$requestedColumnNames = array() ;
private $data = array() ;
private $db_Host ;
private $db_Name ; 
private $db_User ;
private $db_Passwd ;
private $mysqli ;
private $tbl_Name ;
private $tbl_ColumnOrder ;
private $tbl_Border = 2 ;
private $tbl_CellPadding = 3 ;
private $tbl_CellSpacing = 3 ;
private $tbl_Limit = 10 ; 
private $orderBy = "ASC" ; 
private $available_options = array (
			 "db_Host" ,"db_Name" , "db_User" , "db_Passwd" , 
			 "tbl_Name" , "tbl_ColumnOrder" , "tbl_Border" , "tbl_CellPadding" ,
			"tbl_CellSpacing" , "tbl_Limit" , "orderBy" ) ; 
/**
* Constructor
* @param array $config This array contains db-connection credentials and optional configuration options for the html-table (border , cellpadding , cellspacing  ... )
*@param array $columnNames This array defines the columns of the SQL-table that will be displayed 
*/
   public function  __construct($config , $columnNames) 
   {  
	foreach ($config as $k => $v) {	
	if (in_array("$k", $this->available_options)) {
	$this->{$k} = $v ;	 
		}else{
throw new Exception(
"The parameter -- <strong>$k</strong> -- is unknow .<br>
 <strong>Available options are : </strong><br>
 <ul>
  <li>db_Host</li>
  <li>db_Name</li>
  <li>db_User</li>
  <li>db_Passwd</li>
  <li>tbl_Name</li>
  <li>tbl_ColumnOrder</li>
  <li>tbl_Border</li>
  <li>tbl_CellPadding</li>
  <li>tbl_CellSpacing</li>
   <li>tbl_Limit</li>
  <li>orderBy</li>
</ul>") ;
	   exit();    
			}	
		}
	foreach ($columnNames as $v) {
	array_push($this->requestedColumnNames , $v ) ;
			}
	 $this->db_Connect() ; 
	 $this->returnTable() ; 
   }// End of public function __construct
/**
* db_Connect
* Establishes a db-connection 
*/
   private function db_Connect() 
   {
 // Connect to db, run query, populate variables
	@$this->mysqli = new mysqli(
					$this->db_Host ,
					$this->db_User ,
					$this->db_Passwd ,
					$this->db_Name ) ;
	if (mysqli_connect_errno()) {
   throw new Exception('Could not Connect to database') ;
	   exit();
		}   
   }// End of private function db_Connect
   
/**
* returnTable
* @return html-table 
*/
   private function returnTable() 
   {   
   $qarguments = implode(",", $this->requestedColumnNames) ;
      $query = "SELECT $qarguments 
                FROM  {$this->tbl_Name}  
                ORDER BY {$this->tbl_ColumnOrder}  {$this->orderBy} 
				LIMIT {$this->tbl_Limit} " ;
	if ($result = $this->mysqli->query($query)) {
   $rows    = $this->mysqli->affected_rows ;
   $columns = $this->mysqli->field_count ;	
	    for($i=0 ; $i<$columns ; $i++) {
        $columnMeta = $result->fetch_field_direct($i) ;
        $columnNames[]  = "<strong>{$columnMeta->name}</strong>" ;		
			}//End of for-loop
			$data = array() ; 
	$data = array_merge($data, $columnNames);	
		while($row = $result->fetch_row())  {
        $data = array_merge($data , $row) ;
			}//End of while-loop

	/**
     * @var HTML_Table_Matrix
     * Create the table and set properties - $rows + 1 needed for column headers
     */
	$table = new HTML_Table_Matrix(array(
					'border' => $this->tbl_Border , 
					'cellpadding' => $this->tbl_CellPadding ,
					'cellspacing' => $this->tbl_CellSpacing ,
					));
    $table->setData($data);
    $table->setTableSize($rows + 1 , $columns );

    /**
     * @var HTML_Table_Matrix_Filler
     * Create the filler, and render the table
     */
    $filler = HTML_Table_Matrix_Filler::factory('LRTB', $table);
    $table->accept($filler) ;
    print_r( $table->toHtml()) ; 
			}// End of querying the database and rendering table 
		}//End of public function returnTable   
	}//End of Class
