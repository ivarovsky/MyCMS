<?php class api
{
    static function version(){return json_encode(["version"=>"1.0"]);}
    static function generate_token()
	{
		$x = '["Aa","Bb","Cc","Dd","Ee","Rr","Tt","Yy","xX","Cc","Bb","Hh","Jj"]';
		$x = str_shuffle($x);
		$a = rand(0,9999999999999);
		$b = rand(0,9999999999999999);
		return md5(md5($a).md5($b).$x);
	}
    static function validate_token($token)
	{
		$data=R::getRow("SELECT `a`.`id` FROM `api` `a` WHERE `a`.`token`=? AND `a`.`active`=1 ",[$token]);
		if(isset($data['id'])) return $data;
		else return 0;
	}
	
	/*EVENTS*/
		static function getEventData($data)
		{
			if(!isset($data['token'])){return 0; exit();}
			
			if(isset($data['event_id']))
				{
					$d=R::getRow("SELECT * FROM `event` `e` INNER JOIN `api` `a` ON `e`.`team_id`=`a`.`team_id` WHERE `e`.`id` = :event_id AND `a`.`token`= :token;",[":event_id"=>$data['event_id'],":token"=>$data['token']]);
				}
			elseif(isset($data['event_link']))
				{
					$d=R::getRow("SELECT * FROM `event` `e` INNER JOIN `api` `a` ON `e`.`team_id`=`a`.`team_id` WHERE `e`.`link` = :event_link AND `a`.`token`= :token;",[":event_link"=>$data['event_link'],":token"=>$data['token']]);
				}
			if(!count($d))return 0;
			
			else return $d;
				
			
		}
		static function getAllEvents($data)
		{
			
		}
		
		static function getActiveEvents($data)
		{
			
		}
		
		static function getPastEvents($data)
		{
			
		}
		
	/*EVENTS*/
	
	
	/*TICKETS*/
		static function getTicket($data)
		{
			
		}
		
		static function getTicketsOnEvent($data)
		{
			
		}
		
		static function acceptTicket($data)
		{
			
		}
		
		static function declineTicket($data)
		{
			
		}
		
	/*TICKETS*/

	/*SUPPORT*/
	
	/*SUPPORT*/
	
}