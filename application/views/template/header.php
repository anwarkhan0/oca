<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment Tracker</title>
    <link href="<?= base_url('assets/css/fontawesome/css/') ?>all.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    
    
	<style> 
        .navbar-nav { 
            margin-left: auto; 
        }
        table{
            font-size: 12px;
        }
        table .btn{
            font-size: 12px;
        }
    </style> 

    
</head>
<body>

<?php if($this->session->flashdata('booked')) : ?>
<div class="alert alert-success m-0 p-0 pl-3 pr-3">
<button type="button" class="close" data-dismiss="alert">&times;</button>
    <?= $this->session->flashdata('booked'); ?>
</div>
<?php endif; ?>
<?php if($this->session->flashdata('loggedOutMsg')) : ?>
<div class="alert alert-success m-0 p-0 pl-3 pr-3">
<button type="button" class="close" data-dismiss="alert">&times;</button>
    <?= $this->session->flashdata('loggedOutMsg'); ?>
</div>
<?php endif; ?>
<!-- <div class="spinner-grow text-dark"></div> -->
	<!-- 	this is for menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="<?= base_url() ?>">DAT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <?php if ($this->session->type == 'admin') { ?>
            <a class="nav-item nav-link <?php if($this->uri->segment(1)=="admin"){echo "active";}?>" href="<?= base_url('admin/dashboard')?>">Admin Panel</a>
        <?php } ?>

        <a class="nav-item nav-link <?php if($this->uri->segment(1)==""){echo "active";}?>" href="<?= base_url()?>">Home</a>

        <a class="nav-item nav-link <?php if($this->uri->segment(2)=="list"){echo "active";}?>" href="<?= base_url('doctor/list/0')?>">View Doctors</a>

        <?php if(!isset($this->session->type)) : ?>
        <a class="nav-item nav-link <?php if($this->uri->segment(1)=="login"){echo "active";}?>" href="<?= base_url('login') ?>">Login as Patient</a>
        <a class="nav-item nav-link <?php if($this->uri->segment(2)=="login"){echo "active";}?>" href="<?= base_url('doctor/login') ?>">Login as Doctor</a>
        <?php endif; ?>
        <a class="nav-item nav-link <?php if($this->uri->segment(1)=="about"){echo "active";}?>" href="<?= base_url('about') ?>">About Us</a>
        <?php if($this->session->type == 'doctor' || $this->session->type == 'patient') { ?>
        <a class="nav-item nav-link <?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>" href="<?= base_url() ?><?php if($this->session->type == 'doctor'){echo 'doctor/dashboard';} elseif($this->session->type == 'patient'){echo 'user/dashboard';} ?>">My Profile</a>
        <?php } ?>
        <?php if($this->session->type == 'doctor' || $this->session->type == 'patient' || $this->session->type == 'admin' ) : ?>
        <a class="nav-item nav-link btn btn-danger text-white" href="<?= base_url() ?><?php if($this->session->type == 'doctor'){echo 'doctor/logout';} elseif($this->session->type == 'patient'){echo 'user/logout';}else{echo 'admin/logout';} ?>">Log Out</a>
        <?php endif; ?>
        </div>
    </div>
    </nav>
    
