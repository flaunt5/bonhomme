<?php

/**
 * Created by PhpStorm.
 * User: b21103104
 * Date: 08/03/2017
 * Time: 17:09
 */
class database extends PDO
{
    public function __construct($file = "settings.ini")
    {
        if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');

        $dns = $settings['database']['driver'] .
            ':host=' . $settings['database']['host'] .
            ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
            ';dbname=' . $settings['database']['schema'];

        parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
    }
}