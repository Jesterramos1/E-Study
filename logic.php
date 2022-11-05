<?php
include('dbcon.php');
if (isset($_GET["page"])) {
    $page  = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $limit;
$sql = "SELECT * FROM storage ORDER BY id ASC LIMIT $start_from, $limit";
$rs_result = mysqli_query($con, $sql);
?>
<?php
while ($row = mysqli_fetch_assoc($rs_result)) {
?>
    <tr>
        <td><img id="imgicon" src="images/bookicon.png" alt="Book Icon" id="bookIcon"></td>
        <td><?= $row['title']; ?></td>
        <td><?= $row['date_publish']; ?></td>
        <td><?= $row['department']; ?></td>
        <td>
            <a href="research-edit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
            <form action="code.php" method="POST" class="d-inline">
                <button type="submit" name="delete_study" value="<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
<?php
};
?>