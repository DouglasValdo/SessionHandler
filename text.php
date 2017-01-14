<?php


require_once "SessionHandler.php";

Session::start();

$sessionID = array('sessionID' => "ana");

$user = Session::call("read", $sessionID);

echo "<pre>";
print_r($user);
echo "</pre>";

Session::call("delete", $param = array("sessionID" => "ana"));
