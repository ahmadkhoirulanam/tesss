<?php
	$q = $db->prepare("SELECT * FROM angket_periode WHERE sha1(kdper) = ?");
	$q->execute([$id]);

	if($q->rowCount()==0){
		redirectto("");$_SESSION["notif"]="danger#Maaf, Periode tidak ditemukan";
	}else{
		$r= $q->fetch();
		$button="simpan";
	}

	
?>

<main id="js-page-content" role="main" class="page-content">
     <div class="row">
         <div class="col-md-12">
         <?php include("site/notifikasi.php");?>
         </div>

		 <div class="col-md-12">
		 <div id="panel-1" class="panel">
			<div class="panel-hdr">
				<h2><?php echo $r["judul"];?></h2>
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<form method="post" action="<?php echo baseurl("angket-action");?>">
					<input type="hidden" name="kdangket" value="<?php echo $r["kdangket"];?>">
					<input type="hidden" name="kdper" value="<?php echo $r["kdper"];?>">						
					<div class="row">
						<div class="col-md-12 mb-3 p-2" align="justify">
						<strong>TUJUAN</strong>
						<p>Kuisioner ini bertujuan untuk mengukur tingkat kepuasan mahasiswa terhadap pelayanan Dosen Universitas PGRI Semarang dalam pelayanan pembelajaran pada mata kuliah</p>
							
						<strong>PETUNJUK</strong>
						<ol>
							<li>Saudara yang terpilih sebagai responden, dimohon untuk mengisi seluruh instrumen ini sesuai dengan pengalaman, pengetahuan, persepsi, dan keadaan yang sebenarnya.</li>
							<li>Partisipasi Saudara untuk mengisi instrumen ini secara objektif sangat besar artinya bagi Universitas PGRI Semarang untuk mendapatkan masukan yang akurat dalam rangka perMemuaskanan dan peningkatan pelayanan akademik kedepan.</li>
							<li>Jawaban Saudara akan dijamin kerahasiaan dan tidak memiliki dampak negatif bagi siapapun.</li>
							<li>Pilihlah salah satu dari alternatif yang disediakan dengan mengklik pada pilihan jawaban yang tersedia.</li>
							
						</ol>
						
						</div>
						<?php
							$query = $db->prepare("SELECT * FROM angket_m001 WHERE sha1(id) = ?");
							$query->execute([$prm]);

							if($query->rowCount()>0){
								$button="update";
								$data = $query->fetch();
								$p1 = isset($data['p1']) ? $data['p1'] : '';
							}							
						?>

							<?php						
							if (empty($prm)) {?>								
								<div class="col-md-12 pt-2 pb-2 bg-primary-800 text-white">
							 		<strong><em>Identitas</em></strong>
								</div>
								<div class="col-md-12 p-2">
								<input type="hidden" name="kdangket" value="1">
								
								<div class="form-group">
									<label class="form-label" for="example-helping">NPM</label>
									<input type="text" id="example-helping" class="form-control" placeholder="ketikan npm" name="kduser">
								</div>
								<div class="row pb-5">
									<div class="col-lg-6">
									<div class="form-group">
										<label class="form-label" for="single-default">Fakultas</label>
										<select class="select2 form-control w-100" id="single-default">
											<option disabled selected> Pilih </option>
										<?php
											$query = mysqli_query($dbli, "SELECT * FROM fakultas");
											while ($data = mysqli_fetch_array($query)) {
										?>
											<option value="<?=$data['kdfak']?>"><?=$data['nmfak']?></option> 
											<?php
											 }
											?>
										</select>
									</div>
									</div>
									<div class="col-lg-6">
									<div class="form-group">
										<label class="form-label" for="single-default">Program Studi</label>
										<select class="select2 form-control w-100" id="single-default" name="kdprodi">
										<option disabled selected> Pilih </option>
										<?php
																						
											$query = mysqli_query($dbli, "SELECT * FROM prodi");
											
											while ($data = mysqli_fetch_array($query)) {
												?>
												  <option value="<?=$data['kdprodi']?>"><?=$data['nmprodi']?></option> 
												<?php
												 }
										?>
										</select>
									</div>
								</div>						
								</div>
							<?php } else{?>
								<input type="hidden" name="id" value="<?php echo $prm;?>">
								<input type="hidden" name="kduser" value="<?php echo $data["kduser"];?>">
								<input type="hidden" name="kdprodi" value="<?php echo $data["kdprodi"];?>">
							<?php }
						?>
						
						<div class="col-md-12 pt-2 pb-2 bg-primary-800 text-white">
							 <strong><em>Tangibles</em>: Kemampuan dosen memfasilitasi sarana  dalam memberikan layanan terMemuaskan bagi mahasiswa dalam pembelajaran</strong>
						</div>
						<div class="col-md-12 p-2">
							1.	Platform pembelajaran daring mudah diakses dan dapat dimanfaatkan
						</div>
						<div class="col-md-12 p-2 l-5">
							<div class="frame-wrap">
								<div class="custom-control custom-radio">
									<input type="radio" required <?php if(isset($data['p1'])=="1" ? $data['p1']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p11" name="p1">
									<label class="custom-control-label" for="p11">Kurang</label>
								</div>
								<div class="custom-control custom-radio">
									<input type="radio" required <?php if(isset($data['p1'])=="2" ? $data['p1']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p12" name="p2">
									<label class="custom-control-label" for="p12">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p1'])=="3" ? $data['p1']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p13" name="p1">
									<label class="custom-control-label" for="p13">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p1'])=="4" ? $data['p1']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p14" name="p1">
									<label class="custom-control-label" for="p14">Sangat Memuaskan</label>
								</div>
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							2.	Ragam obyek pembelajaran (teks, gambar, audio, video, animasi) yang dipilih menarik dan tepat
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">								
									<input type="radio" required <?php if(isset($data['p2'])=="1" ? $data['p2']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p21" name="p2">
									<label class="custom-control-label" for="p21">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p2'])=="2" ? $data['p2']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p22" name="p2">
									<label class="custom-control-label" for="p22">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p2'])=="3" ? $data['p2']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p23" name="p2">
									<label class="custom-control-label" for="p23">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p2'])=="4" ? $data['p2']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p24" name="p2">
									<label class="custom-control-label" for="p24">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							3.	Referensi dan pustakan yang digunaka  dalam perkuliahan mudah diakses dan didapatkan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p3'])=="1" ? $data['p2']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p31" name="p3">
									<label class="custom-control-label" for="p31">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p3'])=="2" ? $data['p2']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p32" name="p3">
									<label class="custom-control-label" for="p32">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p3'])=="3" ? $data['p2']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p33" name="p3">
									<label class="custom-control-label" for="p33">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p3'])=="4" ? $data['p2']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p34" name="p3">
									<label class="custom-control-label" for="p34">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 pt-2 pb-2 mt-3 bg-primary-800 text-white">
							 <strong><em>Reliability</em>: Kehandalan dosen dalam memberikan layanan pembelajaran</strong>
						</div>
						
						<div class="col-md-12 p-2">
							1.	Ketepatan waktu perkuliahan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p4'])=="1" ? $data['p4']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p41" name="p4">
									<label class="custom-control-label" for="p41">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p4'])=="2" ? $data['p4']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p42" name="p4">
									<label class="custom-control-label" for="p42">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p4'])=="3" ? $data['p4']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p43" name="p4">
									<label class="custom-control-label" for="p43">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p4'])=="4" ? $data['p4']=="4" : ''){ echo "checked=checked";}  ?>  value="4" class="custom-control-input" id="p44" name="p4">
									<label class="custom-control-label" for="p44">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						
						<div class="col-md-12 p-2">
							2.	Kejelasan rencana perkuliahan, aturan, dan penilaian yang dilaksankan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p5'])=="1" ? $data['p5']=="1" : ''){ echo "checked=checked";}  ?>  value="1" class="custom-control-input" id="p51" name="p5">
									<label class="custom-control-label" for="p51">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p5'])=="2" ? $data['p5']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p52" name="p5">
									<label class="custom-control-label" for="p52">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p5'])=="3" ? $data['p5']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p53" name="p5">
									<label class="custom-control-label" for="p53">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p5'])=="4" ? $data['p5']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p54" name="p5">
									<label class="custom-control-label" for="p54">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							3.	Kesuaian proses pembelajaran dengan capaian pembelajaran
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p6'])=="1" ? $data['p6']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p61" name="p6">
									<label class="custom-control-label" for="p61">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p6'])=="2" ? $data['p6']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p62" name="p6">
									<label class="custom-control-label" for="p62">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p6'])=="3" ? $data['p6']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p63" name="p6">
									<label class="custom-control-label" for="p63">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p6'])=="4" ? $data['p6']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p64" name="p6">
									<label class="custom-control-label" for="p64">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							4.	Kejelasan, kedalaman dan keruntutan dalam  penyajian pembelajaran
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p7'])=="1" ? $data['p7']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p71" name="p7">
									<label class="custom-control-label" for="p71">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p7'])=="2" ? $data['p7']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p72" name="p7">
									<label class="custom-control-label" for="p72">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p7'])=="3" ? $data['p7']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p73" name="p7">
									<label class="custom-control-label" for="p73">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p7'])=="4" ? $data['p7']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p74" name="p7">
									<label class="custom-control-label" for="p74">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							5.	Menstimulasi minat dan motivasi peserta perkuliahan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p8'])=="1" ? $data['p8']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p81" name="p8">
									<label class="custom-control-label" for="p81">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p8'])=="2" ? $data['p8']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p82" name="p8">
									<label class="custom-control-label" for="p82">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p8'])=="3" ? $data['p8']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p83" name="p8">
									<label class="custom-control-label" for="p83">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p8'])=="4" ? $data['p8']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p84" name="p8">
									<label class="custom-control-label" for="p84">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							6.	Adaptif dengan situasi dalam menggunakan teknologi
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p9'])=="1" ? $data['p9']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p91" name="p9">
									<label class="custom-control-label" for="p91">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p9'])=="2" ? $data['p9']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p92" name="p9">
									<label class="custom-control-label" for="p92">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p9'])=="3" ? $data['p9']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p93" name="p9">
									<label class="custom-control-label" for="p93">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p9'])=="4" ? $data['p9']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p94" name="p9">
									<label class="custom-control-label" for="p94">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						
						<div class="col-md-12 p-2">
							7.	Keragaman dan pemanfaatan hasil penilaian
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p10'])=="1" ? $data['p10']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p101" name="p10">
									<label class="custom-control-label" for="p101">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p10'])=="2" ? $data['p10']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p102" name="p10">
									<label class="custom-control-label" for="p102">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p10'])=="3" ? $data['p10']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p103" name="p10">
									<label class="custom-control-label" for="p103">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p10'])=="4" ? $data['p10']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p104" name="p10">
									<label class="custom-control-label" for="p104">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 pt-2 pb-2 mt-3 bg-primary-800 text-white">
							 <strong><em>Responsivenes</em>: kemampuan memberikan respon/tanggapan secara tepat sesuai dengan yang dihadapi mahasiswa dalam pembelajaran</strong>
						</div>
						
						<div class="col-md-12 p-2">
							1.	Intensitas dosen untuk ditemui dalam rangka konsultasi akademik
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p11'])=="1" ? $data['p11']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p111" name="p11">
									<label class="custom-control-label" for="p111">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p11'])=="2" ? $data['p11']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p112" name="p11">
									<label class="custom-control-label" for="p112">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p11'])=="3" ? $data['p11']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p113" name="p11">
									<label class="custom-control-label" for="p113">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p11'])=="4" ? $data['p11']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p114" name="p11">
									<label class="custom-control-label" for="p114">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							2.	Ketepatan dalam memberikan alternatif solusi atas permasalahan dalam akademik
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p12'])=="1" ? $data['p12']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p121" name="p12">
									<label class="custom-control-label" for="p121">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p12'])=="2" ? $data['p12']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p122" name="p12">
									<label class="custom-control-label" for="p122">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p12'])=="3" ? $data['p12']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p123" name="p12">
									<label class="custom-control-label" for="p123">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p12'])=="4" ? $data['p12']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p124" name="p12">
									<label class="custom-control-label" for="p124">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							3.	Kecepatan dosen dalam menanggapi pertanyaan/permasalahan mahasiswa
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p13'])=="1" ? $data['p13']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p131" name="p13">
									<label class="custom-control-label" for="p131">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p13'])=="2" ? $data['p13']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p132" name="p13">
									<label class="custom-control-label" for="p132">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p13'])=="3" ? $data['p13']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p133" name="p13">
									<label class="custom-control-label" for="p133">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p13'])=="4" ? $data['p13']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p134" name="p13">
									<label class="custom-control-label" for="p134">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 pt-2 pb-2 mt-3 bg-primary-800 text-white">
							 <strong><em>Assurance</em>: kemampuan dosen memberikan kepastian atau kepercayaan dalam layanan pembelajaran</strong>
						</div>
						
						<div class="col-md-12 p-2">
							1.	Tingkat usaha yang Dosen lakukan dalam perkuliahan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p14'])=="1" ? $data['p14']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p141" name="p14">
									<label class="custom-control-label" for="p141">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p14'])=="2" ? $data['p14']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p142" name="p14">
									<label class="custom-control-label" for="p142">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p14'])=="3" ? $data['p14']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p143" name="p14">
									<label class="custom-control-label" for="p143">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p14'])=="4" ? $data['p14']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p144" name="p14">
									<label class="custom-control-label" for="p144">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							2.	Konten perkuliahan tersusun dan terencana dengan Memuaskan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p15'])=="1" ? $data['p15']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p151" name="p15">
									<label class="custom-control-label" for="p151">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p15'])=="2" ? $data['p15']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p152" name="p15">
									<label class="custom-control-label" for="p152">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p15'])=="3" ? $data['p15']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p153" name="p15">
									<label class="custom-control-label" for="p153">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p15'])=="4" ? $data['p15']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p154" name="p15">
									<label class="custom-control-label" for="p154">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							3.	Beban tugas perkuliahan sesuai dan relevan dengan capaian kompetensi
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p16'])=="1" ? $data['p16']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p161" name="p16">
									<label class="custom-control-label" for="p161">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p16'])=="2" ? $data['p16']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p162" name="p16">
									<label class="custom-control-label" for="p162">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p16'])=="3" ? $data['p16']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p163" name="p16">
									<label class="custom-control-label" for="p163">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p16'])=="4" ? $data['p16']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p164" name="p16">
									<label class="custom-control-label" for="p164">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							4.	Memfasilitasi mahasiswa memahami dan mengelaborasi maupun menerapkan kompetensi
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p17'])=="1" ? $data['p17']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p171" name="p17">
									<label class="custom-control-label" for="p171">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p17'])=="2" ? $data['p17']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p172" name="p17">
									<label class="custom-control-label" for="p172">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p17'])=="3" ? $data['p17']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p173" name="p17">
									<label class="custom-control-label" for="p173">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p17'])=="4" ? $data['p17']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p174" name="p17">
									<label class="custom-control-label" for="p174">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							5.	Memanfaatkan hasil-hasil penelitian dan pengabdian secara mutakhir
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p18'])=="1" ? $data['p18']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p181" name="p18">
									<label class="custom-control-label" for="p181">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p18'])=="2" ? $data['p18']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p182" name="p18">
									<label class="custom-control-label" for="p182">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p18'])=="3" ? $data['p18']=="3" : ''){ echo "checked=checked";} ?>  value="3" class="custom-control-input" id="p183" name="p18">
									<label class="custom-control-label" for="p183">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p18'])=="4" ? $data['p18']=="4" : ''){ echo "checked=checked";} ?>  value="4" class="custom-control-input" id="p184" name="p18">
									<label class="custom-control-label" for="p184">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							6.	Melakukan penilaian secara otentik
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p19'])=="1" ? $data['p19']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p191" name="p19">
									<label class="custom-control-label" for="p191">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p19'])=="2" ? $data['p19']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p192" name="p19">
									<label class="custom-control-label" for="p192">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p19'])=="3" ? $data['p19']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p193" name="p19">
									<label class="custom-control-label" for="p193">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p19'])=="4" ? $data['p19']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p194" name="p19">
									<label class="custom-control-label" for="p194">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						
						<div class="col-md-12 p-2">
							7.	Perkuliahan dilakukan agar memungkinkan semua siswa berpartisipasi secara penuh
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p20'])=="1" ? $data['p20']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p201" name="p20">
									<label class="custom-control-label" for="p201">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p20'])=="2" ? $data['p20']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p202" name="p20">
									<label class="custom-control-label" for="p202">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p20'])=="3" ? $data['p20']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p203" name="p20">
									<label class="custom-control-label" for="p203">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p20'])=="4" ? $data['p20']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p204" name="p20">
									<label class="custom-control-label" for="p204">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 pt-2 pb-2 mt-3 bg-primary-800 text-white">
							 <strong><em>Empathy</em>: perhatian yang tulus dan kolegial terhadap mahasiswa dalam pembelajaran</strong>
						</div>
						
						<div class="col-md-12 p-2">
							1.	Kesediaan dosen membantu mahasiswa yang menghadapi masalah di bidang akademik
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p21'])=="1" ? $data['p21']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p211" name="p21">
									<label class="custom-control-label" for="p211">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p21'])=="2" ? $data['p21']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p212" name="p21">
									<label class="custom-control-label" for="p212">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p21'])=="3" ? $data['p21']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p213" name="p21">
									<label class="custom-control-label" for="p213">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p21'])=="4" ? $data['p21']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p214" name="p21">
									<label class="custom-control-label" for="p214">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							2.	Kemudahan dosen untuk dihubungi melalui telepon, email, dan sebagainya
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p22'])=="1" ? $data['p22']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p221" name="p22">
									<label class="custom-control-label" for="p221">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p22'])=="2" ? $data['p22']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p222" name="p22">
									<label class="custom-control-label" for="p222">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p22'])=="3" ? $data['p22']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p223" name="p22">
									<label class="custom-control-label" for="p223">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p22'])=="4" ? $data['p22']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p224" name="p22">
									<label class="custom-control-label" for="p224">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							3.	Keterbukaan dan sikap kolaboratif dosen dengan mahasiswa
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p23'])=="1" ? $data['p23']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p231" name="p23">
									<label class="custom-control-label" for="p231">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p23'])=="2" ? $data['p23']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p232" name="p23">
									<label class="custom-control-label" for="p232">Cukup</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p23'])=="3" ? $data['p23']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p233" name="p23">
									<label class="custom-control-label" for="p233">Memuaskan</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p23'])=="4" ? $data['p23']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p234" name="p23">
									<label class="custom-control-label" for="p234">Sangat Memuaskan</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 pt-2 pb-2 mt-3 mb-2 bg-primary-800 text-white">
							 <strong>Tuliskan harapan dan saran-saran mahasiswa terhadap proses pembelajaran</strong>
						</div>
						
						<div class="col-md-12 pt-2 pb-2 pl-1 pr-1">
						<textarea  class="form-control" rows="3" spellcheck="false" placeholder="Tuliskan jawaban Anda disini" name="k1"><?php echo isset($data['k1']) ? $data['k1'] : ''?></textarea>
						</div>
						
						<div class="col-md-12 pt-2 pb-2 pl-1 pr-1 text-center">
							<button type="submit" class="btn btn-primary" name="<?php echo $button;?>-m001">Simpan</button>						                                           
						</div>
						
					 </div>
						
					</form>
				</div>
			</div>
		 </div>
		 </div>
	</div>                         
</main>