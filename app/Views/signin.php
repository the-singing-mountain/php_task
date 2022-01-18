<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>PHP Task</title>
</head>

    <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PHP Task</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link " href="/Home">Home</a>
                    <a class="nav-link active" aria-current="page" href="/signin">Signin</a>
                    <a class="nav-link" href="/registration">Registration</a>
                </div>
            </div>
        </div>
        </nav>    
        <div class="container mt-5">
            <h1>Sign-In Page</h1>
            <h3>Welcome back, User! Please sign-in below to continue.</h3>
        </div>
        <div class="container mt-5">
            <div class="row mx-auto col-md-6 align-items-center">
                <div class="col-">
                    <h2>Sign-In</h2>

                    <?php if(session()->getFlashdata('msg') !== NULL):?>
                    <div class="alert alert-warning">
                    <?php echo session()->getFlashdata('msg') ?>
                    </div>
                    <?php endif;?>

                    <form id="signin_form" action="<?php echo base_url(); ?>/SignIn/LoginAuth" name = "signin_form" method="post">
                    
                        <div class="form-group mb-3">
                            <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control" >
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">Sign-In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>