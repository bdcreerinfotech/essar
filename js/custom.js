// jQuery Selections
var $html = $('html'),
$scene = $('.wool-paralax');
// Pretty simple huh?
$scene.parallax();


// $(document).on("ready", function() {
//     if ($(".tabmenu ul li").click(function() {
//             var i = $(this),
//                 e = $(this).parent(),
//                 s = e.parent();
//             e.find("li").removeClass("active"), $(this).addClass("active"), s.children("div").children("div").hide();
//             var o = i.index();
//             s.children("div").children("div:eq(" + o + ")").fadeIn()
//         }), navigator.userAgent.toLowerCase().match(/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i)) {
//         $("ul.why-essar-enery-tab").on("click", ".init", function() {
//             $(this).closest("ul.why-essar-enery-tab").children("li:not(.init)").toggle()
//         });
//         var i = $("ul.why-essar-enery-tab").children("li:not(.init)");
//         $("ul.why-essar-enery-tab").on("click", "li:not(.init)", function() {
//             i.removeClass("selected"), $(this).addClass("selected"), $("ul.why-essar-enery-tab").children(".init").php($(this).php()), i.toggle()
//         })
//     }
//     $("#parentVerticalTab").easyResponsiveTabs({
//         type: "vertical",
//         width: "auto",
//         fit: !0,
//         closed: "accordion",
//         tabidentify: "hor_1",
//         activate: function(i) {
//             var e = $(this),
//                 s = $("#nested-tabInfo2");
//             $("span", s).text(e.text()), s.show()
//         }
//     })
// });
