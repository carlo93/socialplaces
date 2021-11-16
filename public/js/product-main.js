/*price range*/

if ($.fn.slider) {
    $('#sl2').slider();
}

var RGBChange = function () {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function () {
    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });

    $('#myModal').on('show.bs.modal', function(e) {
        console.log('modal open');
        //get data-id attribute of the clicked element
        var productId = $(e.relatedTarget).data('id');
        console.log(productId);
        //populate the textbox
        $(e.currentTarget).find('input[name="product_id"]').val(productId);
        $('#street').removeAttr('required');
        $('#town').removeAttr('required');
        $('#postal_code').removeAttr('required');

    });
    $('input[type="radio"]').click(function(){
         if (document.getElementById('logistic').checked) {
               document.getElementById('productAddressDetails').style.display = 'block';
               $('#street').attr("required", "true");
                $('#town').attr("required", "true");
                $('#postal_code').attr("required", "true");
            } else {
               document.getElementById('productAddressDetails').style.display = 'none';
               $('#street').removeAttr('required');
                $('#town').removeAttr('required');
                $('#postal_code').removeAttr('required');
            }
    });
});
