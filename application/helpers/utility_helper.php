<?php

if (!function_exists('global_image_url')) {

    function global_image_url() {
        $CI = & get_instance();
        return $CI->config->slash_item('global_image_url');
    }

}

function get_name_by_auto_id($table_name=NULL,$auto_id=NULL,$field_name=NULL) {

    $ci = & get_instance();
//    $read_db = $ci->load->database('read', TRUE); // database conection for read operation
    if (!empty($table_name) and !empty($auto_id) and !empty($field_name)) {
        
        $query = $ci->db->select('name', $field_name);
        $query = $ci->db->where('id', $auto_id);
        $query = $ci->db->get($table_name);
        $total_row = $query->num_rows();
        if ($total_row > 0) {
            $ressult = $query->row();
            return $ressult->$field_name;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function get_designation_by_auto_id($table_name=NULL,$auto_id=NULL,$field_name=NULL) {

    $ci = & get_instance();
//    $read_db = $ci->load->database('read', TRUE); // database conection for read operation
    if (!empty($table_name) and !empty($auto_id) and !empty($field_name)) {
        
        $query = $ci->db->select('name', $field_name);
        $query = $ci->db->where('id', $auto_id);
        $query = $ci->db->get($table_name);
        $total_row = $query->num_rows();
        if ($total_row > 0) {
            $ressult = $query->row();
            return $ressult->$field_name;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function get_month_name($month) {
    switch ($month) {
        case "1":
            return "January";
            break;
        case "2":
            return "February";
            break;
        case "3":
            return "March";
            break;
        case "4":
            return "April";
            break;
        case "5":
            return "May";
            break;
        case "6":
            return "June";
            break;
        case "7":
            return "July";
            break;
        case "8":
            return "August";
            break;
        case "9":
            return "September";
            break;
        case "10":
            return "October";
            break;
        case "11":
            return "November";
            break;
        case "12":
            return "December";
            break;
    }
    
}

function get_sex_name($id) {
    switch ($id) {
        case "M":
            return "Male";
            break;
        case "F":
            return "Female";
            break;
        default:
            return "";
    }
}


function get_status_name_by_type($type) {
    switch ($type) {
        case "1":
            return "Active";
            break;
        case "0":
            return "Inactive";
            break;
        default:
            return "";
    }
}

if (!function_exists('bn_smtp_info')) {
    function bn_smtp_info()
    {
        $CI =& get_instance();
        return $CI->config->item('bn_smtp_info');
    }
}
