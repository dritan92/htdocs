<?php
function get_tasks(){
	global $db;
	$query= "SELECT t.task_id, pt.name, t.startDate, t.dueDate FROM task t, project_tasks pt WHERE pt.id = t.task_id";
	$res = mysqli_query($db, $query);
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_tasks_json($arr){
	$data = '';
	foreach($arr as $item){
		$data .= '{ "start": "'. $item['startDate'] . '", "end": "' .$item['dueDate'] . '", "title": "' .$item['name'] . '","color" : "#0EB6A2"}, ';
	}
	$data .='';
	return $data;
}

function get_events(){
	global $db;
	$query= "SELECT eventsID, eventsTitle, eventsDate FROM events";
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
	global $db;
	$query= "SELECT meetingsID, meetingsTitle, meetingsDate, meetingsTime FROM meetings";
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