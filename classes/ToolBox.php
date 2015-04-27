<?php

class ToolBox {
    
    function ToolBox() {
        
    }
    
    function safe_string_for_mysql($s) {
        return addslashes(stripslashes(stripslashes(stripslashes($s))));
    }
    
    function safe_post_data() {
        foreach($_POST as $k=>$v) {
            if(!isset($_FILES[$k])) $this->safe_string_for_mysql($v);
        }
    }
}

