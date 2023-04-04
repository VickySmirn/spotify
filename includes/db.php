<?php

function select($table, $fields = '*', $where = []) {
    
    global $db;

    $query = '';

    foreach($where as $key => $value) {
        if(!empty($query))
            $query .= " AND ";

        $query .= "$key = '$value' ";
    } 

    if(count($where) > 0)
        $query = 'WHERE ' . $query; 


    $sql = "SELECT $fields FROM $table $query"; 
    $result = $db->query($sql);

    return $result->fetch_all();
}