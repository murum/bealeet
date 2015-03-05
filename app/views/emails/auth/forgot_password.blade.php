<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">

        <title>
            Be A Leet - Reset your password
        </title>

        {{ HTML::style('/css/libs.css') }}
        {{ HTML::style('/css/main.css?v=0_1') }}
	</head>
	<body>
		<h2>Password Reset</h2>

		<div>
			To reset your password, complete this form: <a href="{{ URL::to('password/reset', array($password_token->token)) }}">{{ URL::to('password/reset', array($password_token->token)) }}</a>.<br/>
			This link will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.
		</div>
	</body>
</html>
