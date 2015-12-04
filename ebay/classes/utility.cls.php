<?php
/***********************************************************
Developed By : Kapil Verma
Website : phpspider.wordpress.com
Purpose: General utility for generating the Sql Query(insert,update & select).
Creatoin Date : August 01 2009
/***********************************************************/
class utility
{

    /**
     * Returns the number of words in a string excluding punctuation marks. 
     * NOTE: This function count words from string using eregi_replace() and eregi().
     *
     * @param string to count words from
     *
     * @access public
     *
     * @return integer the number of words
     */
    
    function am_countWords($string)
    {
		$word_count = 0;
		$string = eregi_replace(" +", " ", $string);
		$string = eregi_replace("\n+", " ", $string);
		$string = eregi_replace(" +", " ", $string);
		$string = explode(" ", $string);
	
		while (list(, $word) = each ($string)) {
			if (eregi("[0-9A-Za-z�-��-��-�]", $word)) {
				$word_count++;
			}
		}
		
		return $word_count;
		
	} // end func am_countWords
	

	/*********** DATABASE QUERY RELATED FUNCTIONS *******************
	****************************************************************/
	
	/**
     * Returns the INSERT query string. 
     * NOTE: This function creates insert query from tablename and data array 
     * using mysql_real_escape_string(), get_magic_quotes_gpc(), implode(),
     * array_values() and array_keys().
     *
     * @param tblname string and dataArray array
     *
     * @access public
     *
     * @return insert query string
     */
    
    function am_createInsertQuery($tblName, $dataArray)
    {
		$sqlQuery = "";
		if(!empty($tblName) && !empty($dataArray) && is_array($dataArray)) {
	    	if (get_magic_quotes_gpc()) {
		        foreach ($dataArray as $key => $val) {
		    		if (!is_numeric($val)) {
				        $val = stripslashes(trim($val));
		    			$val = mysql_real_escape_string($val);
		    			$dataArray[$key] = $val;
				    }    	
		        }
		    } else {
		    	foreach ($dataArray as $key => $val) {
		    		if (!is_numeric($val)) {
				        $val = mysql_real_escape_string(trim($val));
		    			$dataArray[$key] = $val;
				    }    	
		        }
		    }
		    			
			$sqlQuery = "INSERT INTO $tblName ";
			$sqlQuery .= "(`". implode("`, `",array_keys($dataArray)) . '`)';
			$sqlQuery .= " VALUES ('". implode("', '",array_values($dataArray)) . "')";
		}
		
		return $sqlQuery;
		
	} // end func am_createInsertQuery
	
	/**
     * Returns the UPDATE query string. 
     * NOTE: This function creates update query from tablename and data array 
     * using mysql_real_escape_string(), get_magic_quotes_gpc()
     *
     * @param tblname string, whereCondition string and dataArray array
     *
     * @access public
     *
     * @return update query string
     */
    
    function am_createUpdateQuery($tblName, $dataArray, $whereCondition)
    {
		$sqlQuery = "";
		if(!empty($tblName) && !empty($dataArray) && is_array($dataArray) && !empty($whereCondition)) {
	    	$sqlQuery = "UPDATE $tblName SET";
	    	
			if (get_magic_quotes_gpc()) {
		        foreach ($dataArray as $key => $val) {
		    		if (!is_numeric($val)) {
				        $val = stripslashes($val);
		    			$val = mysql_real_escape_string($val);
		    		}
				    $sqlQuery .= " `" . $key . "` = '". $val . "',";    	
		        }
		    } else {
		    	foreach ($dataArray as $key => $val) {
		    		if (!is_numeric($val)) {
				        $val = mysql_real_escape_string($val);
		    		}
				    $sqlQuery .= " `" . $key . "` = '". $val . "',";    	
		        }
		    }
		    
		    $sqlQuery = substr($sqlQuery,0,-1); // to remove last comma
		    $sqlQuery .= " WHERE " . $whereCondition;
		}
		
		return $sqlQuery;
		
	} // end func am_createUpdateQuery
	
	/**
     * Returns the SELECT ALL query string. 
     * NOTE: This function creates Select query from tablename 
     *
     * @access public
     *
     * @return select All query string
     */
    
    function am_createSelectAllQuery($tblName,$whereCondition,$orderBy='',$groupBy='')
    {
		$sqlQuery = "";
		if(!empty($tblName)) {
                    $sqlQuery = "SELECT * FROM  $tblName";
                     if(!empty($whereCondition))
                        $sqlQuery .= " WHERE " . $whereCondition;
                    if($orderBy!='')
                        $sqlQuery .= " ORDER BY " . $orderBy;
                    if($groupBy!='')
		    	$sqlQuery .= " GROUP BY " . $groupBy;
		}
		
		return $sqlQuery;
		
	} // end func am_createSelectAllQuery

   function am_createDeleteQuery($tblName,$whereCondition)
   {
       	$sqlQuery = "";
		if(!empty($tblName)) {
	    	$sqlQuery = "DELETE FROM  $tblName";
	    	 if(!empty($whereCondition))
		    	$sqlQuery .= " WHERE " . $whereCondition;			
		}
		return $sqlQuery;
   }
	
} // end class utility

?>