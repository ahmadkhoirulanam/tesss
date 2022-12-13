<?php
//Sistem Setting
function redirect($url="",$second=0){
	$redirecto = '<meta http-equiv="refresh" content="'.$second.';url='.$url.'">';
	echo $redirecto;die;
}
function redirectto($url="",$second=0){
	$redirecto = '<meta http-equiv="refresh" content="'.$second.';url='.baseurl($url).'">';
    echo $redirecto;die;
}

function filter($data){
	$filter = htmlentities(stripslashes(strip_tags($data,ENT_QUOTES)));
	return $filter;
    
}

function filtertext($data){
	$filter =strip_tags(htmlentities(addslashes($data)));
	return $filter;
}

function parsetgl($data,$model){
	if($model=="1"){
		$x = explode("/",$data);
		return $x[2]."-".$x[1]."-".$x[0];
	}
	
	if($model=="2"){
		$x = explode("-",$data);
		return $x[2]."/".$x[1]."/".$x[0];
	}
}

function login(){
	if(!empty($_SESSION["kduser"])){
		return true;
	}else{
		return false;
	}
}

function time_ago($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function nilaihuruf($nilai,$program="S1"){
	$nh="Not Defined";
	if($program=="S1"){
		if($nilai>=85 && $nilai<=100){
			$nh="A";
		}elseif($nilai>=75 && $nilai<85){
			$nh="B+";
		}elseif($nilai>=70 && $nilai<75){
			$nh="B";
		}elseif($nilai>=65 && $nilai<70){
			$nh="C+";
		}elseif($nilai>=60 && $nilai<65){
			$nh="C";
		}elseif($nilai>=55 && $nilai<60){
			$nh="D+";
		}elseif($nilai>=50 && $nilai<55){
			$nh="D";
		}elseif($nilai>=0 && $nilai<50){
			$nh="E";
		}
	}
	if($program=="S2"){
		if($nilai>=93 && $nilai<=100){
			$nh="A";
		}elseif($nilai>=85 && $nilai<93){
			$nh="A-";
		}elseif($nilai>=80 && $nilai<85){
			$nh="B+";
		}elseif($nilai>=75 && $nilai<80){
			$nh="B";
		}elseif($nilai>=70 && $nilai<75){
			$nh="B-";
		}elseif($nilai>=66 && $nilai<70){
			$nh="C+";
		}elseif($nilai>=63 && $nilai<66){
			$nh="C";
		}elseif($nilai>=0 && $nilai<63){
			$nh="E";
		}
	}
	
	return $nh;
}

function getmutu($huruf,$program="S1"){
	$mt=0;
	if($program=="S1"){
		if($huruf=="A"){$mt=4;}
		elseif($huruf=="B+"){$mt=3.5;}
		elseif($huruf=="B"){$mt=3;}
		elseif($huruf=="C+"){$mt=2.5;}
		elseif($huruf=="C"){$mt=2;}
		elseif($huruf=="D+"){$mt=1.5;}
		elseif($huruf=="D"){$mt=1;}
		elseif($huruf=="E"){$mt=0;}
		else{$mt=0;}
	}
	if($program=="S2"){
		if($huruf=="A"){$mt=4;}
		elseif($huruf=="B+"){$mt=3.5;}
		elseif($huruf=="B"){$mt=3;}
		elseif($huruf=="C+"){$mt=2.5;}
		elseif($huruf=="C"){$mt=2;}
		elseif($huruf=="D+"){$mt=1.5;}
		elseif($huruf=="D"){$mt=1;}
		elseif($huruf=="E"){$mt=0;}
		else{$mt=0;}
	}
	
	return $mt;
}

//Pengambilan dan olah Data

function rupiah($nilai,$des=0){
	return number_format($nilai,$des,".",".");
}

function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }     
        return $temp;
}
 
 
function terbilang($x, $style=4) {
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }     
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }     
    return $hasil;
}


function potongtext($x,$len){
	if(strlen($x)<=$len){
		return filter($x);
	}else{
		return filter(substr($x,0,$len))." ...";
	}
}

function KonDecRomawi($angka){
    $hsl = "";
    if($angka<1||$angka>3999){
        $hsl = "Batas Angka 1 s/d 3999";
    }else{
         while($angka>=1000){
             $hsl .= "M";
             $angka -= 1000;
         }
         if($angka>=500){
             if($angka>500){
                 if($angka>=900){
                     $hsl .= "M";
                     $angka-=900;
                 }else{
                     $hsl .= "D";
                     $angka-=500;
                 }
             }
         }
         while($angka>=100){
             if($angka>=400){
                 $hsl .= "CD";
                 $angka-=400;
             }else{
                 $angka-=100;
             }
         }
         if($angka>=50){
             if($angka>=90){
                 $hsl .= "XC";
                  $angka-=90;
             }else{
                $hsl .= "L";
                $angka-=50;
             }
         }
         while($angka>=10){
             if($angka>=40){
                $hsl .= "XL";
                $angka-=40;
             }else{
                $hsl .= "X";
                $angka-=10;
             }
         }
         if($angka>=5){
             if($angka==9){
                 $hsl .= "IX";
                 $angka-=9;
             }else{
                $hsl .= "V";
                $angka-=5;
             }
         }
         while($angka>=1){
             if($angka==4){
                $hsl .= "IV";
                $angka-=4;
             }else{
                $hsl .= "I";
                $angka-=1;
             }
         }
    }
    return ($hsl);
}

