<?php $this->title = 'Countries'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>
<main>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>Flag</td>
                <td>
                    <a href="<?=APP_ROOT?>/countries/index/shortAsc"></a>
                    &nbsp;<a href="<?=APP_ROOT?>/countries/index/shortDesc"></a>
                    &nbsp;Short:
                </td>    
                <td>
                    <a href="<?=APP_ROOT?>/countries/index/countryAsc"></a>
                    &nbsp;<a href="<?=APP_ROOT?>/countries/index/countryDesc"></a>
                    &nbsp;Country:
                </td>
                <td>
                    <a href="<?=APP_ROOT?>/countries/index/athletestotalAsc"></a>
                    &nbsp;<a href="<?=APP_ROOT?>/countries/index/athletestotalDesc"></a>
                    &nbsp;Athletes:
                </td>
                <td>
                    <a href="<?=APP_ROOT?>/countries/index/medalstotalAsc"></a>
                    &nbsp;<a href="<?=APP_ROOT?>/countries/index/medalstotalDesc"></a>
                    &nbsp;Medals:
                </td>
                <td>Gold</td>
                <td>Silver</td>
                <td>Bronze</td>

            <?php foreach ($this->countries as $country):?>

                <tr>
                    <td><i class="<?php
                        $str = $country['countryShort'];
                        $str = strtolower($str);
                        echo $str;
                        ?> flag"></i></td>
                    <td><?=$country['countryShort']?></td>
                    <td><?=$country['countryFull']?></td>
                    <td><?=$country['playersTotal']?></td>
                    <td><?=$country['medalsTotal']?></td>
                    <td><?=$country['medalsGold']?></td>
                    <td><?=$country['medalsSilver']?></td>
                    <td><?=$country['medalsBronze']?></td>
                </tr>

            <?php endforeach ?>

        </table>
    </div>
</main>
