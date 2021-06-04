<?php
ob_start();
include'../../../assets/tcpdf/tcpdf.php';
if (isset($_GET['id_peg'])) {
	$id_peg = $_GET['id_peg'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
class MYPDF extends TCPDF {
	public function Header() {
        // Logo
        //$image_file = K_PATH_IMAGES.'logo_example.jpg';
        //$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Header
        //$html = '<p align="center"></p>';
		//$this->writeHTMLCell($w = 0, $h = 0, $x = '', $y = 10, $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'top', $autopadding = true);
    }
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages().'    '.'*** '.date ("d-m-Y").' ***', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$pdf = new MYPDF('P', 'mm', 'Legal', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Andi Hatmoko');
$pdf->SetTitle('Report');
$pdf->SetSubject('TCPDF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(12, 20, 12);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 20);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// add a page
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 8);
include "../../../config/koneksi.php";

	$kepala	=mysql_query("SELECT * FROM tb_setup WHERE id_setup='1'");
	$kep	=mysql_fetch_array($kepala);
	
	$namakepala	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$kep[kepala]'");
	$nama		=mysql_fetch_array($namakepala);
	
	$pangkat=mysql_query("SELECT * FROM tb_pangkat WHERE id_peg='$kep[kepala]' AND status_pan='Aktif'");
	$pank	=mysql_fetch_array($pangkat);

$tampilPeg=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$id_peg'");
$peg=mysql_fetch_array($tampilPeg);

$header = '<p><font size="12" style="text-transform:uppercase"><b>'.$kep['unit'].' KABUPATEN '.$kep['kab'].'</b></font>
			<br /><br />
			<font size="10" align="center"><u><b>BIODATA PEGAWAI</b></u><font></p>';
$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = 10, $header, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'top', $autopadding = true);

$dpri ='<p><font size="10">I. DATA PRIBADI<font></p>';
$pdf->writeHTML($dpri, true, false, false, false, '');

$tblpri = '<table cellspacing="0" cellpadding="2" border="0">
    <tr>
		<td width="30">1.</td>
		<td width="150">NIP</td>
		<td width="360">: '.$peg['nip'].'</td>';
		if (empty($peg['foto']))
						if ($peg['jk'] == "Laki-laki"){
							$tblpri .='<td rowspan="11" align="center" width="120"><img src="../../../assets/foto/no-foto-male.png" width="100" height="130"><br />Pas Foto</td>';
						}
						else{
							$tblpri .='<td rowspan="11" align="center" width="120"><img src="../../../assets/foto/no-foto-male.png" width="100" height="130"><br />Pas Foto</td>';
						}
						else
							$tblpri .='<td rowspan="11" align="center" width="120"><img src="../../../assets/foto/'.$peg['foto'].'" width="100" height="130"><br />Pas Foto</td>';
	$tblpri .='</tr>
	<tr>
		<td width="30">2.</td>
		<td width="150">Nama</td>
		<td width="360">: '.$peg['nama'].'</td>
	</tr>
	<tr>
		<td width="30">3.</td>
		<td width="150">Tempat, Tanggal Lahir</td>
		<td width="360">: '.$peg['tempat_lhr'].', '.$peg['tgl_lhr'].'</td>
	</tr>
	<tr>
		<td width="30">4.</td>
		<td width="150">Agama</td>
		<td width="360">: '.$peg['agama'].'</td>
	</tr>
	<tr>
		<td width="30">5.</td>
		<td width="150">Jenis Kelamin</td>
		<td width="360">: '.$peg['jk'].'</td>
	</tr>
	<tr>
		<td width="30">6.</td>
		<td width="150">Golongan Darah</td>
		<td width="360">: '.$peg['gol_darah'].'</td>
	</tr>
	<tr>
		<td width="30">7.</td>
		<td width="150">Status Pernikahan</td>
		<td width="360">: '.$peg['status_nikah'].'</td>
	</tr>
	<tr>
		<td width="30">8.</td>
		<td width="150">Status Kepegawaian</td>
		<td width="360">: '.$peg['status_kepeg'].'</td>
	</tr>
	<tr>
		<td width="30">9.</td>
		<td width="150">Alamat</td>
		<td width="360">: '.$peg['alamat'].'</td>
	</tr>
	<tr>
		<td width="30">10.</td>
		<td width="150">No. Telepon</td>
		<td width="360">: '.$peg['telp'].'</td>
	</tr>
	<tr>
		<td width="30">11.</td>
		<td width="150">Email</td>
		<td width="360">: '.$peg['email'].'</td>
	</tr>
</table>';
$pdf->writeHTML($tblpri, true, false, false, false, '');

$dkel ='<p><font size="10">II. RIWAYAT KELUARGA<font></p>';
$pdf->writeHTML($dkel, true, false, false, false, '');

$tblkel ='<table cellspacing="0" cellpadding="2" border="0">
			<tr>
				<th width="30"><b>No.</b></th>
				<th width="170"><b>Nama</b></th>
				<th width="170"><b>Tempat, Tanggal Lahir</b></th>
				<th width="290"><b>Status</b></th>
			</tr>
			';
			$no=1;
			$tampilOrt	=mysql_query("SELECT * FROM tb_ortu WHERE id_peg='$id_peg' ORDER BY status_hub DESC");
			while($ort=mysql_fetch_array($tampilOrt)) { 
				$tblkel .='<tr>
					<td width="30">'.$no++.'.</td>
					<td width="170">'.$ort['nama'].'</td>
					<td width="170">'.$ort['tmp_lhr'].', '.$ort['tgl_lhr'].'</td>
					<td width="290">'.$ort['status_hub'].'</td>
				</tr>';
			}
			$tampilSi	=mysql_query("SELECT * FROM tb_suamiistri WHERE id_peg='$id_peg'");
			while($si=mysql_fetch_array($tampilSi)) { 
				$tblkel .='<tr>
					<td width="30">'.$no++.'.</td>
					<td width="170">'.$si['nama'].'</td>
					<td width="170">'.$si['tmp_lhr'].', '.$si['tgl_lhr'].'</td>
					<td width="290">'.$si['status_hub'].'</td>
				</tr>';
			} 
			$tampilAnk	=mysql_query("SELECT * FROM tb_anak WHERE id_peg='$id_peg' ORDER BY tgl_lhr");
			while($ank=mysql_fetch_array($tampilAnk)) { 
				$tblkel .='<tr>
					<td width="30">'.$no++.'.</td>
					<td width="170">'.$ank['nama'].'</td>
					<td width="170">'.$ank['tmp_lhr'].', '.$ank['tgl_lhr'].'</td>
					<td width="290">'.$ank['status_hub'].'</td>
				</tr>';
			}
$tblkel .= '</table>';
$pdf->writeHTML($tblkel, true, false, false, false, '');

$dpen ='<p><font size="10">III. PENDIDIKAN<font></p>';
$pdf->writeHTML($dpen, true, false, false, false, '');

$tblpen ='<table cellspacing="0" cellpadding="2" border="0">
			<tr>
				<th width="30"><b>No.</b></th>
				<th width="50"><b>Tingkat</b></th>
				<th width="120"><b>Sekolah / Universitas</b></th>
				<th width="60"><b>Lokasi</b></th>
				<th width="110"><b>Jurusan</b></th>
				<th width="100"><b>No. Ijazah</b></th>
				<th width="60"><b>Tgl. Ijazah</b></th>
				<th width="130"><b>Kepala / Rektor</b></th>
			</tr>
			';
			$no=1;
			$tampilSek	=mysql_query("SELECT * FROM tb_sekolah WHERE id_peg='$id_peg' ORDER BY tgl_ijazah DESC");
			while($sek=mysql_fetch_array($tampilSek)) { 
				$tblpen .='<tr>
					<td width="30">'.$no++.'.</td>
					<td width="50">'.$sek['tingkat'].'</td>
					<td width="120">'.$sek['nama_sekolah'].'</td>
					<td width="60">'.$sek['lokasi'].'</td>
					<td width="110">'.$sek['jurusan'].'</td>
					<td width="100">'.$sek['no_ijazah'].'</td>
					<td width="60">'.$sek['tgl_ijazah'].'</td>
					<td width="130">'.$sek['kepala'].'</td>
				</tr>';
			} 
$tblpen .= '</table>';
$pdf->writeHTML($tblpen, true, false, false, false, '');

$dbhs ='<p><font size="10">IV. KECAKAPAN BAHASA<font></p>';
$pdf->writeHTML($dbhs, true, false, false, false, '');

$tblbhs ='<table cellspacing="0" cellpadding="2" border="0">
			<tr>
				<th width="30"><b>No.</b></th>
				<th width="170"><b>Jenis Bahasa</b></th>
				<th width="170"><b>Bahasa</b></th>
				<th width="290"><b>Kemampuan Bicara</b></th>
			</tr>
			';
			$no=1;
			$tampilBhs	=mysql_query("SELECT * FROM tb_bahasa WHERE id_peg='$id_peg'");
			while($bhs=mysql_fetch_array($tampilBhs)) { 
				$tblbhs .='<tr>
					<td width="30">'.$no++.'.</td>
					<td width="170">'.$bhs['jns_bhs'].'</td>
					<td width="170">'.$bhs['bahasa'].'</td>
					<td width="290">'.$bhs['kemampuan'].'</td>
				</tr>';
			} 
$tblbhs .= '</table>';
$pdf->writeHTML($tblbhs, true, false, false, false, '');

$djab ='<p><font size="10">V. RIWAYAT JABATAN<font></p>';
$pdf->writeHTML($djab, true, false, false, false, '');

$tbljab ='<table cellspacing="0" cellpadding="2" border="0">
			<tr>
				<th width="30"><b>No.</b></th>
				<th width="230"><b>Jabatan</b></th>
				<th width="110"><b>TMT</b></th>
				<th width="110"><b>Selesai Tugas</b></th>
				<th width="180"><b>Status</b></th>
			</tr>
			';
			$no=1;
			$tampilJab	=mysql_query("SELECT * FROM tb_jabatan WHERE id_peg='$id_peg' ORDER BY tmt_jabatan DESC");
			while($jab=mysql_fetch_array($tampilJab)) { 
				$tbljab .='<tr>
					<td width="30">'.$no++.'.</td>
					<td width="230">'.$jab['jabatan'].'</td>
					<td width="110">'.$jab['tmt_jabatan'].'</td>
					<td width="110">'.$jab['sampai_tgl'].'</td>
					<td width="180">'.$jab['status_jab'].'</td>
				</tr>';
			} 
$tbljab .= '</table>';
$pdf->writeHTML($tbljab, true, false, false, false, '');

$dpan ='<p><font size="10">VI. RIWAYAT KEPANGKATAN<font></p>';
$pdf->writeHTML($dpan, true, false, false, false, '');

$tblpan ='<table cellspacing="0" cellpadding="2" border="0">
			<tr>
				<th width="30"><b>No.</b></th>
				<th width="230"><b>Pangkat</b></th>
				<th width="110"><b>Golongan</b></th>
				<th width="110"><b>TMT</b></th>
				<th width="180"><b>Status</b></th>
			</tr>
			';
			$no=1;
			$tampilPan	=mysql_query("SELECT * FROM tb_pangkat WHERE id_peg='$id_peg' ORDER BY tmt_pangkat DESC");
			while($pan=mysql_fetch_array($tampilPan)) { 
				$tblpan .='<tr>
					<td width="30">'.$no++.'.</td>
					<td width="230">'.$pan['pangkat'].'</td>
					<td width="110">'.$pan['gol'].'</td>
					<td width="110">'.$pan['tmt_pangkat'].'</td>
					<td width="180">'.$pan['status_pan'].'</td>
				</tr>';
			} 
$tblpan .= '</table>';
$pdf->writeHTML($tblpan, true, false, false, false, '');

$dhar ='<p><font size="10">VII. RIWAYAT PENGHARGAAN<font></p>';
$pdf->writeHTML($dhar, true, false, false, false, '');

$tblhar ='<table cellspacing="0" cellpadding="2" border="0">
			<tr>
				<th width="30"><b>No.</b></th>
				<th width="230"><b>Nama Penghargaan</b></th>
				<th width="110"><b>Tahun</b></th>
				<th width="290"><b>Negara / Instansi Pemberi</b></th>
			</tr>
			';
			$no=1;
			$tampilHar	=mysql_query("SELECT * FROM tb_penghargaan WHERE id_peg='$id_peg' ORDER BY tahun DESC");
			while($har=mysql_fetch_array($tampilHar)) { 
				$tblhar .='<tr>
					<td width="30">'.$no++.'.</td>
					<td width="230">'.$har['penghargaan'].'</td>
					<td width="110">'.$har['tahun'].'</td>
					<td width="290">'.$har['pemberi'].'</td>
				</tr>';
			} 
$tblhar .= '</table>';
$pdf->writeHTML($tblhar, true, false, false, false, '');

$dpln ='<p><font size="10">VIII. RIWAYAT PENUGASAN LUAR NEGERI<font></p>';
$pdf->writeHTML($dpln, true, false, false, false, '');

$tblpln ='<table cellspacing="0" cellpadding="2" border="0">
			<tr>
				<th width="30"><b>No.</b></th>
				<th width="170"><b>Negara Tujuan</b></th>
				<th width="60"><b>Tahun</b></th>
				<th width="110"><b>Lama Penugasan</b></th>
				<th width="290"><b>Alasan Penugasan</b></th>
			</tr>
			';
			$no=1;
			$tampilPln	=mysql_query("SELECT * FROM tb_penugasan WHERE id_peg='$id_peg' ORDER BY tahun DESC");
			while($pln=mysql_fetch_array($tampilPln)) { 
				$tblpln .='<tr>
					<td width="30">'.$no++.'.</td>
					<td width="170">'.$pln['tujuan'].'</td>
					<td width="60">'.$pln['tahun'].'</td>
					<td width="110">'.$pln['lama'].' Hari</td>
					<td width="290">'.$pln['alasan'].'</td>
				</tr>';
			} 
$tblpln .= '</table>';
$pdf->writeHTML($tblpln, true, false, false, false, '');

$dhkm ='<p><font size="10">IX. RIWAYAT HUKUMAN<font></p>';
$pdf->writeHTML($dhkm, true, false, false, false, '');

$tblhkm ='<table cellspacing="0" cellpadding="2" border="0">
			<tr>
				<th width="30"><b>No.</b></th>
				<th width="170"><b>Jenis Hukuman</b></th>
				<th width="150"><b>No. SK</b></th>
				<th width="100"><b>Tanggal SK</b></th>
				<th width="110"><b>No. Pemulihan</b></th>
				<th width="100"><b>Tanggal Pemulihan</b></th>
			</tr>
			';
			$no=1;
			$tampilHkm	=mysql_query("SELECT * FROM tb_hukuman WHERE id_peg='$id_peg' ORDER BY tgl_sk DESC");
			while($hkm=mysql_fetch_array($tampilHkm)) { 
				$tblhkm .='<tr>
					<td width="30">'.$no++.'.</td>
					<td width="170">'.$hkm['hukuman'].'</td>
					<td width="150">'.$hkm['no_sk'].'</td>
					<td width="100">'.$hkm['tgl_sk'].'</td>
					<td width="110">'.$hkm['no_pulih'].'</td>
					<td width="100">'.$hkm['tgl_pulih'].'</td>
				</tr>';
			} 
$tblhkm .= '</table><br /><br /><br />';
$pdf->writeHTML($tblhkm, true, false, false, false, '');

$signa = '<table cellpadding="1" border="0" align="center">
			<tr>
				<td width="300"></td>
				<td width="40"></td>
				<td width="320">'.$kep['kab'].', '.date("j F Y").'</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><font size="9" style="text-transform:uppercase;font-weight:bold;">'.$kep['unit'].'</font></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><font size="9" style="text-transform:uppercase;font-weight:bold;">KABUPATEN '.$kep['kab'].'</font></td>
			</tr>
			<tr>
				<td height="60"></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="center"><font size="9"><b>'.$nama['nama'].'</b></font></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="center"><font size="9">'.$pank['pangkat'].'</font></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="center"><font size="9"><b>NIP. '.$nama['nip'].'</b></font></td>
			</tr>
		</table>';
$pdf->writeHTML($signa, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('Biodata_Pegawai_'.$peg['nip'].'.pdf', 'I');
?>