<!-- Sidebar Begin -->
<div class="sidebar">
            <div class="sidebar__logo-content">
                <img src="./assets/img/Logo_mini2_dark_edit.png" alt="Logo of Q's Coffe" class="sidebar__logo">
                <p class="sidebar__shop-name">Q's Coffee</p>
            </div>
            <div class="sidebar__function">
                <ul>
                    <li class="<?php echo($_SESSION['cur'] =="Dashboard"?"checked":""); ?>">
                        <a href="./dashboard.php">
                            <i class="fas fa-th-large"></i>
                            <span class="sidebar__func-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="<?php echo($_SESSION['cur'] =="Shipping Orders"?"checked":""); ?>">
                        <a href="./orders.php">
                            <i class="fas fa-shipping-fast"></i>
                            <span class="sidebar__func-name">Shipping orders</span>
                        </a>
                    </li>
                    <li class="<?php echo($_SESSION['cur'] =="Products"?"checked":""); ?>">
                        <a href="./products.php">
                            <i class="fas fa-boxes"></i>
                            <span class="sidebar__func-name">Products</span>
                        </a>
                    </li>
                    <li class="<?php echo($_SESSION['cur'] =="Customers"?"checked":""); ?>">
                        <a href="./customers.php">
                            <i class="fas fa-users"></i>
                            <span class="sidebar__func-name">Customers</span>
                        </a>
                    </li>
                    <?php  if($_SESSION['role']==1){ ?>
                    <li class="<?php echo($_SESSION['cur'] =="Staff"?"checked":""); ?>">
                        <a href="./staff.php">
                            <i class="fas fa-users-cog sidebar__icon"></i>
                            <span class="sidebar__func-name">Staff</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
</div>
 <!-- Sidebar End -->
