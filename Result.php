<?php
$id = $_GET['id'];
$cn = mysqli_connect('localhost', 'root', '', 'quiz');
$stmt = $cn->prepare('select * from stdRes A inner join std B on A.stdId = B.id where B.id = ?');
$stmt->bind_param('s', $id);

if ($stmt->execute()) {
    $res = $stmt->get_result();
    $ftech = $res->fetch_assoc();
    $name = $ftech['name'];
    $subj = $ftech['subj'];
    $tQues = $ftech['tQues'];
    $res1 = $ftech['res'];
    $wrng = $ftech['tQues'] - $ftech['res'];
    $grade = grade(($ftech['res'] / $ftech['tQues'])*100);
}
function grade($num)
{
    if ($num > 80) {
        return 'A+';
    } else if ($num > 70) {
        return 'A';
    } else if ($num > 60) {
        return 'B';
    } else if ($num > 50) {
        return 'C';
    } else if ($num > 40) {
        return 'D';
    } else {
        return 'F';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row row-cols-1 gy-3 w-100">
            <div class="col">
                <table class="table table-bordered w-100">
                    <thead>
                        <tr class="table-dark">
                            <th colspan="2" class="text-center h4 py-3">Your Result</th>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $name ?></td>
                        </tr>
                        <tr>
                            <th>Subject</th>
                            <td><?php echo $subj ?></td>
                        </tr>
                        <tr>
                            <th>Total Number Of Questions</th>
                            <td><?php echo $tQues ?></td>
                        </tr>
                        <tr>
                            <th>Correct Questions</th>
                            <td><?php echo $res1 ?></td>
                        </tr>
                        <tr>
                            <th>
                                Wrong Questions
                            </th>
                            <td><?php echo $wrng ?></td>
                        </tr>
                        <tr>
                            <th>Grade</th>
                            <td><?php echo $grade ?></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>