<?php
 
	include("dbcon.php");
 
	$queryceat=mysqli_query($con,"select count(id) from `storage` WHERE department = 'CEAT'");
	$rowceat = mysqli_fetch_row($queryceat);
 
	$rowsceat = $rowceat[0];
 
	$page_rowsceat = 5;
 
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


	//RECENTLY PAGINATION
 
	$paginationCtrlsceat = '';
 
	if($lastceat != 1){
 
	if ($pagenumceat > 1) {
        $previousceat = $pagenumceat - 1;
		$paginationCtrlsceat .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previousceat.'" class="btn btn-outline-dark">Previous</a> &nbsp; &nbsp; ';
 
		for($i = $pagenumceat-14; $i < $pagenumceat; $i++){
			if($i > 0){
		        $paginationCtrlsceat .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
			}
	    }
    }
 
	$paginationCtrlsceat .= ''.$pagenumceat.' &nbsp; ';
 
	for($i = $pagenumceat+1; $i <= $lastceat; $i++){
		$paginationCtrlsceat .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-outline-dark">'.$i.'</a> &nbsp; ';
		if($i >= $pagenumceat+14){
			break;
		}
	}
 
    if ($pagenumceat != $lastceat) {
        $nextceat = $pagenumceat + 1;
        $paginationCtrlsceat .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$nextceat.'" class="btn btn-outline-dark">Next</a> ';
    }
	}	
 
?>