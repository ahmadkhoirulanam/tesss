<?php
$link=baseurl();
if(!empty($id)){
    if($id=="simekar"){
        $link="https://simekar.upgris.ac.id/iss";
    }
}
?>

<main id="js-page-content" role="main" class="page-content">
    <div class="h-alt-hf d-flex flex-column align-items-center justify-content-center text-center">
        <div class="alert alert-danger bg-white pt-4 pr-5 pb-3 pl-5" id="demo-alert">
            <h1 class="fs-xxl fw-700 color-fusion-500 d-flex align-items-center justify-content-center m-0">
                <img class="profile-image-sm rounded-circle bg-danger-700 mr-1 p-1" src="<?php echo baseurl("uploads/$rset->logo");?>" alt="SmartAdmin WebApp Logo">
            </h1>
            <h3 class="fw-500 mb-0 mt-3">
            <span class="color-danger-700"> <?php include("site/notifikasi.php");?></span>
            </h3>
            <p class="container container-sm mb-0 mt-1">
                Angket yang anda kirim akan ditindaklanjuti oleh TIM, Terima Kasih sudah mengisi angket. Have a Nice Day !!
            </p>
            <div class="mt-4">
                <!-- <a href="" class="btn btn-outline-default bg-fusion-800">
                    <span class="fw-700">Kembali</span>
                </a> -->
                <a href="<?php echo $link;?>" class="btn btn-primary">
                    <span class="fw-700">Kembali</span>
                </a>
            </div>
        </div>
    </div>
</main>