<?php
 
	include("dbcon.php");
 
	$query=mysqli_query($con,"select count(id) from `storage`");
	$row = mysqli_fetch_row($query);
 
	$rows = $row[0];
 
	$page_rows = 7;
 
	$last = ceil($rows/$page_rows);
 
	if($last < 1){
		$last = 1;
	}
 
	$pagenum = 1;
 
	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
 
	if ($pagenum < 1) { 
		$pagenum = 1; 
	} 
	else if ($pagenum > $last) { 
		$pagenum = $last; 
	}
 
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
 
	$nquery=mysqli_query($con,"select * from `storage` order by id DESC $limit");

	//RECENTLY PAGINATION
 
	$paginationCtrls = '';
 
	if($last != 1){
 
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-outline-dark">Previous</a> &nbsp; &nbsp; ';
 
		for($i = $pagenum-14; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'.#adminpanelcon" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
			}
	    }
    }
 
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
 
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'.#adminpanelcon" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+14){
			break;
		}
	}
 
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-outline-dark">Next</a> ';
    }
	}
	$con -> close();
	
	// CEAT Pagination

	include("dbcon.php");
 
	$queryceat=mysqli_query($con,"select count(id) from `storage` WHERE department = 'CEAT'");
	$rowceat = mysqli_fetch_row($queryceat);
 
	$rowsceat = $rowceat[0];
 
	$page_rowsceat = 7;
 
	$lastceat = ceil($rowsceat/$page_rowsceat);
 
	if($lastceat < 1){
		$lastceat = 1;
	}
 
	$pagenumceat = 1;
 
	if(isset($_GET['pn'])){
		$pagenumceat = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
 
	if ($pagenumceat < 1) { 
		$pagenumceat = 1; 
	} 
	else if ($pagenumceat > $lastceat) { 
		$pagenumceat = $lastceat; 
	}
 
	$limitceat = 'LIMIT ' .($pagenumceat - 1) * $page_rowsceat .',' .$page_rowsceat;
 
	$nqueryceat=mysqli_query($con,"select * from `storage` WHERE department = 'CEAT' ORDER BY date_publish asc $limitceat");

	$paginationCtrlsceat = '';
 
	if($lastceat != 1){
 
	if ($pagenumceat > 1) {
        $previousceat = $pagenumceat - 1;
		$paginationCtrlsceat .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previousceat.'" class="btn btn-outline-dark">Previous</a> &nbsp; &nbsp; ';
 
		for($i = $pagenumceat-14; $i < $pagenumceat; $i++){
			if($i > 0){
		        $paginationCtrlsceat .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'.#adminpanelcon" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
			}
	    }
    }
 
	$paginationCtrlsceat .= ''.$pagenumceat.' &nbsp; ';
 
	for($i = $pagenumceat+1; $i <= $lastceat; $i++){
		$paginationCtrlsceat .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'.#adminpanelcon" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
		if($i >= $pagenumceat+14){
			break;
		}
	}
 
    if ($pagenumceat != $lastceat) {
        $nextceat = $pagenumceat + 1;
        $paginationCtrlsceat .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$nextceat.'" class="btn btn-outline-dark">Next</a> ';
    }
	}
	$con -> close();

	// CBET Pagination

	include("dbcon.php");
 
	$querycbet=mysqli_query($con,"select count(id) from `storage` WHERE department = 'CBET'");
	$rowcbet = mysqli_fetch_row($querycbet);
 
	$rowscbet = $rowcbet[0];
 
	$page_rowscbet = 7;
 
	$lastcbet = ceil($rowscbet/$page_rowscbet);
 
	if($lastcbet < 1){
		$lastcbet = 1;
	}
 
	$pagenumcbet = 1;
 
	if(isset($_GET['pn'])){
		$pagenumcbet = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
 
	if ($pagenumcbet < 1) { 
		$pagenumcbet = 1; 
	} 
	else if ($pagenumcbet > $lastcbet) { 
		$pagenumcbet = $lastcbet; 
	}
 
	$limitcbet = 'LIMIT ' .($pagenumcbet - 1) * $page_rowscbet .',' .$page_rowscbet;
 
	$nquerycbet=mysqli_query($con,"select * from `storage` WHERE department = 'CBET' ORDER BY date_publish asc $limitcbet");
	
	$paginationCtrlscbet = '';
 
	if($lastcbet != 1){
 
	if ($pagenumcbet > 1) {
        $previouscbet = $pagenumcbet - 1;
		$paginationCtrlscbet .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previouscbet.'" class="btn btn-outline-dark">Previous</a> &nbsp; &nbsp; ';
 
		for($i = $pagenumcbet-14; $i < $pagenumcbet; $i++){
			if($i > 0){
		        $paginationCtrlscbet .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'.#adminpanelcon" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
			}
	    }
    }
 
	$paginationCtrlscbet .= ''.$pagenumcbet.' &nbsp; ';
 
	for($i = $pagenumcbet+1; $i <= $lastcbet; $i++){
		$paginationCtrlscbet .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'.#adminpanelcon" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
		if($i >= $pagenumcbet+14){
			break;
		}
	}
 
    if ($pagenumcbet != $lastcbet) {
        $nextcbet = $pagenumcbet + 1;
        $paginationCtrlscbet .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$nextcbet.'" class="btn btn-outline-dark">Next</a> ';
    }
	}
	$con -> close();

	// cas Pagination

	include("dbcon.php");
 
	$querycas=mysqli_query($con,"select count(id) from `storage` WHERE department = 'CAS'");
	$rowcas = mysqli_fetch_row($querycas);
 
	$rowscas = $rowcas[0];
 
	$page_rowscas = 7;
 
	$lastcas = ceil($rowscas/$page_rowscas);
 
	if($lastcas < 1){
		$lastcas = 1;
	}
 
	$pagenumcas = 1;
 
	if(isset($_GET['pn'])){
		$pagenumcas = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
 
	if ($pagenumcas < 1) { 
		$pagenumcas = 1; 
	} 
	else if ($pagenumcas > $lastcas) { 
		$pagenumcas = $lastcas; 
	}
 
	$limitcas = 'LIMIT ' .($pagenumcas - 1) * $page_rowscas .',' .$page_rowscas;
 
	$nquerycas=mysqli_query($con,"select * from `storage` WHERE department = 'CAS' ORDER BY date_publish asc $limitcas");
	
	$paginationCtrlscas = '';
 
	if($lastcas != 1){
 
	if ($pagenumcas > 1) {
        $previouscas = $pagenumcas - 1;
		$paginationCtrlscas .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previouscas.'" class="btn btn-outline-dark">Previous</a> &nbsp; &nbsp; ';
 
		for($i = $pagenumcas-14; $i < $pagenumcas; $i++){
			if($i > 0){
		        $paginationCtrlscas .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'.#adminpanelcon" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
			}
	    }
    }
 
	$paginationCtrlscas .= ''.$pagenumcas.' &nbsp; ';
 
	for($i = $pagenumcas+1; $i <= $lastcas; $i++){
		$paginationCtrlscas .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'.#adminpanelcon" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
		if($i >= $pagenumcas+14){
			break;
		}
	}
 
    if ($pagenumcas != $lastcas) {
        $nextcas = $pagenumcas + 1;
        $paginationCtrlscas .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$nextcas.'" class="btn btn-outline-dark">Next</a> ';
    }
	}
	$con -> close();

	// ced Pagination

	include("dbcon.php");
 
	$queryced=mysqli_query($con,"select count(id) from `storage` WHERE department = 'ced'");
	$rowced = mysqli_fetch_row($queryced);
 
	$rowsced = $rowced[0];
 
	$page_rowsced = 7;
 
	$lastced = ceil($rowsced/$page_rowsced);
 
	if($lastced < 1){
		$lastced = 1;
	}
 
	$pagenumced = 1;
 
	if(isset($_GET['pn'])){
		$pagenumced = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
 
	if ($pagenumced < 1) { 
		$pagenumced = 1; 
	} 
	else if ($pagenumced > $lastced) { 
		$pagenumced = $lastced; 
	}
 
	$limitced = 'LIMIT ' .($pagenumced - 1) * $page_rowsced .',' .$page_rowsced;
 
	$nqueryced=mysqli_query($con,"select * from `storage` WHERE department = 'CED' ORDER BY date_publish asc $limitced");
	
	$paginationCtrlsced = '';
 
	if($lastced != 1){
 
	if ($pagenumced > 1) {
        $previousced = $pagenumced - 1;
		$paginationCtrlsced .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previousced.'" class="btn btn-outline-dark">Previous</a> &nbsp; &nbsp; ';
 
		for($i = $pagenumced-14; $i < $pagenumced; $i++){
			if($i > 0){
		        $paginationCtrlsced .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'.#adminpanelcon" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
			}
	    }
    }
 
	$paginationCtrlsced .= ''.$pagenumced.' &nbsp; ';
 
	for($i = $pagenumced+1; $i <= $lastced; $i++){
		$paginationCtrlsced .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'.#adminpanelcon" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
		if($i >= $pagenumced+14){
			break;
		}
	}
 
    if ($pagenumced != $lastced) {
        $nextced = $pagenumced + 1;
        $paginationCtrlsced .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$nextced.'" class="btn btn-outline-dark">Next</a> ';
    }
	}
	$con -> close();

	// ipe Pagination

	include("dbcon.php");
 
	$queryipe=mysqli_query($con,"select count(id) from `storage` WHERE department = 'IPE'");
	$rowipe = mysqli_fetch_row($queryipe);
 
	$rowsipe = $rowipe[0];
 
	$page_rowsipe = 7;
 
	$lastipe = ceil($rowsipe/$page_rowsipe);
 
	if($lastipe < 1){
		$lastipe = 1;
	}
 
	$pagenumipe = 1;
 
	if(isset($_GET['pn'])){
		$pagenumipe = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
 
	if ($pagenumipe < 1) { 
		$pagenumipe = 1; 
	} 
	else if ($pagenumipe > $lastipe) { 
		$pagenumipe = $lastipe; 
	}
 
	$limitipe = 'LIMIT ' .($pagenumipe - 1) * $page_rowsipe .',' .$page_rowsipe;
 
	$nqueryipe=mysqli_query($con,"select * from `storage` WHERE department = 'IPE' ORDER BY date_publish asc $limitipe");
	
	$paginationCtrlsipe = '';
 
	if($lastipe != 1){
 
	if ($pagenumipe > 1) {
        $previousipe = $pagenumipe - 1;
		$paginationCtrlsipe .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previousipe.'" class="btn btn-outline-dark">Previous</a> &nbsp; &nbsp; ';
 
		for($i = $pagenumipe-14; $i < $pagenumipe; $i++){
			if($i > 0){
		        $paginationCtrlsipe .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'.#adminpanelcon" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
			}
	    }
    }
 
	$paginationCtrlsipe .= ''.$pagenumipe.' &nbsp; ';
 
	for($i = $pagenumipe+1; $i <= $lastipe; $i++){
		$paginationCtrlsipe .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'.#adminpanelcon" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
		if($i >= $pagenumipe+14){
			break;
		}
	}
 
    if ($pagenumipe != $lastipe) {
        $nextipe = $pagenumipe + 1;
        $paginationCtrlsipe .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$nextipe.'" class="btn btn-outline-dark">Next</a> ';
    }
	}
 
?>
