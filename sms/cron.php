<?php
include('conn.php');

$query = mysql_query("SELECT id,phone_number,week_progress FROM users WHERE status=1");
//print_r($query);
//exit();

while ($row = mysql_fetch_array($query)){

$phone_number = $row['phone_number'];
$progress = $row['week_progress'];
$user_id = $row['id'];
//$progress = $progress-2;
$link = "http://cpdprimary.com/week".$progress;
$msg = "Welcome to week ".$progress.". Please access course material via the following link: ".$link;

clickatel_send($msg, $phone_number);
echo $phone_number.", Message:".$msg;
echo "<br>";
update_course_progress($progress, $user_id);
}

//update progress

function update_course_progress($progress,$user_id){
					$progress=$progress+1;
				 	$qu = mysql_query("UPDATE users SET week_progress = $progress WHERE id=$user_id");
				}

function clickatel_send($msg,$phone){
	
	// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://api.clickatell.com/http/sendmsg?user=lenykoskey&password=FOHeKNbAJPVJVK&api_id=3456895&to='.$phone.'&text='.$msg,
    CURLOPT_USERAGENT => 'Meet'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);

print_r($resp);
	
	
	
}


?>