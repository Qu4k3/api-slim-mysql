<?php
//Load Slim Framework
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader(); 

//Create new Slim instance
$app = new \Slim\Slim(array(
    'debug' => true
));

//404 Route programing
$app->notFound(function () {
	global $app;
	$app->contentType('application/json');
	$response = '{"code": "404", "msg": "This route does not exist!"}';
	echo $response;
});

$servername = "localhost";
$username = "root";
$password = "";
$db = "M07_practicaSlim";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Routing
/* OK */$app->get('/', 'root');					// a
/* OK *//* 404 not found */						// b
/* OK */$app->get('/getAll', 'getAll');			// c
/* OK */$app->get('/getPublic', 'getPublic');	// d
/* OK */$app->post('/getOne', 'getOne');		// e
/* OK */$app->put('/insert', 'insert');			// f
/* OK */$app->delete('/remove', 'remove');		// g
/* A MEJORAR */$app->post('/getAllWithTag', 'getAllWithTag');		// h
/* A MEJORAR */$app->post('/addTagOnNote', 'addTagOnNote');			// i
/* A MEJORAR */$app->delete('/deleteTagOnNote', 'deleteTagOnNote');	// j
/*  */$app->post('/updateNote', 'updateNote');		// k
/* OK */$app->post('/flipPrivate', 'flipPrivate');	// l

/*
put -> create
get -> read
post -> update
delete -> delete
*/

// USER AUTHENTICATION

function root()
{
	global $app;
	$app->contentType('application/json');
	$response = '{"code": "200", "msg": "LSNote API v0.1"}';
	echo $response;
}

function getAll() 
{
	//Global used vars
	global $app;
	global $conn;
	global $db;
	
	//JSON Response
	$app->contentType('application/json');
	
	//Query
	$sql = "SELECT * FROM notes WHERE user='LSAlumne'";
	
	//Execute query
	$result = $conn->query($sql);

	//Response building
	$response = "";
	if($result->num_rows == 0){
		$response = '{"code": "204", "msg": "No notes found"}';
	} else {
		$response = '{"code": "200", "resp":';
		$response = $response."[";
		while($row = $result->fetch_assoc()) {
	    	$response = $response . json_encode($row).",";
		}
		$response = substr($response, 0,-1)."]";
		$response = $response . "}";
	}

	echo $response;
}

function getPublic()
{
	//Global used vars
	global $app;
	global $conn;
	global $db;
	
	//JSON Response
	$app->contentType('application/json');
	
	//Query
	$sql = "SELECT * FROM notes WHERE private = '0'";
	
	//Execute query
	$result = $conn->query($sql);

	//Response building
	$response = "";
	if($result->num_rows == 0){
		$response = '{"code": "204", "msg": "No notes found"}';
	} else {
		$response = '{"code": "200", "resp":';
		$response = $response."[";
		while($row = $result->fetch_assoc()) {
	    	$response = $response . json_encode($row).",";
		}
		$response = substr($response, 0,-1)."]";
		$response = $response . "}";
	}

	echo $response;
}

function getOne()
{
	//Global used vars
	global $app;
	global $conn;
	global $db;

	//JSON Response
	$app->contentType('application/json');
	
	//Get ID from GET parameters
	$paramValue = $app->request()->post('id');

	//Query
	$sql = "SELECT * FROM notes where id = ".$paramValue;

	//Execute query
	$result = $conn->query($sql);

	//Response building
	$response = "";
	if($result->num_rows == 0){
		$response = '{"code": "204", "msg": "No notes found"}';
	} else {
		$response = '{"code": "200", "resp":';
		$response = $response."[";
		while($row = $result->fetch_assoc()) {
	    	$response = $response . json_encode($row).",";
		}
		$response = substr($response, 0,-1)."]";
		$response = $response . "}";
	}

	echo $response;
}

function insert()
{
	//Global used vars
	global $app;
	global $conn;
	global $db;

	//JSON Response
	$app->contentType('application/json');

	//Get atributes of the JSON document from POST parameters
	//params() -> primero busca variables PUT, luego POST, luego GET
	
	//$paramValue = $app->request()->params('title', 'content', 'private', 'tags', 'book', 'createData', 'lastModificationData');

	$title = $app->request()->params('title');
	$content = $app->request()->params('content');
	$tags = array();
	$tags = $app->request()->params('tags');
	$private = $app->request()->params('private');
	$privatebool = ($private === 'true');
	$book = $app->request()->params('book');


	$document = array('title' => $title,
					'content' => $content,
					'private' => $privatebool,
					'tags' => $tags, 
					'book' => 'LSLlibreta',
					'user' => 'LSAlumne',
					'createData' => new DateTime('now', new DateTimeZone('Europe/Madrid')),
					'lastModificationData' => null
					);

	//Insert a document
	$sql = "INSERT INTO notes (title, content, private, tags, book, user, createData, lastModificationData) VALUES ";

	$result = $conn->query($sql);

	// no hago comprobación si se inserta correctamente o no !!

	$response = '{"code": "200", "msg": "Note inserted!"}';

	echo $response;

	//+info: http://php.net/manual/en/mongocollection.insert.php
}

