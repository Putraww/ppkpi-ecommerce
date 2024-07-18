<?php
if (!isset($_SESSION['id_action-cart'])) {
    header("location:?pg=action-cart&message=Upss-REGISTER-DULU");
}

?>