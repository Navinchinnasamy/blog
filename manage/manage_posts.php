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
        margin-bottom: 15px;
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
    var page = 1, count = 10, allPostsFetched = false;
    $(document).ready(function () {
        getPosts(); // Get posts on Page Load

        /** >>> Get Posts on Scroll down (Lazy Loading effect)**/
        $(window).on("scroll", function () {
            if ($(window).scrollTop() == ($(document).height() - $(window).height() - 30) && !allPostsFetched) {
                getPosts();
            }
        });
        /** <<< Get Posts on Scroll down (Lazy Loading effect)**/

        /** >>> Toggle post status (Publish / Un-Publish) **/
        $("body").on("click", "[publish],[unpublish]", function () {
            var post_status = $(this)[0].hasAttribute("publish") ? "active" : "inactive";
            var post_id = 0;
            if (post_status == "active") {
                post_id = $(this).attr("publish");
            } else {
                post_id = $(this).attr("unpublish");
            }
            var data = {
                "reqfor": "postUpdate",
                "status": post_status,
                "id": post_id
            };
            var resp = togglePostStatus(data);
            if (resp) {
                if ($(this)[0].hasAttribute('publish')) {
                    $(this).removeAttr('publish');
                    $(this).attr('unpublish', post_id);
                    $(this).text('Un-Publish');
                    $()._toast('Un-Published!', 'Your Post has been Un-Published successfully!!', 'info');
                } else {
                    $(this).removeAttr('unpublish');
                    $(this).attr('publish', post_id);
                    $(this).text('Publish');
                    $()._toast('Published!', 'Your Post has been Published successfully!!', 'info');
                }

                $(this).toggleClass("btn-primary btn-warning");
            }
        });
        /** <<< Toggle post status (Publish / Un-Publish) **/
    });

    function getPosts() {
        $.ajax({
            type: "POST",
            url: "post_handler.php",
            data: {
                "reqfor": "getPostsByAuthor",
                "count": count,
                "page": page
            },
            success: function (ret) {
                page = page + 1;
                ret = JSON.parse(ret);

                if (ret.length < count) {
                    allPostsFetched = true;
                }
                $.each(ret, function (i, p) {
                    var act_btn = '';
                    if (p.post_status == 'active') {
                        act_btn = '<button class="btn btn-sm btn-warning" unpublish="' + p.post_id + '">Un-Publish</button>';
                    } else {
                        act_btn = '<button class="btn btn-sm btn-primary" publish="' + p.post_id + '">Publish</button>';
                    }

                    var image_src = (p.post_image) ? p.post_image : (p.post_image_url) ? p.post_image_url : 'img/menu_bg.jpg';
                    var post = '<div class="posts width-100" >' +
                        '<div class="post-image">' +
                        '<img src="' + image_src + '" style="max-width: 100%; max-height: 100%; object-fit: contain;" />' +
                        '</div>' +
                        '<div class="post-content">' +
                        '<h3>' + p.post_title + '</h3>' +
                        '<p>' + p.post_description + '</p>' +
                        '' + act_btn + '' +
                        '</div>' +
                        '</div>';
                    $("body").find(".element-box").append(post);
                });
            }
        });
    }

    function togglePostStatus(data) {
        var response = "";
        $.ajax({
            type: "POST",
            url: "post_handler.php",
            async: false,
            data: data,
            success: function (ret) {
                response = ret;
            }
        });
        return response;
    }
</script>
</body>
</html>
