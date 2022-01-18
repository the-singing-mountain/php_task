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
                    <a class="nav-link " aria-current="page" href="/home">Home</a>
                    <a class="nav-link" href="/signin">Signin</a>
                    <a class="nav-link active" href="/registration">Registration</a>
                </div>
            </div>
        </div>
        </nav>

        <div class="container mt-5">
            <h1>Registration Page</h1>
            <h3>Welcome! Please complete the registration below to continue.</h3>
        </div>
        <div class="container mt-5">
            <div class="row mx-auto col-md-6 align-items-center">
                <div class="col-">
                    <h2>Register User</h2>

                    <?php if(isset($validation)):?>
                    <div class="alert alert-warning">
                    <?= $validation->listErrors() ?>
                    </div>
                    <?php endif;?>

                    <form id="registration_form" action="<?php echo base_url(); ?>/Registration/RegistrationStore" name = "registration_form" method="post">
                    
                        <div class="form-group mb-3">
                            <input type="text" name="full_name" placeholder="Full Name" value="<?= set_value('full_name') ?>" class="form-control" >
                        </div>

                        <div class="form-group mb-3">
                            <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                        </div>

                        <div class="form-group mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control" >
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">Register</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    if($('#registration_form').length > 0) {
        $('#registration_form').validate({
            rules: {
                full_name: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 6
                },
            },
            messages: {
                full_name: {
                    required: "Name is required",
                },
                email: {
                    email: "Invalid email address. Example: abc@gmail.com",
                    required: "Email is required"
                },
                password: {
                    required: "Password is required",
                    minlength: "Minimum length of password should be 2 characters"
                },
            }
        })
    }
</script>