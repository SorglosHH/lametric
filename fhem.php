<?php
# get device to check from app
$name=$_GET['name'];
$device=$_GET['device'];
$icon=$_GET['icon'];
$seckey=$_GET['seckey'];

# Failsave
if ($name == false)
{
    $name="FHEM";
}

if ($icon == false)
{
    $icon="i8919";
}

# your personal security-code
$seckeycheck = "";

# login for local fhem installation
$username = "";
$password = "";

if ($seckey == $seckeycheck){

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "https://127.0.0.1:8083/fhem&cmd=%7BValue%28%22$device%22%29%7D&XHR=1");
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, $username.':'.$password);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 

    if(curl_exec($ch) === false)
    {
	echo 'Curl error: ' . curl_error($ch);
    }
    $errors = curl_error($ch);
    $result = trim(curl_exec($ch));
    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    # Failsave
    if ($result == "")
    {
	$result="No result!";
    }

    $data='{
	"frames": [
	    {
        	"text": "'.$name.': '.$result.'",
        	"icon": "'.$icon.'",
        	"index": 0
    	    }
	]
    }';
    print $data;
}
else {
    $data='{
	"frames": [
	    {
        	"text": "Wrong or missing seckey!",
        	"icon": "'.$icon.'",
        	"index": 0
    	    }
	]
    }';
    print $data;
}
?>
