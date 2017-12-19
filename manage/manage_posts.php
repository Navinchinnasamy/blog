<!DOCTYPE html>
<html>
<?php
	require_once( "header.php" );
?>
<style>
    .posts {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        border-radius: 5px;
        display: inline-flex;
    }

    .post-image {
        width: 20%;
    }

    .post-content {
        padding: 10px;
    }
</style>
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
                    <a href="blogs.php">Posts</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="manage_posts.php">Manage My Posts</a>
                </li>
            </ul>
            <div class="content-i">
                <div class="content-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="element-wrapper">
                                <h6 class="element-header">
                                    List of My Posts
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
<?php
	require_once "footer.php";
?>
<script>
    $(document).ready(function () {
        var page = 1, count = 10;
        $(window).on("scroll", function () {
            console.log($(window).scrollTop() + ' --> ' + $(document).height() + ' ===> ' + $(window).height());
            if ($(window).scrollTop() == ($(document).height() - $(window).height() - 30)) {
                $.ajax({
                    type: "POST",
                    url: "post_handler.php",
                    data: {
                        "reqfor": "getPostsByAuthor",
                        "coiunt": count,
                        "page": page
                    },
                    success: function (ret) {
                        ret = JSON.parse(ret);
                        console.log(ret);
                        $.each(ret, function (i, p) {
                            var act_btn = '';
                            var post = '<div class="posts" >' +
                                '<div class="post-image">' +
                                '<img src="img/menu_bg.jpg" style="max-width: 100%; max-height: 100%; object-fit: contain;" />' +
                                '</div>' +
                                '<div class="post-content">' +
                                '<h3>' + p.desc + '</h3>' +
                                '<p>' + p.content + '</p>' +
                                '' + act_btn + '' +
                                '</div>' +
                                '</div>';
                        });
                    }
                });
            }
        });
        // >>> Validate the required data for post
        $("body").on("click", ".btn-primary", function () {
            var fg = $(this).closest("div.step-content").find(".form-group");
            $.each($(fg).find("input, textarea"), function (i, d) {
                console.log($(d).val());
            });
        });
    });
</script>
</body>
</html>
