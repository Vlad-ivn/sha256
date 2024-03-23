<!DOCTYPE html>
<html >
<head>
  	<meta charset="UTF-8">
  	<title>DailyUI Challenge 001</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
	<header>
		<h1>
			<a href="#">
				<img src="http://tfgms.com/sandbox/dailyui/logo-1.png" alt="Authentic Collection">
			</a>
		</h1>
	</header>

	<h1 class="text-center sign__up">Registration</h1>
	<form action="/vendor/register.php" method="post" class="registration-form">
		<label class="col-one-half">
			<span class="label-text">First Name</span>
			<input type="text" name="firstName">
		</label>
		<label class="col-one-half">
			<span class="label-text">Last Name</span>
			<input type="text" name="lastName">
		</label>
		<label>
			<span class="label-text">Email</span>
			<input type="text" name="email">
		</label>
		<label class="password">
			<span class="label-text">Password</span>
			<button class="toggle-visibility" title="toggle password visibility" tabindex="-1">
				<span class="glyphicon glyphicon-eye-close"></span>
			</button>
			<input type="password" name="password">
		</label>
		<h1 class="href__h1 " style="font-size: 0.8em;">У вас уже есть аккаунт?  - <a href="index.php">Авторизируйтесь</a></h1>
		<div class="text-center" style="margin-top: 5%;">
			<button class="submit" name="register" type="submit" >Войти</button>
		</div>
	</form>


	
</div>

</body>
</html>
