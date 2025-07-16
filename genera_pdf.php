<?php
require('fpdf/fpdf.php'); // Assicurati che la libreria FPDF sia presente nel progetto

$file = 'domande-log.json';

// Carica i dati
if (!file_exists($file)) {
    die("File non trovato.");
}

$contenuto = file_get_contents($file);
$righe = json_decode($contenuto, true);

// Prendi l'indice dalla query string
$index = isset($_GET['index']) ? (int)$_GET['index'] : -1;

if (!isset($righe[$index])) {
    die("Indice non valido.");
}

$domanda = $righe[$index]['domanda'];
$risposta = $righe[$index]['risposta'];

// Crea il PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'PDF Domanda e Risposta', 0, 1, 'C');
$pdf->Ln(10);

// Colore sfondo intestazioni (azzurro)
$pdf->SetFillColor(200, 220, 255);

// DOMANDA
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Domanda:', 1, 1, 'L', true); // intestazione colorata
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 10, $domanda, 1); // contenuto

$pdf->Ln(5); // spazio

// RISPOSTA
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Risposta:', 1, 1, 'L', true); // intestazione colorata
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 10, $risposta, 1); // contenuto

$pdf->Ln(5);

// Output PDF
$pdf->Output('D', 'domanda_risposta_'.$index.'.pdf');
exit;
?>
