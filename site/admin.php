<?php
if (isset($_SESSION['user'])=="")  {
    redirectto("auth");
    }
?>

<?php
    $sql = "SELECT * FROM angket_periode";
    $query = mysqli_query($dbli,$sql);
    $data = mysqli_fetch_array($query,MYSQLI_BOTH);
    $count = mysqli_num_rows($query);
    $status = $data['aktif']; 
    
?>
<?php
    $sql = "SELECT * FROM angket_periode WHERE aktif=1";
    $query = mysqli_query($dbli,$sql);
    $data = mysqli_fetch_array($query,MYSQLI_BOTH);
    $count2 = mysqli_num_rows($query);
    $status2 = $data['aktif']; 
    
?>

<?php
    $sql = "SELECT * FROM prodi";
    $query = mysqli_query($dbli,$sql);
    $data = mysqli_fetch_array($query,MYSQLI_BOTH);
    $prodi = mysqli_num_rows($query);
    
    
?>
<?php
    $sql = "SELECT * FROM fakultas";
    $query = mysqli_query($dbli,$sql);
    $data = mysqli_fetch_array($query,MYSQLI_BOTH);
    $fakultas = mysqli_num_rows($query);
    
    
?>
<?php
    $sql = "SELECT * FROM tb_user";
    $query = mysqli_query($dbli,$sql);
    $data = mysqli_fetch_array($query,MYSQLI_BOTH);
    $admin = mysqli_num_rows($query);
  
    
?>

<main id="js-page-content" role="main" class="page-content">
     <div class="row">
     <div class="col-md-12">
		<?php include 'site/notifikasi.php';?>
        <div class="form-group row mb-3">
            <div class="col-md-9 ">
                <h1 class="subheader-title"><i class="subheader-icon fal fa-tachometer-alt"></i> Dashboard <small></small></h1>
            </div>
        </div>
		<div class="accordion accordion-outline" id="js_demo_accordion-3">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info alert-dismissible fade show pb-0" role="alert" style="margin-bottom:10px;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fal fa-times-square"></i></span></button>
                    <b><i class="fal fa-bell"></i> Informasi Pengelolaan Angket-Upgris</b><br>
                    <ol>
                        <li>
                            Angket bisa diakses melalui link ataupun diakses melalui Si-Mekar
                        </li>
                        <li>
                            Angket yang tampil hanya angket yang bersatatus aktif, untuk mengelolanya bisa ke halaman Angeket Periode
                        </li>
                    </ol>
                </div>
            </div>
        </div>
			<div class="card">
				<div class="card-header bg-white" style="border-bottom: thin solid #D8D8D8">
					<a href="javascript:void(0);" class="card-title collapsed" data-toggle="collapse" data-target="#js_demo_accordion-3a" aria-expanded="true">
					<i class="fal fa-paper-plane width-2 fs-xl"></i>
					Dashboard Angket Upgris <span class="ml-auto">
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
                            <div class="col-sm-4 col-xl-12">								
                                <a href="#" style="text-decoration: none !important">                            
                                <div class="p-3 bg-primary-700 rounded overflow-hidden position-relative text-white mb-g">
                                    <div class="">
                                        <h3 class="display-4 d-block l-h-n m-0 fw-500"><?php echo $count;?> <small class="m-0 l-h-n">Master Angket</small>
                                    </h3>
                                    </div>
                                    <i class="fal fa-file-alt position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:4rem"></i>
                                </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-xl-12">								
                                <a href="#" style="text-decoration: none !important">                            
                                <div class="p-3 bg-primary-500 rounded overflow-hidden position-relative text-white mb-g">
                                    <div class="">
                                        <h3 class="display-4 d-block l-h-n m-0 fw-500"><?php echo $count2;?> <small class="m-0 l-h-n">Angket Aktif</small>
                                    </h3>
                                    </div>
                                    <i class="fal fa-file-alt position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:4rem"></i>
                                </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-xl-12">								
                                <a href="#" style="text-decoration: none !important">                            
                                <div class="p-3 bg-info-700 rounded overflow-hidden position-relative text-white mb-g">
                                    <div class="">
                                        <h3 class="display-4 d-block l-h-n m-0 fw-500">9<small class="m-0 l-h-n">Angket Periode</small>
                                    </h3>
                                    </div>
                                    <i class="fal fa-calendar position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:4rem"></i>
                                </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-xl-12">								
                                <a href="#" style="text-decoration: none !important">                            
                                <div class="p-3 bg-danger-700 rounded overflow-hidden position-relative text-white mb-g">
                                    <div class="">
                                        <h3 class="display-4 d-block l-h-n m-0 fw-500"><?php echo $fakultas;?><small class="m-0 l-h-n">Fakultas</small>
                                    </h3>
                                    </div>
                                    <i class="fal fa-home position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:4rem"></i>
                                </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-xl-12">								
                                <a href="#" style="text-decoration: none !important">                            
                                <div class="p-3 bg-warning-700 rounded overflow-hidden position-relative text-white mb-g">
                                    <div class="">
                                        <h3 class="display-4 d-block l-h-n m-0 fw-500"><?php echo $prodi;?> <small class="m-0 l-h-n">Prodi</small>
                                    </h3>
                                    </div>
                                    <i class="fal fa-home position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:4rem"></i>
                                </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-xl-12">								
                                <a href="#" style="text-decoration: none !important">                            
                                <div class="p-3 bg-success-700 rounded overflow-hidden position-relative text-white mb-g">
                                    <div class="">
                                        <h3 class="display-4 d-block l-h-n m-0 fw-500"><?php echo $admin;?><small class="m-0 l-h-n">Admin</small>
                                    </h3>
                                    </div>
                                    <i class="fal fa-home position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:4rem"></i>
                                </div>
                                </a>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	</div>                         
</main>