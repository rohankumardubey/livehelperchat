<?php

$Module = array( "name" => "Frontpage");

$ViewList = array();
   
$ViewList['default'] = array( 
    'params' => array(),
    'uparams' => array('cid','mid'),
    'functions' => array( 'use' )
);

$ViewList['settings'] = array(
    'params' => array(),
    'uparams' => array('action','csfr'),
    'functions' => array( 'use' )
);

$ViewList['tabs'] = array(
    'params' => array(),
    'uparams' => array('id','idmail'),
    'functions' => array('use'),
    'multiple_arguments' => array('id','idmail')
);

$ViewList['switchdashboard'] = array(
    'params' => array(),
    'uparams' => array('action','csfr'),
    'functions' => array('use')
);

$FunctionList['use'] = array('explain' => 'General frontpage use permission');  
$FunctionList['switch_dashboard'] = array('explain' => 'Allow operator to switch between new/old dashboards');

?>