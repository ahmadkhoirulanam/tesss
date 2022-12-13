
<main id="js-page-content" role="main" class="page-content">
<div class="row">
	<div class="col-md-12">
		<?php include 'site/notifikasi.php';?>
		<div class="accordion accordion-outline" id="js_demo_accordion-3">
			<div class="card">
				<div class="card-header bg-white" style="border-bottom: thin solid #D8D8D8">
					<a href="javascript:void(0);" class="card-title collapsed" data-toggle="collapse" data-target="#js_demo_accordion-3a" aria-expanded="true">
					<i class="fal fa-paper-plane width-2 fs-xl"></i>
					Daftar Form Angket Upgris <span class="ml-auto">
					<span class="collapsed-reveal">
					<i class="fal fa-minus fs-xl"></i>
					</span>
					<span class="collapsed-hidden">
					<i class="fal fa-plus fs-xl"></i>
					</span>
					</span>
					</a>
				</div>
				<div id="js_demo_accordion-3a" class="collapse show" data-parent="#js_demo_accordion-3" style="">
					<div class="card-body pb-0">
						<div class="row">
						<?php
							$qa=$db->prepare("SELECT * FROM angket_periode WHERE aktif=1");
							$qa->execute();
							if($qa->rowCount()==0){
								echo "<div class='col-md-12'><div class='alert alert-danger alert-dismissible fade show text-center' role='alert' style='margin-bottom:10px;'><button type='button' class='close' data-dismiss='alert' aria-label='Close' ><span aria-hidden='true'><i class='fal fa-times-square'></i></span></button>Maaf, saat ini belum ada angket yang harus diisi.</div></div>";
							}else{

							while($r=$qa->fetch(PDO::FETCH_OBJ)) {
								if($r->target=="Mahasiswa") {
									$label="bg-info-700";
								}elseif($r->target=="Tendik"){
									$label="bg-warning-700";
								}else{
									$label="bg-success-700";
								}
							?>  								
								<div class="col-sm-12 col-xl-12">								
									<a href="<?php echo baseurl("angket-".strtolower($r->kdangket)."/".sha1($r->kdper)); ?>" style="text-decoration: none !important">
									
									<div class="p-3 <?php echo $label;?> rounded overflow-hidden position-relative text-white mb-g">
										<div class="">
											<h3 class="display-6 d-block l-h-n m-0 fw-500"><?php echo $r->judul; ?> <small class="m-0 l-h-n"><?php echo $r->target; ?></small></h3>
										</div>
										<i class="fal fa-file-alt position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:4rem"></i>
									</div>
									</a>
								</div>
							
								
								
								
							<?php
							} }
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
    
                                 
</main>