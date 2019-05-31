<?php


trait ModelHelper
{
    protected $fieldString;
    protected $valueString;

    public function processFieldsInsert($params) {
        $fields = "";
        $values = "";

        foreach ($params as $fieldName => $value) {
            $fields.= "$fieldName,";
            $values.= ":$fieldName,";
        }

        $fields.=" created_at";
        $values.=":created_at";

        $this->fieldString = $fields;
        $this->valueString = $values;
    }

    public function processFieldsUpdate($params) {
        $fields = "";

        foreach ($params as $fieldName => $value) {
            $fields.= "$fieldName=:$fieldName,";
        }

        $fields.=" updated_at=:updated_at";

        $this->fieldString = $fields;
    }
}
