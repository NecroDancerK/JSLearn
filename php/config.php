<?php

$DB_HOST = getenv('DB_HOST') ?: 'localhost';
$DB_PORT = '3306';
$DB_NAME = getenv('DB_NAME') ?: 'JSLearn';
$DB_USERNAME = getenv('DB_USER') ?: 'root';
$DB_PASSWORD = getenv('DB_PASSWORD') ?: '';