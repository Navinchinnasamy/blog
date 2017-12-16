<!DOCTYPE html>
<html>
<head>
    <title>Admin > MyBlogs</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Navin Chinnasamy" name="author">
    <meta content="Admin dashboard" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="//fast.fonts.net/cssapi/175a63a1-3f26-476a-ab32-4e21cbdb8be2.css" rel="stylesheet" type="text/css">
    <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="css/main.css?version=2.6" rel="stylesheet">
</head>
<body>
<div class="all-wrapper menu-top">
    <div class="layout-w">
		<?php require_once "top_menu_image.php"; ?>
        <div class="content-w">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="blogs.php">Blogs</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="write_blog.php">Write a Blog</a>
                </li>
            </ul>
            <div class="content-i">
                <div class="content-box">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="element-wrapper">
                                <h6 class="element-header">
                                    Write a Blog
                                </h6>
                                <div class="element-box">
                                    <form>
                                        <div class="steps-w">
                                            <div class="step-triggers">
                                                <a class="step-trigger active" href="#stepContent1">First Step</a><a
                                                        class="step-trigger" href="#stepContent2">Second Step</a><a
                                                        class="step-trigger" href="#stepContent3">Third Step</a>
                                            </div>
                                            <div class="step-contents">
                                                <div class="step-content active" id="stepContent1">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for=""> First Name</label>
                                                                <input class="form-control" placeholder="Post Name" data-error="Your name is required" placeholder="Give a name to your Post" required="required"
                                                                       type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Last Name</label><input
                                                                        class="form-control" placeholder="Last Name"
                                                                        type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for=""> Date of Birth</label><input
                                                                        class="form-control" placeholder="First Name"
                                                                        type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Country of Origin</label><input
                                                                        class="form-control" placeholder="Last Name"
                                                                        type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for=""> States with Offices</label><select
                                                                class="form-control select2" multiple="true">
                                                            <option selected="true">
                                                                New York
                                                            </option>
                                                            <option selected="true">
                                                                California
                                                            </option>
                                                            <option>
                                                                Boston
                                                            </option>
                                                            <option>
                                                                Texas
                                                            </option>
                                                            <option>
                                                                Colorado
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for=""> Regular select</label><select
                                                                class="form-control">
                                                            <option>
                                                                Select State
                                                            </option>
                                                            <option>
                                                                New York
                                                            </option>
                                                            <option>
                                                                California
                                                            </option>
                                                            <option>
                                                                Boston
                                                            </option>
                                                            <option>
                                                                Texas
                                                            </option>
                                                            <option>
                                                                Colorado
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label> Example textarea</label><textarea class="form-control"
                                                                                                  rows="3"></textarea>
                                                    </div>
                                                    <div class="form-buttons-w text-right">
                                                        <a class="btn btn-primary step-trigger-btn"
                                                           href="#stepContent2"> Continue</a>
                                                    </div>
                                                </div>
                                                <div class="step-content" id="stepContent2">
                                                    <div class="form-group">
                                                        <label for=""> Email address</label><input class="form-control"
                                                                                                   placeholder="Enter email"
                                                                                                   type="email">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for=""> Password</label><input
                                                                        class="form-control" placeholder="Password"
                                                                        type="password">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Confirm Password</label><input
                                                                        class="form-control" placeholder="Password"
                                                                        type="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for=""> Regular select</label><select
                                                                class="form-control">
                                                            <option>
                                                                Select State
                                                            </option>
                                                            <option>
                                                                New York
                                                            </option>
                                                            <option>
                                                                California
                                                            </option>
                                                            <option>
                                                                Boston
                                                            </option>
                                                            <option>
                                                                Texas
                                                            </option>
                                                            <option>
                                                                Colorado
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-buttons-w text-right">
                                                        <a class="btn btn-primary step-trigger-btn"
                                                           href="#stepContent3"> Continue</a>
                                                    </div>
                                                </div>
                                                <div class="step-content" id="stepContent3">
                                                    <div class="form-group">
                                                        <label for=""> Regular select</label><select
                                                                class="form-control">
                                                            <option>
                                                                Select State
                                                            </option>
                                                            <option>
                                                                New York
                                                            </option>
                                                            <option>
                                                                California
                                                            </option>
                                                            <option>
                                                                Boston
                                                            </option>
                                                            <option>
                                                                Texas
                                                            </option>
                                                            <option>
                                                                Colorado
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for=""> Date of Birth</label><input
                                                                        class="form-control" placeholder="First Name"
                                                                        type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Country of Origin</label><input
                                                                        class="form-control" placeholder="Last Name"
                                                                        type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-buttons-w text-right">
                                                        <button class="btn btn-primary">Submit Form</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div calss="col-sm-4">
                            <div class="element-wrapper">
                                <h6 class="element-header">
                                    Recent Posts
                                </h6>
                                <div class="element-box">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="display-type"></div>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/moment/moment.js"></script>
<script src="bower_components/chart.js/dist/Chart.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script src="bower_components/bootstrap-validator/dist/validator.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/dropzone/dist/dropzone.js"></script>
<script src="bower_components/editable-table/mindmup-editabletable.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
<script src="bower_components/bootstrap/js/dist/util.js"></script>
<script src="bower_components/bootstrap/js/dist/tab.js"></script>
<script src="js/main.js?version=2.6"></script>
</body>
</html>
