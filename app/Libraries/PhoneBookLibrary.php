<?php

class PhoneBookLibrary
{
    protected $phoneBookModel;
    public function __construct()
    {
        $this->phoneBookModel = new PhoneBookModel();
    }

    /**
     * @param $request
     */
    public function index($request) {
        try {
            $entries = null;

            $entries = $this->phoneBookModel->getPhoneBook($request->params['id']);

            if(!count($entries) > 0)
                return response()->json(["status" => true, "message" => "No entries"]);

            return response()->json($entries);


        } catch (Exception $e) {
            logger(__CLASS__." ".__METHOD__." ".$e->getMessage());
            response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    /**
     * @param $request
     */
    public function insert($request) {
        try {
            $full = $this->getFulltext($request->params);

            $request->params["full"] = $full;

            $res = $this->phoneBookModel->insertPhoneBook($request->params);

            if($res!== true)
                return response()->json(["status" => false, "message" => "error inserting data. ". $res], 501);

            return response()->json(["status" => false, "message" => "data inserted successfully"]);
        } catch (Exception $e) {
            logger(__CLASS__." ".__METHOD__." ".$e->getMessage());
            response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    /**
     * @param $request
     */
    public function update($request) {
        try {
            $id = $request->params["id"];

            unset($request->params["id"]);

            $userData = $this->phoneBookModel->getPhoneBook($id);

            if(!$userData)
                return response()->json(["status" => false, "message" => "entry not found"]);


            $paramsFulltext = [];

            foreach($userData as $key => $value) {
                if(isset($request->params[$key])) {
                    if(is_array($request->params[$key])) {
                        $request->params[$key] = json_encode($request->params[$key]);
                    }


                    $paramsFulltext[$key] = $request->params[$key];
                }
                else
                    $paramsFulltext[$key] = $value;
            }

            $full = $this->getFulltext($paramsFulltext);

            $request->params["full"] = $full;

            $res = $this->phoneBookModel->update($request->params, $id);

            if($res!== true)
                return response()->json(["status" => false, "message" => "error updating data. ". $res], 501);

            return response()->json(["status" => true, "message" => "entry updated successfully"]);
        }
        catch (PDOException $e) {
            logger(__CLASS__." ".__METHOD__." ".$e->getMessage());
            response()->json(["status" => false, "message" => $e->getMessage()]);
        }
        catch (Exception $e) {
            logger(__CLASS__." ".__METHOD__." ".$e->getMessage());
            response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    /**
     * @param $request
     */
    public function delete($request) {
        $id = $request->params["id"];

        $res = $this->phoneBookModel->delete($id);

        if($res!== true)
            return response()->json(["status" => false, "message" => "error deleting data. ". $res], 501);

        return response()->json(["status" => true, "message" => "entry deleted successfully"]);
    }

    /**
     * @param $request
     */
    public function search($request) {
        if(strlen($request->params["text"]) == 0)
            return response()->json(["status" => "can't search an empty text"]);

        $res = $this->phoneBookModel->search($request->params);

        if(!is_array($res))
            return response()->json(["status" => false, "message" => "error searching data. ". $res], 501);

        return response()->json($res);
    }

    /**
     * @param $params
     * @return string
     */
    private function getFulltext($params) {
        $full = '';

        foreach ($params as $key => $value) {
            if(is_array($value))
                $full.=$this->getFulltext($value)." ";
            else
                $full.=$value." ";
        }


        return trim($full);
    }
}
