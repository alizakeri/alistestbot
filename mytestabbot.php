<?PHP
ini_set('error_reporting',E_ALL);

$botToken = "246587313:AAGziCQ_8Zfm7ieslmV6qotCxWCSrcEk9ew";
$website = "https://api.telegram.org/bot".$botToken;

// read incoming info and grab the chatID
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);

$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

switch($message){
	case "/test":
		sendMessage($chatId, "test");
		break;
	case "/hi":
		sendMessage($chatId, "hey there!");
		break;
	default:
		sendMessage($chatId, "default");
}

function sendMessage($chatId,$message){
	
	$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".urlencode($message);
	file_get_contents($url);
	
}

?>

This is test.php File.