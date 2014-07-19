<?php

class RegistrationController extends \BaseController {

	/**
     * Show a form to register the user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

}
