<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	//This file uses Twilio Speech to Text service. It uses the <Gather> method with speech as input
?>
<Response>
	<Say>Hello. Welcome to Coveo's interactive support.</Say>
	<Gather input="speech" action="hello-coveo-recording.php" method="POST" finishOnKey='#'>
		<Say>While waiting for the next available agent, tell us briefly the reason for your call and press #.</Say>
	</Gather>
</Response>
