/**
 * Created by lvlq on 16/1/25.
 */
(function ($) {
    $(function () {
        new Swiper('.swiper-container', {
            loop: true,
            autoplay: 5000,
            pagination: '.swiper-pagination',
            paginationElement: 'li'
        });

        var gotopflag = false;

        $(".table-area .cell").on("tap", function () {
            if ($(this).hasClass("active")) return;
            $(".table-area .cell").removeClass("active");
            $(this).addClass("active");
            $(".content-wrap").attr("style", "");
            var index = $(this).parent().find(".cell").index($(this));
            $(".content-wrap .intro-content").attr("style", "");
            $(".content-wrap .intro-content").removeClass("active");
            var $showContent = $(".content-wrap .intro-content").eq(index);
            $showContent.css({
                height: 0,
                display: "block"
            });
            $showContent.addClass("active");
            var $img = $showContent.find("img");
            for (var i = 0; i < $img.length; i++) {
                if ($img.eq(i).attr("src") == "") {
                    $img.eq(i).attr("src", $img.eq(i).data("src"));
                }
            }

            var areaHeight;
            switch (index) {
                case 0:
                    areaHeight = "62.28rem";
                    break;
                case 1:
                    areaHeight = "68.75rem";
                    break;
                case 2:
                    areaHeight = "69rem";
                    break;
                case 3:
                    areaHeight = "59.13rem";
                    break;
            }

            setTimeout(function () {
                var h = $(".swiper-container").height() + $(".intro-wrap").height() - $(".header").height();
                moveScroll(h);
            }, 100);
            $showContent.animate({
                height: areaHeight
            }, 600, "ease-in", function () {
                $showContent.css({
                    height: "auto"
                });
            });
        });

        $(window).on("scroll", function () {
            if ($("body")[0].scrollTop > 800) {
                if (!gotopflag)
                    $(".goTop").show();
            } else {
                $(".goTop").hide();
            }
        });

        $(".goTop").on("tap", function () {
            $(".goTop").hide();
            //gotopflag = true;
            //$(".content-wrap .intro-content.active").animate({
            //    height: "0px"
            //}, 600, function () {});

            gotopflag = false;
            $(".content-wrap .intro-content.active").attr("style", "");
            $(".content-wrap .intro-content.active").removeClass("active");
            $(".table-area .cell").removeClass("active");

        });
    });
})(Zepto);

var moveScroll = function (h) {
    var timer = null;
    var handle = function () {
        if (timer) clearTimeout(timer);
        if (h <= $("body")[0].scrollTop) {
            return
        } else {
            $("body")[0].scrollTop += 6;
            timer = setTimeout(handle, 10);
        }

    };

    timer = setTimeout(handle, 10);
};
