<?php
 class Konekcija {
	private $host;
	private $username;
	private $password;
	private $baza;
	private $konekt;
	
	function __construct($host,$username,$password,$baza){
		$this->host=$host;
		$this->username=$username;
		$this->password=$password;
		$this->baza=$baza;
		$this->konekt=new mysqli($this->host, $this->username,$this->password, $this->baza);
		mysqli_set_charset( $this->konekt, 'utf8');
	}

	function addPost($naslov,$sadrzaj,$autor){
		$stmt=$this->konekt->prepare("insert into strane(naslov, sadrzaj, autor) values(?,?,?)");
		$stmt->bind_param("ssi",$naslov,$sadrzaj,$autor);
		$stmt->execute();
	}

	function getStrane(){	
		$stmt=$this->konekt->prepare("SELECT * FROM strane");
		$stmt->execute();
		$strane = $stmt->get_result();
		$str = $strane->fetch_all();
		if($strane->num_rows > 0){
			return $str;
		} else {
			return false;
		}
	}

	function getStrana($id){
		$stmt=$this->konekt->prepare("SELECT * FROM strane WHERE id_strana=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$strane = $stmt->get_result();
		$strana = $strane->fetch_assoc();
		return $strana;
	}

	function register($ime,$email,$lozinka,$tip){
		$stmt=$this->konekt->prepare("insert into korisnici(ime_prezime, email,lozinka,tip_korisnika) values(?,?,?,?)");
		$stmt->bind_param("sssi",$ime,$email,$lozinka,$tip);
		$stmt->execute();
	}

	function adminIndexLogin($email,$lozinka){
		$stmt=$this->konekt->prepare("SELECT * FROM korisnici WHERE email=? AND lozinka=? AND tip_korisnika=1");
		$stmt->bind_param("ss", $email,$lozinka);
		$stmt->execute();
		$rezultat=$stmt->get_result();

		if($rezultat->num_rows > 0){
			$rez=$rezultat->fetch_assoc();
			$_SESSION['id']= $rez['id'];
			$_SESSION['ime'] = $rez['ime_prezime'];
			$_SESSION['login'] = TRUE;
			return $rez;
		}else {
			echo "ГРЕШКА";
		}
	}

	function login($email,$lozinka){
		$stmt=$this->konekt->prepare("SELECT * FROM korisnici WHERE email=? AND lozinka=?");
		$stmt->bind_param("ss", $email,$lozinka);
		$stmt->execute();
		$rezultat=$stmt->get_result();
		$rez = $rezultat->fetch_assoc();
		return $rez;
	}

	function getKomentari($id){
		$stmt=$this->konekt->prepare("SELECT * FROM komentari WHERE id_strana=? AND status=1");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$komentari = $stmt->get_result();
		$komentar = $komentari->fetch_all();
		if($komentari->num_rows > 0){
			return $komentar;
		} else {
			return false;
		}
	}
	
	function deletePage($id){
		$stmt=$this->konekt->prepare("DELETE from strane where id_strana=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
		return true;
	}

	function updatePage($naslov,$sadrzaj,$autor,$id){
		$stmt=$this->konekt->prepare("UPDATE strane SET naslov=?, sadrzaj=?, autor=? WHERE id_strana=?");
		$stmt->bind_param("ssii",$naslov,$sadrzaj,$autor,$id);
		$stmt->execute();
	}

	function selectStrana($id){
		$stmt=$this->konekt->prepare("SELECT * FROM strane WHERE id_strana=?");
		$stmt->execute();
		$strane = $stmt->get_result();
		$strana = $strane->fetch_all();
		return $strana;
	}

	function insertKomentar($id,$sadrzaj,$ime){
		$stmt=$this->konekt->prepare("INSERT INTO komentari (id_strana, sadrzaj, status, ime)VALUES(?,?,0,?)");
		$stmt->bind_param("iss",$id,$sadrzaj,$ime);
		$stmt->execute();
	}

	function selectKorisnik(){
		$stmt=$this->konekt->prepare("SELECT * FROM tip_korisnika");
		$stmt->execute();
		$tipovi = $stmt->get_result();
		$korisnici = $tipovi->fetch_all();
		if($tipovi->num_rows > 0){
			return $korisnici;
		} else {
			return false;
		}
	}

	function getNeobjavljeniKomentari(){
		$stmt=$this->konekt->prepare("SELECT * FROM komentari WHERE status=0");
		$stmt->execute();
		$komentari = $stmt->get_result();
		$komentar = $komentari->fetch_all();
		return $komentar;
	}

	function deleteKomentar($id){
		$stmt=$this->konekt->prepare("DELETE from komentari where id=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
		return true;
	}

	function editKomentar($id){
		$stmt=$this->konekt->prepare("UPDATE komentari SET status=1 WHERE id=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
		return true;
	}
}

$conn = new Konekcija('localhost','root','','blog');

session_start();
?>

