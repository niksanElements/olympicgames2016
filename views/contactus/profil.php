<h1>Profile</h1>
<script src="<?=APP_ROOT?>/content/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<main>
    <div class="container">
        <form>
            <div class="panel">
                <div class="img-responsive panel-heading panel-group container-fluid">
                    <div class="col-lg-5">
                      <img alt="Admin Image"  src="<?php
                      if(isset($this->contactus['id'])) {
                          if ($this->contactus['id'] == 1) {
                              echo APP_ROOT . '/content/styles/images/dawe.jpg';
                          }
                          if ($this->contactus['id'] == 2) {
                              echo APP_ROOT . '/content/styles/images/niki.jpg';
                          }
                          if ($this->contactus['id'] == 3) {
                              echo APP_ROOT . '/content/styles/images/tani.JPG';
                          }
                          if ($this->contactus['id'] == 4) {
                              echo APP_ROOT . '/content/styles/images/neli.jpg';
                          }
                          if ($this->contactus['id'] == 5) {
                              echo APP_ROOT . '/content/styles/images/IgorChelikov.jpg';
                          }
                          if ($this->contactus['id'] == 6) {
                              echo APP_ROOT . '/content/styles/images/stefan_delchev.jpg';
                          }
                      }
                      ?>" class="img-responsive img-rounded img-center" alt="">
                    </div>
                    <h1 class="col-lg-7 text-info"><?= htmlspecialchars_decode($this->contactus['name']) ?></h1>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered" id="vertical">
                        <tr class="text-uppercase">
                            <th><img alt="education icon" src="<?=APP_ROOT?>/content/styles/images/educ.png"></th>
                            <td>EDUCATION: </td>
                            <td><?= htmlspecialchars_decode($this->contactus['education']) ?></td>
                        </tr>
                        <tr>
                            <th ><img alt="work icon" src="<?=APP_ROOT?>/content/styles/images/work.png"></th>
                            <td >WORK: </td>
                            <td ><?= htmlspecialchars_decode($this->contactus['work']) ?></td>
                        </tr>
                        <tr>
                            <th ><img alt="passion icon" src="<?=APP_ROOT?>/content/styles/images/fav.png"></th>
                            <td>PASSION: </td>
                            <td><?= htmlspecialchars_decode($this->contactus['passion']) ?></td>
                        </tr>
                        <tr>
                            <th ><img alt="age icon" src="<?=APP_ROOT?>/content/styles/images/age.png"></th>
                            <td>Age:</td>
                            <td><?= htmlspecialchars_decode($this->contactus['age']) ?></td>
                        </tr>
                    </table>
                </div>
                <h2>Other Info</h2>
                <div>
               <textarea class="content" name="body" readonly>
                   <?= htmlspecialchars_decode($this->contactus['body']) ?>
               </textarea>
                </div>
            </div>
        </form>
    </div>
</main>
