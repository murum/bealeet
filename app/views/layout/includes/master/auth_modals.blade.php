<div class="bealeet-user-modal"> <!-- this is the entire modal form, including the background -->
		<div class="bealeet-user-modal-container"> <!-- this is the container wrapper -->
			<ul class="bealeet-switcher">
				<li><a href="#0">Sign in</a></li>
				<li><a href="#0">New account</a></li>
			</ul>

			<div id="bealeet-login"> <!-- log in form -->
			{{ Form::open(['route' => 'login', 'class' => 'bealeet-form']) }}
					<p class="fieldset">
						{{ Form::label('email', 'E-mail', ['class' => 'image-replace bealeet-email']) }}
            {{ Form::email('email', null, ['class' => 'full-width has-padding has-border', 'placeholder' => 'E-mail']) }}
					</p>

					<p class="fieldset">
						{{ Form::label('password', 'Password', ['class' => 'image-replace bealeet-password']) }}
            {{ Form::text('password', null, ['class' => 'full-width has-padding has-border', 'placeholder' => 'Password']) }}
						<a href="#0" class="hide-password">Hide</a>
					</p>

					<p class="fieldset">
						<input type="checkbox" id="remember-me" checked>
						<label for="remember-me">Remember me</label>
					</p>

					<p class="fieldset">
					{{ Form::submit('Login', ['class' => 'btn btn-info full-width']) }}
					</p>
				{{ Form::close() }}

				{{-- <p class="bealeet-form-bottom-message"><a href="#0">Forgot your password?</a></p> --}}
			</div> <!-- bealeet-login -->

			<div id="bealeet-signup"> <!-- sign up form -->
        {{ Form::open(['route' => 'register', 'class' => 'bealeet-form']) }}
					<p class="fieldset">
						{{ Form::label('username', 'Username', ['class' => 'image-replace bealeet-username']) }}
						{{ Form::text('username', null, ['class' => 'full-width has-padding has-border', 'placeholder' => 'Username']) }}
					</p>

					<p class="fieldset">
						{{ Form::label('email', 'E-mail', ['class' => 'image-replace bealeet-email']) }}
						{{ Form::email('email', null, ['class' => 'full-width has-padding has-border', 'placeholder' => 'E-mail']) }}
					</p>

					<p class="fieldset">
					  {{ Form::label('email_confirmation', 'E-mail Confirmation', ['class' => 'image-replace bealeet-email']) }}
            {{ Form::email('email_confirmation', null, ['class' => 'full-width has-padding has-border', 'placeholder' => 'E-mail confirmation']) }}
          </p>

					<p class="fieldset">
						{{ Form::label('password', 'Password', ['class' => 'image-replace bealeet-password']) }}
						{{ Form::text('password', null, ['class' => 'full-width has-padding has-border', 'placeholder' => 'Password']) }}
						<a href="#0" class="hide-password">Hide</a>
					</p>

					<p class="fieldset">
					  {{ Form::label('password_confirmation', 'Password Confirmation', ['class' => 'image-replace bealeet-password']) }}
					  {{ Form::text('password_confirmation', null, ['class' => 'full-width has-padding has-border', 'placeholder' => 'Password confirmation']) }}
            <a href="#0" class="hide-password">Hide</a>
          </p>

					<p class="fieldset">
					  {{ Form::submit('Create Account', ['class' => 'btn btn-info full-width']) }}
					</p>
			{{ Form::close() }}

				<!-- <a href="#0" class="bealeet-close-form">Close</a> -->
			</div> <!-- bealeet-signup -->

			<div id="bealeet-reset-password"> <!-- reset password form -->
				<p class="bealeet-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

				<form class="bealeet-form">
					<p class="fieldset">
						<label class="image-replace bealeet-email" for="reset-email">E-mail</label>
						<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
					</p>

					<p class="fieldset">
						<input class="btn btn-info full-width has-padding" type="submit" value="Reset password">
					</p>
				</form>

				<p class="bealeet-form-bottom-message"><a href="#0">Back to log-in</a></p>
			</div> <!-- bealeet-reset-password -->
			<a href="#0" class="bealeet-close-form">Close</a>
		</div> <!-- bealeet-user-modal-container -->
	</div> <!-- bealeet-user-modal -->