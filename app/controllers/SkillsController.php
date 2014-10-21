<?php

use Bealeet\Skills\AddSkillPointCommand;
use Bealeet\Users\User;
use Bealeet\Users\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

class SkillsController extends BaseController {

	/**
	 * @var UserRepository
	 */
	private $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * @param $user_id
	 */
	public function store($user_id)
	{
		$user = User::findOrFail($user_id);

		$input = Input::only('skillId');
		$input = array_add($input, 'user', $user);

		if( Auth::user()->canAddSkillPoint($user, $input['skillId']))
		{
			$this->execute(AddSkillPointCommand::class, $input);

			$response['success'] = true;
			$response['message'] = 'Skillpoint was successfully added.';

			return Response::json($response);
		} else {
			throw new BadCredentialsException('You\re not allowed to add that skillpoint on that user.');
		}
	}

}
