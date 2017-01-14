<?php

require_once "SessionHandler.php";

Session::start();

$data =array(
	"sessionID" => "ana", 

	"data" => [
			"Nome" => "Douglas Valdo",
			"Morada" => "Odivelas Parque",
			"Profissao" => "Programador",
			"Idade" => 24
		]);


var_dump(Session::call("write", $data));