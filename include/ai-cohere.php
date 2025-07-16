<?php



$file = 'domande-log.json'; 

$api_key = 'UW0PEl7IP25RIazBNsK1REDjQdz33EnilDgLGIbP';




if (isset($_POST['domanda']) && !empty($_POST['domanda'])) {
    $domanda = htmlspecialchars($_POST['domanda']);
    $domanda_corrente = $domanda;
    $_SESSION['domanda_corrente'] = $domanda;

    // Prepara la richiesta per Cohere usando la domanda dal form
    $url = "https://api.cohere.com/v2/chat";
    $data = [
        "model" => "command-r-plus-08-2024",
        "messages" => [
            ["role" => "user", "content" => $domanda]
        ]
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $api_key",
        "Content-Type: application/json",
        "Accept: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    curl_close($ch);

    if (!$response) {
        $ai_response = "Errore nella richiesta cURL.";
    } else {
        $response_data = json_decode($response, true);
        if (isset($response_data['message']['content'][0]['text'])) {
            $ai_response = $response_data['message']['content'][0]['text'];
        } else {
            $ai_response = "Errore nella risposta dell'API: " . json_encode($response_data);
        }
    }
}

        


?>



<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">


        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">


    </head>

    <body class="bg-gradient-primary">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0" >
                            <div class="row p-4 auto" style="background-color: #81D0C7; border-radius: 20px;">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4" Style="color:white">Fai una domanda all'Ai ! </h1>
                                        </div>
                                        <form class="user" method="post">
                                            

                                            <div class="form-group mb-3">
                                                <div class="row">
                                                    <div class="col-md-9 col-12 mb-2 mb-md-0">
                                                        <input class="form-control" id="domanda" name="domanda" type="text" placeholder="Domanda*" required />
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <input class="btn btn-primary w-100" type="submit" value="Ottieni risposta" style="background-color: #246887;">
                                                    </div>
                                                </div>
                                            </div>


                                            <?php if (!empty($ai_response)): ?>
                                                
                                                        <?php
                                                            
                                                            if (!empty($ai_response)) {
                                                                echo $ai_response;

                                                                if (file_exists($file)) {
                                                                        $contenuto = file_get_contents($file); // legge il file esistente
                                                                        $dati = json_decode($contenuto, true); // converte in array PHP
                                                                } else {
                                                                        $dati = []; // se il file non esiste, crea un array vuoto
                                                                }

                                                                $dati[] = [
                                                                    'domanda' => $domanda,
                                                                    'risposta' => $ai_response
                                                                ];

                                                                file_put_contents($file, json_encode($dati, JSON_PRETTY_PRINT)); // riscrive tutto con i nuovi dati

                                                                $ultimo_index = count($dati) - 1;

                                                                echo '<br>';
                                                                echo '<div class="mt-3">';
                                                                echo '<a href="genera_pdf.php?index=' . $ultimo_index . '" class="btn btn-outline-dark">📄 Scarica PDF</a>';
                                                                echo '</div>';
                                                            } 
                                                            
                                                        ?>
                                            <?php endif; ?>

                                        </form>

                                        
                                        
                                            


                                        

                                        

                                        
                                        
                                    </div>
                                </div>
                                
                                <?php
                                    /*if ($message) {
                                        echo "<p>$result</p>";
                                    }*/
                                ?>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        

    </body>

</html>
