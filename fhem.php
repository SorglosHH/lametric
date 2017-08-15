<?php

if (file_exists("auth.php")){
    include "auth.php";
}
else {
    $file=fopen("auth.php","w");
    $string="<?php\n# your personal security-code\n\$seckeycheck = \"1234567890\";\n# login for local fhem installation\n\$username = \"username\";\n\$password = \"password\";\n?>";
    fwrite($file,$string);
    fclose($file);
    if (file_exists("auth.php")){
	include "auth.php";
    }
    else {
	$data='{
	    "frames": [
		{
        	    "text": "File auth.php can\'t be created!",
        	    "icon": "i8919",
        	    "index": 0
    		}
	    ]
	}';
	print $data;
	break;
    }
}

if (($username == "username") or ($password == "password")) {
    $data='{
	"frames": [
	    {
        	"text": "Setup your login data in auth.php!",
        	"icon": "i8919",
        	"index": 0
    	    }
	]
    }';
    print $data;
}
else {
    # get device to check from app
    $name=$_GET['name'];
    $device=$_GET['device'];
    $icon=$_GET['icon'];
    $seckey=$_GET['seckey'];
    $reading1=$_GET['reading1'];
    $reading2=$_GET['reading2'];
    $reading3=$_GET['reading3'];
    $reading4=$_GET['reading4'];
    $reading5=$_GET['reading5'];

    # Failsave
    if ($name == false)
    {
        $name="FHEM";
    }

    if ($icon == false)
    {
        $icon="i8919";
    }

    if ($seckey == $seckeycheck){

        $data='{
	    "frames": [';

	# first frame
	$data=$data.'{
        	    "text": "'.$name.'",
        	    "icon": "'.$icon.'",
        	    "index": 0
    		}';

	# reading1
	if ($reading1 != ""){
	    $ch = curl_init(); 
	    curl_setopt($ch, CURLOPT_URL, "https://127.0.0.1:8083/fhem&cmd=%7BReadingsVal%28%22$device%22,%22$reading1%22,%22%22%29%7D&XHR=1");
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
	    $result1 = trim(curl_exec($ch));
	    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);

	    $ch = curl_init(); 
	    curl_setopt($ch, CURLOPT_URL, "https://127.0.0.1:8083/fhem&cmd=%7BReadingsVal%28%22$device%22,%22".$reading1."_icon%22,%22%22%29%7D&XHR=1");
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
	    $icon1 = trim(curl_exec($ch));
	    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);

	    if (($result1 != "") and ($result1 != "none")){
		$data=$data.',{
		    "text": "'.$result1.'",';
		    if (($icon1 != "")&& ($icon1 != "none")){
			$data=$data.'"icon": "'.$icon1.'",';
		    }
		    $data=$data.'"index": 1
		}';
	    }
	}

	# reading2
	if ($reading2 != ""){
	    $ch = curl_init(); 
	    curl_setopt($ch, CURLOPT_URL, "https://127.0.0.1:8083/fhem&cmd=%7BReadingsVal%28%22$device%22,%22$reading2%22,%22%22%29%7D&XHR=1");
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
	    $result2 = trim(curl_exec($ch));
	    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);

	    $ch = curl_init(); 
	    curl_setopt($ch, CURLOPT_URL, "https://127.0.0.1:8083/fhem&cmd=%7BReadingsVal%28%22$device%22,%22".$reading2."_icon%22,%22%22%29%7D&XHR=1");
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
	    $icon2 = trim(curl_exec($ch));
	    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);

	    if (($result2 != "") and ($result2 != "none")){
		$data=$data.',{
		    "text": "'.$result2.'",';
		    if (($icon2 != "")&& ($icon2 != "none")){
			$data=$data.'"icon": "'.$icon2.'",';
		    }
		    $data=$data.'"index": 2
		}';
	    }
	}

	# reading3
	if ($reading3 != ""){
	    $ch = curl_init(); 
	    curl_setopt($ch, CURLOPT_URL, "https://127.0.0.1:8083/fhem&cmd=%7BReadingsVal%28%22$device%22,%22$reading3%22,%22%22%29%7D&XHR=1");
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
	    $result3 = trim(curl_exec($ch));
	    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);

	    $ch = curl_init(); 
	    curl_setopt($ch, CURLOPT_URL, "https://127.0.0.1:8083/fhem&cmd=%7BReadingsVal%28%22$device%22,%22".$reading3."_icon%22,%22%22%29%7D&XHR=1");
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
	    $icon3 = trim(curl_exec($ch));
	    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);

	    if (($result3 != "") and ($result3 != "none")){
		$data=$data.',{
		    "text": "'.$result3.'",';
		    if (($icon3 != "")&& ($icon3 != "none")){
			$data=$data.'"icon": "'.$icon3.'",';
		    }
		    $data=$data.'"index": 3
		}';
	    }
	}

	# reading4
	if ($reading4 != ""){
	    $ch = curl_init(); 
	    curl_setopt($ch, CURLOPT_URL, "https://127.0.0.1:8083/fhem&cmd=%7BReadingsVal%28%22$device%22,%22$reading4%22,%22%22%29%7D&XHR=1");
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
	    $result4 = trim(curl_exec($ch));
	    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);

	    $ch = curl_init(); 
	    curl_setopt($ch, CURLOPT_URL, "https://127.0.0.1:8083/fhem&cmd=%7BReadingsVal%28%22$device%22,%22".$reading4."_icon%22,%22%22%29%7D&XHR=1");
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
	    $icon4 = trim(curl_exec($ch));
	    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);

	    if (($result4 != "") and ($result4 != "none")){
		$data=$data.',{
		    "text": "'.$result4.'",';
		    if (($icon4 != "")&& ($icon4 != "none")){
			$data=$data.'"icon": "'.$icon4.'",';
		    }
		    $data=$data.'"index": 4
		}';
	    }
	}

	# reading5
	if ($reading5 != ""){
	    $ch = curl_init(); 
	    curl_setopt($ch, CURLOPT_URL, "https://127.0.0.1:8083/fhem&cmd=%7BReadingsVal%28%22$device%22,%22$reading5%22,%22%22%29%7D&XHR=1");
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
	    $result5 = trim(curl_exec($ch));
	    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);

	    $ch = curl_init(); 
	    curl_setopt($ch, CURLOPT_URL, "https://127.0.0.1:8083/fhem&cmd=%7BReadingsVal%28%22$device%22,%22".$reading5."_icon%22,%22%22%29%7D&XHR=1");
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
	    $icon5 = trim(curl_exec($ch));
	    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);

	    if (($result5 != "") and ($result5 != "none")){
		$data=$data.',{
		    "text": "'.$result5.'",';
		    if (($icon5 != "")&& ($icon5 != "none")){
			$data=$data.'"icon": "'.$icon5.'",';
		    }
		    $data=$data.'"index": 5
		}';
	    }
	}

        $data=$data.'	    ]
        }';
	print $data;
    }
    else {
	$data='{
	    "frames": [
		{
        	    "text": "Wrong or missing sec key!",
        	    "icon": "'.$icon.'",
        	    "index": 0
    		}
	    ]
	}';
	print $data;
    }
}
?>