function getusia($tgl_lahir){
        $today = date("Y-m-d");
        $now = time();
        list($thn, $bln, $tgl) = explode("-",$tgl_lahir);
        $time_lahir = mktime(0,0,0,$bln, $tgl, $thn);
		
		 $selisih = $now-$time_lahir;

        $tahun = floor($selisih/(60*60*24*365));
        $bulan = round(($selisih % (60*60*24*365) ) / (60*60*24*30));
		
		if($tgl_lahir=="" or empty($tgl_lahir) or $tgl_lahir=="0000-00-00"){
			return "<font color='#FF0000'>Belum Diisi</font>";
		}else{
        	return $tahun." thn ".$bulan." bln";
		}
}

function getmasa($tgl_lahir,$tgl_selesai){
        $today = $tgl_selesai;
        $now = time();
        list($thn, $bln, $tgl) = explode("-",$tgl_lahir);
        $time_lahir = mktime(0,0,0,$bln, $tgl, $thn);
		
		 $selisih = $now-$time_lahir;

        $tahun = floor($selisih/(60*60*24*365));
        $bulan = round(($selisih % (60*60*24*365) ) / (60*60*24*30));
		
		if($tgl_lahir=="" or empty($tgl_lahir) or $tgl_lahir=="0000-00-00"){
			return "<font color='#FF0000'>Belum Diisi</font>";
		}else{
        	return $tahun." thn ".$bulan." bln";
		}
}

function dateindo($date,$format="") { // fungsi atau method untuk mengubah tanggal ke format indonesia
   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
		$BulanIndo = array("Januari", "Februari", "Maret",
						   "April", "Mei", "Juni",
						   "Juli", "Agustus", "September",
						   "Oktober", "November", "Desember");
	
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
	
		
		
		if(empty($date) or $date=="" or $date=="0000-00-00"){
			return "<font color='#FF0000'>Belum Diisi</font>";
		}else{
			if($format==1){
				$result = $tgl . "/" . $bulan. "/". $tahun;
			}else{
				$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
			}
			
			return($result);
		}
}

function getbulan($bulan) { // fungsi atau method untuk mengubah tanggal ke format indonesia
   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
		$BulanIndo = array("Januari", "Februari", "Maret",
						   "April", "Mei", "Juni",
						   "Juli", "Agustus", "September",
						   "Oktober", "November", "Desember");
	
			$bulan = $BulanIndo[(int)$bulan-1];
			return($bulan);
}

function getbulansingkat($bulan) { // fungsi atau method untuk mengubah tanggal ke format indonesia
   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
		$BulanIndo = array("Jan", "Feb", "Mar",
						   "Apr", "Mei", "Jun",
						   "Jul", "Agu", "Sep",
						   "Okt", "Nov", "Des");
	
			$bulan = $BulanIndo[(int)$bulan-1];
			return($bulan);
}

function dateeng($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
		$BulanIndo = array("January", "February", "March", "April", "May", "June" ,"July", "August","September", "October", "November","December");
	
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
	
		
		
		if(empty($date) or $date=="" or $date=="0000-00-00"){
			return "<font color='#FF0000'>Belum Diisi</font>";
		}else{
			$result = $BulanIndo[(int)$bulan-1] . " $tgl, ". $tahun;
			return($result);
		}
}

function dateindofull($date) { 
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);

		$BulanIndo = array("Januari", "Februari", "Maret",
						   "April", "Mei", "Juni",
						   "Juli", "Agustus", "September",
						   "Oktober", "November", "Desember");
		
		$day = date('D', strtotime($date));
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
	
		
		$result = $dayList[$day].", ".$tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		if(empty($date) or $date=="" or $date=="0000-00-00"){
			return "<font color='#FF0000'>Belum Diisi</font>";
		}else{
			return($result);
		}
}

