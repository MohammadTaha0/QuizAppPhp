<?php
session_start();
if (!isset($_SESSION['loginA'])) {
    header("location: ./Login.php");
    exit;
}
$cn = mysqli_connect('localhost', 'root', '', 'quiz');
$user = $cn->prepare('select * from std where id=?');
$user->bind_param('s', $_SESSION['loginA']);
$user->execute();
$res = $user->get_result();
$name = '';
if ($res->num_rows == 1) {
    $fetch = $res->fetch_assoc();
    $name = $fetch['name'];
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
        <div class="row row-cols-1 gy-3 border w-100">
            <div class="p-0 col-12 my-0">
                <h2 class="bg-dark w-100 py-3 text-center text-light h4">Quiz Application</h2>
            </div>
            <div class="col p-0 m-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $name; ?></td>
                            <th>No of Questions</th>
                            <td></td>
                            <th>Question #</th>
                            <td></td>
                            <th>Subject</th>
                            <td>HTML</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col">
                <h6 class="text-capitalize">Question</h6>
            </div>
            <div class="col">
                <input type="radio" class="form-check-radio" name="raddioB" id="o1">
                <label class="text-capitalize" for="o1">label1</label>
            </div>
            <div class="col">
                <input type="radio" class="form-check-radio" name="raddioB" id="o2">
                <label class="text-capitalize" for="o2">label1</label>
            </div>
            <div class="col">
                <input type="radio" class="form-check-radio" name="raddioB" id="o3">
                <label class="text-capitalize" for="o3">label1</label>
            </div>
            <div class="col pb-2 text-end">
                <button class="btn btn-primary btn-sm px-5">Next</button>
                <button class="btn btn-dark btn-sm px-5 d-none" id="end">End</button>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        n = 0;
        rows = 0
        correct = "";

        function quiz(n) {
            $.get(
                "./Quiz.php",
                function(resp) {
                    if (resp.rows > 0) {
                        rows = resp.rows;
                        $("td")[1].innerText = rows;
                        $("td")[2].innerText = n + 1;
                        $("h6").text(resp.data[n]['ques']);
                        $("#o1").val(resp.data[n]['o1'])
                        $("#o2").val(resp.data[n]['o2'])
                        $("#o3").val(resp.data[n]['o3'])
                        $("#o1").parent().children("label").text(resp.data[n]['o1']);
                        $("#o2").parent().children("label").text(resp.data[n]['o2']);
                        $("#o3").parent().children("label").text(resp.data[n]['o3']);
                        correct = resp.data[n]['ans'];
                    }
                }
            );
        }
        quiz(n);
        first = true;
        result = 0;
        $("button").click(function() {
            radioButtons = $("input[type=radio]");
            if (first) {
                for (let i = 0; i < radioButtons.length; i++) {
                    if (radioButtons[i].checked) {
                        selectedRadioButton = radioButtons[i];
                        break;
                    }
                }
                if (selectedRadioButton.value == correct) {
                    result += 1;
                }
                if ($(this).text() != "End") {
                    if (n < rows - 1) {
                        n++;
                        if ((n == rows - 1)) {
                            $(this).addClass('d-none');
                            $("#end").removeClass('d-none');
                        }
                    }
                } else {
                    if (first) {
                        $.post(
                            "./submitResult.php", {
                                res: result,
                                subj: "html",
                                tQues: rows
                            },
                            function(resMarks) {
                                console.log(resMarks);
                                if (resMarks.status == 200) {
                                    location.href = './Result.php?id=<?php echo $_SESSION['loginA']; ?>';
                                } else {
                                    alert("Something Went Wrong!");
                                }
                            }
                        );
                        first = false;
                    }
                }
                quiz(n);
            }
        });
    });
</script>

</html>