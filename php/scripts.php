<?php 
    session_start();

    //after insert or update 
    $_SESSION['status'] = "1";
?>

<?php 
    session_start();
    
    if(isset($_SESSION['status']) && $_SESSION['status']!='')
    {
        ?>
            <script src="js/sweetalert.min.js">
            swal({
                title: "<?php echo $_SESSION['status'];?> ",
                icon: "<?php echo $_SESSION['status_code'];?>",
                button: "OK",
                });
            /script>
        <?php 
        unset($_SESSION['status']);
    }

?>