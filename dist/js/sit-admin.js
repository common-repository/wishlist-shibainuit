/**
 * Admin script load in dashboard
 */
(function ($) {
    $("#sit-wishlist-settings-form").on("submit", function (e) {
        e.preventDefault();
        var alert_box = $(this).find(".alert");
        var btn = $(this).find("[type='submit']");
        var data_url = $(this).attr("data-admin-url");
        var data_nonce = $(this).attr("data-nonce");
        var before_html = $(this).find("#sit_before_add_html").val();
        var after_html = $(this).find("#sit_after_add_html").val();
        var sit_default_btn_visibility = $(this).find("[name='sit_default_btn_visibility']:checked").val();

        $.ajax({
            url: data_url,
            method: "POST",
            beforeSend: function () {
                btn.prop("disabled", true).text("Saving");
                console.log("Requesting settings update");
            },
            data: {
                sit_nonce: data_nonce,
                action: "sit_update_wishlist_settings",
                before_html: before_html,
                after_html: after_html,
                sit_default_btn_visibility: sit_default_btn_visibility,
            },
            success: function (res) {
                res = JSON.parse(res);
                alert_box.css("display", "block").text(res.message);

                console.log(res);
            },
            complete: function (res) {
                btn.prop("disabled", false).text("Save changes");
            },
        });
    });
})(jQuery);
