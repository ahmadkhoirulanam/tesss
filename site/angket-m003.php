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
				<h2>Angket Kepuasan Mahasiswa Terhadap Kinerja Dosen</h2>				
			</div>
			<div class="panel-container show">
				<div class="panel-content">
					<form method="post" action="<?php echo baseurl("angket-action");?>">
					<input type="hidden" name="kdangket" value="<?php echo $r["kdangket"];?>">
					<input type="hidden" name="kdper" value="<?php echo $r["kdper"];?>">			
					<div class="row">
						<div class="col-md-12 mb-3 p-2" align="justify">
						<strong>TUJUAN</strong>
						<p>Kuisioner ini bertujuan untuk mengukur tingkat kepuasan mahasiswa terhadap Kinerja Dosen Universitas PGRI Semarang dalam pelayanan pembelajaran pada mata kuliah</p>
							
						<strong>PETUNJUK</strong>
						<ol>
							<li>Saudara yang terpilih sebagai responden, dimohon untuk mengisi seluruh instrumen ini sesuai dengan pengalaman, pengetahuan, persepsi, dan keadaan yang sebenarnya.</li>
							<li>Partisipasi Saudara untuk mengisi instrumen ini secara objektif sangat besar artinya bagi Universitas PGRI Semarang untuk mendapatkan masukan yang akurat dalam rangka perbaikan dan peningkatan pelayanan akademik kedepan.</li>
							<li>Jawaban Saudara akan dijamin kerahasiaan dan tidak memiliki dampak negatif bagi siapapun.</li>
							<li>Pilihlah salah satu dari alternatif yang disediakan dengan mengklik pada pilihan jawaban yang tersedia.</li>
							
						</ol>
						
						</div>
						<?php
							$query = $db->prepare("SELECT * FROM angket_m003 WHERE sha1(id) = ?");
							$query->execute([$prm]);

							if($query->rowCount()>0){
								$button="edit";
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
							 <strong><em>Kompetensi Pedagogik</em></strong>
						</div>
						<div class="col-md-12 p-2">
							1.	Dosen menyampaikan tujuan dan kontrak perkuliahan di awal pembelajaran
						</div>
						<div class="col-md-12 p-2 l-5">
							<div class="frame-wrap">
								<div class="custom-control custom-radio">
									<input type="radio" required <?php if(isset($data['p1'])=="1" ? $data['p1']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p11" name="p1">
									<label class="custom-control-label" for="p11">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio">
									<input type="radio" required <?php if(isset($data['p1'])=="2" ? $data['p1']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p12" name="p1">
									<label class="custom-control-label" for="p12">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p1'])=="3" ? $data['p1']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p13" name="p1">
									<label class="custom-control-label" for="p13">Baik</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p1'])=="4" ? $data['p1']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p14" name="p1">
									<label class="custom-control-label" for="p14">Sangat Baik</label>
								</div>
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							2.	Keteraturan dan ketertiban penyelenggaraan perkuliahan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">								
									<input type="radio" required <?php if(isset($data['p2'])=="1" ? $data['p2']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p21" name="p2">
									<label class="custom-control-label" for="p21">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p2'])=="2" ? $data['p2']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p22" name="p2">
									<label class="custom-control-label" for="p22">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p2'])=="3" ? $data['p2']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p23" name="p2">
									<label class="custom-control-label" for="p23">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p2'])=="4" ? $data['p2']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p24" name="p2">
									<label class="custom-control-label" for="p24">Sangat Baik</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							3.	Kemampuan menghidupkan suasana kelas
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p3'])=="1" ? $data['p3']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p31" name="p3">
									<label class="custom-control-label" for="p31">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p3'])=="2" ? $data['p3']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p32" name="p3">
									<label class="custom-control-label" for="p32">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p3'])=="3" ? $data['p3']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p33" name="p3">
									<label class="custom-control-label" for="p33">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p3'])=="4" ? $data['p3']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p34" name="p3">
									<label class="custom-control-label" for="p34">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							4.	Kejelasan penyampaian materi dan jawaban terhadap pertanyaan di kelas
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p4'])=="1" ? $data['p4']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p41" name="p4">
									<label class="custom-control-label" for="p41">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p4'])=="2" ? $data['p4']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p42" name="p4">
									<label class="custom-control-label" for="p42">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p4'])=="3" ? $data['p4']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p43" name="p4">
									<label class="custom-control-label" for="p43">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p4'])=="4" ? $data['p4']=="4" : ''){ echo "checked=checked";}  ?>  value="4" class="custom-control-input" id="p44" name="p4">
									<label class="custom-control-label" for="p44">Sangat Baik</label>
								</div>
								
							</div>
						</div>
						<div class="col-md-12 p-2">
							5.	Pemanfaatan media dan teknologi pembelajaran
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p5'])=="1" ? $data['p5']=="1" : ''){ echo "checked=checked";}  ?>  value="1" class="custom-control-input" id="p51" name="p5">
									<label class="custom-control-label" for="p51">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p5'])=="2" ? $data['p5']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p52" name="p5">
									<label class="custom-control-label" for="p52">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p5'])=="3" ? $data['p5']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p53" name="p5">
									<label class="custom-control-label" for="p53">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p5'])=="4" ? $data['p5']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p54" name="p5">
									<label class="custom-control-label" for="p54">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							6.	Keanekaragaman cara pengukuran hasil belajar
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p6'])=="1" ? $data['p6']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p61" name="p6">
									<label class="custom-control-label" for="p61">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p6'])=="2" ? $data['p6']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p62" name="p6">
									<label class="custom-control-label" for="p62">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p6'])=="3" ? $data['p6']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p63" name="p6">
									<label class="custom-control-label" for="p63">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p6'])=="4" ? $data['p6']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p64" name="p6">
									<label class="custom-control-label" for="p64">Sangat Baik</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							7.	Pemberian umpan balik terhadap tugas
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p7'])=="1" ? $data['p7']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p71" name="p7">
									<label class="custom-control-label" for="p71">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p7'])=="2" ? $data['p7']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p72" name="p7">
									<label class="custom-control-label" for="p72">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p7'])=="3" ? $data['p7']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p73" name="p7">
									<label class="custom-control-label" for="p73">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p7'])=="4" ? $data['p7']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p74" name="p7">
									<label class="custom-control-label" for="p74">Sangat Baik</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							8.	Kesesuaian materi ujian atau tugas dengan tujuan perkuliahan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p8'])=="1" ? $data['p8']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p81" name="p8">
									<label class="custom-control-label" for="p81">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p8'])=="2" ? $data['p8']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p82" name="p8">
									<label class="custom-control-label" for="p82">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p8'])=="3" ? $data['p8']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p83" name="p8">
									<label class="custom-control-label" for="p83">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p8'])=="4" ? $data['p8']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p84" name="p8">
									<label class="custom-control-label" for="p84">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							9.	Kesesuaian nilai yang diberikan dengan proses pembelajaran
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p9'])=="1" ? $data['p9']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p91" name="p9">
									<label class="custom-control-label" for="p91">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p9'])=="2" ? $data['p9']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p92" name="p9">
									<label class="custom-control-label" for="p92">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p9'])=="3" ? $data['p9']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p93" name="p9">
									<label class="custom-control-label" for="p93">Baik</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p9'])=="4" ? $data['p9']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p94" name="p9">
									<label class="custom-control-label" for="p94">Sangat Baik</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							10.	Metode pembelajaran yang digunakan sesuai dengan materi dan dapat meningkatkan pemahaman mahasiswa
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p10'])=="1" ? $data['p10']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p101" name="p10">
									<label class="custom-control-label" for="p101">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p10'])=="2" ? $data['p10']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p102" name="p10">
									<label class="custom-control-label" for="p102">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p10'])=="3" ? $data['p10']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p103" name="p10">
									<label class="custom-control-label" for="p103">Baik</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p10'])=="4" ? $data['p10']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p104" name="p10">
									<label class="custom-control-label" for="p104">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							11.	Dosen menggunakan strategi pembelajaran yang interaktif
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p11'])=="1" ? $data['p11']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p111" name="p11">
									<label class="custom-control-label" for="p111">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p11'])=="2" ? $data['p11']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p112" name="p11">
									<label class="custom-control-label" for="p112">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p11'])=="3" ? $data['p11']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p113" name="p11">
									<label class="custom-control-label" for="p113">Baik</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p11'])=="4" ? $data['p11']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p114" name="p11">
									<label class="custom-control-label" for="p114">Sangat Baik</label>
								</div>
								
							</div>
						</div>
						
						
						
						<div class="col-md-12 pt-2 pb-2 mt-3 bg-primary-800 text-white">
							 <strong><em>KOMPETENSI PROFESIONAL </em></strong>
						</div>
						
						
						
						<div class="col-md-12 p-2">
							1.	Kemampuan menjelaskan pokok bahasan secara tepat
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p12'])=="1" ? $data['p12']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p121" name="p12">
									<label class="custom-control-label" for="p121">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p12'])=="2" ? $data['p12']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p122" name="p12">
									<label class="custom-control-label" for="p122">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p12'])=="3" ? $data['p12']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p123" name="p12">
									<label class="custom-control-label" for="p123">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p12'])=="4" ? $data['p12']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p124" name="p12">
									<label class="custom-control-label" for="p124">Sangat Baik</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							2.	Kemampuan memberi contoh relevan dari konsep yang diajarkan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p13'])=="1" ? $data['p13']=="1" : ''){ echo "checked=checked";}  ?> value="1" class="custom-control-input" id="p131" name="p13">
									<label class="custom-control-label" for="p131">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p13'])=="2" ? $data['p13']=="2" : ''){ echo "checked=checked";}  ?> value="2" class="custom-control-input" id="p132" name="p13">
									<label class="custom-control-label" for="p132">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p13'])=="3" ? $data['p13']=="3" : ''){ echo "checked=checked";}  ?> value="3" class="custom-control-input" id="p133" name="p13">
									<label class="custom-control-label" for="p133">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p13'])=="4" ? $data['p13']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p134" name="p13">
									<label class="custom-control-label" for="p134">Sangat Baik</label>
								</div>
								
							</div>
						</div>						
						
						
						<div class="col-md-12 p-2">
							3.	Kemampuan menjelaskan keterkaitan topik yang diajarkan dengan topik lain
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p14'])=="1" ? $data['p14']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p141" name="p14">
									<label class="custom-control-label" for="p141">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p14'])=="2" ? $data['p14']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p142" name="p14">
									<label class="custom-control-label" for="p142">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p14'])=="3" ? $data['p14']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p143" name="p14">
									<label class="custom-control-label" for="p143">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p14'])=="4" ? $data['p14']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p144" name="p14">
									<label class="custom-control-label" for="p144">Sangat Baik</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							4.	Kemampuan menjelaskan topik yang diajarkan dalam konteks kehidupan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p15'])=="1" ? $data['p15']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p151" name="p15">
									<label class="custom-control-label" for="p151">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p15'])=="2" ? $data['p15']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p152" name="p15">
									<label class="custom-control-label" for="p152">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p15'])=="3" ? $data['p15']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p153" name="p15">
									<label class="custom-control-label" for="p153">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p15'])=="4" ? $data['p15']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p154" name="p15">
									<label class="custom-control-label" for="p154">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							5.	Penguasaan isu mutakhir dalam bidang yang diajarkan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p16'])=="1" ? $data['p16']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p161" name="p16">
									<label class="custom-control-label" for="p161">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p16'])=="2" ? $data['p16']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p162" name="p16">
									<label class="custom-control-label" for="p162">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p16'])=="3" ? $data['p16']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p163" name="p16">
									<label class="custom-control-label" for="p163">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p16'])=="4" ? $data['p16']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p164" name="p16">
									<label class="custom-control-label" for="p164">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							6.	Penggunaan hasil penelitian dan atau pengabdian masyarakat untuk meningkatkan kualitas perkuliahan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p17'])=="1" ? $data['p17']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p171" name="p17">
									<label class="custom-control-label" for="p171">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p17'])=="2" ? $data['p17']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p172" name="p17">
									<label class="custom-control-label" for="p172">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p17'])=="3" ? $data['p17']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p173" name="p17">
									<label class="custom-control-label" for="p173">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p17'])=="4" ? $data['p17']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p174" name="p17">
									<label class="custom-control-label" for="p174">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							7.	Kemampuan menggunakan beragam teknologi komunikasi
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p18'])=="1" ? $data['p18']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p181" name="p18">
									<label class="custom-control-label" for="p181">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p18'])=="2" ? $data['p18']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p182" name="p18">
									<label class="custom-control-label" for="p182">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p18'])=="3" ? $data['p18']=="3" : ''){ echo "checked=checked";} ?>  value="3" class="custom-control-input" id="p183" name="p18">
									<label class="custom-control-label" for="p183">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p18'])=="4" ? $data['p18']=="4" : ''){ echo "checked=checked";} ?>  value="4" class="custom-control-input" id="p184" name="p18">
									<label class="custom-control-label" for="p184">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							8.	Dosen menggunakan acuan literatur 10 tahun terakhir
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p19'])=="1" ? $data['p19']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p191" name="p19">
									<label class="custom-control-label" for="p191">Sangat Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p19'])=="2" ? $data['p19']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p192" name="p19">
									<label class="custom-control-label" for="p192">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p19'])=="3" ? $data['p19']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p193" name="p19">
									<label class="custom-control-label" for="p193">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p19'])=="4" ? $data['p19']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p194" name="p19">
									<label class="custom-control-label" for="p194">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							9.	Kuliah dilengkapi dengan bahan ajar/ diktat/ handout
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p20'])=="1" ? $data['p20']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p201" name="p20">
									<label class="custom-control-label" for="p201">Sangat Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p20'])=="2" ? $data['p20']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p202" name="p20">
									<label class="custom-control-label" for="p202">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p20'])=="3" ? $data['p20']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p203" name="p20">
									<label class="custom-control-label" for="p203">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p20'])=="4" ? $data['p20']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p204" name="p20">
									<label class="custom-control-label" for="p204">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							10.	Perkuliahan dilaksanakan tepat waktu dan jadwal yang ditentukan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p21'])=="1" ? $data['p21']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p211" name="p21">
									<label class="custom-control-label" for="p211">Sangat Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p21'])=="2" ? $data['p21']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p212" name="p21">
									<label class="custom-control-label" for="p212">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p21'])=="3" ? $data['p21']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p213" name="p21">
									<label class="custom-control-label" for="p213">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p21'])=="4" ? $data['p21']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p214" name="p21">
									<label class="custom-control-label" for="p214">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							11.	Dosen menyampaikan bentuk dan tata cara penilaian dalam perkuliahan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p22'])=="1" ? $data['p22']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p221" name="p22">
									<label class="custom-control-label" for="p221">Sangat Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p22'])=="2" ? $data['p22']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p222" name="p22">
									<label class="custom-control-label" for="p222">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p22'])=="3" ? $data['p22']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p223" name="p22">
									<label class="custom-control-label" for="p223">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p22'])=="4" ? $data['p22']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p224" name="p22">
									<label class="custom-control-label" for="p224">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 pt-2 pb-2 mt-3 bg-primary-800 text-white">
							 <strong><em>Kompetensi Kepribadian</em></strong>
						</div>

						<div class="col-md-12 p-2">
							1.	Wibawa sebagai pribadi dosen
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p23'])=="1" ? $data['p23']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p231" name="p23">
									<label class="custom-control-label" for="p231">Sangat Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p23'])=="2" ? $data['p23']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p232" name="p23">
									<label class="custom-control-label" for="p232">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p23'])=="3" ? $data['p23']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p233" name="p23">
									<label class="custom-control-label" for="p233">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p23'])=="4" ? $data['p23']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p234" name="p23">
									<label class="custom-control-label" for="p234">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							2.	Kearifan dalam mengambil keputusan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p24'])=="1" ? $data['p24']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p241" name="p24">
									<label class="custom-control-label" for="p241">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p24'])=="2" ? $data['p24']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p242" name="p24">
									<label class="custom-control-label" for="p242">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p24'])=="3" ? $data['p24']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p243" name="p24">
									<label class="custom-control-label" for="p243">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p24'])=="4" ? $data['p24']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p244" name="p24">
									<label class="custom-control-label" for="p244">Sangat Baik</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							3.	Menjadi contoh dan teladan dan bersikap dan bertutur
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p25'])=="1" ? $data['p25']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p251" name="p25">
									<label class="custom-control-label" for="p251">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p25'])=="2" ? $data['p25']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p252" name="p25">
									<label class="custom-control-label" for="p252">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p25'])=="3" ? $data['p25']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p253" name="p25">
									<label class="custom-control-label" for="p253">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p25'])=="4" ? $data['p25']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p254" name="p25">
									<label class="custom-control-label" for="p254">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							4.	Kesesuaian kata dan tindakan
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p26'])=="1" ? $data['p26']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p261" name="p26">
									<label class="custom-control-label" for="p261">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p26'])=="2" ? $data['p26']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p262" name="p26">
									<label class="custom-control-label" for="p262">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p26'])=="3" ? $data['p26']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p263" name="p26">
									<label class="custom-control-label" for="p263">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p26'])=="4" ? $data['p26']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p264" name="p26">
									<label class="custom-control-label" for="p264">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							5.	Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p27'])=="1" ? $data['p27']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p271" name="p27">
									<label class="custom-control-label" for="p271">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p27'])=="2" ? $data['p27']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p272" name="p27">
									<label class="custom-control-label" for="p272">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p27'])=="3" ? $data['p27']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p273" name="p27">
									<label class="custom-control-label" for="p273">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p27'])=="4" ? $data['p27']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p274" name="p27">
									<label class="custom-control-label" for="p274">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							6.	Adil dalam memperlakukan mahasiswa
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p28'])=="1" ? $data['p28']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p281" name="p28">
									<label class="custom-control-label" for="p281">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p28'])=="2" ? $data['p28']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p282" name="p28">
									<label class="custom-control-label" for="p282">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p28'])=="3" ? $data['p28']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p283" name="p28">
									<label class="custom-control-label" for="p283">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p28'])=="4" ? $data['p28']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p284" name="p28">
									<label class="custom-control-label" for="p284">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							7.	Objektivitas dosen dalam memberikan penilaian
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p29'])=="1" ? $data['p29']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p291" name="p29">
									<label class="custom-control-label" for="p291">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p29'])=="2" ? $data['p29']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p292" name="p29">
									<label class="custom-control-label" for="p292">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p29'])=="3" ? $data['p29']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p293" name="p29">
									<label class="custom-control-label" for="p293">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p29'])=="4" ? $data['p29']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p294" name="p29">
									<label class="custom-control-label" for="p294">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 pt-2 pb-2 mt-3 bg-primary-800 text-white">
							 <strong><em>Kompetensi Sosial</em></strong>
						</div>

						<div class="col-md-12 p-2">
							1.	Kemampuan menyampaikan pendapat
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p30'])=="1" ? $data['p30']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p301" name="p30">
									<label class="custom-control-label" for="p301">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p30'])=="2" ? $data['p30']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p302" name="p30">
									<label class="custom-control-label" for="p302">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p30'])=="3" ? $data['p30']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p303" name="p30">
									<label class="custom-control-label" for="p303">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p30'])=="4" ? $data['p30']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p304" name="p30">
									<label class="custom-control-label" for="p304">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							2.	Kemampuan menerima kritik, saran, dan pendapat dari mahasiswa
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">

								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p31'])=="1" ? $data['p31']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p311" name="p31">
									<label class="custom-control-label" for="p311">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p31'])=="2" ? $data['p31']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p312" name="p31">
									<label class="custom-control-label" for="p312">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p31'])=="3" ? $data['p31']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p313" name="p31">
									<label class="custom-control-label" for="p313">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p31'])=="4" ? $data['p31']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p314" name="p31">
									<label class="custom-control-label" for="p314">Sangat Baik</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 p-2">
							3.	Toleransi terhadap keberagaman mahasiswa
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p32'])=="1" ? $data['p32']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p321" name="p32">
									<label class="custom-control-label" for="p321">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p32'])=="2" ? $data['p32']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p322" name="p32">
									<label class="custom-control-label" for="p322">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p32'])=="3" ? $data['p32']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p323" name="p32">
									<label class="custom-control-label" for="p323">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p32'])=="4" ? $data['p32']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p324" name="p32">
									<label class="custom-control-label" for="p324">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							4.	Mudah bergaul di kalangan sejawat dan mahasiswa
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p33'])=="1" ? $data['p33']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p331" name="p33">
									<label class="custom-control-label" for="p331">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p33'])=="2" ? $data['p33']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p332" name="p33">
									<label class="custom-control-label" for="p332">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p33'])=="3" ? $data['p33']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p333" name="p33">
									<label class="custom-control-label" for="p333">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p33'])=="4" ? $data['p33']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p334" name="p33">
									<label class="custom-control-label" for="p334">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							5.	Dosen memberikan kesempatan bertanya dan menanggapi pertanyaan mahasiswa
						</div>
						<div class="col-md-12 p-2">
							<div class="frame-wrap">
								
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p34'])=="1" ? $data['p34']=="1" : ''){ echo "checked=checked";} ?> value="1" class="custom-control-input" id="p341" name="p34">
									<label class="custom-control-label" for="p341">Sangat kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p34'])=="2" ? $data['p34']=="2" : ''){ echo "checked=checked";} ?> value="2" class="custom-control-input" id="p342" name="p34">
									<label class="custom-control-label" for="p342">Kurang</label>
								</div>
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p34'])=="3" ? $data['p34']=="3" : ''){ echo "checked=checked";} ?> value="3" class="custom-control-input" id="p343" name="p34">
									<label class="custom-control-label" for="p343">Baik</label>
								</div>
								<div class="custom-control custom-radio e">
									<input type="radio" required <?php if(isset($data['p34'])=="4" ? $data['p34']=="4" : ''){ echo "checked=checked";} ?> value="4" class="custom-control-input" id="p344" name="p34">
									<label class="custom-control-label" for="p344">Sangat Baik</label>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12 pt-2 pb-2 mt-3 mb-2 bg-primary-800 text-white">
							 <strong>Secara umum bagaimana kepuasan mahasiswa terhadap kinerja dosen?</strong>
						</div>
						
						<div class="col-md-12 pt-2 pb-2 pl-1 pr-1">
							<textarea  class="form-control" rows="3" spellcheck="false" placeholder="Tuliskan jawaban Anda disini" name="k1"><?php echo isset($data['k1']) ? $data['k1'] : ''?></textarea>
						</div>

						<div class="col-md-12 pt-2 pb-2 mt-3 mb-2 bg-primary-800 text-white">
							 <strong>Berikan saran anda terkait kinerja dosen</strong>
						</div>
						
						<div class="col-md-12 pt-2 pb-2 pl-1 pr-1">
							<textarea  class="form-control" rows="3" spellcheck="false" placeholder="Tuliskan jawaban Anda disini" name="k2"><?php echo isset($data['k2']) ? $data['k2'] : ''?></textarea>
						</div>
						
						<div class="col-md-12 pt-2 pb-2 pl-1 pr-1 text-center">
							<button type="submit" class="btn btn-primary" name="<?php echo $button;?>-m003"><?php echo $button;?></button>	
						</div>
						
					 </div>
						
					</form>
				</div>
			</div>
		 </div>
		 </div>
	</div>                         
</main>