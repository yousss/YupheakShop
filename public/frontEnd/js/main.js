/*price range*/
$("#sl2").slider();

var RGBChange = function () {
    $("#RGB").css(
        "background",
        "rgb(" + r.getValue() + "," + g.getValue() + "," + b.getValue() + ")"
    );
};

/*scroll to top*/

$(document).ready(function () {
    $(function () {
        $.scrollUp({
            scrollName: "scrollUp", // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: "top", // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: "linear", // Scroll to top easing (see http://easings.net/)
            animation: "fade", // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647, // Z-Index for the overlay
        });
    });
    ///////////Size of Product
    $("#idSize").change(function () {
        var SizeAttr = $(this).val();
        const route = "/product-attr";
        if (SizeAttr != "") {
            $.ajax({
                type: "get",
                url: route,
                data: { size: SizeAttr },
                success: function (resp) {
                    var arr = resp.split("#");
                    $("#dynamic_price").html("$" + arr[0]);
                    $("#dynamicPriceInput").val(arr[0]);
                    if (arr[1] == 0) {
                        $("#buttonAddToCart").hide();
                        $("#availableStock").text("Out Of Stock");
                        $("#inputStock").val(0);
                    } else {
                        $("#buttonAddToCart").show();
                        let value = arr[1];
                        $("#availableStock").text("In Stock (" + value + ")");
                    }
                },
                error: function () {
                    alert("Error Select Size");
                },
            });
        }
    });
    ///////////// Thumnail Image
    $(".changeImage").click(function () {
        newImage = $(this).attr("src");
        $("#dynamicImage").attr("src", newImage);
    });
    ///// Copy Billing address to Shipping Address
    $("#checkme").click(function () {
        if (this.checked) {
            $("#shipping_name").val($("#billing_name").val());
            $("#shipping_address").val($("#billing_address").val());
            $("#shipping_city").val($("#billing_city").val());
            $("#shipping_state").val($("#billing_state").val());
            $("#shipping_country").val($("#billing_country").val());
            $("#shipping_pincode").val($("#billing_pincode").val());
            $("#shipping_mobile").val($("#billing_mobile").val());
        } else {
            $("#shipping_name").val("");
            $("#shipping_address").val("");
            $("#shipping_city").val("");
            $("#shipping_state").val("");
            $("#shipping_country").val("Albania");
            $("#shipping_pincode").val("");
            $("#shipping_mobile").val("");
        }
    });
});
// read-more
// alert("readmore")
$(document).ready(function () {
    var maxLength = 35;
    $(".show-read-more").each(function () {
        var myStr = $(this).text();
        if ($.trim(myStr).length > maxLength) {
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            console.log("RemoveStr");
            console.log(removedStr);
            $(this).empty().html(newStr);
            $(this).append(
                ' <a href="javascript:void(0);" class="read-more">read more...</a>'
            );
            $(this).append(
                '<span class="more-text" style="display:none;">' +
                    removedStr +
                    "</span>"
            );
        }
    });
    $(".read-more").click(function () {
        $(this).siblings(".more-text").contents().unwrap();
        $(this).remove();
    });
});
