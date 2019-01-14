<?php
/**
* @author Ardhan [MR.CL4Y]
* @package Alat Penerjemah Bahasa Sunda
* @date 2018-11-09 20:05
* @contact me RabbitCL4Y123@gmail.com
*/

if (!file_exists("libtrans.php")) {
	echo "  [*] Sedang Mengunduh File...".PHP_EOL;
	file_put_contents("libtrans.php", fopen("https://raw.githubusercontent.com/ardzz/lib-translator-lokal/master/lib.translator-lokal.php","r"));
	echo "  [!] Selesai Mengunduh! Jalankan Ulang Alat Ini!".PHP_EOL;
	exit();
}
include 'libtrans.php';
$green  = "\e[1;92m";
$cyan   = "\e[1;36m";
$normal = "\e[0m";
$blue   = "\e[34m";
$green1 = "\e[0;92m";
$yellow = "\e[93m";
$red    = "\e[91m";
menu:
echo "
   =====================================
    |\\\                             //|
    |  {$green1}╔═╗╔═╗╔╗╔╔═╗╦═╗ ╦╔═╗╔╦╗╔═╗╦ ╦{$normal}  |
    |  {$green1}╠═╝║╣ ║║║║╣ ╠╦╝ ║║╣ ║║║╠═╣╠═╣{$normal}  |
    |  {$green1}╩  ╚═╝╝╚╝╚═╝╩╚═╚╝╚═╝╩ ╩╩ ╩╩ ╩{$normal}  |
    |//                             \\\|
    |---------------------------------|
    |  {$blue}Powered By{$normal}  | {$yellow}┌─┐┬ ┬┌┐┌┌┬┐┌─┐{$normal}  |
    |    {$blue}Google{$normal}    | {$yellow}└─┐│ ││││ ││├─┤{$normal}  |
    |  {$blue}Translate {$red}❤{$normal} | {$yellow}└─┘└─┘┘└┘─┴┘┴ ┴{$normal}  |
    |  {$green1}Versi {$normal}[{$cyan}1.0{$normal}] | ".$red.date("Y-m-d H:i").$normal." |
  ===============[ {$cyan}MR.CL4Y{$normal} ]==============".PHP_EOL;
echo "

   ~:[ MENU ALAT ]:~                

   [1] Terjemah Bahasa Indonesia ke Bahasa Sunda [Umum]
   [2] Terjemah Bahasa Sunda ke Bahasa Indonesia [Umum]
   [3] Terjemahkan dari file text
   [4] Cek Update
   [0] {$red}Keluar{$normal}
   ".PHP_EOL;
$input_menu = readline("   [?] Input Menu : ");
if ($input_menu == 1) {
	echo PHP_EOL;
	echo "   [*] Menu Dipilih    : Terjemah Bahasa Indonesia ke Bahasa Sunda [Umum]".PHP_EOL;
	echo "   [!] Input Teks Maksimal 5000 Huruf!".PHP_EOL.PHP_EOL;
	$input_teks = readline("   [?] Input Teks : ");
	$terjemah   = new GoogleTranslate();
	$hasil      = $terjemah->translate("id","su",$input_teks);
	echo "   [*] Hasil".PHP_EOL.PHP_EOL;
	$tbl = new Console_Table();
	$tbl->setHeaders(array('Bahasa Indonesia', 'Bahasa Sunda'));
	$tbl->addRow(array($input_teks, $hasil));
	echo $tbl->getTable();
	echo PHP_EOL;
	opsi_1:
	$input_teks = readline("   [?] Kembali Kemenu? [y/n] : ");
	if (in_array($input_teks, ["y","n"])) {
		if ($input_teks == "y") {
			cls();
			goto menu;
		}else{
			exit();
		}
	}else{
		goto opsi_1;
	    }
	}
