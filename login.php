<?php

$akun = file_get_contents("akun.txt");
$pisah = explode("\n", $akun);
foreach ($pisah as $key) {
	$ex = explode("|", $key);
	$user = $ex['0']; // Username
	$pass = 'ibuku354'; // Password
	echo "Sedang Proses : $user\n";
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

	curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

	$headers = array();
	$headers[] = "Connection: keep-alive";
	$headers[] = "Cache-Control: max-age=0";
	$headers[] = "Upgrade-Insecure-Requests: 1";
	$headers[] = "Dnt: 1";
	$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.92 Safari/537.36";
	$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
	$headers[] = "Referer: https://www.vidswatcher.com/?page=videos";
	$headers[] = "Accept-Encoding: gzip, deflate, br";
	$headers[] = "Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,af;q=0.6,sq;q=0.5,am;q=0.4,ar;q=0.3,an;q=0.2,hy;q=0.1,zu;q=0.1,el;q=0.1,yo;q=0.1,yi;q=0.1,xh;q=0.1,cy;q=0.1,wa;q=0.1,vi;q=0.1,uz;q=0.1,ug;q=0.1,ur;q=0.1,uk;q=0.1,tw;q=0.1,tk;q=0.1,tr;q=0.1,to;q=0.1,zh-TW;q=0.1,zh-CN;q=0.1,zh-HK;q=0.1,zh;q=0.1,ti;q=0.1,th;q=0.1,te;q=0.1,tt;q=0.1,tg;q=0.1,ta;q=0.1,sv;q=0.1,sw;q=0.1,fi;q=0.1,su;q=0.1,es-VE;q=0.1,es-UY;q=0.1,es-ES;q=0.1,es-PE;q=0.1,es-MX;q=0.1,es-CR;q=0.1,es-CO;q=0.1,es-HN;q=0.1,es-CL;q=0.1,es-AR;q=0.1,es-US;q=0.1,es-419;q=0.1,es;q=0.1,st;q=0.1,so;q=0.1,sl;q=0.1,sk;q=0.1,si;q=0.1,sd;q=0.1,sn;q=0.1,sh;q=0.1,sr;q=0.1,sm;q=0.1,ru;q=0.1,mo;q=0.1,ro;q=0.1,rm;q=0.1,qu;q=0.1,pa;q=0.1,fr-CH;q=0.1,fr-FR;q=0.1,fr-CA;q=0.1,fr;q=0.1,pt-PT;q=0.1,pt-BR;q=0.1,pt;q=0.1,pl;q=0.1,fa;q=0.1,ps;q=0.1,oc;q=0.1,om;q=0.1,or;q=0.1,nn;q=0.1,nb;q=0.1,ne;q=0.1,mn;q=0.1,ms;q=0.1,mr;q=0.1,mt;q=0.1,ml;q=0.1,mk;q=0.1,lb;q=0.1,lt;q=0.1,ln;q=0.1,lv;q=0.1,la;q=0.1,lo;q=0.1,ckb;q=0.1,ku;q=0.1,hr;q=0.1,co;q=0.1,ko;q=0.1,ky;q=0.1,km;q=0.1,kk;q=0.1,ca;q=0.1,kn;q=0.1,de-CH;q=0.1,de-LI;q=0.1,de-DE;q=0.1,de-AT;q=0.1,de;q=0.1,ja;q=0.1,jv;q=0.1,it-CH;q=0.1,it-IT;q=0.1,it;q=0.1,is;q=0.1,ga;q=0.1,ia;q=0.1,en-NZ;q=0.1,en-CA;q=0.1,en-GB;q=0.1,en-IN;q=0.1,en-AU;q=0.1,en-ZA;q=0.1,he;q=0.1,hu;q=0.1,hmn;q=0.1,hi;q=0.1,haw;q=0.1,ha;q=0.1,gu;q=0.1,gn;q=0.1,ka;q=0.1,gl;q=0.1,gd;q=0.1,fy;q=0.1,fil;q=0.1,fo;q=0.1,et;q=0.1,eo;q=0.1,da;q=0.1,cs;q=0.1,br;q=0.1,bs;q=0.1,bg;q=0.1,bn;q=0.1,be;q=0.1,nl;q=0.1,eu;q=0.1,az;q=0.1,ast;q=0.1";
	$headers[] = "Cookie : _ga=GA1.2.199706904.1542534728; _gid=GA1.2.207797560.1542534728; _gat=1";
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);
	preg_match_all('/name="token" value="(.*?)"/', $result, $token);
	$t = $token['1']['0'];
// Login
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "token=$t&user=$user&password=$pass&connect=");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

	$headers = array();
	$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
	$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
	$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
	$headers[] = "Referer: https://www.vidswatcher.com/";
	$headers[] = "Content-Type: application/x-www-form-urlencoded";
	$headers[] = "Connection: keep-alive";
	$headers[] = "Upgrade-Insecure-Requests: 1";
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
	curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
//curl_setopt($ch, CURLOPT_HEADER, 1);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);

	while (TRUE) {

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/?page=videos");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

		$headers = array();
		$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
		$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
		$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
		$headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=13";
		$headers[] = "Connection: keep-alive";
		curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
		curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
		$headers[] = "Upgrade-Insecure-Requests: 1";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		if (preg_match("/yet/", $result)) {
			echo "\n$user : Gak Ada Iklan";
			break;
		} else {

			preg_match_all('/onclick="opensite((.*?));/', $result, $matches);
//echo var_dump($matches);

			foreach ($matches['1'] as $value) // Melakukan perulangan

			{
				$v = str_replace("('", "", $value);
				$v = str_replace("')", "", $v);
				echo $v . "\n";
				// Mencari Token
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/?page=videos&vid=$v");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

				curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

				$headers = array();
				$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
				$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
				$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
				$headers[] = "Referer: https://www.vidswatcher.com/?page=videos";
				$headers[] = "Connection: keep-alive";
				curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
				curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
				$headers[] = "Upgrade-Insecure-Requests: 1";
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

				$result = curl_exec($ch);
				if (curl_errno($ch)) {
					echo 'Error:' . curl_error($ch);
				}

				curl_close($ch);
				preg_match_all("/token = '(.*?)';/", $result, $token);
				preg_match_all("/response = '(.*?)';/", $result, $data);
				$token = $token['1']['0'];
				$data = $data['1']['0'];

				// proses

				for ($i = 0; $i < 30; $i++) {
					// Memproses Video
					$ch = curl_init();

					curl_setopt($ch, CURLOPT_URL, "https://www.vidswatcher.com/system/gateways/video.php");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$data&token=$token");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

					$headers = array();
					$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:63.0) Gecko/20100101 Firefox/63.0";
					$headers[] = "Accept: */*";
					$headers[] = "Accept-Language: id,en-US;q=0.7,en;q=0.3";
					$headers[] = "Referer: https://www.vidswatcher.com/?page=videos&vid=2";
					$headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
					$headers[] = "X-Requested-With: XMLHttpRequest";
					$headers[] = "Connection: keep-alive";
					curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
					curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

					$result = curl_exec($ch);
					if (curl_errno($ch)) {
						echo 'Error:' . curl_error($ch);
					} else {
						if (preg_match("/SUCCESS!/", $result)) {
							echo "Berhasil\n";
							break; // Menghentkan Perulangan
						} else {
							echo "$i. Gagal\n";
						}
					}
					curl_close($ch);
					sleep("1"); // Memberi Delay
				}
			}
		}
	}
}
?>