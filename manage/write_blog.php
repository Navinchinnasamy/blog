<!DOCTYPE html>
<html>
<?php
	require_once( "header.php" );
	$categories = $fn->getMasters( 'post_categories' );
?>
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
                    <a href="write_blog.php">Write a Post</a>
                </li>
            </ul>
            <div class="content-i">
                <div class="content-box">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="element-wrapper">
                                <h6 class="element-header">
                                    Write a Blog
                                </h6>
                                <div class="element-box">
                                    <form action="post_handler.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="reqfor" id="reqfor" value="create_post"/>
                                        <div class="steps-w">
                                            <div class="step-triggers">
                                                <a class="step-trigger active" href="#postinitarea">Post Name &
                                                    Description</a>
                                                <a class="step-trigger" href="#postimagearea">Post Image</a>
                                                <a class="step-trigger" href="#postcontentarea">Post Content</a>
                                            </div>
                                            <div class="step-contents">
                                                <div class="step-content active" id="postinitarea">
                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label for=""> Post Title</label>
                                                            <input class="form-control" name="post_title" id="postName"
                                                                   data-error="Your Post needs a title.."
                                                                   placeholder="Give a title to your Post"
                                                                   required="required"
                                                                   type="text">
                                                        </div>
                                                        <div class="form-group col-sm-6">
                                                            <label for=""> Post Category</label>
                                                            <select class="form-control" name="	post_category_id"
                                                                    id="postCategory"
                                                                    data-error="Categorize your post for better view"
                                                                    required="required">
                                                                <option value="" style="display:none;">Pick Post
                                                                    Category
                                                                </option>
			                                                    <?php
				                                                    foreach ( $categories as $id => $cat ) {
					                                                    echo "<option value='{$cat['id']}'>{$cat['category']}</option>";
				                                                    }
			                                                    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="postShortDesc"> Short Description about the
                                                            Post</label>
                                                        <textarea id="postShortDesc" name="post_description"
                                                                  class="form-control" rows="3"
                                                                  placeholder="Give us a short description about your post.."></textarea>
                                                    </div>
                                                    <div class="form-buttons-w text-right" id="add_name_desc">
                                                        <a class="btn btn-primary step-trigger-btn"
                                                           href="#postimagearea"> Add Image</a>
                                                    </div>
                                                </div>
                                                <div class="step-content" id="postimagearea">
                                                    <div class="form-group">
                                                        <label for="postImage"> Pick an Image for your post</label>
                                                        <div action="write_post.php" class="dropzone dz-clickable"
                                                             id="postImage" name="post_image">
                                                            <div class="dz-message">
                                                                <div>
                                                                    <h4>Drop an image for your post.</h4>
                                                                    <div class="text-muted">(This will be displayed on
                                                                        the top of your post..)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br/>OR<br/>
                                                    <div class="form-group col-sm-6">
                                                        <label for=""> Post Image URL</label>
                                                        <input class="form-control" placeholder="Post Image URL"
                                                               name="post_image_url" id="postImageURL"
                                                               data-error="Your Post needs an Image.."
                                                               type="text">
                                                    </div>
                                                    <div class="form-buttons-w text-right" id="add_post_image">
                                                        <a class="btn btn-primary step-trigger-btn"
                                                           href="#postcontentarea"> Add Content</a>
                                                    </div>
                                                </div>
                                                <div class="step-content" id="postcontentarea">
                                                    <div class="form-group">
                                                        <label for="postContentEditor"> Post Contents</label>
                                                        <textarea cols="80" id="postContentEditor" name="post_content"
                                                                  rows="10"
                                                                  placeholder="Start write your post here.."></textarea>
                                                    </div>
                                                    <div class="form-buttons-w text-right" id="submitPost">
                                                        <button type="submit" class="btn btn-primary">Submit Post
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--<div calss="col-sm-4">
                            <div class="element-wrapper">
                                <h6 class="element-header">
                                    Recent Posts
                                </h6>
                                <div class="element-box">

                                </div>
                            </div>
                        </div>-->
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
        if ($('#postContentEditor').length) {
            CKEDITOR.replace('postContentEditor');
        }

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
