
<?php


session_start();

$message = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = ($_POST['user']);
    $pass = ($_POST['password']);

    if ($user=="admin" && $pass=="admin") {
        session_start();
        
        $_SESSION['logged'] = 1;
        
        header('Location: area-riservata.php');
        exit;
                  
                  
    } else {
        $message = "username o password non corretti.";
    }
}

?>


<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Corso</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-topic-listing.css" rel="stylesheet">
</head>
<body id="top">
    <main>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <i class="bi-back"></i>
                    <span>learnFE</span>
                </a>
            </div>
        </nav>

        <section class="hero-section d-flex justify-content-center align-items-center" style="min-height: 40vh;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-12">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header bg-primary text-white" style="background-color: white !important;">
                                <h4 class="text-center font-weight-light my-2">Login</h4>
                            </div>
                            <div class="card-body">
                                <form action="login.php" method="post">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="user" type="text" placeholder="Username" required name="user" />
                                        <label for="user">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" type="password" placeholder="Password" required name="password" />
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary w-100" type="submit" >Accedi</button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>