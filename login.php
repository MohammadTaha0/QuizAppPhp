<?php
session_start();
if (isset($_POST['user']) && isset($_POST['pass'])) {
    $cn = mysqli_connect('localhost', 'root', '', 'quiz');
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = $cn->prepare('select * from std where user=? and pass=?');
    $sql->bind_param('ss', $user, $pass);
    $sql->execute();
    $res = $sql->get_result();
    header('content-type: application/json; charset=UTF-8');
    if ($res->num_rows > 0) {
        $_SESSION['loginA'] = $res->fetch_assoc()['id'];
        echo json_encode(['status' => 200]);
    } else {
        echo json_encode(['status' => 500]);
    }
    exit;
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
    <div class="row w-50 m-auto row-cols-1 gy-3 text-center shadow p-3 mt-5">
        <div class="col">
            <h2>Login</h2>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Username" id="user">
        </div>
        <div class="col">
            <input type="password" class="form-control" placeholder="Password" id="pass">
        </div>
        <div class="col">
            <button class="btn btn-outline-primary btn-block w-100">Login</button>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $("button").click(function() {
            var text = $(this).text();
            $(this).text("Loading....");
            $.post(
                "login.php", {
                    login: "",
                    user: $("#user").val(),
                    pass: $("#pass").val()
                },
                function(resp) {
                    $(this).text(text);
                    console.log(resp)
                    if (resp.status == 200) {
                        location.href = './index.php';
                    } else [
                        alert("Something Went Wrong!")
                    ]
                }
            )
        })

    });
</script>

</html>