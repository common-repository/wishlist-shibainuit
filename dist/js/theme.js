/**
 * User script load in front end
 */
(function ($) {
    $("body .sit-wishlist-btn").on("click", function (e) {
        var btn = $(this);
        var data_url = $(this).attr("data-admin-url");
        var data_post_id = $(this).attr("data-post-id");
        var data_action = $(this).attr("data-action");
        var data_nonce = $(this).attr("data-nonce");

        $.ajax({
            url: data_url,
            method: "POST",
            beforeSend: function () {
                btn.addClass("disabled");
                btn.prop("disabled", true);
                console.log("Requesting Wishlist Update");
            },
            data: {
                sit_action: data_action,
                sit_post_id: data_post_id,
                sit_nonce: data_nonce,
                action: "sit_update_wishlist",
            },
            success: function (res) {
                res = JSON.parse(res);

                if ("btn_inner_html" in res && res["btn_inner_html"]) {
                    btn.html(res["btn_inner_html"]);
                }

                if ("modal_html" in res && res["modal_html"]) {
                    $("body #sit-wishlist-modal-placeholder").html(res["modal_html"]);
                }

                // change action attribute
                if (res.status == true) {
                    if (data_action == "remove") {
                        btn.attr("data-action", "add");
                        if (btn.hasClass("sit-dashboard-btn")) {
                            btn.parents("tr").slideUp();
                            btn.parents(".wishlist-item").slideUp();
                        }
                    }
                    if (data_action == "add") {
                        btn.attr("data-action", "remove");
                    }
                }

                btn.removeClass("disabled");
            },
            complete: function (res) {
                btn.prop("disabled", false);
                btn.removeClass("disabled");
            },
        });

        console.log(data_post_id, data_url, data_action);
    });
})(jQuery);

// Modal functionality
(function ($) {
    // visible the modal
    $("body .sit-show-my-wishlist-btn").on("click", function (e) {
        e.preventDefault();
        $(".sit-wishlist-modal-wrapper").fadeIn();
        $("html").addClass("sit-overflow-hidden");
    });

    // close the modal
    $("body").on("click", ".sit-wishlist-modal-close-btn", function (e) {
        e.preventDefault();
        $(".sit-wishlist-modal-wrapper").fadeOut();
        $("html").removeClass("sit-overflow-hidden");
    });

    // remove item after click remove

    $("body").on("click", ".sit-remove-wishlist-btn-from-modal", function (e) {
        var btn = $(this);
        var data_url = $(this).attr("data-admin-url");
        var data_post_id = $(this).attr("data-post-id");
        var data_action = $(this).attr("data-action");
        var data_nonce = $(this).attr("data-nonce");

        $.ajax({
            url: data_url,
            method: "POST",
            beforeSend: function () {
                btn.addClass("disabled");
                btn.prop("disabled", true);
                console.log("Requesting Wishlist Update For modal");
                console.log(data_url, data_post_id, data_action, data_nonce);
            },
            data: {
                sit_action: data_action,
                sit_post_id: data_post_id,
                sit_nonce: data_nonce,
                action: "sit_update_wishlist",
            },
            success: function (res) {
                res = JSON.parse(res);

                // change action attribute
                if (res.status == true) {
                    // change main product  page btn wishlist add/remove button html
                    if ("btn_inner_html" in res && res["btn_inner_html"]) {
                        var main_page_btn = $('body .sit-wishlist-btn[data-post-id="' + data_post_id + '"]');

                        if (main_page_btn.length) {
                            main_page_btn.html(res["btn_inner_html"]);
                            var btn_action = main_page_btn.attr("data-action");
                            if (btn_action == "remove") {
                                main_page_btn.attr("data-action", "add");
                            } else {
                                main_page_btn.attr("data-action", "remove");
                            }
                        }
                    }

                    // hide the clicked item
                    btn.parents(".sit-modal-wishlist-item").slideUp(400, function () {
                        btn.parents(".sit-modal-wishlist-item").remove();

                        // if no item available show the no content div
                        if ($("body .sit-modal-wishlist-items div").length) {
                        } else {
                            $(".sit-modal-wishlist-items").html('<div class="sit-modal-no-item-wrapper"><div class="sit-modal-no-title">No item found</div><div class="sit-modal-no-detail">Your wishlist is empty!</div></div>');
                        }
                    });
                }

                // btn.removeClass("disabled");
            },
            complete: function (res) {
                btn.prop("disabled", false);
                btn.removeClass("disabled");
            },
        });

        console.log(data_post_id, data_url, data_action);
    });
})(jQuery);
