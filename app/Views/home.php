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
                        <a class="nav-link active" aria-current="page" href="/home">Home</a>
                        <a class="nav-link" href="/signin">Signin</a>
                        <a class="nav-link" href="/registration">Registration</a>
                        <a class="nav-link" href="/Home/Logout">Logout</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container mt-5 text-align-center">
            <h1>Home Page</h1>
            <h3>Welcome, <i><?php echo session()->get('name')?></i>. We hope to be of help to you.</h3>
            <h3>Upload a CSV File below to add new users to the application.</h3>
        </div>

        <div class="container mt-5">
            <div class="row mx-auto col-md-6 align-items-center">
                <div class="col-">
                    <h2>CSV File Upload</h2>

                    <?php if(session()->getFlashdata('error') !== NULL):?>
                        <div class="alert alert-warning">
                            <?php echo session()->getFlashdata('error') ?>
                        </div>
                    <?php endif;?>

                    <?php if(session()->getFlashdata('count') !== NULL):?>
                        <div class="alert alert-success">
                            Successfully inserted <?php echo session()->get('count') ?> records.
                        </div>
                    <?php endif;?>

                    <?= form_open_multipart('Home/FileUpload') ?>

                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" name="userfile" size="20" />
                        </div>

                        <div class="d-grid">
                            <input type="submit" class="btn btn-dark" value="Upload" />
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>