<?php

use Bealeet\Users\AddUserGameCommand;
use Bealeet\Forms\RegistrationForm;
use Bealeet\Registration\RegisterUserCommand;
use Bealeet\Games\ChangeUserGamesCommand;
use Bealeet\Users\AddUserSkillCommand;
use Bealeet\Users\ChangeUserSearchTeamStatusCommand;
use Bealeet\Users\PrimaryUserGameCommand;
use Bealeet\Users\RemoveUserGameCommand;
use Bealeet\Users\RemoveUserSkillCommand;
use Bealeet\Users\User;
use Bealeet\Users\UserRepository;

class UsersController extends \BaseController {

	protected $userRepository;
	private $registrationForm;


	/**
	 * @param UserRepository $userRepository
	 * @param RegistrationForm $registrationForm
	 */
	public function __construct(UserRepository $userRepository, RegistrationForm $registrationForm) {
		$this->beforeFilter('guest', [
			'only' => 'create, store'
		]);

		$this->registrationForm = $registrationForm;
		$this->userRepository = $userRepository;
	}

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->registrationForm->validate( Input::all() );

		extract(Input::only('username', 'email', 'password'));
		$command = new RegisterUserCommand($username, $email, $password);

		$user = $this->execute($command);

		Auth::login($user);

		Flash::success('Glad to have you as a new Bealeet member!');

        return Redirect::home();
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(Auth::user()->id == $id)
		{
			return Redirect::route('profile');
		}

		$user = $this->userRepository->findById($id);
		return View::make('users.show')->withUser($user);
	}

	/**
	 * Display the current user profile.
	 * GET /profile
	 *
	 * @return mixed
	 */
	public function profile()
	{
		return View::make('users.profile');
	}

	/**
	 * Update current users profile
	 * POST /profile
	 *
	 * @return mixed
	 */
	public function profile_update()
	{
		$user = Auth::user();

		$input = Input::only(['age', 'description', 'location']);

		$user->age = $input['age'];
		$user->location = $input['location'];
		$user->description = $input['description'];
		if($user->save()) {
			Flash::success('Your profile was updated!');
			return View::make('users.profile');
		} else {
			Flash::error('Your profile could not be svaed!');
			return View::make('users.profile');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 *
	 */
	public function primary_game()
	{
		$input = Input::all();

		$this->execute(PrimaryUserGameCommand::class, $input);

		$response['success'] = true;
		$response['message'] = 'Game was successfully set as primary!';

		return Response::json($response);
	}

	/**
	 * @return mixed
	 */
	public function change_games()
	{
		$input = Input::all();

		if( isset( $input['deselected'] ) ) {
			$this->execute(RemoveUserGameCommand::class, $input);

			$response['success'] = true;
			$response['message'] = 'Game was successfully deleted!';
		}
		else if( isset( $input['selected'] ) )
		{
			$this->execute(AddUserGameCommand::class, $input);

			$response['success'] = true;
			$response['message'] = 'Game was successfully added!';
		}

		return Response::json($response);
	}

	/**
	 * Change user skill status
	 *
	 * @return mixed
	 */
	public function change_skill()
	{
		$input = Input::all();

		if( isset( $input['deselected'] ) ) {
			$this->execute(RemoveUserSkillCommand::class, $input);

			$response['success'] = true;
			$response['message'] = 'Skill was successfully deleted!';
		}
		else if( isset( $input['selected'] ) )
		{
			$this->execute(AddUserSkillCommand::class, $input);

			$response['success'] = true;
			$response['message'] = 'Skill was successfully added!';
		}

		return Response::json($response);
	}

	/**
	 * Sets the users search team status from " Input isSearching "
	 * PUT /users/search_team/status
	 *
	 * @return mixed
	 */
	public function search_team_status()
	{
		$input = Input::all();

		$user = $this->execute(ChangeUserSearchTeamStatusCommand::class, $input);

		// Build up return message
		if($user->searching_team)
			$response['message'] = 'You are now searching for a team!';
		else
			$response['message'] = 'You are no longer searching for a team!';

		return Response::json($response);
	}


	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}