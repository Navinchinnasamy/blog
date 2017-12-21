$(function () {
});

/** Notification
 **************************************************************** **/
$.fn._toast = function (title, msg, type) {
    type = typeof(type) == "undefined" ? "success" : type;
    $.toast({
        heading: title,
        text: msg,
        position: 'top-right',
        icon: type,
        loader: true,        // Change it to false to disable loader
        allowToastClose: true,
        hideAfter: 3000   // in milli seconds
        //stack: 4 //If set to a number, it will show that number of toasts at max at a time
        //$.toast().reset('all');
    })
};