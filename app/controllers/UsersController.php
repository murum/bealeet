<?php

use Bealeet\Forms\RegistrationForm;
use Bealeet\Registration\RegisterUserCommand;
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
		$user = $this->userRepository->findById($id);
		return View::make('users.show')->withUser($user);
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