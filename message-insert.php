<?php
if (isset($_SESSION['message-insert'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['message-insert']; ?>
        <button type="button" class="btn-close bi bi-x-lg btn btn-primary-outline" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <?php
    unset($_SESSION['message-insert']);
endif;

if (isset($_SESSION['messageEditPass'])) :
    if ($_SESSION['messageEditPass'] == "1") {
    ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 2000
            })
        </script>

    <?php } elseif ($_SESSION['messageEditPass'] == "0") { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>STATUS:</strong> <?= $_SESSION['messageEditPass'] ?>
            <button type="button" class="btn-close bi bi-x-lg btn btn-primary-outline" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php }
    unset($_SESSION['messageEditPass']);
endif;
?>

<?php
if (isset($_SESSION['messageAddAdmin'])) :
    if ($_SESSION['messageAddAdmin'] == "1") {
?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'admin created successfully.',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php } elseif ($_SESSION['messageAddAdmin'] == "0") { ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'error creating admin.',
                showConfirmButton: false,
                timer: 2000
            })
        </script>
<?php }
    unset($_SESSION['messageAddAdmin']);
endif;
?>