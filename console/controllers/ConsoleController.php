<?php

namespace console\controllers;

use common\models\User;
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
            $host = !empty($_ENV['HOST']) ? $_ENV['HOST'] : null;
            $user = !empty($_ENV['MYSQL_USER']) ? $_ENV['MYSQL_USER'] : null;
            $pass = isset($_ENV['MYSQL_PASSWORD']) ? $_ENV['MYSQL_PASSWORD'] : null;
            $db = !empty($_ENV['MYSQL_DATABASE']) ? $_ENV['MYSQL_DATABASE'] : null;
            if (!isset($host) || !isset($user) || !isset($pass) || !isset($db)) {
                echo Yii::t('app', "Variables from \". env\" used for db connection is empty or doesn't exist")."\n";
                return -1;
            }

            try {
                $mysqli = new mysqli($host, $user, $pass, $db);
            } catch (\Exception $e) {
                echo Yii::t('app',"Failed to connect to the \"{dbname}\" database",array('dbname' => $db))."\n";
            }
            if ($e) {
                $mysqli = new mysqli($host, $user, $pass);
                $sql = "CREATE DATABASE IF NOT EXISTS " . $db . " CHARACTER SET utf8 COLLATE utf8_general_ci";
                if ($mysqli->query($sql) === TRUE) {
                    echo Yii::t('app', "Database \"{dbname}\" is successfully created",array('dbname' => $db)) . "\n";
                }
            } else {
                echo Yii::t('app','Database "{dbname}" already exists',array('dbname'=> $db)). "\n";
            }

        }

        return 0;
    }

    /**
     * Set user role to "Admin" by username
     * @param $username
     * @return int
     */
    public function actionSetUserRoleToAdmin($username)
    {
        $user = User::getUserByUsername($username);
        if ($user instanceof User && !empty($user)) {
            if ($user->role == User::ROLE_ADMIN) {
                echo Yii::t("app","User role is already \"admin\"")."\n";
                return 0;
            }
            $user->role = User::ROLE_ADMIN;
            $user->save();
            echo Yii::t("app","User status successfully changed")."\n";
        } elseif ($user == null) {
            echo Yii::t("app","User with same username \"{username}\" doesn't exist",array('username' => $username))."\n";
            return -1;
        }

        return 0;
    }

    /**
     *  Set user role to "user" by username
     * @param $username
     * @return int
     */
    public function actionSetUserRoleToUser($username)
    {
        $user = User::getUserByUsername($username);
        if ($user instanceof User && !empty($user)) {
            if ($user->role == User::ROLE_USER) {
                echo Yii::t("app","User role is already \"user\"")."\n";
                return 0;
            }
            $user->role = User::ROLE_USER;
            $user->save();
            echo Yii::t("app","User status successfully changed")."\n";
        } elseif ($user == null) {
            echo Yii::t("app","User with same username \"{username}\" doesn't exist",array('username' => $username))."\n";
            return -1;
        }

        return 0;
    }
}