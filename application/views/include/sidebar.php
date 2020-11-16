<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <div data-scrollbar="true" data-height="100%">
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="https://www.searchpng.com/wp-content/uploads/2019/02/Men-Profile-Image.png" alt=""/>
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>
                        <?php echo $_SESSION['nama']; ?>
                        <small>Nip: <?php echo $_SESSION['nip']; ?></small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li class="<?php echo $this->uri->segment(1)=="profil"?"active":"";?>"><a href="<?php echo base_url('profil');?>"><i class="fa fa-cog"></i> Edit Profile</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="<?php echo $this->uri->segment(1)=="home"?"active":"";?> has-sub">
                <a href="<?php echo base_url('home');?>">  
                    <i class="fa fa-th-large"></i> 
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- KEUANGAN -->
            <li class="<?php echo $this->uri->segment(1)=="d_span" || $this->uri->segment(1)=="d_pok" || $this->uri->segment(1)=="d_sas" || $this->uri->segment(2)=="biro"?"active":"";?> has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-money-bill-alt"></i> 
                    <span>Keuangan</span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php echo $this->uri->segment(1)=="d_span" || $this->uri->segment(2)=="biro"?"active":"";?> has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            SPAN
                        </a>
                        <ul class="sub-menu">
                            <li class="<?php echo $this->uri->segment(1)=="d_span" && $this->uri->segment(2)!="biro" ?"active":"";?>"><a href="<?php echo base_url('d_span');?>">UTAMA</a></li>
                            <li class="<?php echo $this->uri->segment(2)=="biro"?"active":"";?>"><a href="<?php echo base_url('d_span/biro');?>">KAMPUS JATINANGOR</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo $this->uri->segment(1)=="d_pok"?"active":"";?> has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            POK
                        </a>
                        <ul class="sub-menu">
                            <li class="<?php echo $this->uri->segment(1)=="d_pok"?"active":"";?>"><a href="<?php echo base_url('d_pok');?>">JATINANGOR</a></li>
                        </ul>
                    </li>
                    <li class="<?php echo $this->uri->segment(1)=="d_sas"?"active":"";?>"><a href="<?php echo base_url('d_sas');?>">SAS</a></li>
                </ul>
            </li>
            <!-- END KEUANGAN -->

            <!-- KEPEGAWAIAN -->
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-building"></i>
                    <span>Kepegawaian</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="#">PNS</a></li>
                    <li class=""><a href="#">NON-PNS</a></li>
                </ul>
            </li>
            <!-- END KEPEGAWAIAN -->

            <!-- KEPRAJAAN -->
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-graduation-cap"></i>
                    <span>Keprajaan</span>
                </a>
                <ul class="sub-menu">
                    <li class=""><a href="#">PRAJA</a></li>
                </ul>
            </li>
            <!-- END KEPRAJAAN -->

            <li class="nav-header">Data</li>
            <?php if($this->session->userdata('role') == 'Admin'){?>
            <li class="<?php echo $this->uri->segment(2)=="v_span" || $this->uri->segment(2)=="v_pok" || $this->uri->segment(2)=="v_sas" || $this->uri->segment(2)=="v_sarpras" || $this->uri->segment(2)=="v_praja"?"active":"";?> has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>    
                    <i class="fa fa-upload"></i> 
                    <span>Upload</span>
                </a>
                <ul class="sub-menu">
					<li class="<?php echo $this->uri->segment(2)=="v_span"?"active":"";?>"><a href="<?php echo base_url('uploads/v_span');?>">SPAN</a></li>
                    <li class="<?php echo $this->uri->segment(2)=="v_pok"?"active":"";?>"><a href="<?php echo base_url('uploads/v_pok');?>">POK</a></li>
                    <li class="<?php echo $this->uri->segment(2)=="v_sas"?"active":"";?>"><a href="<?php echo base_url('uploads/v_sas');?>">SAS</a></li>
                    <li class="<?php echo $this->uri->segment(2)=="v_sarpras"?"active":"";?>"><a href="<?php echo base_url('uploads/v_sarpras');?>">SARPRAS</a></li>
                    <li class="<?php echo $this->uri->segment(2)=="v_praja"?"active":"";?>"><a href="<?php echo base_url('uploads/v_praja');?>">PRAJA</a></li>
				</ul>
            </li>
            
            <li class="<?php echo $this->uri->segment(1)=="pegawai"?"active":"";?>">
                <a href="<?php echo base_url('pegawai');?>"><i class="fa fa-users"></i> <span>User</span></a>
            </li>
            <?php } ?>

            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
        </ul>
    </div>
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->