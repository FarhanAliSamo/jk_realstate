<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<!-- Import Materialize CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<style>
		body {
			display: flex;
			min-height: 100vh;
			flex-direction: column;
		}

		main {
			flex: 1 0 auto;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.container {
			max-width: 400px;
		}
	</style>
</head>
<body>
	<main>
		<div class="container">
			<h4 class="center-align">Login</h4>
			<form method="POST" action="{{ route('authenticate') }}">
				@csrf
				<div class="row">
					<div class="input-field col s12">
						<input id="email" name="email" type="email" class="validate" value="{{ old('email') }}" required autofocus>
						<label for="email">Email</label>
					</div>
					<div class="input-field col s12">
						<input id="password" name="password" type="password" class="validate" required>
						<label for="password">Password</label>
					</div>
					<div class="col s12">
						<label>
							<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
							<span>Remember me</span>
						</label>
					</div>
					<div class="col s12 center-align">
						<button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
					</div>
					
					<div style="margin-top:20px;">
					    <a href="/register">Register</a> | <a href="/">Forgot Password</a>
					</div>
				</div>
			</form>
		</div>
	</main>
	<!-- Import Materialize JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
