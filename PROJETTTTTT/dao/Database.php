<?php
class Database {
    public static function connect() {
        return new PDO("pgsql:host=localhost;dbname=gun", "postgres", "samed");
    }
}
