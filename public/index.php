<html>
<head>
	<title>Docker based project skeleton</title>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<header>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h1>Docker based project skeleton <i class="material-icons">directions_bike</i></h1>
				</div>
			</div>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<table>
						<thead>
							<tr>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>PHP</td>
								<td><?php echo phpversion(); ?></td>
							</tr>
							<tr>
								<td>MySQL</td>
								<td>
									<?php
									$mysqli = new mysqli('container_dbhost', 'dbuser', 'dbpass', 'dbname');

									if ($mysqli->connect_errno) {
										echo "Errno: " . $mysqli->connect_errno . "<br>" . $mysqli->connect_error . "\n";
									} else {
										echo $mysqli->client_info;
									}
									?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<h2>Send test email:</h2>
					<?php
						if ( 'send_email' == filter_input( INPUT_POST, 'send_email', FILTER_SANITIZE_STRING ) ) {
							$email           = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_STRING );
							$email_subject   = filter_input( INPUT_POST, 'email_subject', FILTER_SANITIZE_STRING );
							$email_body      = filter_input( INPUT_POST, 'email_body', FILTER_SANITIZE_STRING );
							$sendmail_result = mail( $email, $email_subject, $email_body );
							if ( $sendmail_result ) {
								?><p>Test mail has been sent successfully!</p><?php
							} else {
								?><p><b>Error!</b> Test mail has <b>not</b> been sent!</p><?php
							}
						}
					?>
					<form action="#" method="post">
						<input type="hidden" name="send_email" value="send_email">
						<div class="row">
							<div class="input-field col s12">
								<label for id="email">Email to:</label>
								<input id="email" type="email" name="email" class="validate" required value="">
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<label for="email_subject">Email Subject:</label>
								<input id="email_subject" type="text" name="email_subject" class="validate" required value="Test subject">
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<label for="email_body">Email Body:</label>
								<textarea id="email_body" name="email_body" class="materialize-textarea validate" required>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
								</textarea>
							</div>
						</div>
						<div class="row">
							<button class="btn waves-effect waves-light" type="submit" name="action">Submit
								<i class="material-icons right">send</i>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
	<footer class="">
		<div class="container">
			<div class="row">
				<div class="col s12">
					<div class="copyright-text">
						<p>
							<center>Copyright ©<?php echo date( 'Y' ); ?> Developed by
								<a href="https://github.com/kuflievskiy" target="_blank" class="text-danger">Kuflievskiy Aleksey</a>
							</center>
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>
