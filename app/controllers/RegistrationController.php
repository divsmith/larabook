<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Larabook\Core\CommandBus;

class RegistrationController extends \BaseController {

    use CommandBus;

    /**
     * @var RegistrationForm
     */
    private $registrationForm;

    /**
     * @param RegistrationForm $registrationForm
     */
    public function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;

        $this->beforeFilter('guest');
    }
    
	/**
     * Show a form to register the user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

    /**
     * Create a new Larabook user
     *
     * @return string
     */
    public function store()
    {
        $this->registrationForm->validate(Input::all());

        extract(Input::only('username', 'email', 'password'));

        $command = new RegisterUserCommand($username, $email, $password);

        $user = $this->execute($command);

        Auth::login($user);

        Flash::message('Glad to have you as a new Larabook member!');

        return Redirect::home()->with('flash_message', 'Welcome aboard!');
    }

}
