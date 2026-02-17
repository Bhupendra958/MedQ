<?php
/**
 * Shared messages when MySQL is not available.
 * Used by login, register, dashboard, book, admin.
 */
define('MEDQUEUE_DB_ERROR_MSG', 
    'Database not connected. ' .
    'Local (XAMPP): Start MySQL in XAMPP and run setup.sql in phpMyAdmin. ' .
    'Live (Render): In Render Dashboard → your service → Environment, set MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE to your remote MySQL (e.g. remotemysql.com or db4free.net), then import setup.sql in that database.'
);
