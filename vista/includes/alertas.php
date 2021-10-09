<?php

$mensaje = $_REQUEST["mensaje"];
?>

<div id="danger">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Mensaje!</strong> <?=$mensaje?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<div id="success">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Mensaje!</strong> <?=$mensaje?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>