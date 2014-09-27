@extends('layout.master')


@section('content')
	<h1>Register an account @ BeALeet.</h1>

	<div class="row">
		<div class="col-xs-12">
			{{ Form::open(array('route' => 'user.store') ) }}

			<div class="form-group">
				{{ Form::label('username', 'Username')}}
				{{ 
					Form::text( 
						'username', 
						null, 
						array(
							'placeholder' => 'Username', 
							'class' => 'form-control'
						) 
					) 
				}}
			</div>

			<div class="form-group">
				{{ Form::label('email', 'Email')}}
				{{ 
					Form::text( 
						'email',
						null,
						array(
							'placeholder' => 'Email', 
							'class' => 'form-control'
						) 
					) 
				}}
			</div>

			<div class="form-group">
				{{ Form::label('email_confirmation', 'Email Confirmation')}}
				{{ 
					Form::text( 
						'email_confirmation',
						null,
						array(
							'placeholder' => 'Email confirmation', 
							'class' => 'form-control'
						) 
					) 
				}}
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Password')}}
				{{ 
					Form::password(
						'password',
						array(
							'placeholder' => 'Password',
							'class' => 'form-control'
						) 
					) 
				}}
			</div>

			<div class="form-group">
				{{ Form::label('password_confirmation', 'Password Confirmation') }}
				{{ 
					Form::password( 
						'password_confirmation', 
						array(
							'placeholder' => 'Password confirmation', 
							'class' => 'form-control'
						) 
					) 
				}}
			</div>

			{{ Form::submit('Register', array('class' => 'btn btn-success register-button')) }}

			{{ Form::close() }}
		</div>
	</div>
@stop