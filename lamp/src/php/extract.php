<?php

include '../database_connexion.php';
include 'PHPExcel.php';

$home = $_POST['extractId'];
$datas = $bdd->query("SELECT * FROM consumption WHERE home='$home'");

$workbook = new PHPExcel;
$sheet = $workbook->getActiveSheet();

$sheet->getColumnDimension("B")->setWidth(15);
$sheet->getColumnDimension("C")->setWidth(15);

$sheet->mergeCells("B2:F2");
$sheet->setCellValueByColumnAndRow(1, 2, "Votre consommation");
$style = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ),
    'font'  => array(
        'bold'  => true,
        'size'  => 14,
    )
);
$sheet->getStyle("B2")->applyFromArray($style);
$sheet->mergeCells("B3:F3");

$sheet->setCellValueByColumnAndRow(1, 4, "Date");
$sheet->setCellValueByColumnAndRow(2, 4, "Consommation");
$style = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ),
    'font'  => array(
        'bold'  => true,
        'size'  => 12,
    )
);
$sheet->getStyle("B4:F4")->applyFromArray($style);

$i = 5;
foreach ($datas as $data) {
    $date = $data['date'];
    $consumption = $data['consumption'];
    $sheet->setCellValueByColumnAndRow(1, $i, $date);
    $sheet->setCellValueByColumnAndRow(2, $i, $consumption);
    $i++;
}

$writer = new PHPExcel_Writer_Excel2007($workbook);
$records = 'PHPExcel/Extract.xlsx';
ob_end_clean();
$writer->save($records);

header('Location: PHPExcel/Extract.xlsx');




?>