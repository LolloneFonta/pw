<?php

$file = 'domande-log.json';

// 1. Elimina una riga se è presente il parametro ?elimina=INDEX
if (isset($_GET['elimina'])) {
    $index = (int)$_GET['elimina'];

    if (file_exists($file)) {
        $contenuto = file_get_contents($file);
        $righe = json_decode($contenuto, true);

        if (isset($righe[$index])) {
            array_splice($righe, $index, 1); // Rimuove la riga
            file_put_contents($file, json_encode($righe, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
    }

    // Reindirizza alla stessa pagina senza il parametro ?elimina
    header("Location: "."area-riservata.php#log");
    exit;
}


// Array iniziale
$righe = [];

// Se il file esiste, carica i dati
if (file_exists($file)) {
    $contenuto = file_get_contents($file);
    $righe = json_decode($contenuto, true); // true = array associativo
}

?>

<section class="section-padding" id="log">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <h3 class="mb-4">Log delle domande</h3>
                <table class="table table-bordered table-striped">
                    <thead class="table">
                        <tr>
                            <th style="width: 5%;">Elimina</th>
                            <th style="width: 20%;">Domanda</th>
                            <th style="width: 65%;">Risposta</th>
                            <th style="width: 10%;">PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($righe as $index => $riga): ?>
                            <tr>
                                <td class="text-center">
                                    <a href="?elimina=<?= $index ?>" class="text-danger" title="Elimina">❌</a>
                                </td>
                                <td><?= htmlspecialchars($riga['domanda']) ?></td>
                                <td><?= htmlspecialchars($riga['risposta']) ?></td>
                                <td>
                                    <a href="genera_pdf.php?index=<?= $index ?>" class="btn btn-sm btn-outline-secondary bottone-pdf">Scarica PDF</a>
                                </td>
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