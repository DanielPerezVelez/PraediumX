<?php
session_start();
$rol = $_SESSION['rol'];
include '../../../../templates/headerVendedor.php';
$idcliente = $_SESSION['idcliente'];
$idinm = 6;
require "apiInmueble.php";
?>
    <div class="d-flex">
        <?php for ($i = 0; $i < count($posts); $i++) {
            $imagesName = explode(",", $posts[$i]['imagen']); ?>

            <div class="col">
                <div class="carousel slide" id="carousel<?= $posts[$i]['id_fp'] ?>" data-bs-ride="false">
                    <div class="carousel-indicators">
                        <?php for ($j = 0; $j < count($imagesName); $j++) {
                            if ($j == 0) { ?>

                                <button class="active" type="button" data-bs-target="#carousel<?= $posts[$i]['id_fp'] ?>"
                                    data-bs-slide-to="<?= $j ?>" aria-current="true" aria-label="Slide<?= $i ?>"></button>
                            <?php } else { ?>
                                <button class="" type="button" data-bs-target="#carousel<?= $posts[$i]['id_fp'] ?>"
                                    data-bs-slide-to="<?= $j ?>" aria-current="true" aria-label="Slide<?= $i ?>"></button>
                            <?php } ?>
                        <?php } ?>
                    </div>

                    <div class="image-container carousel-inner">
                        <?php for ($j = 0; $j < count($imagesName); $j++) {
                            if ($j == 0) { ?>
                                <div class="carousel-item active"> <!-- Este es mi container-image-->
                                <?php } else { ?>

                                    <div class="carousel-item">
                                    <?php } ?>

                                    <img class="image-carousel mx-auto w-100" height="400"
                                        src="../../../../img/casasIMG/<?= $imagesName[$j] ?>">
                                </div>
                                <div class="popup-image">
                                    <span>&times;</span>
                                    <img src="" alt="">
                                </div>
                        <?php } ?>

                        <?php if (count($imagesName) > 1) { ?>

                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carousel<?= $posts[$i]['id_fp'] ?>" data-bs-slide="prev"><span
                                    class="carousel-control-prev-icon" aria-hidden="true"></span><span
                                    class="visually-hidden">Previous</span></button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carousel<?= $posts[$i]['id_fp'] ?>" data-bs-slide="next"><span
                                    class="carousel-control-next-icon" aria-hidden="true"></span><span
                                    class="visually-hidden">Next</span></button>

                        <?php } ?>

                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
<script>
    document.querySelectorAll('.image-container img').forEach(image =>{
        image.onclick = () =>{
            document.querySelector('.popup-image').style.display='block';
            document.querySelector('.popup-image img').src = image.getAttribute('src');
        }
    });

    document.querySelector('.popup-image span').onclick = () =>{
        document.querySelector('.popup-image').style.display='none';
    }
</script>
<?php
include '../../../../templates/footer.php';
?>