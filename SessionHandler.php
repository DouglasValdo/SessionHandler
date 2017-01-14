<?php

Class Session
{

	public static function call($functionName, $param)
	{

		$sessionID = $param["sessionID"];

		switch($functionName){
			case "write":
					$data = $param["data"];
					return static::$functionName($sessionID, $data);
			case "read":
					return static::$functionName($sessionID);
            case "delete":
                return static::$functionName($sessionID);
			default:
				return "The select Function Name dont exist!!!";
		}
	}

	public static function start()
	{
		if ( php_sapi_name() !== 'cli' ) {
        
        	if ( version_compare(phpversion(), '5.4.0', '>=') ) {
        
            	return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        
        }else {
        
            return session_id() === '' ? FALSE : TRUE;
        
        }
    }

    	return FALSE;
	
	}


	 private static function write($sessionID, $data)
	 {

	 	if(static::start() == false)
	 		session_start();

	 		$_SESSION[$sessionID] = $data;

	 		if(isset($_SESSION[$sessionID])) return true;
	 		
	 		else return false;
	 }

	 private  static function read($sessionID)
	 {
	 	if(static::start() == false)
	 		session_start();

	 		return (!isset($_SESSION[$sessionID])) ? "Session dont Exist": $_SESSION[$sessionID];
	 }

	 public static function close()
	 {

	 	if(static::start())
	 		session_destroy();
	 }

	 public static function status()
	 {
	 	return session_status();
	 } 

	 private  static function delete($sessionID)
	 {
	 	if(static::start() == false)
	 		session_start();

	 		if(isset($_SESSION[$sessionID])){

	 			unset($_SESSION[$sessionID]);

	 			return true;
	 		
	 		}else return false;		
	 }
}