elseif ($input_menu == 2) {
	echo PHP_EOL;
	echo "   [*] Menu Dipilih    : Terjemah Bahasa Sunda ke Bahasa Indonesia [Umum]".PHP_EOL;
	echo "   [!] Input Teks Maksimal 5000 Huruf!".PHP_EOL.PHP_EOL;
	$input_teks = readline("   [?] Input Teks : ");
	$terjemah   = new GoogleTranslate();
	$hasil      = $terjemah->translate("su","id",$input_teks);
	echo "   [*] Hasil".PHP_EOL.PHP_EOL;
	$tbl = new Console_Table();
	$tbl->setHeaders(array('Bahasa Sunda', 'Bahasa Indonesia'));
	$tbl->addRow(array($input_teks, $hasil));
	echo $tbl->getTable();
	echo PHP_EOL;
	opsi_2:
	$input_teks = readline("   [?] Kembali Kemenu? [y/n] : ");
	if (in_array($input_teks, ["y","n"])) {
		if ($input_teks == "y") {
			cls();
			goto menu;
		}else{
			exit();
		}
	}else{
		goto opsi_2;
	    }
}elseif ($input_menu == 3) {
	echo PHP_EOL."   [*] Menu Dipilih    : Terjemahkan dari file text".PHP_EOL;
	$input_file = readline("   [*] Input Nama File : ");
	if (!file_exists($input_file)) {
		echo "   [!] File {$input_file} Tidak Ditemukan!".PHP_EOL;
		exit();
	}
	menu_2:
	$isi_file = file_get_contents($input_file);
echo " 
   ~:[ Informasi File ]:~

   [*] Nama File Teks        : {$input_file}
   [*] Ukuran File           : ".format_size(filesize($input_file))."
   [*] Banyak String (Huruf) : ".strlen($isi_file)."

   ~:[ MENU ALAT ]:~                

   [1] Terjemah Bahasa Indonesia ke Bahasa Sunda [Umum]
   [2] Terjemah Bahasa Sunda ke Bahasa Indonesia [Umum]
   [0] {$red}Keluar{$normal}".PHP_EOL.PHP_EOL;
   $input_menu = readline("   [?] Input Menu : ");
   if ($input_menu == 1) {
   	$terjemah   = new GoogleTranslate();
	$hasil      = $terjemah->translate("id","su",$isi_file);
	echo "   [*] Hasil".PHP_EOL.PHP_EOL;
	$tbl = new Console_Table();
	$tbl->setHeaders(array('Bahasa Indonesia', 'Bahasa Sunda'));
	$tbl->addRow(array($isi_file, $hasil));
	echo $tbl->getTable();
	echo PHP_EOL;
	$input_opsi = readline("   [?] Ingin Menyimpan Hasil Terjemahan? [y/n] : ");
	if (strtolower($input_opsi) == "y") {
		$input_file = readline("   [?] Simpan Sebagai : ");
		if (file_put_contents($input_file, $hasil)) {
			echo "   [*] Tersimpan!".PHP_EOL;
		}else{
			echo "   [*] Gagal Menyimpan".PHP_EOL;
		}
	}else{
		$input_opsi = readline("   [?] Kembali Kemenu Utama? [y/n] [n = keluar] : ");
		if (strtolower($input_opsi) == "y") {
			cls();
			goto menu;
		}else{
			echo "   [*] Kamu akan keluar".PHP_EOL;
			sleep(2);
			exit();
		}
	}
   }elseif ($input_menu == 2) {
   	$terjemah   = new GoogleTranslate();
	$hasil      = $terjemah->translate("su","id",$isi_file);
	echo "   [*] Hasil".PHP_EOL.PHP_EOL;
	$tbl = new Console_Table();
	$tbl->setHeaders(array('Bahasa Sunda', 'Bahasa Indonesia'));
	$tbl->addRow(array($isi_file, $hasil));
	echo $tbl->getTable();
	echo PHP_EOL;
	$input_opsi = readline("   [?] Ingin Menyimpan Hasil Terjemahan? [y/n] : ");
	if (strtolower($input_opsi) == "y") {
		$input_file = readline("   [?] Simpan Sebagai : ");
		if (file_put_contents($input_file, $hasil)) {
			echo "   [*] Tersimpan!".PHP_EOL;
		}else{
			echo "   [*] Gagal Menyimpan".PHP_EOL;
		}
	}else{
		$input_opsi = readline("   [?] Kembali Kemenu Utama? [y/n] [n = keluar] : ");
		if (strtolower($input_opsi) == "y") {
			cls();
			goto menu;
		}else{
			echo "   [*] Kamu akan keluar".PHP_EOL;
			sleep(2);
			exit();
		}
	}
   }
   elseif ($input_menu == 0) {
   	echo "   [*] Kamu akan keluar".PHP_EOL;
   	sleep(2);
   	exit();
   }
   else{
   	echo "   [!] Ooops! Opsi Menu Tidak Ada!".PHP_EOL;
   	cls();
   	goto menu_2;
   }
}elseif ($input_menu == 4) {
	$data = file_get_contents("https://raw.githubusercontent.com/ardzz/repo/master/penerjemah_sunda/update");
	if (preg_match('/y/', $data)) {
		echo "   [*] Update Tersedia!".PHP_EOL;
		$input_opsi = readline("   [?] Update Alat Ini? [y/n] : ");
		if (strtolower($input_opsi) == "y") {
			if(file_put_contents("penerjemah_sunda.php",fopen("https://raw.githubusercontent.com/ardzz/penerjemah_sunda/master/penerjemah_sunda.php","r"))){
			echo "   [*] Berhasil Diperbarui".PHP_EOL;
			}else{
			echo "   [*] Gagal Memperbarui".PHP_EOL;
			}
		}
	}else{
		echo "   [*] Tidak Ada Update!".PHP_EOL;
	}
}elseif ($input_menu == 0) {
   	echo "   [*] Kamu akan keluar".PHP_EOL;
   	sleep(2);
   	exit();
}else{
	echo "   [!] Ooops! Opsi Menu Tidak Ada!".PHP_EOL;
	exit();
}
?>
