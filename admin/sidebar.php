<!-- Sidebar Begin -->
<div class="sidebar">
            <div class="sidebar__logo-content">
                <img src="./assets/img/Logo_mini2_dark_edit.png" alt="Logo of Q's Coffe" class="sidebar__logo">
                <p class="sidebar__shop-name">Q's Coffee</p>
            </div>
            <div class="sidebar__function">
                <ul>
                    <li class="<?php echo($_SESSION['cur'] =="Dashboard"?"checked":""); ?>">
                        <a href="#">
                            <i class="fas fa-th-large"></i>
                            <span class="sidebar__func-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="<?php echo($_SESSION['cur'] =="Shipping orders"?"checked":""); ?>">
                        <a href="#">
                            <i class="fas fa-shipping-fast"></i>
                            <span class="sidebar__func-name">Shipping orders</span>
                        </a>
                    </li>
                    <li class="<?php echo($_SESSION['cur'] =="Products"?"checked":""); ?>">
                        <a href="#">
                            <i class="fas fa-boxes"></i>
                            <span class="sidebar__func-name">Products</span>
                        </a>
                    </li>
                    <li class="<?php echo($_SESSION['cur'] =="Customers"?"checked":""); ?>">
                        <a href="#">
                            <i class="fas fa-users"></i>
                            <span class="sidebar__func-name">Customer</span>
                        </a>
                    </li>
                    <li class="<?php echo($_SESSION['cur'] =="Staffs"?"checked":""); ?>">
                        <a href="#">
                            <i class="fas fa-th-large sidebar__icon"></i>
                            <span class="sidebar__func-name">Staffs</span>
                        </a>
                    </li>
                </ul>
            </div>
</div>
 <!-- Sidebar End -->
