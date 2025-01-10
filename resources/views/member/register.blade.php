<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
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
			<h4 class="center-align">Register</h4>
			<form method="POST" action="{{ route('signup') }}">
				@csrf
				<div class="row">
					<div class="input-field col s12">
						<input id="name" name="name" type="text" class="validate" value="{{ old('name') }}" required autofocus>
						<label for="name">Name</label>
					</div>
					<div class="input-field col s12">
						<input id="email" name="email" type="email" class="validate" value="{{ old('email') }}" required>
						<label for="email">Email</label>
					</div>
					<div class="input-field col s12">
						<input id="password" name="password" type="password" class="validate" required>
						<label for="password">Password</label>
					</div>
					<div class="col s12 center-align">
						<button class="btn waves-effect waves-light" type="submit" name="action">Register</button>
					</div>
				</div>
			</form>
		</div>
	</main>
	<!-- Import Materialize JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
