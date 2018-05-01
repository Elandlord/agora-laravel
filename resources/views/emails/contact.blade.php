<!DOCTYPE html>

<html>

<head>

	<title></title>

</head>

<body>

	<h1>Beste medewerker van Agora,</h1>
	<br/>
	<p>Zojuist heeft {{ $user->name }} geprobeerd contact op te nemen met ons via het contactformulier op de website.</p>

	<p>De persoon heeft de volgende gegevens achtergelaten: </p>

	<p>
	Naam: {{ $user->name }} <br/>
	Emailadres: {{ $user->email }} <br/>
	Telefoonnummer: {{ $user->phone }} <br/>
	Bericht: {{ $user->message }}
	</p>


	<p>Met vriendelijke groet,</p>

	<p>MEN Technology & Media</p>

</body>

</html>