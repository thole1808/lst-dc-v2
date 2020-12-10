<?php
    if ($_SERVER['REQUEST_METHOD']=='POST' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        
    	$this->segment(3);
        die(header( 'location: /lst-dc-baru/auth' ));
    }
?>
