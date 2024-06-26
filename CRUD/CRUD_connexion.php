<?php

$debeug=False; 

$result = mysqli_query($conn , "select * from connexion");

/*---------------------------------------
CRUD: Connexion
---------------------------------------*/

/* on donne login et renvois mdp associer*/ 
function mdp_connexion($conn,$login){
	$sql="SELECT passwd FROM `connexion` WHERE login= '$login'";

	$res=mysqli_query($conn, $sql) ;
	$passwd = mysqli_fetch_assoc($res);
	if ($passwd == false){
		return null;
	}
	return $passwd['passwd'];
}

/* Inscription d'un utilisateur*/
function ajout_utilisateur($conn, $login,$passwd){
	$sql="INSERT INTO `connexion` (`id`, `login`,`passwd`,`admin`) VALUES (NULL, '$login','$passwd','0');";
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return $res ;	
}

/*retourne l'id d'identifiant*/ 
function id_connexion($conn,$login){
	$sql="SELECT id FROM `connexion` WHERE login= '$login'";
	$res=mysqli_query($conn, $sql) ;
	$id = mysqli_fetch_assoc($res);
	if ($id == false){
		return null;
	}
	return $id['id'];
}

/*retourne la valeur de admin*/
function admin_connexion($conn,$login){
	$sql="SELECT admin FROM `connexion` WHERE login= '$login'";
	$res=mysqli_query($conn, $sql) ;
	$admin = mysqli_fetch_assoc($res);
	if ($admin == false){
		return null;
	}
	return $admin['admin'];
}

/*retourne l'id d'identifiant*/ 
function id_connexion_login_passwd($conn,$login,$passwd){
	$sql="SELECT id FROM `connexion` WHERE `login`= '$login'AND `passwd`='$passwd'";
	$res=mysqli_query($conn, $sql) ;
	$id = mysqli_fetch_assoc($res);
	if ($id == false){
		return null;
	}
	return $id['id'];
}

/*retourne la valeur de login*/ 
function login_connexion($conn,$id_user){
	$sql="SELECT `login` FROM `connexion` WHERE `id`= '$id_user'";
	$res=mysqli_query($conn, $sql) ; 
	return rs_to_tab_connexion($res) ;
}

/* Retourne la valeur de passwd */ 
function passwd_connexion($conn,$id_user){
	$sql="SELECT `passwd` FROM `connexion` WHERE `id`= '$id_user'";
	$res=mysqli_query($conn, $sql) ; 
	return rs_to_tab_connexion($res) ;
}

function rs_to_tab_connexion($rs){
	$tab=[] ; 
	while($row=mysqli_fetch_assoc($rs)){
		$tab[]=$row ;	
	}
	return $tab;
}

/*modifie le mot de passe*/ 
function update_mdp($conn,$id_user,$passwd){

	$sql="UPDATE `connexion` SET `passwd`='$passwd' WHERE `id`='$id_user'" ;
	global $debeug ;
	if($debeug) echo $sql ; 
	$res=mysqli_query($conn, $sql) ; 
	return $res ;
}


?>