<?php
    if ($_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        die(header( 'location: /lst-dc-baru/auth' ));
    }
?>
