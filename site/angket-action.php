<?php
if(isset($_POST["simpan-m001"])){
	$q=$db->prepare("insert into `angket_m001` set kdper=?,  kdangket=?, kduser=?, kdprodi=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  p16=?,  p17=?,  p18=?,  p19=?,  p20=?,  p21=?,  p22=?,  p23=?,  k1=?,  create_at=NOW(), valid=1");
	$qok=$q->execute([$_POST["kdper"], $_POST["kdangket"], $_POST["kduser"], $_POST["kdprodi"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["p16"], $_POST["p17"], $_POST["p18"], $_POST["p19"], $_POST["p20"], $_POST["p21"], $_POST["p22"], $_POST["p23"], $_POST["k1"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 		
} else if (isset($_POST["simpan-m002"])){
	$q=$db->prepare("insert into `angket_m002` set kdper=?,  kdangket=?, kduser=?, kdprodi=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?, p7a=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  k1=?,  create_at=NOW(), valid=1");
	$qok=$q->execute([$_POST["kdper"], $_POST["kdangket"], $_POST["kduser"], $_POST["kdprodi"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p7a"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["k1"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
} else if (isset($_POST["simpan-m003"])){
	$q=$db->prepare("insert into `angket_m003` set kdper=?,  kdangket=?, kduser=?, kdprodi=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  p16=?,  p17=?,  p18=?,  p19=?,  p20=?,  p21=?,  p22=?,  p23=?,  p24=?,  p25=?,  p26=?,  p27=?,  p28=?,  p29=?,  p30=?,  p31=?,  p32=?,  p33=?,  p34=?,  k1=?,  k2=?,  create_at=NOW(), valid=1");
	$qok=$q->execute([$_POST["kdper"], $_POST["kdangket"], $_POST["kduser"], $_POST["kdprodi"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["p16"], $_POST["p17"], $_POST["p18"], $_POST["p19"], $_POST["p20"], $_POST["p21"], $_POST["p22"], $_POST["p23"], $_POST["p24"], $_POST["p25"], $_POST["p26"], $_POST["p27"], $_POST["p28"], $_POST["p29"], $_POST["p30"], $_POST["p31"], $_POST["p32"], $_POST["p33"], $_POST["p34"], $_POST["k1"], $_POST["k2"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
}  else if (isset($_POST["simpan-m004"])){
	$q=$db->prepare("insert into `angket_m004` set kdper=?,  kdangket=?, kduser=?, kdprodi=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  p16=?,  p17=?,  p18=?,  k1=?,  create_at=NOW(), valid=1");
	$qok=$q->execute([$_POST["kdper"], $_POST["kdangket"],$_POST["kduser"], $_POST["kdprodi"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["p16"], $_POST["p17"], $_POST["p18"], $_POST["k1"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
} else if (isset($_POST["simpan-t001"])){
	$q=$db->prepare("insert into `angket_t001` set kdper=?, kdangket=?, kduser=?, kdprodi=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  k1=?,  create_at=NOW(), valid=1");
	$qok=$q->execute([$_POST["kdper"], $_POST["kdangket"],$_POST["kduser"], $_POST["kdprodi"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["k1"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
} else if (isset($_POST["simpan-t002"])){
	$q=$db->prepare("insert into `angket_t002` set kdper=?,  kdangket=?, kduser=?, kdprodi=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?, create_at=NOW(), valid=1");
	$qok=$q->execute([$_POST["kdper"], $_POST["kdangket"],$_POST["kduser"], $_POST["kdprodi"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
} else if (isset($_POST["simpan-d001"])){
	$q=$db->prepare("insert into `angket_d001` set kdper=?,  kdangket=?, kduser=?, kdprodi=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  k1=?,  create_at=NOW(), valid=1");
	$qok=$q->execute([$_POST["kdper"], $_POST["kdangket"],$_POST["kduser"], $_POST["kdprodi"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["k1"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
}  else if (isset($_POST["simpan-d002"])){
	$q=$db->prepare("insert into `angket_d002` set kdper=?,  kdangket=?, kduser=?, kdprodi=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  p16=?,  p17=?,  p18=?,  k1=?,  create_at=NOW(), valid=1");
	$qok=$q->execute([$_POST["kdper"], $_POST["kdangket"],$_POST["kduser"], $_POST["kdprodi"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["p16"], $_POST["p17"], $_POST["p18"], $_POST["k1"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
} else if (isset($_POST["simpan-d003"])){
	$q=$db->prepare("insert into `angket_d003` set kdper=?,  kdangket=?, kduser=?, kdprodi=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?, create_at=NOW(), valid=1");
	$qok=$q->execute([$_POST["kdper"], $_POST["kdangket"],$_POST["kduser"], $_POST["kdprodi"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
}  else if (isset($_POST["edit-m004"])){
	$q=$db->prepare("update `angket_m004` set kdper=?,  p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  p16=?,  p17=?,  p18=?,  k1=?,  create_at=NOW(), valid=1 where sha1(id)=?");
	$qok=$q->execute([$_POST["kdper"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["p16"], $_POST["p17"], $_POST["p18"], $_POST["k1"], $_POST["id"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
} else if (isset($_POST["update-m001"])){
	$q=$db->prepare("update `angket_m001`set kdper=?,  p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  p16=?,  p17=?,  p18=?,  p19=?,  p20=?,  p21=?,  p22=?,  p23=?,  k1=?,  create_at=NOW(), valid=1 where sha1(id)=?");
	$qok=$q->execute([$_POST["kdper"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["p16"], $_POST["p17"], $_POST["p18"], $_POST["p19"], $_POST["p20"], $_POST["p21"], $_POST["p22"], $_POST["p23"], $_POST["k1"], $_POST["id"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
} else if (isset($_POST["edit-m002"])){
	$q=$db->prepare("update `angket_m002` set kdper=?,  p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p7a=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  k1=?,  create_at=NOW(), valid=1 where sha1(id)=?");
	$qok=$q->execute([$_POST["kdper"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p7a"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["k1"], $_POST["id"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
} else if (isset($_POST["edit-m003"])){
	$q=$db->prepare("update `angket_m003` set kdper=?,  p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  p16=?,  p17=?,  p18=?,  p19=?,  p20=?,  p21=?,  p22=?,  p23=?,  p24=?,  p25=?,  p26=?,  p27=?,  p28=?,  p29=?,  p30=?,  p31=?,  p32=?,  p33=?,  p34=?,  k1=?,  k2=?,  create_at=NOW(), valid=1 where sha1(id)=?");
	$qok=$q->execute([$_POST["kdper"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["p16"], $_POST["p17"], $_POST["p18"], $_POST["p19"], $_POST["p20"], $_POST["p21"], $_POST["p22"], $_POST["p23"], $_POST["p24"], $_POST["p25"], $_POST["p26"], $_POST["p27"], $_POST["p28"], $_POST["p29"], $_POST["p30"], $_POST["p31"], $_POST["p32"], $_POST["p33"], $_POST["p34"], $_POST["k1"], $_POST["k2"], $_POST["id"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
} else if (isset($_POST["edit-d001"])){
	$q=$db->prepare("update `angket_d001` set kdper=?, set kdangket=?, kdprodi=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  k1=?,  create_at=NOW(), valid=1 where sha1(id)=?");
	$qok=$q->execute([$_POST["kdper"], $_POST["kdangket"], $_POST["kdprodi"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["k1"], $_POST["id"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
} else if (isset($_POST["edit-d002"])){
	$q=$db->prepare("update `angket_d002` set kdper=?, kdangket=?, kdprodi=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  p16=?,  p17=?,  p18=?,  k1=?,  create_at=NOW(), valid=1 where sha1(id)=?");
	$qok=$q->execute([$_POST["kdper"], $_POST["kdangket"], $_POST["kdprodi"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["p16"], $_POST["p17"], $_POST["p18"], $_POST["k1"], $_POST["id"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
} else if (isset($_POST["edit-d003"])){
	$q=$db->prepare("update `angket_d003` set kdper=?, kdangket=?, kdprodi=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  create_at=NOW(), valid=1 where sha1(id)=?");
	$qok=$q->execute([$_POST["kdper"], $_POST["kdangket"], $_POST["kdprodi"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["id"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
} else if (isset($_POST["edit-t001"])){
	$q=$db->prepare("update `angket_t001` set kdper=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  p10=?,  p11=?,  p12=?,  p13=?,  p14=?,  p15=?,  k1=?,  create_at=NOW(), valid=1 where sha1(id)=?");
	$qok=$q->execute([$_POST["kdper"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["p10"], $_POST["p11"], $_POST["p12"], $_POST["p13"], $_POST["p14"], $_POST["p15"], $_POST["k1"], $_POST["id"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
} else if (isset($_POST["edit-t002"])){
	$q=$db->prepare("update `angket_t002` set kdper=?, p1=?,  p2=?,  p3=?,  p4=?,  p5=?,  p6=?,  p7=?,  p8=?,  p9=?,  create_at=NOW(), valid=1 where sha1(id)=?");
	$qok=$q->execute([$_POST["kdper"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["p4"], $_POST["p5"], $_POST["p6"], $_POST["p7"], $_POST["p8"], $_POST["p9"], $_POST["id"]]);

	 if($qok){
		$_SESSION["notif"]="success#Success, jawaban telah terkirim.";
		redirectto("sukses/current");
	}else{
		$_SESSION["notif"]="danger#Maaf, jawaban gagal dikirim. Hubungi Administrator jika gagal berulang - ulang.";
		redirectto("");
	} 	
}
?>