function getip(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

function getperangkat(){
	return $_SERVER['HTTP_USER_AGENT'];
}

function acak($panjang,$model="lower")
{
   if($model=="lower"){
   		$karakter = 'abcdefghijklmnopqrstuvwxyz1234567890';
   }elseif($model=="upper"){
   		$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
   }elseif($model=="random"){
   		$karakter = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
   }
   
   $string = '';
   for($i = 0; $i < $panjang; $i++) {
   $pos = rand(0, strlen($karakter)-1);
   $string .= $karakter[$pos];
   }
   return $string;
}

function realnohp($nohp,$type='') {
	$hp='';
     // kadang ada penulisan no hp 0811 239 345
     $nohp = str_replace(" ","",$nohp);
     // kadang ada penulisan no hp (0274) 778787
     $nohp = str_replace("(","",$nohp);
     // kadang ada penulisan no hp (0274) 778787
     $nohp = str_replace(")","",$nohp);
     // kadang ada penulisan no hp 0811.239.345
     $nohp = str_replace(".","",$nohp);
 
     // cek apakah no hp mengandung karakter + dan 0-9
     if(!preg_match('/[^+0-9]/',trim($nohp))){
         // cek apakah no hp karakter 1-3 adalah +62
         if(substr(trim($nohp), 0, 3)=='+62'){
			 $hp = str_replace("+","",$nohp);
         }
		 elseif(substr(trim($nohp), 0, 2)=='62'){
             $hp = trim($nohp);
         }
         // cek apakah no hp karakter 1 adalah 0
         elseif(substr(trim($nohp), 0, 1)=='0'){
             $hp = '62'.substr(trim($nohp), 1);
         }
     }
	if($type=="+"){
		return "+".$hp;
	}else{
		return $hp;
	}
     
 }


//Get Data
function logpassword($username,$action,$summary,$db){
    $q=$db->prepare("insert into log_password set username=?, action=?, summary=?, ip=?, device=?, create_at=now()");
    $q->execute([$username,$action,$summary,getip(),getperangkat()]);

    if($q->rowCount()){
        return 1;
    }else{
        return 0;
    }

}


function getkegiatan($id,$kolom,$db){
    $q=$db->prepare("select $kolom from kegiatan where kdkegiatan=?");
    $q->execute([$id]); 
    if($q->rowCount()>0){
        $r=$q->fetch();
        return $r[$kolom];
    }else{
        return ":: Not Found ::";
    }

}

function getprogram($id,$kolom,$db){
    $q=$db->prepare("select $kolom from program where kdprogram=?");
    $q->execute([$id]); 
    if($q->rowCount()>0){
        $r=$q->fetch();
        return $r[$kolom];
    }else{
        return ":: Not Found ::";
    }

}

function getmitra($id,$kolom,$db){
    $q=$db->prepare("select $kolom from mitra where kdmitra=?");
    $q->execute([$id]); 
    if($q->rowCount()>0){
        $r=$q->fetch();
        return $r[$kolom];
    }else{
        return ":: Not Found ::";
    }

}

function getiku($id,$kolom,$db){
    $q=$db->prepare("select $kolom from iku where kdiku=?");
    $q->execute([$id]); 
    if($q->rowCount()>0){
        $r=$q->fetch();
        return $r[$kolom];
    }else{
        return ":: Not Found ::";
    }

}

function getmk($id,$prodi,$kolom,$db){
    $q=$db->prepare("select $kolom from mk where kdmk=? && kdprodi=?");
    $q->execute([$id,$prodi]); 
    if($q->rowCount()>0){
        $r=$q->fetch();
        return $r[$kolom];
    }else{
        return ":: Not Found ::";
    }

}

function getfak($id,$kolom,$db){
    $q=$db->prepare("select $kolom from fakultas where kdfak=?");
    $q->execute([$id]); 
    if($q->rowCount()>0){
        $r=$q->fetch();
        return $r[$kolom];
    }else{
        return ":: Not Found ::";
    }
}

function getprodi($id,$kolom,$db){
    $q=$db->prepare("select $kolom from prodi where kdprodi=?");
    $q->execute([$id]); 
    if($q->rowCount()>0){
        $r=$q->fetch();
        return $r[$kolom];
    }else{
        return ":: Not Found ::";
    }
}

function getsemester($id,$kolom,$db){
    $q=$db->prepare("select $kolom from semester where kdsemester=?");
    $q->execute([$id]); 
    if($q->rowCount()>0){
        $r=$q->fetch();
        return $r[$kolom];
    }else{
        return ":: Not Found ::";
    }
}

function getdosen($id,$kolom,$db){
    $q=$db->prepare("select * from dosen where kddosen=?");
    $q->execute([$id]); 
    if($q->rowCount()>0){
        $r=$q->fetch();
		if($kolom=="nama"){
			return trim(trim($r["gelar_dpn"])." ".trim($r["nama"]).", ".trim($r["gelar_blkng"]));
		}else{
			return $r[$kolom];
		}
        
    }else{
        return ":: Not Found ::";
    }
}

function getmhs($id,$kolom,$db){
    $q=$db->prepare("select $kolom from mhs where nim=?");
    $q->execute([$id]); 
    if($q->rowCount()>0){
        $r=$q->fetch();
        return $r[$kolom];
    }else{
        return ":: Not Found ::";
    }

}

function getadmin($id,$kolom,$db){
    $q=$db->prepare("select $kolom from admin where kdadmin=?");
    $q->execute([$id]); 
    if($q->rowCount()>0){
        $r=$q->fetch();
        return $r[$kolom];
    }else{
        return ":: Not Found ::";
    }

}

function getsektor($id,$kolom,$db){
    $q=$db->prepare("select $kolom from sektor where kdsektor=?");
    $q->execute([$id]); 
    if($q->rowCount()>0){
        $r=$q->fetch();
        return $r[$kolom];
    }else{
        return ":: Not Found ::";
    }

}

function real_waktu($waktu,$sks,$db){
	$arrayhari = array('','senin','selasa','rabu','kamis','jumat','sabtu','minggu');
	$hari 		= substr($waktu,0,1);
	$wmulai		= substr($waktu,1,2);
	$wselesai	= $wmulai+$sks; if(strlen($wselesai)==1){$wselesai="0".$wselesai;}
	$outhari 	= ucwords($arrayhari[$hari]);
	//return $outhari." ".$wmulai."-".$wselesai;

	$qj1	 	= $db->query("select waktu from waktu where kdwaktu ='$wmulai' limit 1");$rj1=$qj1->fetch();
	$qj2	 	= $db->query("select waktu from waktu where kdwaktu ='$wselesai' limit 1");$rj2=$qj2->fetch();

	return $outhari.", ".$rj1["waktu"]." - ".$rj2["waktu"]." WIB";
}

function krs_cekwaktu($nim,$kdsemester,$waktu,$kdjadwal,$db){
	$error=0;$errmsg="";
	//Cek KRS Sementara
	$q=$db->prepare("select krs_temp.waktu, jadwal.sks, jadwal.nmmk, jadwal.kdkelas from krs_temp left join jadwal on krs_temp.kdjadwal=jadwal.kdjadwal && krs_temp.kdsemester=jadwal.kdsemester where krs_temp.nim=? && krs_temp.kdsemester=? && krs_temp.kdjadwal!=?");
	$q->execute([$nim,$kdsemester,$kdjadwal]);
	while($r=$q->fetch()){
		$wmulai		= substr($r["waktu"],1,2);
		$wselesai	= $wmulai+$r["sks"]; if(strlen($wselesai)==1){$wselesai="0".$wselesai;}
		
		$wawal=$r["waktu"];
		$wakhir=substr($r["waktu"],0,1).$wselesai;
		
		if($waktu>=$wawal && $waktu<$wakhir){
			$error=1;$errmsg="Jadwal Bentrok dengan Mata Kuliah : $r[nmmk] ".substr($r["kdkelas"],3,1).substr($r["kdkelas"],-1)." (".real_waktu($r["waktu"],$r["sks"],$db).")";break;
		}
		
	}
	
	//Cek KRS Real
	$q=$db->prepare("select krs.waktu, jadwal.sks, jadwal.nmmk, jadwal.kdkelas from krs left join jadwal on krs.kdjadwal=jadwal.kdjadwal && krs.kdsemester=jadwal.kdsemester where krs.nim=? && krs.kdsemester=? && krs.kdjadwal!=?");
	$q->execute([$nim,$kdsemester,$kdjadwal]);
	while($r=$q->fetch()){
		$wmulai		= substr($r["waktu"],1,2);
		$wselesai	= $wmulai+$r["sks"]; if(strlen($wselesai)==1){$wselesai="0".$wselesai;}
		
		$wawal=$r["waktu"];
		$wakhir=substr($r["waktu"],0,1).$wselesai;
		
		if($waktu>=$wawal && $waktu<$wakhir){
			$error=1;$errmsg="Jadwal Bentrok dengan Mata Kuliah : $r[nmmk] ".substr($r["kdkelas"],3,1).substr($r["kdkelas"],-1)." (".real_waktu($r["waktu"],$r["sks"],$db).")";break;
		}
		
	}
	
	return $error."#".$errmsg;
	
}

function krs_cek($nim,$kdjadwal,$kdmk,$kdsemester,$db){
	$error=0;$errmsg="";
	//Cek KRS sudah amnbil semetara
	$q=$db->prepare("select id from krs_temp where nim=? && kdjadwal=? && kdsemester=?");
	$q->execute([$nim,$kdjadwal,$kdsemester]);
	if($q->rowCount()>0){
		$error=1;$errmsg="Anda sudah mengambil mata kuliah ini.";
	}else{
		//Cek MK sama
		$q=$db->prepare("select id from krs_temp where nim=? && kdmk=? && kdsemester=?");
		$q->execute([$nim,$kdmk,$kdsemester]);
		if($q->rowCount()>0){
			$error=1;$errmsg="Anda sudah mengambil mata kuliah ini di kelas yang lain.";
		}
	}
	
	//Cek KRS sudah amnbil semetara
	$q=$db->prepare("select id from krs where nim=? && kdjadwal=? && kdsemester=?");
	$q->execute([$nim,$kdjadwal,$kdsemester]);
	if($q->rowCount()>0){
		$error=1;$errmsg="Anda sudah mengambil mata kuliah ini.";
	}else{
		//Cek MK sama
		$q=$db->prepare("select id from krs where nim=? && kdmk=? && kdsemester=?");
		$q->execute([$nim,$kdmk,$kdsemester]);
		if($q->rowCount()>0){
			$error=1;$errmsg="Anda sudah mengambil mata kuliah ini di kelas yang lain.";
		}
	}
	
	return $error."#".$errmsg;
}

function krs_cektsks($nim,$kdsemester,$db){
	$tsks=0;
	//Krs sementara
	$q=$db->prepare("select sum(sks) as n from krs_temp where krs_temp.nim=? && krs_temp.kdsemester=?");
	$q->execute([$nim,$kdsemester]);
	$r=$q->fetch();
	$tsks=$tsks+$r["n"];
	//KRS beneran
	$q=$db->prepare("select sum(sks) as n from krs where krs.nim=? && krs.kdsemester=?");
	$q->execute([$nim,$kdsemester]);
	$r=$q->fetch();
	$tsks=$tsks+$r["n"];
	
	return $tsks;
}

//Statistikal Data
function tkegiatan($kdprogram,$tahun,$kdfak,$kdprodi,$db){
	if(!empty($tahun)){$wherethn="&& tahun='$tahun'";}else{$wherethn="";}
    $q=$db->prepare("select kdkegiatan from kegiatan where kdprogram='$kdprogram' $wherethn && kdfak like '%$kdfak%' && kdprodi like '%$kdprodi%';");$q->execute();
    return $q->rowCount();
}

function tpkegiatan($kdprogram,$tahun,$kdfak,$kdprodi,$db){
	if(!empty($tahun)){$wherethn="&& tahun='$tahun'";}else{$wherethn="";}
    $q=$db->prepare("SELECT kdpeserta, kegiatan.kdkegiatan, kdprogram FROM kegiatan_peserta 
LEFT JOIN kegiatan ON `kegiatan_peserta`.`kdkegiatan`=kegiatan.`kdkegiatan` 
WHERE kdprogram='$kdprogram' $wherethn && kegiatan_peserta.kdfak like '%$kdfak%' && kegiatan_peserta.`kdprodi` like '%$kdprodi%';");$q->execute();
    return $q->rowCount();
}

function tkegiataniku($kdiku,$tahun,$kdfak,$kdprodi,$db){
	if(!empty($tahun)){$wherethn="&& tahun='$tahun'";}else{$wherethn="";}
    $q=$db->prepare("select kdkegiatan from kegiatan where kdiku like '%$kdiku%' $wherethn && kdfak like '%$kdfak%' && kdprodi like '%$kdprodi%';");$q->execute();
    return $q->rowCount();
}

function tpkegiataniku($kdiku,$tahun,$kdfak,$kdprodi,$db){
	if(!empty($tahun)){$wherethn="&& tahun='$tahun'";}else{$wherethn="";}
    $q=$db->prepare("SELECT kdpeserta, kegiatan.kdkegiatan, kdprogram FROM kegiatan_peserta 
LEFT JOIN kegiatan ON `kegiatan_peserta`.`kdkegiatan`=kegiatan.`kdkegiatan` 
WHERE kdiku like '%$kdiku%' $wherethn && kegiatan_peserta.kdfak like '%$kdfak%' && kegiatan_peserta.`kdprodi` like '%$kdprodi%';");$q->execute();
    return $q->rowCount();
}

function tsektormitra($kdsektor,$kdfak,$kdprodi,$db){
    $q=$db->prepare("SELECT kdkegiatan, mitra.kdmitra, sektor.kdsektor FROM (kegiatan LEFT JOIN mitra ON kegiatan.kdmitra=mitra.kdmitra) 
LEFT JOIN sektor ON mitra.`kdsektor`=sektor.`kdsektor` WHERE kegiatan.`kdmitra` IS NOT NULL && sektor.kdsektor='$kdsektor' && kdfak like '%$kdfak%' && kdprodi like '%$kdprodi%' group by kegiatan.`kdmitra`;");$q->execute();
    return $q->rowCount();
}

function tkegiatanmitra($kdmitra,$kdfak,$kdprodi,$db){
    $q=$db->prepare("SELECT kdkegiatan from kegiatan where kdmitra='$kdmitra' && kdfak like '%$kdfak%' && kdprodi like '%$kdprodi%';");$q->execute();
    return $q->rowCount();
}

function tmhs($tahun,$lls='',$kdfak,$kdprodi,$db){
	if(!empty($lls)){$wherells="&& lls='$lls'";}else{$wherells="";}
    $q=$db->prepare("SELECT nim from mhs where ta='$tahun' $wherells && left(kdprodi,1) like '%$kdfak%' && kdprodi like '%$kdprodi%';");$q->execute();
    return $q->rowCount();
}

function tnonmhs($tahun,$kdfak,$kdprodi,$db){
    $q=$db->prepare("SELECT nim from mhs where ta='$tahun' && (lls is null or lls='M') && left(kdprodi,1) like '%$kdfak%' && kdprodi like '%$kdprodi%';");$q->execute();
    return $q->rowCount();
}

function tmhsvaksin($kdfak,$kdprodi,$db){
    $q=$db->prepare("SELECT mhs.nim from mhs left join vaksin on mhs.nim=vaksin.nim where lls='A' && vaksin.status=1 && vaksin.status_vaksin>0 && vaksin.id is not null && left(mhs.kdprodi,1) like '%$kdfak%' && mhs.kdprodi like '%$kdprodi%';");$q->execute();
    return $q->rowCount();
}

function tmhsnonvaksin($tvaksin,$kdfak,$kdprodi,$db){
    $q=$db->prepare("select nim from mhs where lls='A' && left(kdprodi,1) like '%$kdfak%' && kdprodi like '%$kdprodi%';");$q->execute();
	$nonvaksin=$q->rowCount()-$tvaksin;
	
	if($nonvaksin>0){
		return $nonvaksin;
	}else{
		return 0;
	}
}

function tmhsdosisvaksin($dosis,$kdfak,$kdprodi,$db){
    $q=$db->prepare("SELECT mhs.nim from mhs left join vaksin on mhs.nim=vaksin.nim where lls='A' && vaksin.status=1 && vaksin.status_vaksin='$dosis' && vaksin.status_vaksin>0 && vaksin.id is not null && left(mhs.kdprodi,1) like '%$kdfak%' && mhs.kdprodi like '%$kdprodi%';");$q->execute();
    return $q->rowCount();
}


function tpesertambkm($tahun,$kdfak,$kdprodi,$db){
	if(!empty($tahun)){$wherethn="&& kegiatan.tahun='$tahun'";}else{$wherethn="";}
	
    $q=$db->prepare("SELECT kdpeserta from (kegiatan_peserta left join mhs on kegiatan_peserta.idpeserta=mhs.nim) left join kegiatan on kegiatan_peserta.kdkegiatan=kegiatan.kdkegiatan where mhs.lls='A' $wherethn && kegiatan_peserta.acc=1 && kegiatan_peserta.kdfak like '%$kdfak%' && kegiatan_peserta.kdprodi like '%$kdprodi%' group by kegiatan_peserta.idpeserta;");$q->execute();
    return $q->rowCount();

}

function tnonpesertambkm($tpeserta,$kdfak,$kdprodi,$db){
    $q=$db->prepare("select nim from mhs where lls='A' && left(kdprodi,1) like '%$kdfak%' && kdprodi like '%$kdprodi%';");$q->execute();
	$nonpeserta=$q->rowCount()-$tpeserta;
	
	if($nonpeserta>0){
		return $nonpeserta;
	}else{
		return 0;
	}
}

function tmhsgender($gender,$kdfak,$kdprodi,$db){
	if(!empty($gender)){$wheregender="&& kelamin='$gender'";}else{$wheregender="&& kelamin is null";}
	
    $q=$db->prepare("select nim from mhs where lls='A' $wheregender && left(kdprodi,1) like '%$kdfak%' && kdprodi like '%$kdprodi%';");$q->execute();
    return $q->rowCount();

}

function tmhsjenis($jenis,$region,$kdfak,$kdprodi,$db){
    $q=$db->prepare("select nim from mhs where lls='A' && jenis='$jenis' && region='$region' && left(kdprodi,1) like '%$kdfak%' && kdprodi like '%$kdprodi%';");$q->execute();
    return $q->rowCount();
}

function addlog_activity($kduser,$level,$aktivitas,$tabel,$prm,$resume,$deskripsi,$db){
	$ip=getip();
	$perangkat=getperangkat();
	
    $q=$db->prepare("insert into log_activity set kduser=?, level=?, aktivitas=?,tabel=?,prm=?,resume=?,deskripsi=?,ip=?,perangkat=?, create_at=NOW()");
	$qok=$q->execute([$kduser,$level,$aktivitas,$tabel,$prm,$resume,$deskripsi,$ip,$perangkat]);
    
	if($qok){
		return TRUE;
	}else{
		return FALSE;
	}
}

function getper_tagihan($kd,$status='NULL',$db){
	if($status=='NULL'){
		$q=$db->prepare("select sum(total) as tot from finance_bill where kdperiode=?");
		$q->execute([$kd]);
	}else{
		$q=$db->prepare("select sum(total) as tot from finance_bill where kdperiode=? && status=?");
		$q->execute([$kd,$status]);
	}
	
	$r=$q->fetch();
	if(empty($r["tot"])){
		return 0;
	}else{
		return $r["tot"];
	}
}

function getperiode($kd,$kolom,$db){
	$q=$db->prepare("select $kolom from finance_periode where kdperiode=?");
	$q->execute([$kd]);
	if($q->rowCount()>0){
		$r=$q->fetch();
		return $r["$kolom"];
	}else{
		return ":: No Found ::";
	}
	
}

function getakun($kd,$tahun,$kolom,$db){
	$q=$db->prepare("select $kolom from finance_akun where kdakun=? && tahun=?");
	$q->execute([$kd,$tahun]);
	if($q->rowCount()>0){
		$r=$q->fetch();
		return $r["$kolom"];
	}else{
		return ":: No Found ::";
	}
	
}

function gettagihan($keyword='', $kdperiode='', $kdbank='', $tahun='', $tgl1='', $tgl2='',$kdfak='', $kdprodi='', $jns='', $status, $aktif, $db){
	if(!empty($keyword)){$wherekey="&& (finance_bill.nim like '%$keyword%' or finance_bill.namava like '%$keyword%')";}else{$wherekey="";}
	if(!empty($kdperiode)){$whereper="&& kdperiode ='$kdperiode'";}else{$whereper="";}
	if(!empty($kdbank)){$wherebank="&& kdbank= '$kdbank'";}else{$wherebank="";}
	if(!empty($tahun)){$wheretahun="&& YEAR(payment_at)= '$tahun'";}else{$wheretahun="";}
	
	if(!empty($tgl1) && empty($tgl2)){
		$wheretgl="&& date(payment_at)='$tgl1'";
	}elseif(!empty($tgl2) && empty($tgl1)){
		$wheretgl="&& date(payment_at)='$tgl2'";
	}elseif(!empty($tgl1) && !empty($tgl2)){
		$wheretgl="&& (date(payment_at) BETWEEN '$tgl1' AND '$tgl2')";
	}else{
		$wheretgl="";
	}
	
	if(!empty($kdfak)){$wherefak="&& left(kdprodi,1)= '$kdfak'";}else{$wherefak="";}
	if(!empty($kdprodi)){$whereprodi="&& kdprodi= '$kdprodi'";}else{$whereprodi="";}
	
	if(!empty($jns)){$wherejns="&& vermetod= '$jns'";}else{$wherejns="";}

	$q=$db->prepare("select sum(total) as gt from finance_bill where aktif=? && status=? $wheretahun $whereper $wherekey $wherebank $wheretgl $wherejns $wherefak $whereprodi");
	$q->execute([$aktif,$status]);
	
	$r=$q->fetch();
	
	if(empty($r["gt"])){
		return 0;
	}else{
		return $r["gt"];
	}
}

function getdataimport($kd,$jenis,$db){
	if($jenis=="tagihan"){
		$q=$db->prepare("select kdbill from finance_bill where kdimport=? group by nim, kdimport");
		$q->execute([$kd]);
	}elseif($jenis=="konfirm"){
		$q=$db->prepare("select kdbill from finance_bill where kdimport_konfirm=? group by nim, kdimport_konfirm");
		$q->execute([$kd]);
	}
	return $q->rowCount();
}
function pendapatan_akun($kd,$bulan,$db){
	$q=$db->prepare("select sum(total) as n from finance_bill where kdakun=? && left(payment_at,7)=? && aktif=? && status=?");
	$q->execute([$kd,$bulan,1,1]);
	
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
}

function pendapatan_katakun($kd,$bulan,$db){
	$q=$db->prepare("select sum(total) as n from finance_bill where left(kdakun,1)=? && left(payment_at,7)=? && aktif=? && status=?");
	$q->execute([$kd,$bulan,1,1]);
	
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
}

function pendapatan_akun_bank($kd,$kdbank,$tahun,$db){
	$q=$db->prepare("select sum(total) as n from finance_bill where kdakun=? && kdbank=? && year(payment_at)=? && aktif=? && status=?");
	$q->execute([$kd,$kdbank,$tahun,1,1]);
	
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
}

function pendapatan_katakun_bank($kd,$kdbank,$tahun,$db){
	$q=$db->prepare("select sum(total) as n from finance_bill where left(kdakun,1)=? && kdbank=? && year(payment_at)=? && aktif=? && status=?");
	$q->execute([$kd,$kdbank,$tahun,1,1]);
	
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
}

function pendapatan_inkat($kd,$bulan,$db){
	$q=$db->prepare("select sum(nominal) as n from finance_in where kdinkat=? && left(tglcatat,7)=?");
	$q->execute([$kd,$bulan]);
	
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
}

function pengeluaran_outkat($kd,$bulan,$db){
	$q=$db->prepare("select sum(nominal) as n from finance_out where kdoutkat=? && left(tglcatat,7)=?");
	$q->execute([$kd,$bulan]);
	
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
}

function pendapatan_bank($kd,$bulan,$db){
	$q=$db->prepare("select sum(total) as n from finance_bill where kdbank=? && left(payment_at,7)=? && aktif=? && status=?");
	$q->execute([$kd,$bulan,1,1]);
	
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
}

function pendapatan_bank_in($kd,$bulan,$db){
	$q=$db->prepare("select sum(nominal) as n from finance_in where kdbank=? && left(tglcatat,7)=?");
	$q->execute([$kd,$bulan]);
	
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
}

function pendapatan_bulan($bulan,$db){
	$q=$db->prepare("select sum(total) as n from finance_bill where left(payment_at,7)=? && aktif=? && status=?");
	$q->execute([$bulan,1,1]);
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
	
}

function pendapatan_bulan_in($bulan,$db){
	$q=$db->prepare("select sum(nominal) as n from finance_in where left(tglcatat,7)=?");
	$q->execute([$bulan]);
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
	
}

function pengeluaran_bulan_out($bulan,$db){
	$q=$db->prepare("select sum(nominal) as n from finance_out where left(tglcatat,7)=?");
	$q->execute([$bulan]);
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
	
}


function pendapatan_bulan_r($bulan,$db){
	$q=$db->prepare("select sum(total) as n from finance_bill where kdprodi is not null && left(payment_at,7)=? && aktif=? && status=?");
	$q->execute([$bulan,1,1]);
	
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
}

function pendapatan_prodi($kd,$bulan,$db){
	$q=$db->prepare("select sum(total) as n from finance_bill where kdprodi is not null && kdprodi=? && left(payment_at,7)=? && aktif=? && status=?");
	$q->execute([$kd,$bulan,1,1]);
	
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
}

function pendapatan_fak($kd,$bulan,$db){
	$q=$db->prepare("select sum(total) as n from finance_bill where kdprodi is not null && left(kdprodi,1)=? && left(payment_at,7)=? && aktif=? && status=?");
	$q->execute([$kd,$bulan,1,1]);
	
	$r=$q->fetch();
	if(empty($r["n"])){
		return 0;
	}else{
		return $r["n"];
	}
}

function validateBank($kd,$db){
	$q=$db->prepare("select kdbank from finance_bank where kdbank=?");
	$q->execute([$kd]);
	
	if($q->rowCount()>0){
		return TRUE;
	}else{
		return FALSE;
	}
}

function getbank($kd,$db){
	$q=$db->prepare("select idbank from finance_bank where kdbank=?");
	$q->execute([$kd]);
	
	if($q->rowCount()>0){
		$r=$q->fetch();
		return $r["idbank"];
	}else{
		return FALSE;
	}
}

function getbank2($kd,$kolom,$db){
	$q=$db->prepare("select $kolom from finance_bank where kdbank=?");
	$q->execute([$kd]);
	
	if($q->rowCount()>0){
		$r=$q->fetch();
		return $r["$kolom"];
	}else{
		return ":: Not Found ::";
	}
}

function validatePeriode($kd,$db){
	$q=$db->prepare("select kdperiode from finance_periode where kdperiode=?");
	$q->execute([$kd]);
	
	if($q->rowCount()>0){
		return TRUE;
	}else{
		return FALSE;
	}
}

function validateAkun($kd,$tahun,$db){
	$q=$db->prepare("select kdakun from finance_akun where kdakun=? && tahun=?");
	$q->execute([$kd,$tahun]);
	
	if($q->rowCount()>0){
		return TRUE;
	}else{
		return FALSE;
	}
}

function validateProdi($kd,$db){
	$q=$db->prepare("select kdprodi from prodi where kdprodi=?");
	$q->execute([$kd]);
	
	if($q->rowCount()>0){
		return TRUE;
	}else{
		return FALSE;
	}
}

function getinkat($kd,$kolom,$db){
	$q=$db->prepare("select $kolom from finance_inkat where kdinkat=?");
	$q->execute([$kd]);
	if($q->rowCount()>0){
		$r=$q->fetch();
		return $r["$kolom"];
	}else{
		return ":: No Found ::";
	}
	
}

function getoutkat($kd,$kolom,$db){
	$q=$db->prepare("select $kolom from finance_outkat where kdoutkat=?");
	$q->execute([$kd]);
	if($q->rowCount()>0){
		$r=$q->fetch();
		return $r["$kolom"];
	}else{
		return ":: No Found ::";
	}
	
}

function gettotal_inout($kd,$jenis,$db){
	if($jenis=='in'){
		$q=$db->prepare("select sum(nominal) as tot from finance_in where kdinkat=?");
		$q->execute([$kd]);
	}elseif($jenis=='out'){
		$q=$db->prepare("select sum(nominal) as tot from finance_out where kdoutkat=?");
		$q->execute([$kd]);
	}
	
	$r=$q->fetch();
	if(empty($r["tot"])){
		return 0;
	}else{
		return $r["tot"];
	}
}
?>