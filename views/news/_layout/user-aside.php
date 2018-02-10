<aside>
    <div class="scroll navbar navbar-inverse col-lg-2 col-md-2 col-sm-2">
        <a title="Create" class="btn btn-primary btn-success center-block"href="<?= APP_ROOT?>/news/create" >
            <span class="glyphicon glyphicon-plus"> <b>Create</b></span></a>
        <h3 class="text-center">Yours publications:</h3>
        <?php foreach ($this->userNews as $element) : ?>
            <div class=" ui active step teal segment">
                <i class="newspaper icon"></i>
                <a title="<?= $element['title'] ?>" class="title" href="<?= APP_ROOT?>/news/read/<?= $element['title'] ?>_&_<?=$element['id']?>"><?= $element['title'] ?> </a>
            </div>
        <?php endforeach; ?>
    </div>
</aside>