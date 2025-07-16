<?php

session_start();

if (!isset($_SESSION['logged'])) {
    header('Location: login.php');
    exit;
}


?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Question</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-topic-listing.css" rel="stylesheet">
<!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->
    </head>
    
    <body id="top">

        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <i class="bi-back"></i>
                        <span>learnFE</span>
                    </a>

                    <div class="d-lg-none ms-auto me-4">
                        <a href="area-riservata.php" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        

                        <div class="d-none d-lg-block" style="margin-left: auto;">
                            <a href="area-riservata.php" class="navbar-icon bi-person smoothscroll"></a>
                        </div>
                    </div>
                </div>
            </nav>
            

            <header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row justify-content-center align-items-center">

                        <div class="col-lg-5 col-12 mb-5">
                            <nav aria-label="breadcrumb">
                                
                            </nav>

                            <h2 class="text-white">Fai una domanda <br> All'AI</h2>

                            <div class="d-flex align-items-center mt-5">
                                <a href="#ai" class="btn custom-btn custom-border-btn smoothscroll me-4" >Vai!</a>

                                
                            </div>
                        </div>

                        <div class="col-lg-5 col-12">
                            <div class="topics-detail-block bg-white shadow-lg">
                                <img src="images/topics/undraw_Finance_re_gnv2.png" class="topics-detail-block-image img-fluid">
                            </div>
                        </div>

                    </div>
                </div>
            </header>


            <section class="topics-detail-section section-padding" id="ai">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 text-center">
                            <?php include 'include/ai-cohere.php'; ?>
                        </div>
                    </div>
                </div>
            </section>




            
        </main>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>