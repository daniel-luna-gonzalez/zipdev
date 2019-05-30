<?php

class Logger
{
    protected $logPath = BASE_PATH."/logs/register.log";

    public function __construct()
    {

        if(!file_exists($this->logPath)) {
            mkdir(dirname($this->logPath));
            touch($this->logPath);
        }

    }

    public function write($text) {
        if(is_array($text))
            $text = json_encode($text);

        $fp = fopen($this->logPath, 'a+');
        fwrite($fp, $text);
        fwrite($fp, PHP_EOL);
        fclose($fp);
    }
}
