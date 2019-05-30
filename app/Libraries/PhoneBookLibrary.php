<?php

class PhoneBookLibrary
{
    protected $phoneBookModel;
    public function __construct()
    {
        $this->phoneBookModel = new PhoneBookModel();
    }

    public function index($request) {
        try {
            $entries = null;

            $entries = $this->phoneBookModel->getPhoneBook($request->params['id']);

            if(count($entries))
                return response()->json(["status" => true, "message" => "No entries"]);

            return response()->json($entries);


        } catch (Exception $e) {
            logger(__CLASS__." ".__METHOD__." ".$e->getMessage());
            throw $e;
        }
    }
}
