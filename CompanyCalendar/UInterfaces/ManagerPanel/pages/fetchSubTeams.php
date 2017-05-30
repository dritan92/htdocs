<?php
require_once("database.php");
//print_r("expression"); exit;
$resultArray=array();
if(isset($_POST["manager"]) && $_POST["manager"]){
	$projectId=$_POST["manager"];
	$sql ="SELECT p.*,u.name FROM project p INNER JOIN users u on u.id=p.managerId where p.status='Y' AND p.id=$projectId ";
	//echo $sql ; exit;
	$resultadao = mysql_query ($sql);
	$i=0;

	while ($row = mysql_fetch_object($resultadao)) {
		$result["pid"]=$row->id;
		$result["managerId"]=$row->managerId;
		$result["mname"]=$row->name;
		$resultArray[$i]=$result;
		$i++;
	}
	print_r(json_encode($resultArray));
}

	

if(isset($_POST["projectId"]) && $_POST["projectId"]){
$projectId = $_POST["projectId"];
$sql ="SELECT * FROM project_tasks where projectId= $projectId AND status='y'";
//echo "SELECT * FROM project_tasks where projectId= $projectId AND status='y'"; exit;
$resultadao = mysql_query ($sql);
$i=0;

while ($row = mysql_fetch_object($resultadao)) {
	$result["id"]=$row->id;
	$result["name"]=$row->name;
	$result["level"]=$row->level;
	$resultArray[$i]=$result;
	$i++;
}
print_r(json_encode($resultArray));

}
if(isset($_POST["values"]) && $_POST["values"]){
$parentId = $_POST["values"];
$sql ="SELECT * FROM teams where parent != 0 AND parent = $parentId";

$resultadao = mysql_query ($sql);
$i=0;

while ($row = mysql_fetch_object($resultadao)) {
	$result["id"]=$row->id;
	$result["name"]=$row->name;
	$resultArray[$i]=$result;
	$i++;
}
print_r(json_encode($resultArray));

}
if(isset($_POST["teamId"]) && $_POST["teamId"]){
	$teamId = $_POST["teamId"];
	$subTeamId = $_POST["subTeamId"];
	$taskArray = array();
	$completedTask = array();
$sql ="SELECT * FROM users where teamId=$teamId AND status='Y' order by level DESC";
//echo $sql;  exit; 

$res = mysql_query ($sql);
//print_r($res); exit;

$sql2 ="SELECT members,count(members) tasks ,min(dueDate) due FROM task WHERE status='N' AND is_deleted='N' group by members  ";

$sql3 ="SELECT members,count(members) tasks  FROM task WHERE status='Y' AND teamId=$subTeamId AND is_deleted='N' group by members";
//echo $sql3; exit;

$res2 = mysql_query ($sql2);
$res3 = mysql_query ($sql3);
while ($row3 = mysql_fetch_object($res3)) {
	$completedTask[$row3->members] = $row3->tasks;
}
arsort($completedTask);
//print_r($completedTask); exit;
while ($row2 = mysql_fetch_object($res2)) {
	$taskArray[$row2->members] = $row2->tasks."_".$row2->due;
}

//print_r($taskArray); exit;
$i=0;
$resultArray=array();
while ($row = mysql_fetch_object($res)) {
	$busyflag = false;
	$busy = "";
	
	if (array_key_exists($row->id, $taskArray)) {
		$splitArray =explode("_",$taskArray[$row->id]);
		//print_r($splitArray); exit;
		$points = $splitArray[0];
		$due = $splitArray[1];

		if($points == $row->max_tasks){
			$busyflag = true;
			$busy=$row->max_tasks;		
		}
		else
		{
			$busy=$row->max_tasks;	
		}
    
	}
	else{
		$busy=$row->max_tasks ;
		$points="0";
		$due="NA";
	}
	if (array_key_exists($row->id, $completedTask)) {
		$compTasks = $completedTask[$row->id];

	}
	else{
		$compTasks = "0";
	}
	$result["id"]=$row->id;
	$result["username"]=$row->username;
	$result["name"]=$row->name;
	$result["level"]=$row->level;
	$result["teamId"]=$row->teamId;
	$result["max_tasks"]=$busy;
	$result["busy"]=$busyflag;
	$result["points"]=$points;
	$result["due"]=$due;
	$result["comp"]=$compTasks;
	$resultArray[$i]=$result;
	$i++;
	}
	$price = array();
foreach ($resultArray as $key => $row)
{
    $price[$key] = $row['comp'];
}
array_multisort($price, SORT_DESC, $resultArray);

print_r(json_encode($resultArray));

}

?>