<!-- Header Begin -->
<div class="header">
            <div class="header__content">
                <span class="header__content-span">
                    <?php echo($_SESSION['cur']); ?>
                </span>
            </div>
            <div class="header__account">
                <img src=<?php echo($_SESSION['avatar']);?> alt="Avatar" class="header__account-avatar">
                <div class="header__account-info">
                    <p class="header__account-sub-info">
                        <?php if($_SESSION['role']==1){echo("Administrator");}else{echo("Staff");} ?>
                    </p>
                    <p class="header__account-name">
                        <?php echo($_SESSION['user_name']);?>
                        <i class="fas fa-chevron-down header__down-icon"></i>
                    </p>
                </div>
                <div class="header__sub-menu">
                    <div class="header__sub-menu-header">
                        <p class="header__account-name" style="color:#333;"> <?php echo($_SESSION['user_name']);?></p>
                        <p class="header__account-sub-info" style="color: #fff;"><?php echo($_SESSION['email']);?></p>
                    </div>
                    <div class="header__sub-menu-body">
                        <ul>
                            <li><a href="#"><i class="far fa-user"></i>  View Profile</a></li>
                            <li><a href="#"><i class="fas fa-cog"></i>  Account Settings</a></li>
                        </ul>
                    </div>
                    <div class="header__sub-menu-footer">
                        <button><i class="fas fa-sign-out-alt"></i>  Sign out</button>
                    </div>
                </div>
            </div>
 </div>
<!-- Header End -->
  