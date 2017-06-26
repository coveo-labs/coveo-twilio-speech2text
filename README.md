# coveo-twilio-speech2text
Leverage Twilio Speech to Text capabilities to generate Coveo queries

## Description

This project simulates a call center and shows how to leverage Twilio speech-to-text capabilities to generate queries, send text messages, and improve the customer experience while waiting for a customer service agent.

## How to build

The project runs on PHP/Apache and leverages Twilio's SDK and the PHP Requests Library (https://github.com/rmccue/Requests).
Composer is also being used to validate and lock dependencies.

You'll need a Twilio Account, Twilio API Key, and Twilio Phone Number. You'll also need a Bitly account and API Key.

### The files

hello-coveo.php : the start file. Plays the initial greeting.
hello-coveo-recording.php:
    - captures the voice recording
    - sends for speech-to-text processing
    - captures additional metadata (like calling number)
    - generates Coveo query
    - creates a short URL using Bitly since the custom URL might be too long for standard SMS

## How to run

Call your Twilio Phone Number
Dictate your question, query
Wait for the text message, open the link on your smartphone

## Available documentation

* [Coveo Search API](https://developers.coveo.com/display/CloudPlatform/Search+API)
* [Twilio PHP SDK](https://www.twilio.com/docs/libraries/php)
* [Twilio Speech-to-Text](https://www.twilio.com/speech-recognition)
* [Bitly API](https://dev.bitly.com/api.html)

## Note
To improve accuracy of search results and mitigate the speech-to-text inconsistencies, Coveo leverages its ML engine to correct the queries. Using the Coveo UABot (https://github.com/coveo/uabot), it is possible to "prime the pump" for ML. 

## Authors

- Gauthier Robe (https://github.com/gforce81)
