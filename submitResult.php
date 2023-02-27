<?php
session_start();
if(!isset($_SESSION['loginA'])){
    http_response_code(500);
    exit;
}
$cn = mysqli_connect('localhost', 'root', '', 'quiz');
$id = $_SESSION['loginA'];
$res = $_POST['res'];
$subj = $_POST['subj'];
$tQues = $_POST['tQues'];
$stmt = $cn->prepare('insert into stdres(stdId,subj,res,tQues) values(?,?,?,?)');
$stmt->bind_param('ssss',$id,$subj,$res,$tQues);
header('Content-Type: application/json UTF-8');
if($stmt->execute()){
    echo json_encode(['status'=>200]);
}else{
    echo json_encode(['status'=>500]);
}
?>