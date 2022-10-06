<?php
include('dbcon.php');
$countSql = "SELECT COUNT(id) FROM storage";  
$result = mysqli_query($con, $countSql);   
$row = mysqli_fetch_row($result);  
$total_records = $row[0];  
$tot_pages = ceil($total_records / $limit);
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
$p = "SELECT * FROM storage ORDER BY id DESC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($con, $p); 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Manual CSS -->
    <style type="text/css">
        #imgicon{
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }
        #admincardheader{
            background-color: #1C5090;
            font-weight: bold;
            font-size: 20px;
            color: white;
            text-align: center;
            text-transform: uppercase;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="simplePagination.css" />
    <script src="jquery.simplePagination.js"></script>
    
    <title>RTU Admin View</title>
    <script type="text/javascript">
    $(document).ready(function(){
    $('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'dark-theme',
        currentPage : 1,
        onPageClick : function(pageNumber) {
            jQuery("#target-content").html('loading......');
            jQuery("#target-content").load("logic.php?page=" + pageNumber);
        }
    });
    });
    </script>
</head>
<body>
        <div class="card" id="admincard">
        <div class="sticky-sm-top">
            <div class="card-header" id="admincardheader">
                Thesis Records
            </div>
        </div>    
            <div class="card-body">                
                    <h4>Recently Added</h4>
                    <center>
                        <nav><ul class="pagination">
                        <?php include('message.php'); ?>   
                        <?php if(!empty($tot_pages)):for($i=1; $i<=$tot_pages; $i++):  
                                    if($i == 1):?>
                                    <li class='active'  id="<?php echo $i;?>"><a href='logic.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
                                    <?php else:?>
                                    <li id="<?php echo $i;?>"><a href='logic.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                                <?php endif;?>          
                        <?php endfor;endif;?>
                        </ul></nav>
                    </center>
                <table class="table table-bordered table-striped">                      
                    <thead>                        
                        <tr>
                            <th style="width: 10%"></th>
                            <th style="width: 50%">Research Title</th>
                            <th style="width: 10%">Year of Publication</th>
                            <th style="width: 10%">Department</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="target-content">
                    <?php  
                    while ($row = mysqli_fetch_assoc($rs_result)) {
                    ?>  
                                <tr>
                                <td><img id="imgicon"src="images/bookicon.png" alt="Book Icon" id="bookIcon"></td>      
                                <td><?php echo $row["title"]; ?></td>  
                                <td><?php echo $row["date_publish"]; ?></td>  
                                <td><?php echo $row["department"]; ?></td>  
                                <td>
                                    <a href="research-edit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <form action="code.php" method="POST" class="d-inline">
                                        <button type="submit" name="delete_study" value="<?=$row['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>  
                                </tr>  
                    <?php  
                    };  
                    ?>                        
                    </tbody>
                </table>
            </div>                     

</body>
</html>