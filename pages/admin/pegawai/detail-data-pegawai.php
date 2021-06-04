<?php
	if (isset($_GET['id_peg'])) {
	$id_peg = $_GET['id_peg'];
	}
	include "config/koneksi.php";
	$query   =mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$id_peg'");
	$data    =mysql_fetch_array($query);
	
	$birthday	=new DateTime($data['tgl_lhr']);
	$today		=new DateTime();
	$diff = $today->diff($birthday);
?>
<div class="page-header">
	<h1>Profile<small><i class="ace-icon fa fa-angle-double-right"></i> Pegawai <i class="ace-icon fa fa-angle-double-right"></i> <?=$data['nama']?> <i class="ace-icon fa fa-lock"></i> NIP: <?=$data['nip']?>
		<?php
			if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
				echo "<small class='pesan'>&nbsp; <i class='ace-icon fa fa-bell icon-animated-bell bigger-100 orange'></i>&nbsp; ".$_SESSION['pesan']."</small>";
			}
			$_SESSION['pesan'] ="";
		?>
		</small>
	</h1>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="clearfix">
			<div class="pull-right">
				<div class="btn-toolbar inline middle no-margin">
					<div class="widget-toolbar hidden-480">
						<a href="./pages/admin/report/print-biodata-pegawai.php?id_peg=<?=$id_peg?>" target="_blank" title="print"><i class="ace-icon fa fa-print"></i></a>
					</div>
					<div class="widget-toolbar hidden-480">
						<a href="home-admin.php?page=form-view-data-pegawai" title="back"><i class="ace-icon fa fa-arrow-left"></i></a>
					</div>					
				</div>
			</div>
		</div>
		<div class="space-6"></div>
		<div class="col-sm-10">
			<div class="user-profile">
				<div class="tabbable">
					<ul class="nav nav-tabs padding-18">
						<li class="active"><a data-toggle="tab" href="#profile"><i class="green ace-icon fa fa-user bigger-120"></i> Profile</a></li>
						<li><a data-toggle="tab" href="#si"><i class="orange ace-icon fa fa-check bigger-120"></i> Suami Istri</a></li>
						<li><a data-toggle="tab" href="#anak"><i class="blue ace-icon fa fa-check bigger-120"></i> Anak</a></li>
						<li><a data-toggle="tab" href="#ortu"><i class="red ace-icon fa fa-check bigger-120"></i> Orang Tua</a></li>
						<li>&nbsp; &nbsp; &nbsp;</li>
						<li><a data-toggle="tab" href="#sekolah"><i class="purple ace-icon fa fa-graduation-cap bigger-120"></i> Pendidikan</a></li>
						<li><a data-toggle="tab" href="#bahasa"><i class="pink ace-icon fa fa-book bigger-120"></i> Bahasa</a></li>
						<li>&nbsp; &nbsp; &nbsp;</li>
						<li><a data-toggle="tab" href="#skp"><i class="purple ace-icon fa fa-briefcase bigger-120"></i> SKP</a></li>
					</ul>
					<div class="tab-content no-border padding-12">
						<div id="profile" class="tab-pane in active">
							<div class="row">
								<div class="col-xs-12 col-sm-3 center">
									<span class="profile-picture">
										<a href="home-admin.php?page=form-ganti-foto&id_peg=<?=$id_peg?>" title="ganti foto">
										<?php
										if (empty($data['foto']))
											if ($data['jk'] == "Laki-laki"){
												echo "<img src='assets/foto/no-foto-male.png' width='150' height='200' />";
											}
											else{
												echo "<img src='assets/foto/no-foto-female.png' width='150' height='200' />";
											}
											else
											echo "<img src='assets/foto/$data[foto]' width='150' height='200' />";
										?>
										</a>
									</span>
									<div class="space space-4"></div>
									<div class="width-80 label label-warning label-lg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
											<span class="white"><?=$data['nama']?></span>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-9">
									<h4 class="blue"><span class="label label-lg label-purple arrowed-in-right">&nbsp; &nbsp; # Biodata Pegawai &nbsp; &nbsp;</span></h4>
									<div class="profile-user-info">
										<div class="profile-info-row">
											<div class="profile-info-name"> Nama </div>
											<div class="profile-info-value"><span><strong><?=$data['nama']?></strong></span></div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> NIP </div>
											<div class="profile-info-value"><span><?=$data['nip']?></span></div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Jenis Kelamin </div>
											<div class="profile-info-value">
												<i class="fa fa-intersex light-orange bigger-110"></i> &nbsp;<span><?=$data['jk']?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Tempat Tanggal Lahir </div>
											<div class="profile-info-value"><i class="fa fa-map-marker light-orange bigger-110"></i> &nbsp;<span><?=$data['tempat_lhr']?>, <?=$data['tgl_lhr']?></span></div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Umur </div>
											<div class="profile-info-value"><span><?php echo $diff->y." Tahun, ".$diff->m." Bulan, ".$diff->d." Hari";?></span></div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Golongan Darah </div>
											<div class="profile-info-value"><span><?=$data['gol_darah']?></span></div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Agama </div>
											<div class="profile-info-value"><span><?=$data['agama']?></span></div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Status Pernikahan</div>
											<div class="profile-info-value"><span><?=$data['status_nikah']?></span>
											</div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> No. Telp </div>
											<div class="profile-info-value"><span><?=$data['telp']?></span></div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Email </div>
											<div class="profile-info-value"><span><?=$data['email']?></span></div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Alamat </div>
											<div class="profile-info-value"><span><?=$data['alamat']?></span></div>
										</div>
										<div class="profile-info-row">
											<div class="profile-info-name"> Status Kepegawaian </div>
											<div class="profile-info-value"><span><?=$data['status_kepeg']?></span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="si" class="tab-pane">
							<div class="widget-body">
								<div class="widget-main no-padding">
									<table class="table table-bordered table-striped">
										<thead class="thin-border-bottom">
											<tr>
												<th><i class="ace-icon fa fa-caret-right blue"></i> NIK</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Nama</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> TTL</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Pendidikan</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Pekerjaan</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Hubungan</th>
												<th><i class="ace-icon fa fa-caret-right red"></i> More</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$tampilSi	=mysql_query("SELECT * FROM tb_suamiistri WHERE id_peg='$id_peg'");
												while($si=mysql_fetch_array($tampilSi)){
											?>
											<tr>
												<td><?php echo $si['nik'];?></td>
												<td><?php echo $si['nama'];?></td>
												<td><?php echo $si['tmp_lhr'];?>, <?php echo $si['tgl_lhr'];?></td>
												<td><?php echo $si['pendidikan'];?></td>
												<td><?php echo $si['pekerjaan'];?></td>
												<td><?php echo $si['status_hub'];?></td>
												<td class="tools" align="center">
													<a href="home-admin.php?page=form-edit-data-si&id_si=<?=$si['id_si'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;&nbsp;
													<a href="home-admin.php?page=delete-data-si&id_si=<?=$si['id_si'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Suami / Istri <?php echo $si['nama']?> == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a></td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div id="anak" class="tab-pane">
							<div class="widget-body">
								<div class="widget-main no-padding">
									<table class="table table-bordered table-striped">
										<thead class="thin-border-bottom">
											<tr>
												<th><i class="ace-icon fa fa-caret-right blue"></i> NIK</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Nama</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> TTL</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> JK</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Pendidikan</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Pekerjaan</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Hubungan</th>
												<th><i class="ace-icon fa fa-caret-right red"></i> More</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$tampilAna	=mysql_query("SELECT * FROM tb_anak WHERE id_peg='$id_peg' ORDER BY tgl_lhr DESC");
												while($ana=mysql_fetch_array($tampilAna)){
											?>
											<tr>
												<td><?php echo $ana['nik'];?></td>
												<td><?php echo $ana['nama'];?></td>
												<td><?php echo $ana['tmp_lhr'];?>, <?php echo $ana['tgl_lhr'];?></td>
												<td><?php echo $ana['jk'];?></td>
												<td><?php echo $ana['pendidikan'];?></td>
												<td><?php echo $ana['pekerjaan'];?></td>
												<td><?php echo $ana['status_hub'];?></td>
												<td class="tools" align="center">
													<a href="home-admin.php?page=form-edit-data-anak&id_anak=<?=$ana['id_anak'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;&nbsp;
													<a href="home-admin.php?page=delete-data-anak&id_anak=<?=$ana['id_anak'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Anak <?php echo $ana['nama']?> == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
												</td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div id="ortu" class="tab-pane">
							<div class="widget-body">
								<div class="widget-main no-padding">
									<table class="table table-bordered table-striped">
										<thead class="thin-border-bottom">
											<tr>
												<th><i class="ace-icon fa fa-caret-right blue"></i> NIK</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Nama</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> TTL</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Pendidikan</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Pekerjaan</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Hubungan</th>
												<th><i class="ace-icon fa fa-caret-right red"></i> More</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$tampilOrt	=mysql_query("SELECT * FROM tb_ortu WHERE id_peg='$id_peg' ORDER BY tgl_lhr DESC");
												while($ort=mysql_fetch_array($tampilOrt)){
											?>
											<tr>
												<td><?php echo $ort['nik'];?></td>
												<td><?php echo $ort['nama'];?></td>
												<td><?php echo $ort['tmp_lhr'];?>, <?php echo $ort['tgl_lhr'];?></td>
												<td><?php echo $ort['pendidikan'];?></td>
												<td><?php echo $ort['pekerjaan'];?></td>
												<td><?php echo $ort['status_hub'];?></td>
												<td class="tools" align="center">
													<a href="home-admin.php?page=form-edit-data-ortu&id_ortu=<?=$ort['id_ortu'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;&nbsp;
													<a href="home-admin.php?page=delete-data-ortu&id_ortu=<?=$ort['id_ortu'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Orang Tua <?php echo $ort['nama']?> == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
												</td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div id="sekolah" class="tab-pane">
							<div class="widget-body">
								<div class="widget-main no-padding">
									<table class="table table-bordered table-striped">
										<thead class="thin-border-bottom">
											<tr>
												<th>Tingkat</th>
												<th>Nama Sekolah</th>
												<th>Lokasi</th>
												<th>Jurusan</th>
												<th>No. Ijazah</th>
												<th>Tgl. Ijazah</th>
												<th>Kepala / Rektor</th>
												<th>Status</th>
												<th width="7%">More</th>
												<th>Setup Pend. Akhir</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$tampilSek	=mysql_query("SELECT * FROM tb_sekolah WHERE id_peg='$id_peg' ORDER BY tgl_ijazah DESC");
												while($sek=mysql_fetch_array($tampilSek)){
											?>
											<tr>
												<td><?php echo $sek['tingkat'];?></td>
												<td><?php echo $sek['nama_sekolah'];?></td>
												<td><?php echo $sek['lokasi'];?></td>
												<td><?php echo $sek['jurusan'];?></td>
												<td><?php echo $sek['no_ijazah'];?></td>
												<td><?php echo $sek['tgl_ijazah'];?></td>
												<td><?php echo $sek['kepala'];?></td>
												<td><?php 
													if ($sek['status'] ==""){
														echo "-";
													}
													else{
														echo "Pend. $sek[status]";
													}
													?>
												</td>
												<td class="tools" align="center">
													<a href="home-admin.php?page=form-edit-data-sekolah&id_sekolah=<?=$sek['id_sekolah'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;
													<a href="home-admin.php?page=delete-data-sekolah&id_sekolah=<?=$sek['id_sekolah'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Data Pendidikan == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
												</td>
												<td class="tools"><a href="home-admin.php?page=set-pendidikan-akhir&id_sekolah=<?=$sek['id_sekolah'];?>&id_peg=<?=$id_peg?>&tingkat=<?=$sek['tingkat']?>" title="setup sbg pendidikan akhir" type="button" class="label label-lg label-info arrowed-in arrowed-left"> Setup</a></td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div id="bahasa" class="tab-pane">
							<div class="widget-body">
								<div class="widget-main no-padding">
									<table class="table table-bordered table-striped">
										<thead class="thin-border-bottom">
											<tr>
												<th><i class="ace-icon fa fa-caret-right blue"></i> No.</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Jenis Bahasa</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Bahasa</th>
												<th><i class="ace-icon fa fa-caret-right blue"></i> Kemampuan Bicara</th>
												<th><i class="ace-icon fa fa-caret-right red"></i> More</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no=0;
												$tampilBhs	=mysql_query("SELECT * FROM tb_bahasa WHERE id_peg='$id_peg'");
												while($bhs=mysql_fetch_array($tampilBhs)){
												$no++;
											?>
											<tr>
												<td><?=$no?></td>
												<td><?php echo $bhs['jns_bhs'];?></td>
												<td><?php echo $bhs['bahasa'];?></td>
												<td><?php echo $bhs['kemampuan'];?></td>
												<td class="tools" align="center">
													<a href="home-admin.php?page=form-edit-data-bahasa&id_bhs=<?=$bhs['id_bhs'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;
													<a href="home-admin.php?page=delete-data-bahasa&id_bhs=<?=$bhs['id_bhs'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Data Bahasa == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
												</td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div id="skp" class="tab-pane">
							<div class="widget-body">
								<div class="widget-main no-padding">
									<table class="table table-bordered table-striped">
										<thead class="thin-border-bottom">
											<tr>
												<th rowspan="2">No</th>
												<th colspan="2">Periode Penilaian</th>
												<th colspan="2">Penilai</th>
												<th rowspan="2">Nilai Total</th>
												<th rowspan="2">Rata-Rata</th>
												<th rowspan="2">Mutu</th>
												<th rowspan="2" width="6%">More</th>
												<th rowspan="2" width="6%">View</th>
											</tr>
											<tr>
												<th scope="col">Awal</th>
												<th scope="col">Akhir</th>
												<th scope="col">Pejabat</th>
												<th scope="col">Atasan Pejabat</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no=0;
												$tampilSkp	=mysql_query("SELECT * FROM tb_skp WHERE id_peg='$id_peg' ORDER BY periode_akhir");
												while($skp=mysql_fetch_array($tampilSkp)){
													$id_skp	=$skp['id_skp'];									
												$no++;
											?>	
											<tr>
												<td><?=$no?></td>
												<td><?php echo $skp['periode_awal'];?></td>
												<td><?php echo $skp['periode_akhir'];?></td>
												<td><?php echo $skp['penilai'];?></td>
												<td><?php echo $skp['atasan_penilai'];?></td>
												<td><?php
													$nilai	=mysql_query("SELECT * FROM tb_skp WHERE id_skp='$id_skp'");
														while($nskp=mysql_fetch_array($nilai)){
															$orientasi		=$nskp['nilai_orientasi'];
															$integritas		=$nskp['nilai_integritas'];
															$komitmen		=$nskp['nilai_komitmen'];
															$disiplin		=$nskp['nilai_disiplin'];
															$kerjasama		=$nskp['nilai_kerjasama'];
															$kepemimpinan	=$nskp['nilai_kepemimpinan'];
														}
														$jml_nilai	=$orientasi+$integritas+$komitmen+$disiplin+$kerjasama+$kepemimpinan;
														$rata		=$jml_nilai/6;
													echo $jml_nilai;
													?>
												</td>
												<td><?=number_format($rata,2,",",",")?></td>
												<td><?php echo $skp['hasil_penilaian'];?></td>
												<td class="tools" align="center">
													<a href="home-admin.php?page=form-edit-data-skp&id_skp=<?=$skp['id_skp'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;
													<a href="home-admin.php?page=delete-data-skp&id_skp=<?=$skp['id_skp'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Data SKP == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
												</td>
												<td class="tools"><a href="home-admin.php?page=detail-data-skp&id_skp=<?=$skp['id_skp'];?>" title="view detail" type="button" class="label label-lg label-warning arrowed-in arrowed-left"> Detail</a></td>
											</tr>
											<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="user-profile">				
				<ul class="nav nav-tabs padding-18">
					<li class="active"><a data-toggle="tab" href="#profile"><i class="orange ace-icon fa fa-bars bigger-120"></i> Kepegawaian</a></li>
				</ul>
				<div class="space-6"></div>
				<div class="tab-content no-border padding-6 pull-right">
					<a type="button" data-toggle="modal" data-target="#pensiun" class="btn btn-white btn-success btn-bold"><i class="ace-icon fa fa-calendar bigger-100"></i> Pensiun</a>
				</div>
				<div class="tab-content no-border padding-6 pull-right">
					<a type="button" data-toggle="modal" data-target="#naikpangkat" class="btn btn-white btn-info btn-bold"><i class="ace-icon fa fa-calendar bigger-100"></i> Naik Pangkat</a>
				</div>
				<div class="tab-content no-border padding-6 pull-right">
					<a type="button" data-toggle="modal" data-target="#naikgaji" class="btn btn-white btn-warning btn-bold"><i class="ace-icon fa fa-calendar bigger-100"></i> Naik Gaji</a>
				</div>
				<div class="tab-content no-border padding-6 pull-right">
					<a type="button" data-toggle="modal" data-target="#jabatan" class="btn btn-white btn-danger btn-bold"><i class="ace-icon fa fa-star bigger-100"></i> Jabatan</a>
				</div>
				<div class="tab-content no-border padding-6 pull-right">
					<a type="button" data-toggle="modal" data-target="#pangkat" class="btn btn-white btn-purple btn-bold"><i class="ace-icon fa fa-star bigger-100"></i> Kepangkatan</a>
				</div>
				<div class="tab-content no-border padding-6 pull-right">
					<a type="button" data-toggle="modal" data-target="#hukuman" class="btn btn-white btn-primary btn-bold"><i class="ace-icon fa fa-gavel bigger-100"></i> Hukuman</a>
				</div>
				<div class="tab-content no-border padding-6 pull-right">
					<a type="button" data-toggle="modal" data-target="#diklat" class="btn btn-white btn-default btn-bold"><i class="ace-icon fa fa-graduation-cap bigger-100"></i> Diklat</a>
				</div>
				<div class="tab-content no-border padding-6 pull-right">
					<a type="button" data-toggle="modal" data-target="#harga" class="btn btn-white btn-danger btn-bold"><i class="ace-icon fa fa-certificate bigger-100"></i> Penghargaan</a>
				</div>
				<div class="tab-content no-border padding-6 pull-right">
					<a type="button" data-toggle="modal" data-target="#tugas" class="btn btn-white btn-success btn-bold"><i class="ace-icon fa fa-flag bigger-100"></i> Penugasan LN</a>
				</div>
				<div class="tab-content no-border padding-6 pull-right">
					<a type="button" data-toggle="modal" data-target="#seminar" class="btn btn-white btn-info btn-bold"><i class="ace-icon fa fa-desktop bigger-100"></i> Seminar</a>
				</div>
				<div class="tab-content no-border padding-6 pull-right">
					<a type="button" data-toggle="modal" data-target="#cuti" class="btn btn-white btn-warning btn-bold"><i class="ace-icon fa fa-calendar bigger-100"></i> Cuti</a>
				</div>
				<div class="tab-content no-border padding-6 pull-right">
					<a type="button" data-toggle="modal" data-target="#latjab" class="btn btn-white btn-purple btn-bold"><i class="ace-icon fa fa-book bigger-100"></i> Latihan Jabatan</a>
				</div>
				<div class="tab-content no-border padding-6 pull-right">
					<a type="button" data-toggle="modal" data-target="#mutasi" class="btn btn-white btn-danger btn-bold"><i class="ace-icon fa fa-exchange bigger-100"></i> Mutasi</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="pensiun" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="white">&times;</span></button>Schedule Pensiun
				</div>
			</div>
			<div class="col-sm-10 col-sm-offset-1">
				<div class="modal-body">
					<div class="widget-body">
						<div class="widget-main">							
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th width="40%"><i class="ace-icon fa fa-caret-right blue"></i> Tanggal Kelahiran</th>
										<th width="60%"><i class="ace-icon fa fa-caret-right blue"></i> Tanggal Jatuh Tempo Pensiun</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$tampilPens	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$id_peg'");
										$pens	=mysql_fetch_array($tampilPens);
											$lahir	=$pens['tgl_lhr'];
											$pensiun=$pens['tgl_pensiun'];							
									?>
									<tr>
										<td><?=$lahir?></td>
										<td><?=$pensiun?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<div id="naikpangkat" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="white">&times;</span></button>Schedule Periode Kenaikan Pangkat
				</div>
			</div>
			<div class="col-sm-10 col-sm-offset-1">
				<div class="modal-body">
					<div class="widget-body">
						<div class="widget-main">							
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th width="40%"><i class="ace-icon fa fa-caret-right blue"></i> Periode</th>
										<th width="60%"><i class="ace-icon fa fa-caret-right blue"></i> Tanggal Kenaikan Pangkat</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$tampilNp	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$id_peg'");
										$np	=mysql_fetch_array($tampilNp);
											$naikpangkat	=$np['tgl_naikpangkat'];																	
											$naikpensiun	=$np['tgl_pensiun'];
									
										$begin = new DateTime($naikpangkat);
										$end = new DateTime($naikpensiun);
										$no=0;
										for($i = $begin; $begin <= $end; $i->modify('+4 year')){	
										$no++;
									?>
									<tr>
										<td>Periode <?=$no?></td>
										<td><?php echo $i->format("Y-m-d");?></td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<div id="naikgaji" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="white">&times;</span></button>Schedule Periode Kenaikan Gaji
				</div>
			</div>
			<div class="col-sm-10 col-sm-offset-1">
				<div class="modal-body">
					<div class="widget-body">
						<div class="widget-main">							
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th width="40%"><i class="ace-icon fa fa-caret-right blue"></i> Periode</th>
										<th width="60%"><i class="ace-icon fa fa-caret-right blue"></i> Tanggal Kenaikan Gaji</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$tampilGj	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$id_peg'");
										$ng	=mysql_fetch_array($tampilGj);
											$naikgaji	=$ng['tgl_naikgaji'];																	
											$naikpens	=$ng['tgl_pensiun'];
									
										$beging = new DateTime($naikgaji);
										$endg = new DateTime($naikpens);
										$nog=0;
										for($ig = $beging; $beging <= $endg; $ig->modify('+2 year')){	
										$nog++;
									?>
									<tr>
										<td>Periode <?=$nog?></td>
										<td><?php echo $ig->format("Y-m-d");?></td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<div id="jabatan" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="white">&times;</span></button>Riwayat Jabatan
				</div>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<div class="widget-body">
						<div class="widget-main">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th width="6%"><i class="ace-icon fa fa-caret-right blue"></i> No</th>
										<th><i class="ace-icon fa fa-caret-right blue"></i> Jabatan</th>
										<th><i class="ace-icon fa fa-caret-right blue"></i> Eselon</th>
										<th width="20%"><i class="ace-icon fa fa-caret-right blue"></i> TMT</th>
										<th width="6%"><i class="ace-icon fa fa-caret-right blue"></i> SK</th>
										<th><i class="ace-icon fa fa-caret-right blue"></i> Status</th>
										<th width="7%"><i class="ace-icon fa fa-caret-right red"></i> More</th>
										<th width="12%"><i class="ace-icon fa fa-caret-right red"></i> Setup<br />Jab. Sekarang</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=0;
										$tampilJab	=mysql_query("SELECT * FROM tb_jabatan WHERE id_peg='$id_peg' ORDER BY tmt_jabatan DESC");
										while($jab=mysql_fetch_array($tampilJab)){
										$no++;
									?>
									<tr>
										<td><?=$no?></td>
										<td><?php echo $jab['jabatan'];?></td>
										<td><?php echo $jab['eselon'];?></td>
										<td><?php echo $jab['tmt_jabatan'];?> &nbsp; <b>s/d</b> &nbsp; <?php echo $jab['sampai_tgl'];?></td>
										<td><?php 
												if ($jab['file'] ==""){
													echo "-";
												}
												else{
													echo "<a href='assets/file/$jab[file]' target='_blank' title='download'><i class='fa fa-file'></i></a>";
												}
											?>
										</td>
										<td><?php 
												if ($jab['status_jab'] ==""){
													echo "-";
												}
												else{
													echo "$jab[status_jab]";
												}
											?>
										</td>
										<td class="tools" align="center">
											<a href="home-admin.php?page=form-edit-data-jabatan&id_jab=<?=$jab['id_jab'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;
											<a href="home-admin.php?page=delete-data-jabatan&id_jab=<?=$jab['id_jab'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Data Jabatan == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
										</td>
										<td class="tools"><a href="home-admin.php?page=set-jabatan-sekarang&id_jab=<?=$jab['id_jab'];?>&id_peg=<?=$id_peg?>&jabatan=<?=$jab['jabatan']?>" title="setup sbg jabatan sekarang" type="button" class="label label-lg label-info arrowed-in arrowed-left"> Setup</a></td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<div id="pangkat" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="white">&times;</span></button>Riwayat Pangkat
				</div>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<div class="widget-body">
						<div class="widget-main">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th rowspan="2">No</th>
										<th rowspan="2">Pangkat</th>
										<th rowspan="2">Gol</th>
										<th rowspan="2">Jenis</th>
										<th rowspan="2">TMT</th>
										<th colspan="3">Surat Keputusan</th>
										<th rowspan="2">SK</th>
										<th rowspan="2">Status</th>
										<th rowspan="2">More</th>
										<th rowspan="2" width="10%">Setup Pangkat Sekarang</th>
									</tr>
									<tr>
										<th>Pejabat Pengesah</th>
										<th>Nomor</th>
										<th>Tgl Pengesahan</th>																		
									</tr>
								</thead>
								<tbody>
									<?php
										$no=0;
										$tampilPan	=mysql_query("SELECT * FROM tb_pangkat WHERE id_peg='$id_peg' ORDER BY tgl_sk");
										while($pangkat=mysql_fetch_array($tampilPan)){
										$no++;
									?>
									<tr>
										<td><?=$no?></td>
										<td><?php echo $pangkat['pangkat'];?></td>
										<td><?php echo $pangkat['gol'];?></td>
										<td><?php echo $pangkat['jns_pangkat'];?></td>
										<td><?php echo $pangkat['tmt_pangkat'];?></td>
										<td><?php echo $pangkat['pejabat_sk'];?></td>
										<td><?php echo $pangkat['no_sk'];?></td>
										<td><?php echo $pangkat['tgl_sk'];?></td>
										<td><?php 
												if ($pangkat['file'] ==""){
													echo "-";
												}
												else{
													echo "<a href='assets/file/$pangkat[file]' target='_blank' title='download'><i class='fa fa-file'></i></a>";
												}
											?>
										</td>
										<td><?php 
											if ($pangkat['status_pan'] ==""){
												echo "-";
											}
											else{
												echo "$pangkat[status_pan]";
											}
											?>
										</td>
										<td class="tools" align="center">
											<a href="home-admin.php?page=form-edit-data-pangkat&id_pangkat=<?=$pangkat['id_pangkat'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;
											<a href="home-admin.php?page=delete-data-pangkat&id_pangkat=<?=$pangkat['id_pangkat'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Data Pangkat == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
										</td>
										<td class="tools"><a href="home-admin.php?page=set-pangkat-sekarang&id_pangkat=<?=$pangkat['id_pangkat'];?>&gol=<?=$pangkat['gol'];?>&id_peg=<?=$id_peg?>" title="setup sbg pangkat sekarang" type="button" class="label label-lg label-info arrowed-in arrowed-left"> Setup</a></td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<div id="hukuman" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="white">&times;</span></button>Riwayat Hukuman
				</div>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<div class="widget-body">
						<div class="widget-main">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th rowspan="2">No</th>
										<th rowspan="2">Jenis Hukuman</th>
										<th colspan="3">Surat Keputusan</th>
										<th colspan="3">Pemulihan</th>
										<th rowspan="2">More</th>
									</tr>
									<tr>
										<th>Pejabat Pengesah</th>
										<th>Nomor SK</th>
										<th>Tgl Pengesahan</th>
										<th>Pejabat Pemulih</th>
										<th>Nomor Pemulihan</th>
										<th>Tgl Pemulihan</th>											
									</tr>
								</thead>
								<tbody>
									<?php
										$no=0;
										$tampilHuk	=mysql_query("SELECT * FROM tb_hukuman WHERE id_peg='$id_peg' ORDER BY tgl_sk");
										while($hukum=mysql_fetch_array($tampilHuk)){
										$no++;
									?>
									<tr>
										<td><?=$no?></td>
										<td><?php echo $hukum['hukuman'];?></td>
										<td><?php echo $hukum['pejabat_sk'];?></td>
										<td><?php echo $hukum['no_sk'];?></td>
										<td><?php echo $hukum['tgl_sk'];?></td>
										<td><?php echo $hukum['pejabat_pulih'];?></td>
										<td><?php echo $hukum['no_pulih'];?></td>
										<td><?php echo $hukum['tgl_pulih'];?></td>
										<td class="tools" align="center">
											<a href="home-admin.php?page=form-edit-data-hukuman&id_hukuman=<?=$hukum['id_hukuman'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;
											<a href="home-admin.php?page=delete-data-hukuman&id_hukuman=<?=$hukum['id_hukuman'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Data Hukuman == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
										</td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<div id="diklat" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="white">&times;</span></button>Riwayat Diklat
				</div>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<div class="widget-body">
						<div class="widget-main">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th>No</th>
										<th>Nama Diklat</th>
										<th>Jumlah Jam</th>
										<th>Penyelenggara</th>
										<th>Tempat</th>
										<th>Angkatan</th>
										<th>Tahun</th>
										<th>No STTPP</th>
										<th>Tgl STTPP</th>
										<th>Sertifikat</th>
										<th>More</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=0;
										$tampilDik	=mysql_query("SELECT * FROM tb_diklat WHERE id_peg='$id_peg' ORDER BY tahun");
										while($dik=mysql_fetch_array($tampilDik)){
										$no++;
									?>
									<tr>
										<td><?=$no?></td>
										<td><?php echo $dik['diklat'];?></td>
										<td><?php echo $dik['jml_jam'];?></td>
										<td><?php echo $dik['penyelenggara'];?></td>
										<td><?php echo $dik['tempat'];?></td>
										<td><?php echo $dik['angkatan'];?></td>
										<td><?php echo $dik['tahun'];?></td>
										<td><?php echo $dik['no_sttpp'];?></td>
										<td><?php echo $dik['tgl_sttpp'];?></td>
										<td><?php 
												if ($dik['file'] ==""){
													echo "-";
												}
												else{
													echo "<a href='assets/file/$dik[file]' target='_blank' title='download'><i class='fa fa-file'></i></a>";
												}
											?>
										</td>
										<td class="tools" align="center">
											<a href="home-admin.php?page=form-edit-data-diklat&id_diklat=<?=$dik['id_diklat'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;
											<a href="home-admin.php?page=delete-data-diklat&id_diklat=<?=$dik['id_diklat'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Data Diklat == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
										</td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<div id="harga" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="white">&times;</span></button>Riwayat Penghargaan
				</div>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<div class="widget-body">
						<div class="widget-main">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th>No</th>
										<th>Nama Penghargaan</th>
										<th>Tahun</th>
										<th>Negara / Instansi Pemberi</th>
										<th>More</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=0;
										$tampilHar	=mysql_query("SELECT * FROM tb_penghargaan WHERE id_peg='$id_peg' ORDER BY tahun");
										while($har=mysql_fetch_array($tampilHar)){
										$no++;
									?>
									<tr>
										<td><?=$no?></td>
										<td><?php echo $har['penghargaan'];?></td>
										<td><?php echo $har['tahun'];?></td>
										<td><?php echo $har['pemberi'];?></td>
										<td class="tools" align="center">
											<a href="home-admin.php?page=form-edit-data-penghargaan&id_penghargaan=<?=$har['id_penghargaan'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;
											<a href="home-admin.php?page=delete-data-penghargaan&id_penghargaan=<?=$har['id_penghargaan'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Data Penghargaan == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
										</td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<div id="tugas" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="white">&times;</span></button>Riwayat Penugasan Luar Negeri
				</div>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<div class="widget-body">
						<div class="widget-main">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th>No</th>
										<th>Negara Tujuan</th>
										<th>Tahun</th>
										<th>Lama Penugasan (Hari)</th>
										<th>Alasan Penugasan</th>
										<th>More</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=0;
										$tampilTug	=mysql_query("SELECT * FROM tb_penugasan WHERE id_peg='$id_peg' ORDER BY tahun");
										while($tug=mysql_fetch_array($tampilTug)){
										$no++;
									?>	
									<tr>
										<td><?=$no?></td>
										<td><?php echo $tug['tujuan'];?></td>
										<td><?php echo $tug['tahun'];?></td>
										<td><?php echo $tug['lama'];?></td>
										<td><?php echo $tug['alasan'];?></td>
										<td class="tools" align="center">
											<a href="home-admin.php?page=form-edit-data-penugasan&id_penugasan=<?=$tug['id_penugasan'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;
											<a href="home-admin.php?page=delete-data-penugasan&id_penugasan=<?=$tug['id_penugasan'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Data Penugasan LN == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
										</td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<div id="seminar" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="white">&times;</span></button>Riwayat Seminar
				</div>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<div class="widget-body">
						<div class="widget-main">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th>No</th>
										<th>Nama Seminar</th>
										<th>Tempat</th>
										<th>Penyelenggara</th>
										<th>Tanggal Mulai</th>
										<th>Tanggal Selesai</th>
										<th>No. Piagam</th>
										<th>Tanggal Piagam</th>
										<th>Sertifikat</th>
										<th>More</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=0;
										$tampilSem	=mysql_query("SELECT * FROM tb_seminar WHERE id_peg='$id_peg' ORDER BY tgl_selesai");
										while($sem=mysql_fetch_array($tampilSem)){
										$no++;
									?>	
									<tr>
										<td><?=$no?></td>
										<td><?php echo $sem['seminar'];?></td>
										<td><?php echo $sem['tempat'];?></td>
										<td><?php echo $sem['penyelenggara'];?></td>
										<td><?php echo $sem['tgl_mulai'];?></td>
										<td><?php echo $sem['tgl_selesai'];?></td>
										<td><?php echo $sem['no_piagam'];?></td>
										<td><?php echo $sem['tgl_piagam'];?></td>
										<td><?php 
												if ($sem['file'] ==""){
													echo "-";
												}
												else{
													echo "<a href='assets/file/$sem[file]' target='_blank' title='download'><i class='fa fa-file'></i></a>";
												}
											?>
										</td>
										<td class="tools" align="center">
											<a href="home-admin.php?page=form-edit-data-seminar&id_seminar=<?=$sem['id_seminar'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;
											<a href="home-admin.php?page=delete-data-seminar&id_seminar=<?=$sem['id_seminar'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Data Seminar == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
										</td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<div id="cuti" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="white">&times;</span></button>Riwayat Cuti
				</div>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<div class="widget-body">
						<div class="widget-main">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th>No</th>
										<th>Jenis Cuti</th>
										<th>No. Surat Cuti</th>
										<th>Tgl Surat Cuti</th>
										<th>Tanggal Mulai</th>
										<th>Tanggal Selesai</th>
										<th>Keterangan</th>
										<th>More</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=0;
										$tampilCut	=mysql_query("SELECT * FROM tb_cuti WHERE id_peg='$id_peg' ORDER BY tgl_suratcuti");
										while($cut=mysql_fetch_array($tampilCut)){
										$no++;
									?>	
									<tr>
										<td><?=$no?></td>
										<td><?php echo $cut['jns_cuti'];?></td>
										<td><?php echo $cut['no_suratcuti'];?></td>
										<td><?php echo $cut['tgl_suratcuti'];?></td>
										<td><?php echo $cut['tgl_mulai'];?></td>
										<td><?php echo $cut['tgl_selesai'];?></td>
										<td><?php echo $cut['ket'];?></td>
										<td class="tools" align="center">
											<a href="home-admin.php?page=form-edit-data-cuti&id_cuti=<?=$cut['id_cuti'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;
											<a href="home-admin.php?page=delete-data-cuti&id_cuti=<?=$cut['id_cuti'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Data Cuti == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
										</td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<div id="latjab" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="white">&times;</span></button>Riwayat Pelatihan Jabatan
				</div>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<div class="widget-body">
						<div class="widget-main">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th>No</th>
										<th>Nama Pelatih</th>
										<th>Tahun</th>
										<th>Jumlah Jam</th>
										<th>Sertifikat</th>
										<th>More</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=0;
										$tampilLatjab	=mysql_query("SELECT * FROM tb_lat_jabatan WHERE id_peg='$id_peg' ORDER BY tahun_lat");
										while($latjab=mysql_fetch_array($tampilLatjab)){
										$no++;
									?>	
									<tr>
										<td><?=$no?></td>
										<td><?php echo $latjab['nama_pelatih'];?></td>
										<td><?php echo $latjab['tahun_lat'];?></td>
										<td><?php echo $latjab['jml_jam'];?></td>
										<td><?php 
												if ($latjab['file'] ==""){
													echo "-";
												}
												else{
													echo "<a href='assets/file/$latjab[file]' target='_blank' title='download'><i class='fa fa-file'></i></a>";
												}
											?>
										</td>
										<td class="tools" align="center">
											<a href="home-admin.php?page=form-edit-data-lat-jabatan&id_lat_jabatan=<?=$latjab['id_lat_jabatan'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;
											<a href="home-admin.php?page=delete-data-lat-jabatan&id_lat_jabatan=<?=$latjab['id_lat_jabatan'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Data Latihan Jabatan == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
										</td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
<div id="mutasi" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="white">&times;</span></button>Riwayat Mutasi
				</div>
			</div>
			<div class="col-sm-12">
				<div class="modal-body">
					<div class="widget-body">
						<div class="widget-main">
							<table class="table table-bordered table-striped">
								<thead class="thin-border-bottom">
									<tr>
										<th>No</th>
										<th>Jenis Mutasi</th>
										<th>Tanggal</th>
										<th>No. SK</th>
										<th>More</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=0;
										$tampilMut	=mysql_query("SELECT * FROM tb_mutasi WHERE id_peg='$id_peg'");
										while($mut=mysql_fetch_array($tampilMut)){
										$no++;
									?>	
									<tr>
										<td><?=$no?></td>
										<td><?php echo $mut['jns_mutasi'];?></td>
										<td><?php echo $mut['tgl_mutasi'];?></td>
										<td><?php echo $mut['no_mutasi'];?></td>
											<td class="tools" align="center">
											<a href="home-admin.php?page=form-edit-data-mutasi&id_mutasi=<?=$mut['id_mutasi'];?>" title="edit"><i class="ace-icon fa fa-edit"></i></a>&nbsp;
											<a href="home-admin.php?page=delete-data-mutasi&id_mutasi=<?=$mut['id_mutasi'];?>" title="delete" onclick="return confirm('Are you sure you want to delete == Data Mutasi == from Database?');"><i class="ace-icon fa fa-trash-o"></i></a>
										</td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer no-margin-top">
			</div>
		</div>
	</div>
</div>
		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.gritter.min.js"></script>
		<script src="assets/js/bootbox.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="assets/js/select2.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-editable.min.js"></script>
		<script src="assets/js/ace-editable.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script> // 500 = 0,5 s
            $(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
            setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
        </script>