<!-- Header Begin -->
<div class="header">
            <div class="header__content">
                <span class="header__content-span">
                    <?php echo($_SESSION['cur']); ?>
                </span>
            </div>
            <div class="header__account">
                <?php $avatar=$_SESSION['avatar']==''?'./data/img/staff/default.png':$_SESSION['avatar']; ?>
                <img src="../../<?php echo $avatar;?>" alt="Avatar" class="header__account-avatar">
                <div class="header__account-info">
                    <p class="header__account-sub-info">
                        <?php if($_SESSION['role']==1){echo("Administrator");}else{echo("Staff");} ?>
                    </p>
                    <p class="header__account-name">
                        <?php echo($_SESSION['username']);?>
                        <i class="fas fa-chevron-down header__down-icon"></i>
                    </p>
                </div>
                <div class="header__sub-menu">
                    <div class="header__sub-menu-header">
                        <p class="header__account-name" style="color:#333;"> <?php echo($_SESSION['username']);?></p>
                        <p class="header__account-sub-info" style="color: #fff;"><?php echo($_SESSION['email']);?></p>
                    </div>
                    <div class="header__sub-menu-body">
                        <ul>
                            <li><a href="../profiles"><i class="far fa-user"></i>  View Profile</a></li>
                            <li><a href="../profiles/update.php?target=password"><i class="fas fa-cog"></i>  Change Password</a></li>
                        </ul>
                    </div>
                    <div class="header__sub-menu-footer">
                        <script>
                                function signOut() {
                                    window.location.href="../sign-out.php";
                                }
                                function confirmSignOut() {
                                    if (confirm("Do you really want to Sign out?") == true) {
                                        signOut();
                                    }
                                }
                        </script>
                        <button onclick="confirmSignOut()"><i class="fas fa-sign-out-alt"></i>  Sign out</button>
                       
                    </div>
                </div>
            </div>
 </div>
<!-- Header End -->
  