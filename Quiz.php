<?php
$con = mysqli_connect('localhost','root','','quiz');
$sql = $con->prepare('select * from mcq_question where lower(name) = "html" limit 4');
$stmt = $sql->execute();
$stmt = $sql->get_result();
while($fetch = $stmt->fetch_array()){
    $data[] = $fetch;
}
header('Content-Type: application/json UTF-8');
echo json_encode(['rows'=>mysqli_num_rows($stmt), 'data'=>$data]);
?>