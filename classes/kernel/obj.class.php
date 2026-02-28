<?php
class obj
{
	static function get($array = array())
		{
	if(isset($array['path']))
			{
				$req =$array['path'];
				if(isset($array['clsName']))$cls = $array['clsName'];
				else $cls="View";
			}
	else
			{
				$cls="View";
				$subfolder="";
				if(isset($array['subfolder']))$subfolder=$array["subfolder"];
				$req=viewsfolder."{$subfolder}{$array['NameView']}.view.php";	
			}
	if(file_exists($req))
			{
			require_once($req);
			if(!isset($cls)) $cls="";
			$object="{$array['NameView']}$cls";
			if(class_exists($object))
		    	{
				$page=new $object;
					if(isset($array['function']))$f=trim($array['function']); 
					else $f="main";
					
					if(!isset($array['data'])) {$page->$f();}
					else{ $page->$f($array['data']);}
				}
			else echo "class '$object'  not exists!Read Document for fix this problem. ";
			}
	else {echo "<b>OBJECT RENDER ERROR:</b>FILE $req  {$array['NameView']} NOT EXISTS";}
}
	static function View($Name,$data=null)
					{
						$get_data=array("obj"=>"View");
					if(is_array($Name))obj::get($Name);
					else{
					// Дописати сюда парсер який дописує сюда шлях в середині Views і функцію через собачку 
					// base/header/:nameView@function
						if(str_contains($Name,":"))
						{
							$x = explode(":",$Name);
							if(!str_contains($x[0],"/"))$x[0].="/";
							$get_data['subfolder']=$x[0];
							$Name=$x[1];
						}
						if(str_contains($Name,"@"))
						{
							$y = explode("@",$Name);
							$Name=$y[0];
							$get_data['function']=$y[1];
						}	
					if($data!=null) $get_data["data"]=$data;
					$get_data['NameView']=$Name;
					return obj::get($get_data);
						// return obj::get(array("obj"=>"View","NameView"=>$Name));
					}
					}
	//Перелопатити код і всі моделс перенести в Views, прокачати в'ювс, щоб можна було фолдери і функції запускати folders#NameView@Function
	//EXAMPLE: parts/:header@main
	//дописати перевірку функції через собачку ім'я_в'ювю@функція
	//Якщо собачки і функції немає, то ставити_майн 
	static function loadRoute($argument)
		{
			if($argument=="all")
				{
				//	require_once(routesfolder."*.route.php");
					$files = glob(routesfolder."*.php");
					foreach ($files as $f) require_once($f);
				}
			else
				{
					$path=routesfolder.$argument.".route.php";
					if(file_exists($path))require_once($path);
					else return 0;
				}
			
		}//має перевіряти актуальний роут і кидати по ньому або вьюв або котролєр або калбек функцію.
	static function Controller($data){}//В ідеалі має з'єднувати модел і в'ювс
}
