<?php


class Response
{
    protected $response;

    /**
     * @param array $response
     * @param int $statusCode
     */
    function json($response, $statusCode = 200) {
        $this->response = $response;

        header('Content-type: application/json');

        http_response_code($statusCode);

        echo json_encode($this->response);
    }
}
