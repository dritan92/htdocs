

<?php


function get_tasks(){
	$id=$_GET['id'];
	global $db;
	$query= "SELECT taskID, taskTitle, startDate, dueDate FROM task WHERE members LIKE'%$id%' OR manager LIKE'%$id%' OR addedBy LIKE'%$id%'";
	$res = mysqli_query($db, $query);
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_tasks_json($arr){
	$data = '';
	foreach($arr as $item){
		$data .= '{ "start": "'. $item['startDate'] . '", "end": "' .$item['dueDate'] . '", "title": "' .$item['taskTitle'] . '","color" : "#0EB6A2"}, ';
	}
	$data .='';
	return $data;
}

function get_events(){
	$id=$_GET['id'];
	global $db;
	$query= "SELECT eventsID, eventsTitle, eventsDate FROM events WHERE users LIKE'%$id%' OR users ='ALL' OR eventsRespo LIKE'%$id%'";
	$res = mysqli_query($db, $query);
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_json($arr){
	$data = '';
	foreach($arr as $item){
		$data .= '{ "start": "'. $item['eventsDate'] . '", "end": "' .$item['eventsDate'] . '", "title": "' .$item['eventsTitle'] . '","color" : "#e74c3c"}, ';
	}
	$data .='';
	return $data;
}

function print_arr($arr){
	echo '<pre>' . print_r($arr, true). '</pre>';
}


function get_meetings(){
	$id=$_GET['id'];
	global $db;
	$query= "SELECT meetingsID, meetingsTitle, meetingsDate, meetingsTime FROM meetings WHERE users LIKE'%$id%' OR meetingsRespo LIKE'%$id%'";
	$res = mysqli_query($db, $query);
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_meetings_json($arr){
	$data = '';
	foreach($arr as $item){
		$data .= '{ "start": "'. $item['meetingsDate'] . '", "end": "' .$item['meetingsDate'] . '", "title": "' .$item['meetingsTitle'] . '","color" : "#f1c40f"}, ';
	}
	$data .='';
	return $data;
}


?>