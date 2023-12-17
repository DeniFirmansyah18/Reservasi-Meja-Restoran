<?php
require('fpdf/fpdf.php');

if (isset($_POST['tambah'])) {
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    // Generate nomor nota atau ID pemesanan (contoh sederhana, sesuaikan dengan kebutuhan Anda)
    $nomor_nota = uniqid();

    // Cetak nota dengan FPDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(130	,5,'GEMUL APPLIANCES.CO',0,0);
    $pdf->Cell(59	,5,'INVOICE',0,1);//end of line

    //set font to arial, regular, 12pt
    $pdf->SetFont('Arial','',12);

    $pdf->Cell(130	,5,"Nomor Nota: $nomor_nota",0,0);
    $pdf->Cell(59	,5,'',0,1);//end of line

    $pdf->Cell(130	,5,"Nama: $nama",0,0);
    $pdf->Cell(25	,5,'Date',0,0);
    $pdf->Cell(34	,5,'[dd/mm/yyyy]',0,1);//end of line

    $pdf->Cell(130	,5,"Email: $email",0,0);
    $pdf->Cell(25	,5,'Invoice #',0,0);
    $pdf->Cell(34	,5,'[1234567]',0,1);//end of line

    $pdf->Cell(130	,5,"Jumlah Meja: $jumlah",0,0);
    $pdf->Cell(25	,5,'Customer ID',0,0);
    $pdf->Cell(34	,5,'[1234567]',0,1);//end of line

    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(189	,10,'',0,1);//end of line

    //billing address
    $pdf->Cell(100	,5,'Bill to',0,1);//end of line

    //add dummy cell at beginning of each line for indentation
    $pdf->Cell(10	,5,'',0,0);
    $pdf->Cell(90	,5,'[Name]',0,1);

    $pdf->Cell(10	,5,'',0,0);
    $pdf->Cell(90	,5,'[Company Name]',0,1);

    $pdf->Cell(10	,5,'',0,0);
    $pdf->Cell(90	,5,'[Address]',0,1);

    $pdf->Cell(10	,5,'',0,0);
    $pdf->Cell(90	,5,'[Phone]',0,1);

    //make a dummy empty cell as a vertical spacer
    $pdf->Cell(189	,10,'',0,1);//end of line

    //invoice contents
    $pdf->SetFont('Arial','B',12);

    $pdf->Cell(130	,5,'Description',1,0);
    $pdf->Cell(25	,5,'Taxable',1,0);
    $pdf->Cell(34	,5,'Amount',1,1);//end of line

    $pdf->SetFont('Arial','',12);

    //Numbers are right-aligned so we give 'R' after new line parameter

    $pdf->Cell(130	,5,'UltraCool Fridge',1,0);
    $pdf->Cell(25	,5,'-',1,0);
    $pdf->Cell(34	,5,'3,250',1,1,'R');//end of line

    $pdf->Cell(130	,5,'Supaclean Diswasher',1,0);
    $pdf->Cell(25	,5,'-',1,0);
    $pdf->Cell(34	,5,'1,200',1,1,'R');//end of line

    $pdf->Cell(130	,5,'Something Else',1,0);
    $pdf->Cell(25	,5,'-',1,0);
    $pdf->Cell(34	,5,'1,000',1,1,'R');//end of line

    //summary
    $pdf->Cell(130	,5,'',0,0);
    $pdf->Cell(25	,5,'Subtotal',0,0);
    $pdf->Cell(4	,5,'$',1,0);
    $pdf->Cell(30	,5,'4,450',1,1,'R');//end of line

    $pdf->Cell(130	,5,'',0,0);
    $pdf->Cell(25	,5,'Taxable',0,0);
    $pdf->Cell(4	,5,'$',1,0);
    $pdf->Cell(30	,5,'0',1,1,'R');//end of line

    $pdf->Cell(130	,5,'',0,0);
    $pdf->Cell(25	,5,'Tax Rate',0,0);
    $pdf->Cell(4	,5,'$',1,0);
    $pdf->Cell(30	,5,'10%',1,1,'R');//end of line

    $pdf->Cell(130	,5,'',0,0);
    $pdf->Cell(25	,5,'Total Due',0,0);
    $pdf->Cell(4	,5,'$',1,0);
    $pdf->Cell(30	,5,'4,450',1,1,'R');//end of line

    // Simpan atau tampilkan nota
    $pdf->Output("Nota_$nomor_nota.pdf", 'D'); // 'D' untuk download, ganti dengan 'I' jika ingin menampilkan di browser

    // Simpan data ke file atau database sesuai kebutuhan.
    // ...

    // Tampilan HTML untuk proses_pemesanan.php
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nota Pemesanan</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f8f9fa;
            }

            .container {
                max-width: 600px;
                margin: 50px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
                color: #007bff;
            }

            p {
                margin-bottom: 10px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>Nota Pemesanan</h1>
            <p><strong>Nomor Nota:</strong> <?php echo $nomor_nota; ?></p>
            <p><strong>Nama:</strong> <?php echo $nama; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Jumlah Meja:</strong> <?php echo $jumlah; ?></p>
            <p><strong>Tanggal Pemesanan:</strong> <?php echo $tanggal; ?></p>
            <p>Terima kasih atas pemesanan Anda!</p>
        </div>
    </body>

    </html>
    <?php
    // Redirect kembali ke halaman formulir atau halaman lain jika diperlukan
    // header('Location: formulir_pemesanan.php');
    exit();
}
?>
