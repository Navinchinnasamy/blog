<?php
	/**
	 * Created by PhpStorm.
	 * User: navin
	 * Date: 12/19/2017
	 * Time: 4:08 PM
	 */

	/** >>> Admin Chat functionality **/
	//require_once "chat_page.php";
?>

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
<script src="plugins/jquery.toast/jquery.toast.js"></script>
<script src="js/main.js?version=2.6"></script>
<script src="js/custom.js"></script>

<?php
	if ( isset( $fn::getSession()['notification'] ) ) {
		echo "<script> var notify='" . json_encode( $fn::getSession()['notification'] ) . "'; var notification = JSON.parse(notify); </script>";
		$fn::clearSession( 'notification' );
	}
?>
<script>
    $(function () {
        $("body").on("click", ".logout-user", function () {
            $.ajax({
                type: "POST",
                url: "users_handler.php",
                data: {
                    "reqfor": "author_logout"
                },
                success: function () {
                    window.location.href = "login.php";
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });

        if (typeof(notification) != "undefined" && !$.isEmptyObject(notification)) {
            $()._toast(notification.title, notification.message, notification.type);
        }
    });
</script>