<?php
use Songfolio\Core\Routing;
?>

<div class="container">
    <h1>Connexion</h1>

    <?php

    $this->addModal("form", $configFormLogin);
    ?>

    <?php if($sdk): ?>
        <div class="text-center">
            <?php foreach($sdk->getConnectionLinks() as $provider_name => $link): ?>
            <a href="<?=$link?>">Login with <?=$provider_name?></a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="text-center">
        <a href="<?php echo Routing::getSlug("users","register");?>">Créer un compte</a> |
        <a href="<?php echo Routing::getSlug("users","forgetPassword");?>">Mot de passe oubliée ?</a>
    </div>
</div>