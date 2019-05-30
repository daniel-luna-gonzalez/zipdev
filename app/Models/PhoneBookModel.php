<?php


class PhoneBookModel extends Model
{
    protected $table = "phoneBook";

    public function getPhoneBook($id = null) {
        if(is_null($id)){
            $req =  DB::prepare("select *from $this->table");
            $req->execute();
        }
        else{
            $req =  DB::prepare("select *from $this->table WHERE id=:id");
            $req->execute($id);
        }

        return $req->fetch();
    }
}
