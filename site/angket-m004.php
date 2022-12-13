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
				<h2>Angket Kepuasan Mahasiswa Terhadap Prasarana Perkuliahan</h2>
				
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
							$query = $db->prepare("SELECT * FROM angket_m004 WHERE sha1(id) = ?");
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
							 <strong><em>Prasarana Perkuliahan</em></strong>
						</div>
						<div class="col-md-12 p-2">
							1.	Kondisi gedung perkuliahan (bersih, nyaman, aman)
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
							2.	Kondisi ruang kuliah (bersih, nyaman, aman)
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
							3.	Terdapat hand sanitizer di setiap kelas
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
							4.	Kondisi perpustakaan (bersih, nyaman, aman)
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
							5.	Keberadaan fasilitas penunjang perkuliahan (jalan, parkir, kantin, kamar mandi, ruang ibadah, ruang diskusi, lapangan olahraga)
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
							6.	Terdapat tempat parkir kendaraan
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
							7.	Petugas keamanan tanggap terhadap pertanyaan tamu yang mencari ruang
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
							8.	Kebersihan dan kenyamanan fasilitas penunjang
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
								<div class="custom-control custom-radio ">
									<input type="radio" required <?php if(isset($data['p8'])=="4" ? $data['p8']=="4" : ''){ echo "checked=checked";}  ?> value="4" class="custom-control-input" id="p84" name="p8">
									<label class="custom-control-label" for="p84">Sangat Baik</label>
								</div>
								
							</div>
						</div>

						<div class="col-md-12 p-2">
							9.	Ruang kelas memiliki pencahayaan yang baik
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
							10.	Sistem pendingin ruang (AC) berfungsi baik
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
							11.	Kamar mandi dalam keadaan bersih
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
						
										
						
						<div class="col-md-12 p-2">
							12.	Petugas selalu memperhatikan kebersihan ruang pendukung perkuliahan
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
							13.	Lift berfungsi dengan baik
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
							14.	Terdapat alat pengukur suhu badan otomatis
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
							15.	Terdapat ruang untuk ibadah
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
							16.	Ruang dosen dalam keadaan baik
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
							17.	Ruang dekanat/ prodi/ tata usaha dalam keadaan baik
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
							18.	Terdapat fasilitas ruang tunggu
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

						<div class="col-md-12 pt-2 pb-2 mt-3 mb-2 bg-primary-800 text-white">
							 <strong>Berikan saran anda terkait prasarana pendidikan</strong>
						</div>
						
						<div class="col-md-12 pt-2 pb-2 pl-1 pr-1">
							 <!-- <textarea class="form-control" name="k1" <?php echo $data['p18'] ?> rows="3" spellcheck="false" placeholder="Tuliskan jawaban Anda disini"></textarea> -->
							 <textarea  class="form-control" rows="3" spellcheck="false" placeholder="Tuliskan jawaban Anda disini" name="k1"><?php echo isset($data['k1']) ? $data['k1'] : ''?></textarea>
						</div>							
						<div class="col-md-12 pt-2 pb-2 pl-1 pr-1 text-center">
							<button type="submit" class="btn btn-primary" name="<?php echo $button;?>-m004">Simpan</button>	
						</div>
						
					 </div>
						
					</form>
				</div>
			</div>
		 </div>
		 </div>
	</div>                         
</main>