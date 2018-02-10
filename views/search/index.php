<h4>Search results for "<?=$this->search?>" in
  <?php if(isset($_POST["news"]) and isset($_POST["posts"])): ?>
    News and Posts
  <?php elseif(isset($_POST["news"])): ?>
    News
  <?php else: ?>
    Posts
  <?php endif ?>
<?php if(count($this->newsResults) > 0 or count($this->postsResults) > 0): ?>
  <table class="ui table tablet stackable">
    <?php if(count($this->newsResults) > 0): ?>
      <tr>
        <td>
          <h2>News:</h2>
        </td>
      </tr>
      <?php foreach($this->newsResults as $result): ?>
        <tr>
          <th>
            <a title="<?=$result["title"]?>" href="<?=APP_ROOT?>/news/read/<?=$result["title"]?>_&_<?=$result["id"]?>" target="_blank"><strong><?=$result["title"]?></strong></a>
          </th>
        </tr>
        <tr>
          <th style="text-align:justify;">
            <?php echo cutLongText(strip_tags(htmlspecialchars_decode($result["body"]))); ?>
          </th>
        </tr>
        <tr>
          <td><br /></td>
        </tr>
      <?php endforeach ?>
    <?php endif ?>

    <?php if(count($this->postsResults) > 0): ?>
      <tr>
        <td>
          <h2>Forum:</h2>
        </td>
      </tr>
      <?php foreach($this->postsResults as $result): ?>
        <tr>
          <th>
            <a title="<?=$result["title"]?>" href="<?=APP_ROOT?>/forum/read/<?=$result["title"]?>_&_<?=$result["id"]?>" target="_blank"><strong><?=$result["title"]?></strong></a>
          </th>
        </tr>
        <tr>
          <th style="text-align:justify;">
            <?php echo cutLongText(strip_tags(htmlspecialchars_decode($result["body"]))); ?>
          </th>
        </tr>
      </tr>
      <tr>
        <td><br /></td>
      </tr>
      <?php endforeach ?>
    <?php endif ?>
  </table>
<?php else: ?>
<h2>Nothing found</h2>
<?php endif ?>
