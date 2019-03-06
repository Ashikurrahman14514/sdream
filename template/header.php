<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashikshetu</title>
    <link rel="stylesheet" href="styles/style1.css">
    <link rel="stylesheet" href="bootstrap4/bootstrap4.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<script>
alert("City name =Your District, Village name =Your Upazila");
</script>
    <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <strong class="">Ashikshetu</strong>
            </a>
            <button class="navbar-toggler text-white bg-success py-2" type="button" data-toggle="collapse" data-target="#toggler">
                <span>Login</span>
            </button>

            <div class="collapse navbar-collapse" id="toggler">
                <form  class="form-inline ml-md-auto" method="POST" >
                    <input class="form-control mr-sm-2 mt-3 mt-sm-0 " name="email" type="email" placeholder="Email">
                    <input class="form-control mr-sm-2 my-2 my-sm-0 " name="password" type="password" placeholder="Password">
                    <button class="btn btn-outline-success col-sm-12 col-lg my-1 my-sm-0" type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    </nav>
