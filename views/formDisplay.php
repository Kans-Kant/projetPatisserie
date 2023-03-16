<section class="connectForm">
    <!-- <div class="connectForm" id="results"> -->
    <h3 class="text-center">Connexion</h3>
    <?php if (isset($_SESSION['email'])) { ?>
        <p classe="result"><strong>Email : </strong><?= $_SESSION['email'] ?></p>
    <?php } ?>
    <!-- </div> -->
</section>