function remove()
{
	//Global used vars
	global $app;
	global $conn;
	global $db;
	global $notes;

	//JSON Response
	$app->contentType('application/json');

	//Get ID from DELETE parameters
	//params() -> primero busca variables PUT, luego POST, luego GET
	$paramValue = $app->request()->params('_id');

	//Remove a document
	$notes->remove(array('_id' => new MongoId($paramValue)));

	// no hago comprabación si se borra correctamente o no !!

	$response = '{"code": "200", "msg": "Note deleted!"}';

	echo $response;

	//+info: http://php.net/manual/en/mongocollection.remove.php
}

function getAllWithTag()
{
	//Global used vars
	global $app;
	global $conn;
	global $db;
	global $notes;

	//JSON Response
	$app->contentType('application/json');

	//params() -> primero busca variables PUT, luego POST, luego GET
	$paramValue = $app->request()->params('tags');

	//$query = array('$and' => array(array('tags' =>'PHP'), array('tags' =>'IDE')));
	$query = array('tags' => $paramValue);

	//Method Find
	$cursor = $notes->find($query);

	//Response building
	$response = "";
	if($cursor->count()==0){
		$response = '{"code": "204", "msg": "This note does not exist!"}';
	} else {
		$response = '{"code": "200", "resp":';
		$response = $response."[";
		foreach($cursor as $doc){
	    	$response = $response . json_encode($doc).",";
		}
		$response = substr($response, 0,-1)."]";
		$response = $response . "}";
	}

	echo $response;

}

function addTagOnNote()
{
	//Global used vars
	global $app;
	global $conn;
	global $db;
	global $notes;

	//JSON Response
	$app->contentType('application/json');

	//params() -> primero busca variables PUT, luego POST, luego GET
	$paramId = $app->request()->params('_id');
	$paramTags = $app->request()->params('tags');

	// solo se puede entrar 1 tag a la vez

	$notes->update(
		array("_id" => new MongoId($paramId)), 
		array('$push' => array("tags" => $paramTags))
	);	

	// no hago chekeo si existe la _id o no !!

	$response = '{"code": "200", "msg": "tags inserted successfully on note with _id: '.$paramId.' !"}';

	echo $response;
}

function deleteTagOnNote()
{
	//Global used vars
	global $app;
	global $conn;
	global $db;
	global $notes;

	//JSON Response
	$app->contentType('application/json');

	//params() -> primero busca variables PUT, luego POST, luego GET
	$paramId = $app->request()->params('_id');
	$paramTags = $app->request()->params('tags');

	$new_tags = $paramTags;
	$notes->update(
	  array("_id" => new MongoId($paramId)), 
	  array('$pull' => array("tags" => $new_tags))
	);

	// no hago chekeo si existe la _id o no !!

	$response = '{"code": "200", "msg": "tags deleted successfully on note with _id: '.$paramId.' !"}';

	echo $response;
}

function updateNote()
{
	//Global used vars
	global $app;
	global $conn;
	global $db;
	global $notes;

	//JSON Response
	$app->contentType('application/json');

	//params() -> primero busca variables PUT, luego POST, luego GET
	
	$paramId = $app->request()->params('_id');

	$title = $app->request()->params('title');
	$content = $app->request()->params('content');
	$tags = array();
	$tags = $app->request()->params('tags');
	$private = $app->request()->params('private');
	$privatebool = ($private === 'true');
	$book = $app->request()->params('book');


	$document = array('title' => $title,
					'content' => $content,
					'private' => $privatebool,
					'tags' => $tags, 
					'book' => $book,
					'user' => 'LSAlumne',
					'createData' => new MongoDate(),
					'lastModificationData' => null
					);

	$notes->update(
        array('_id' => $paramId),
        array('$set' => $document)
    );
}

function flipPrivate()
{	
	//Global used vars
	global $app;
	global $conn;
	global $db;
	global $notes;

	//JSON Response
	$app->contentType('application/json');

	//params() -> primero busca variables PUT, luego POST, luego GET
	$paramId = $app->request()->params('_id');

	$query = array('_id' => new MongoId($paramId));

	$cursor = $notes->find($query);
    
    foreach($cursor as $doc){
      $aux = $doc;
    }

    $privateValue = $aux['private'];   

    if($privateValue == 1){
      $flipValue = false;

      $original = "true";
      $final = "false";
    }else if($privateValue == 0){
      $flipValue = true;
      
      $original = "false";
      $final = "true";
    }

    $notes->update($query, array('$set'=> array('private' => $flipValue)));

    // no hago chekeo si existe la _id o no !!

    $response = '{"code": "200", "msg": "private value fliped correctly from: *'.$original.'* to: *'.$final.'* with _id: '.$paramId.' !"}';

	echo $response;

}

$app->run();