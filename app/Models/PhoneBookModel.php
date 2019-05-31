<?php


class PhoneBookModel extends Model
{
    use ModelHelper;

    protected $table = "phoneBook";

    /**
     * @param null $id
     * @return mixed
     */
    public function getPhoneBook($id = null) {
        if(is_null($id)){
            $req =  DB::prepare("select *from $this->table");
            $req->execute();
            $resl = [];

            while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                $resl[] = $row;
            }

            return $resl;
        }
        else{
            $req =  DB::prepare("select *from $this->table WHERE id=:id");
            $req->execute(["id" => $id]);
            return $req->fetch(PDO::FETCH_ASSOC);
        }

    }

    /**
     * @param array $params
     * @return array|bool
     */
    public function insertPhoneBook(array $params) {

        $this->processFieldsInsert($params);

        $query = "INSERT INTO $this->table ($this->fieldString) VALUES ($this->valueString)";

        $res = DB::prepare($query);

        $params["phones"] = json_encode($params["phones"]);
        $params["emails"] = json_encode($params["emails"]);
        $params["created_at"] = date("Y-m-d H:m:s");

        if(!$res->execute($params))
            return $res->errorInfo();
        else
            return true;

    }

    /**
     * @param array $params
     * @param $id
     * @return array|bool
     */
    public function update(array $params, $id) {
        $this->processFieldsUpdate($params);

        $query = "UPDATE $this->table SET $this->fieldString where id=:id";

        $params["updated_at"] = date("Y-m-d H:m:s");

        $res = DB::prepare($query);

        $params["id"] = $id;

        if(!$res->execute($params))
            return $res->errorInfo();
        else
            return true;

    }

    /**
     * @param $id
     * @return array|bool
     */
    public function delete($id) {
        $query = "DELETE FROM $this->table where id=:id";

        $res = DB::prepare($query);

        if(!$res->execute(["id" => $id]))
            return $res->errorInfo();
        else
            return true;
    }

    public function search($params) {
        $query = "SELECT  *FROM $this->table WHERE MATCH(full) AGAINST ('". $params["text"] ."*' IN BOOLEAN MODE)";

        $res = DB::prepare($query);

        if(!$res->execute())
            return $res->errorInfo();

        $data = [];

        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return $data;
    }
}
