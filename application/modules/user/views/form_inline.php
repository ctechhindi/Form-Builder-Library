<?php
  // set required field style 
  $required = '<strong class="text-danger">(*)</strong>';
?>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <h3 class="card-header text-white bg-info">User Register</h3>
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="<?= base_url('User/Login') ?>" class="card-link">Login</a>
        </div>
      </div>
      <br>
    </div>
    <div class="col-lg-6">
      <!-- Flash Message Show -->
      <?php $this->flash->show(); ?>
      
      <!-- Start Register Form -->
      <?= form_open('', []) ?>
      
        <!-- User Full Name Field -->
        <div class="form-group">
          <label for="fullname">Full Name: &nbsp;<?= $required ?></label>
          <input type="text" class="form-control <?= (empty(form_error('fullname')))? '':'is-invalid' ?>" name="fullname" id="fullname" value="<?= set_value('fullname'); ?>" placeholder="Enter Full Name" maxlength="50">
          <?= form_error("fullname"); ?>
        </div>
    
        <!-- User Email ID Field -->
        <div class="form-group">
          <label for="email">Email ID: &nbsp;<?= $required ?></label>
          <input type="email" class="form-control <?= (empty(form_error('email')))? '':'is-invalid' ?>" name="email" id="email" value="<?= set_value('email'); ?>" placeholder="Enter Email ID" maxlength="50">
          <?= form_error("email"); ?>
        </div>
    
        <!-- User Username Field -->
        <div class="form-group">
          <label for="username">Username: &nbsp;<?= $required ?></label>
          <input type="text" class="form-control <?= (empty(form_error('username')))? '':'is-invalid' ?>" name="username" id="username" value="<?= set_value('username'); ?>" placeholder="Enter Username" maxlength="50">
          <?= form_error("username"); ?>
        </div>
    
        <!-- User Password Field -->
        <div class="form-group">
          <label for="password">Password: &nbsp;<?= $required ?></label>
          <input type="password" class="form-control <?= (empty(form_error('password')))? '':'is-invalid' ?>" name="password" id="password" value="<?= set_value('password'); ?>" placeholder="Enter Password" maxlength="50">
          <?= form_error("password"); ?>
        </div>
    
        <!-- User Confirm Password Field -->
        <div class="form-group">
          <label for="confirm_password">Confirm Password: &nbsp;<?= $required ?></label>
          <input type="password" class="form-control <?= (empty(form_error('confirm_password')))? '':'is-invalid' ?>" name="confirm_password" id="confirm_password" value="<?= set_value('confirm_password'); ?>" placeholder="Enter Confirm Password" maxlength="50">
          <?= form_error("confirm_password"); ?>
        </div>
    
        <!-- User Phone Field -->
        <div class="form-group">
          <label for="phone">Phone Number: &nbsp;<?= $required ?></label>
          <input type="number" class="form-control <?= (empty(form_error('phone')))? '':'is-invalid' ?>" name="phone" id="phone" value="<?= set_value('phone'); ?>" placeholder="Enter Phone" maxlength="10">
          <?= form_error("phone"); ?>
        </div>
        <button type="submit" class="btn btn-outline-success">Register</button>
      <?= form_close() ?>
      <br>
    </div>
  </div>
</div>