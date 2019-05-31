<?php
require 'BaseController.php';
require APP_PATH.'/Libraries/PhoneBookLibrary.php';

class PhoneBook extends BaseController {
    use Validator;

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

    /**
     * @param $request
     */
    public function insert($request) {
        if(($requiredParams = $this->validate(["names", "surnames", "phones", "emails"], $request->params)) !== true)
            return response()->json(["status" => false, "message" => "required params", "error" => $requiredParams]);

        return $this->phoneBookLibrary->insert($request);
    }

    /**
     * @param $request
     */
    public function update($request) {
        if(($requiredParams = $this->validate(["id"], $request->params)) !== true)
            return response()->json(["status" => false, "message" => "required params", "error" => $requiredParams]);

        return $this->phoneBookLibrary->update($request);
    }

    public function delete($request) {
        if(($requiredParams = $this->validate(["id"], $request->params)) !== true)
            return response()->json(["status" => false, "message" => "required params", "error" => $requiredParams]);

        return $this->phoneBookLibrary->delete($request);
    }


    public function search($request) {
        if(($requiredParams = $this->validate(["text"], $request->params)) !== true)
            return response()->json(["status" => false, "message" => "required params", "error" => $requiredParams]);

        return $this->phoneBookLibrary->search($request);
    }
}
