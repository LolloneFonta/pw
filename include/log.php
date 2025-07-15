<?php

$file = 'domande-log.json';

// Array iniziale
$righe = [];

// Se il file esiste, carica i dati
if (file_exists($file)) {
    $contenuto = file_get_contents($file);
    $righe = json_decode($contenuto, true); // true = array associativo
}

?>

<section class="section-padding">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-12">
                            <h3 class="mb-4">Log delle domande</h3>
                            <table class="table table-bordered table-striped">
                                <thead class="table">
                                    <tr>
                                        <th>Domanda</th>
                                        <th>Risposta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($righe as $riga): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($riga['domanda']) ?></td>
                                            <td><?= htmlspecialchars($riga['risposta']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="question.php" class="btn btn-primary" style="background-color: #246887;">Fai una domanda all'AI</a>
                </div>
</section>