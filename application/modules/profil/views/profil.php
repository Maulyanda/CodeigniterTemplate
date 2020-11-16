<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Profil Pegawai</a></li>
        <li class="breadcrumb-item active">Update Profil <?php echo $data->nama_user;?></li>
    </ol>
    <h1 class="page-header">Update Profil <b><?php echo $data->nama_user;?></b></h1>
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse" data-sortable-id="form-plugins-1">
                <div class="panel-heading">
                    <h4 class="panel-title">Profil Pegawai</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="panel-body panel-form">
                    <form class="form-horizontal form-bordered" action="profil/update" method="POST">
                        <br>
                        <div class="col-lg-3">
                            <b><?php echo $this->session->flashdata('notif_update_user') ?></b>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">NIP</label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nip" value="<?php echo $data->nip; ?>" placeholder="NIP..." required/>
                                    <div class="input-group-addon">
                                        <i class="fa fa-address-card"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Nama Lengkap</label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nama_user" value="<?php echo $data->nama_user; ?>" placeholder="Nama Lengkap..." required/>
                                    <div class="input-group-addon">
                                        <i class="fa fa-user-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Password Baru</label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="Password" class="form-control" name="password" id="password" placeholder="****" data-toggle="password"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Konfirmasi Password Baru</label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="Password" class="form-control" name="password" id="konfirmasi_password" placeholder="****"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-primary">Simpan Profil</button>
                                </div>
                            </div>   
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>

<script type="text/javascript">
	$("#password").password('toggle');
</script>

<script type="text/javascript">
    window.onload = function () {
        document.getElementById("password").onchange = validatePassword;
        document.getElementById("konfirmasi_password").onchange = validatePassword;
    }

    function validatePassword(){
      var pass2=document.getElementById("konfirmasi_password").value;
      var pass1=document.getElementById("password").value;
      console.log(pass2);
      console.log(pass1);
      console.log(pass1!=pass2);
      
      if(pass1.length >= 6)
        document.getElementById("password").setCustomValidity('');
      else
        document.getElementById("password").setCustomValidity("Password Kurang dari 6 character");
      

      if(pass1!=pass2)
          document.getElementById("konfirmasi_password").setCustomValidity("Password Tidak Sama, Coba Lagi");
      else
          document.getElementById("konfirmasi_password").setCustomValidity('');
    }
</script>