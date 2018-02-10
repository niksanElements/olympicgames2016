<?php $this->title = 'Sports'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>
<main>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td>Sport</td>
                <td>Venue</td>
                <td>Gold winner</td>
                <td>Silver winner</td>
                <td>Bronze winner</td>
            </tr>

            <?php foreach ($this->sports as $sport):?>
                <tr>
                    <td><?=$sport['sportName']?></td>
                    <td><?=$sport['venue']?></td>

                    <?php if($sport['winnerGold']): ?>
                        <td><?=$sport['winnerGold']?>(
                            <i class="<?php
                            $str = $sport['countryGold'];
                            $str = strtolower($str);
                            echo $str;?> flag">
                            </i><?=$sport['countryGold']?>)
                        </td>
                    <?php else: ?>
                        <td>N/A</td>
                    <?php endif ?>

                    <?php if($sport['winnerSilver']): ?>
                        <td><?=$sport['winnerSilver']?>(
                            <i class="<?php
                            $str = $sport['countrySilver'];
                            $str = strtolower($str);
                            echo $str;?> flag">
                            </i><?=$sport['countrySilver']?>)
                        </td>
                    <?php else: ?>
                        <td>N/A</td>
                    <?php endif ?>

                    <?php if($sport['winnerBronze']): ?>
                        <td><?=$sport['winnerBronze']?>(
                            <i class="<?php
                            $str = $sport['countryBronze'];
                            $str = strtolower($str);
                            echo $str;?> flag">
                            </i><?=$sport['countryBronze']?>)
                        </td>
                    <?php else: ?>
                        <td>N/A</td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</main>
