<style>
    .logged-user-w {
        position: relative;
    }

    .logged-user-w:hover {
        cursor: pointer;
    }

    .logged-user-w:hover .logged-user-menu {
        visibility: visible;
        opacity: 1;
        -webkit-transform: translateY(0px);
        transform: translateY(0px);
    }

    .logged-user-menu {
        background: #0061da;
        box-shadow: 0 2px 30px 0 rgba(45, 130, 255, 0.75);
        position: absolute;
        top: 0px;
        left: -5px;
        right: -5px;
        overflow: hidden;
        padding: 1rem;
        z-index: 999 !important;
        visibility: hidden;
        opacity: 0;
        -webkit-transform: translateY(20px);
        transform: translateY(20px);
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .logged-user-menu .avatar-w {
        border-color: #fff;
    }

    .logged-user-menu .logged-user-info-w {
        padding-bottom: 10px;
        margin-bottom: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logged-user-menu .logged-user-info-w .logged-user-name {
        color: #fff;
    }

    .logged-user-menu .logged-user-info-w .logged-user-role {
        color: rgba(255, 255, 255, 0.6);
    }

    .logged-user-menu ul {
        list-style: none;
        text-align: left;
        margin: 0px;
        padding: 0px 5px;
        padding-bottom: 5px;
    }

    .logged-user-menu ul li {
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .logged-user-menu ul li a {
        display: block;
        padding: 5px;
        color: #fff;
    }

    .logged-user-menu ul li a i {
        vertical-align: middle;
        margin-right: 5px;
        font-size: 20px;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
        display: inline-block;
    }

    .logged-user-menu ul li a span {
        vertical-align: middle;
        font-size: 0.9rem;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
        display: inline-block;
    }

    .logged-user-menu ul li a:hover {
        text-decoration: none;
    }

    .logged-user-menu ul li a:hover i {
        -webkit-transform: translateX(5px);
        transform: translateX(5px);
    }

    .logged-user-menu ul li a:hover span {
        -webkit-transform: translateX(8px);
        transform: translateX(8px);
    }

    .logged-user-menu ul li:last-child {
        border-bottom: none;
    }

    .logged-user-menu .bg-icon {
        font-size: 100px;
        color: rgba(255, 255, 255, 0.1);
        position: absolute;
        bottom: -71px;
        right: -54px;
    }

    .menu-top-image-w .page-menu-header {
        width: 90% !important;
    }

</style>

<div class="menu-mobile menu-activated-on-click color-scheme-dark">
    <div class="mm-logo-buttons-w">
        <a class="mm-logo" href="index.php"><img src="img/logo.png"><span>MyBlogs</span></a>
        <div class="mm-buttons">
            <div class="content-panel-open">
                <div class="os-icon os-icon-grid-circles"></div>
            </div>
            <div class="mobile-menu-trigger">
                <div class="os-icon os-icon-hamburger-menu-1"></div>
            </div>
        </div>
    </div>
    <div class="menu-and-user">
        <div class="logged-user-w">
            <div class="avatar-w">
                <img alt="" src="img/avatar3.jpg">
            </div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">
					<?php echo $fn::getSession()['author']['display_name']; ?>
                </div>
                <div class="logged-user-role">
					<?php echo $fn::getSession()['author']['role']; ?>
                </div>
            </div>
            <div class="logged-user-menu">
                <div class="avatar-w">
                    <img alt="" src="img/avatar3.jpg">
                </div>
                <div class="logged-user-info-w">
                    <div class="logged-user-name">
						<?php echo $fn::getSession()['author']['display_name']; ?>
                    </div>
                    <div class="logged-user-role">
						<?php echo $fn::getSession()['author']['role']; ?>
                    </div>
                </div>
                <div class="bg-icon">
                    <i class="os-icon os-icon-wallet-loaded"></i>
                </div>
                <ul>
                    <li class="logout-user">
                        <a href="javascript:void(0);"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="main-menu">
            <li class="">
                <a href="index.php">
                    <div class="icon-w">
                        <div class="os-icon os-icon-window-content"></div>
                    </div>
                    <span>Dashboard</span></a>
            </li>
            <li class="has-sub-menu">
                <a href="#">
                    <div class="icon-w">
                        <div class="os-icon os-icon-user-male-circle"></div>
                    </div>
                    <span>User Profiles</span></a>
                <ul class="sub-menu">
                    <li>
                        <a href="#">Big Profile</a>
                    </li>
                    <li>
                        <a href="#">Compact Profile</a>
                    </li>
                </ul>
            </li>
            <li class="has-sub-menu">
                <a href="#">
                    <div class="icon-w">
                        <div class="os-icon os-icon-delivery-box-2"></div>
                    </div>
                    <span>Posts</span></a>
                <ul class="sub-menu">
                    <li>
                        <a href="write_blog.php">Write a Post</a>
                    </li>
                    <li>
                        <a href="manage_posts.php">Manage My Posts</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="mobile-menu-magic">
            <h4>
                MyBlog
            </h4>
            <p>
                Blog Management Application
            </p>
        </div>
    </div>
</div>
<div class="desktop-menu menu-top-image-w menu-activated-on-hover" style="background-image: url(img/menu_bg.jpg)">
    <div class="top-part-w">
        <div class="logo-w">
            <a class="logo" href="index.php"><img src="img/logo.png"><span>MyBlogs</span></a>
        </div>
        <div class="user-and-search">
            <!--<div class="element-search">
                <input placeholder="Type to search blogs..." type="text">
            </div>-->
            <div class="logged-user-w">
                <div class="avatar-w">
                    <img alt="" src="img/avatar3.jpg">
                </div>
                <div class="logged-user-menu">
                    <div class="avatar-w">
                        <img alt="" src="img/avatar3.jpg">
                    </div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">
							<?php echo $fn::getSession()['author']['author_name']; ?>
                        </div>
                        <div class="logged-user-role">
							<?php echo $fn::getSession()['author']['role']; ?>
                        </div>
                    </div>
                    <div class="bg-icon">
                        <i class="os-icon os-icon-wallet-loaded"></i>
                    </div>
                    <ul>
                        <li class="logout-user">
                            <a href="javascript:void(0);"><i
                                        class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <h2 class="page-menu-header">
        MyBlogs
    </h2>
    <div class="menu-top-image-i">
        <ul class="main-menu">
            <li class="">
                <a href="index.php">
                    <div class="icon-w">
                        <div class="os-icon os-icon-window-content"></div>
                    </div>
                    <span>Dashboard</span></a>
            </li>
            <li class="has-sub-menu">
                <a href="#">
                    <div class="icon-w">
                        <div class="os-icon os-icon-user-male-circle"></div>
                    </div>
                    <span>User Profiles</span></a>
                <ul class="sub-menu">
                    <li>
                        <a href="#">Big Profile</a>
                    </li>
                    <li>
                        <a href="#">Compact Profile</a>
                    </li>
                </ul>
            </li>
            <li class="has-sub-menu">
                <a href="#">
                    <div class="icon-w">
                        <div class="os-icon os-icon-delivery-box-2"></div>
                    </div>
                    <span>Posts</span></a>
                <ul class="sub-menu">
                    <li>
                        <a href="write_blog.php">Write a Post</a>
                    </li>
                    <li>
                        <a href="manage_posts.php">Manage My Posts</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div></div>
    </div>
</div>