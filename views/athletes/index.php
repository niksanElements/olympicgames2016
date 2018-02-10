<?php $this->title = 'Athletes'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>
<main>
  <div class="table-responsive">
    <table class="table">
        <tr>
          <td>
            <a href="<?=APP_ROOT?>/athletes/index/athleteAsc"></a>
            &nbsp;<a href="<?=APP_ROOT?>/athletes/index/athleteDesc"></a>
            &nbsp;Athlethe:
          </td>
          <td>
            <a href="<?=APP_ROOT?>/athletes/index/ageAsc"></a>
            &nbsp;<a href="<?=APP_ROOT?>/athletes/index/ageDesc"></a>
            &nbsp;Age:
          </td>
          <td>
            <a href="<?=APP_ROOT?>/athletes/index/sportAsc"></a>
            &nbsp;<a href="<?=APP_ROOT?>/athletes/index/sportDesc"></a>
            &nbsp;Sport:
          </td>
          <td>
            <a href="<?=APP_ROOT?>/athletes/index/countryAsc"></a>
            &nbsp;<a href="<?=APP_ROOT?>/athletes/index/countryDesc"></a>
            &nbsp;Country:
          </td>
          <td>
            <a href="<?=APP_ROOT?>/athletes/index/medalAsc"></a>
            &nbsp;<a href="<?=APP_ROOT?>/athletes/index/medalDesc"></a>
            &nbsp;Medal:
          </td>
        </tr>

          <?php foreach($this->athletes as $athlete): ?>
            <tr>
              <td>
                <?=$athlete["playerName"]?>
              </td>
              <td>
                <?php if($athlete["playerAge"] > 0): ?>
                  <?=$athlete["playerAge"]?>
                <?php else: ?>
                  N/A
                <?php endif ?>
              </td>
              <td>
                <?=$athlete["sportName"]?>
              </td>
              <td>
                <i class="<?php
                $str = $athlete['countryName'];
                $str = strtolower($str);
                echo $str;
                ?> flag"></i>
                <?=$athlete["countryName"]?>
              </td>
              <td>
                <?php if($athlete["medalType"] == 1): ?>
                  Gold
                <?php elseif($athlete["medalType"] == 2): ?>
                  Silver
                <?php elseif($athlete["medalType"] == 3): ?>
                  Bronze
                <?php else: ?>
                  None
                <?php endif ?>
              </td>
            </tr>
          <?php endforeach ?>
    </table>
  </div>
</main>
