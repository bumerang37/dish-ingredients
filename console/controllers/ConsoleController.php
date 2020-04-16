<?php

namespace console\controllers;

use Dotenv\Dotenv;
use mysqli;
use Yii;
use yii\console\Controller;

class ConsoleController extends Controller
{
    /**
     * Create database connection if it doesn't exist. Database name sets from .env
     * @return int
     */
    public function actionCreateDb()
    {
        $app_path = dirname(\Yii::getAlias('@app'));
        $dotenv = Dotenv::createImmutable($app_path);
        $dotenv->load();

        if (!empty($_ENV)) {
            $host = isset($_ENV['HOST']) ? $_ENV['HOST'] : null;
            $user = isset($_ENV['MYSQL_USER']) ? $_ENV['MYSQL_USER'] : null;
            $pass = isset($_ENV['MYSQL_PASSWORD']) ? $_ENV['MYSQL_PASSWORD'] : null;
            $db = isset($_ENV['MYSQL_DATABASE']) ? $_ENV['MYSQL_DATABASE'] : null;
            if (!isset($host) || !isset($user) || !isset($pass) || !isset($db)) {
                echo "Variables from \".env\" used for db connection is empty or doesn't exist\n";
                return -1;
            }

            try {
                $mysqli = new mysqli($host, $user, $pass, $db);
            } catch (\Exception $e) {
                echo "Failed to connect to the: \"" . $db . "\" database \n";
            }
            if ($e) {
                $mysqli = new mysqli($host, $user, $pass);
                $sql = "CREATE DATABASE IF NOT EXISTS " . $db . " CHARACTER SET utf8 COLLATE utf8_general_ci";
                if ($mysqli->query($sql) === TRUE) {
                    echo "Database  " . $db . " is successfully created" . "\n";
                }
            } else {
                echo "Database " . $db . " already exists \n";
            }

        }

        return 0;
    }
}