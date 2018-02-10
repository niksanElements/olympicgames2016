
<?php $this->title = 'Fresh Team Contacts'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main>
    <div class="container">
        <form>
            <div class="row">
                <?php foreach ($this->contactus as $contact):?>
                <div class="panel-group  col-lg-4 col-md-5 col-sm-5">
                    <div class="date profile-card panel panel-body">
                        <a href="<?=APP_ROOT?>/contactus/profil/<?=$contact['id']?>">
                            <div class="panel-heading-overlay">

                            </div>
                            <img alt="Admin Logo" src="<?php
                            if(isset($contact['id'])) {
                                if ($contact['id'] == 1) {
                                    echo APP_ROOT . '/content/styles/images/dawe.jpg';
                                }
                                if ($contact['id'] == 2) {
                                    echo APP_ROOT . '/content/styles/images/niki.jpg';
                                }
                                if ($contact['id'] == 3) {
                                    echo APP_ROOT . '/content/styles/images/tani.JPG';
                                }
                                if ($contact['id'] == 4) {
                                    echo APP_ROOT . '/content/styles/images/neli.jpg';
                                }
                                if ($contact['id'] == 5) {
                                    echo APP_ROOT . '/content/styles/images/IgorChelikov.jpg';
                                }
                                if ($contact['id'] == 6) {
                                    echo APP_ROOT . '/content/styles/images/stefan_delchev.jpg';
                                }
                            }
                            ?>" class="img-responsive img-rounded img-center" alt="">
                            <div class="panel-card-info">
                                <div class="panel-heading-card">
                                    <h4><?= htmlspecialchars_decode($contact['name']) ?></h4>
                                </div>
                                <div class="panel-info">
                                    <h5><?= htmlspecialchars_decode($contact['work']) ?></h5>
                                </div>
                                <div class="panel-card-text content-2">
                                    <?= htmlspecialchars_decode($contact['body']) ?>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            <?php endforeach ?>
         </div>
        </form>
    </div>
</main>
