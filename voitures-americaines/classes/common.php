<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of common
 *
 * @author SUPERCOMUTER
 */
class common extends utility {
    //put your code here

    function common(){}

    function read($tblName,$whereCondition='',$orderBy='',$groupBy=''){
        global $db;
        $result = $this->am_createSelectAllQuery($tblName, $whereCondition, $orderBy,$groupBy);        
        return $db->query($result);
    }

    function save($tblName,$dataArray){
        global $db;
        $result = $this->am_createInsertQuery($tblName, $dataArray);
        $db->query($result);
        return mysql_insert_id();
    }

    function delete($tblName,$whereCondition){
        global $db;
        $result = $this->am_createDeleteQuery($tblName, $whereCondition);
        $db->query($result);
        //return affectedRows();
    }
    function update($tblName,$dataArray,$whereCondition){
        global $db;
        $result = $this->am_createUpdateQuery($tblName, $dataArray,$whereCondition);        
        $db->query($result);
        //return affectedRows();
    }
    function numberOfRows($tblName,$whereCondition){
        global $db;
        $result = $this->am_createSelectAllQuery($tblName, $whereCondition);
        return mysql_num_rows($db->query($result));
    }    
    function customQuery($sqlQuery){
        global $db;
        $result = $db->query($sqlQuery);
        return $result;
    }
    function getNameById($tblName,$condition){
        global $db;
        $sqlQuery = $this->am_createSelectAllQuery($tblName, $condition);
        $result = $db->query($sqlQuery);        
        return $row = $db->fetchNextObject($result);
    }
    function getExistingField($tblName,$condition){
        global $db;
        $sqlQuery = $this->am_createSelectAllQuery($tblName, $condition);
        $result = $db->query($sqlQuery);        
        return $result;
    }
	function getbrand(){
        $sqlQuery = mysql_query("SELECT id,title FROM brands WHERE publish='yes'");
        return $sqlQuery;
    }	
    /*function getSubCatName($tblName,$scid){
        global $db;
        $sqlQuery = $this->am_createSelectAllQuery($tblName, "id = ".$scid);
        $result = $db->query($sqlQuery);
        $row = $db->fetchNextObject($result);
        return $row->name;
    }*/
}
?>
