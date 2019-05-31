<?php


trait Validator
{
    public function validate(array $params, $requestParams) {
        $missingFields = [];

        foreach ($params as $requiredField) {
            if(!isset($requestParams[$requiredField]))
                $missingFields[] = $requiredField;
        }

        return (count($missingFields) > 0) ? $missingFields : true;
    }
}
