<?php   
require_once ($_SERVER['DOCUMENT_ROOT'].'/Classes/fpdf.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/DAO/usuariosDAO.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/DAO/perfisDAO.php');
$pdf=new FPDF();
$perfil = new perfis();

$usuariosDAO = new usuariosDAO();
$arrUsu = $usuariosDAO->load();
$pdf->AddPage();
$pdf->SetXY(65, 50);
$pdf->SetFont('Helvetica', 'B', 18);
$pdf->Cell(65, 5, 'LISTA DE CADASTRO');
$pdf->ln();
$pdf->ln();

$pdf->SetFont('Helvetica', 'B', 16);
$pdf->Cell(80,7,'Nome', 1,0,'C');
$pdf->Cell(65,7,'E-mail', 1,0,'C');
$pdf->Cell(50,7,'Perfil', 1,0,'C');
$pdf->ln();
$pdf->SetFont('Helvetica', '', 14);
foreach($arrUsu as $usu):
    $perfisDAO = new perfisDAO();
    //$perfil->setId($usu->getIdPerfil());
    //$perfisDAO->_construct($perfil);
    $pdf->Cell(80, 7, $usu->getNome(), 1, 0, "C");
    $pdf->Cell(65, 7, $usu->getEmail(), 1, 0, "C");
    $pdf->Cell(50, 7, $perfisDAO->buscarNome($usu->getIdPerfil()), 1, 0, "C");
    $pdf->ln();
endforeach;
$pdf->Output();
?>