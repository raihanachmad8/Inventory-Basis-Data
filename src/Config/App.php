<?php

class APP {
    public static function Env(string $key): string
    {
        $env = parse_ini_file(__DIR__ . '/../../.env');
        return $env[$key];
    }   
}