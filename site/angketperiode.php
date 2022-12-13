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
                <h1 class="subheader-title"><i class="subheader-icon fal fa-tachometer-alt"></i> Angket Periode <small></small></h1>
            </div>
        </div>
		<div class="accordion accordion-outline" id="js_demo_accordion-3">
        <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Example <span class="fw-300"><i>Table</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                       
                        <!-- datatable start -->
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead class="bg-primary-600">
                                <tr>
                                    <th>Kode</th>
                                    <th>Target</th>
                                    <th>Judul</th>
                                    <th>Tgl Mulai</th>
                                    <th>Tgl Selesai</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
							$qa=$db->prepare("SELECT * FROM angket_periode");
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
								
                                <tr>
                                    <td><?php echo $r->kdangket; ?></td>
                                    <td><?php echo $r->target; ?></td>
                                    <td><?php echo $r->judul; ?></td>
                                    <td><?php echo $r->tglstart; ?></td>
                                    <td><?php echo $r->tglend; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary"><span class="fal fa-check mr-1"></span>Aktif</button>
                                    </td>
                                </tr>
								
								
								
							<?php
							} }
							?>
                                
                            </tbody>
                          
                        </table>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
       
			
		</div>
		
	</div>
	</div>                         
</main>