<aside>
    <ul class="scroll navbar col-lg-2 col-md-2 col-sm-2">
        <h3 class="text-center ">Last publications:</h3>
            <div class="ui vertical steps">
        <?php foreach ($this->last10News as $element) : ?>
            <div class=" ui active step teal segment">
                <i class="newspaper icon"></i>
                <a title="<?= $element['title'] ?>" class="title" href="<?= APP_ROOT?>/news/read/<?= $element['title'] ?>_&_<?=$element['id']?>"><?= $element['title'] ?> </a>
            </div>
        <?php endforeach; ?>
            </div>
    </ul>
</aside>


