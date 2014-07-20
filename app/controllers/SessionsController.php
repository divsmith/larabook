<?php

use Larabook\Forms\SignInForm;

class SessionsController extends \BaseController {

    /**
     * @var SignInForm
     */
    private $signInForm;

    public function __construct(SignInForm $signInForm)
    {
        $this->signInForm = $signInForm;

        $this->beforeFilter('guest');
    }

	/**
	 * Show the form for signing in.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $formData = Input::only('email', 'password');

        $this->signInForm->validate($formData);

        if( Auth::attempt($formData) )
        {
            Flash::message('Welcome back!');
            return Redirect::intended('statuses');
        }
	}

}
