<?php
  //This file processes the speech to text input from Twilio and sends it as a query to a Coveo search interface
  header("content-type: text/xml");
  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
  include __DIR__ . '/vendor/rmccue/requests/library/Requests.php';
  require __DIR__ . '/vendor/autoload.php';
?>
<Response>
	<Say>Thank you for the details!</Say>
  <Say>I found relevant documents you might want to check while I connect you to the next available support agent.</Say>
  <Say>I'm sending a personalized link to your phone.</Say>
</Response>

<?php
  //Captures all the metadata provided by Twilio
  $AccountSid = $_POST['AccountSid'];
  $ApiVersion = $_POST['ApiVersion'];
  $CallSid = $_POST['CallSid'];
  $CallStatus = $_POST['CallStatus'];
  $Called = $_POST['Called'];
  $Confidence = $_POST['Confidence'];
  $Direction = $_POST['Direction'];
  $From = $_POST['From'];
  $Language = $_POST['Language'];
  $SpeechResult = $_POST['SpeechResult'];
  $To = $_POST['To'];

  // Creates the Coveo query
  $coveoQuery = 'https://s3.amazonaws.com/static.coveodemo.com/onlinehelp/index.html%23q='.$SpeechResult;

  // Shortens the Coveo Query using Bitly
  $bitlyToken = "YOUR_BITLY_KEY";
  // We use the external library/add-on Requests. It is declared in the composer.json
  $response = Requests::get('https://api-ssl.bitly.com/v3/shorten?access_token='.$bitlyToken.'&longUrl='.$coveoQuery);
  $responseBody = $response->body;
  $decodedJson = json_decode($responseBody, true);
  //var_dump($decodedJson);
  //var_dump($SpeechResult);
  //var_dump($coveoQuery);
  $shortURL = $decodedJson['data']['url'];
  //var_dump($decodedJson['data']['url']);


  // Use the REST API Client to make requests to the Twilio REST API
  use Twilio\Rest\Client;

  // Your Account SID and Auth Token from twilio.com/console
  $sid = 'YOUR_TWILIO_SID';
  $token = 'YOUR_TWILIO_TOKEN';
  $client = new Client($sid, $token);

  // Use the client to do send a text message
  $client->messages->create(
    // the number you'd like to send the message to. We capture it from the caller
    $From,
    array(
        // Our Twilio phone number
        'from' => $To,
        // the body of the text message. We use the shortened url provided by Bitly
        'body' => $shortURL
    )
  );
?>
