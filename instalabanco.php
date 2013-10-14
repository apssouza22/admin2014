<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');

use Respect\Relational\Db;
use Respect\Relational\Mapper;
se();
require_once './vendor/autoload.php';

$connection = new PDO('sqlite:datasources/db.sq3');
$db         = new Db($connection);
$mapper     = new Mapper($db);

$db->createTable('authors', [
	'id    INTEGER PRIMARY KEY',
	'name  VARCHAR(32)',
	'email TEXT'
])->exec();

$db->createTable('articles', [
	'id         INTEGER PRIMARY KEY',
	'authors_id INTEGER REFERENCES authors (id)',
	'title      VARCHAR(32)',
	'text       TEXT'
])->exec();

$gaigalas = (object) [
	'id'    => null, // id should be null for new objects to be persisted
	'name'  => 'Alexandre Gaigalas',
	'email' => 'alexandre@gaigalas.net'
];

$john = (object) [
	'id'    => null, 
	'name'  => 'John Doe',
	'email' => 'john@example.com'
];

$about = (object) [
	'id'         => null,
	'authors_id' => $gaigalas, // You can pass the entire object
	'title'      => 'About',
	'text'       => 'Abou this.'
];

$hello = (object) [
	'id'         => null,
	'authors_id' => $gaigalas, // You can pass the entire object
	'title'      => 'Hello',
	'text'       => 'Hello World.'
];

// Persist John first
$mapper->authors->persist($john);

// Gaigalas will be persisted with $articleAndAuthor

// Handles an article with an author inside.
$articleAndAuthor = $mapper->articles($mapper->authors);
$articleAndAuthor->persist($about);
$articleAndAuthor->persist($hello);

$mapper->flush(); // Mapper must be flushed to persist operations

print_r($articleAndAuthor->fetchAll());
