<?php
require "libs/rb.php";
 R::setup( 'mysql:host=localhost;dbname=reg_db',
        'root', '' );
 session_start();