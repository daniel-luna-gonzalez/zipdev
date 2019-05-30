<?php
require 'BaseController.php';
require APP_PATH.'/Libraries/PhoneBookLibrary.php';

class PhoneBook extends BaseController {

    protected $phoneBookLibrary;

    public function __construct()
    {
        $this->phoneBookLibrary = new PhoneBookLibrary();
    }

    /**
     * @param $request
     */
    public function index($request) {
        return $this->phoneBookLibrary->index($request);
    }
}
