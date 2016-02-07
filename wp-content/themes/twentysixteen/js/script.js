jQuery.noConflict();
(function ($) {
    $(document).ready(function () {
        $(".menu-toggle").on('click', function() {
            $(".mobile-menu").slideToggle('fast');
            return false;
        });
        
        
        SwiperRender();

        $(".fancybox").fancybox();
        
        
        
        $('#custom-post-model').on('change', function () {
            if ($(this).prop('checked')) {
                $('.tax-pgpb').prop('checked', false);
                $('.tax-models-label').removeClass('disabled');
                $('.tax-pgpb-label').addClass('disabled');
                $('.tax-pgpb').attr('disabled', true);
                $('.tax-models').attr('disabled', false);
            }
        });

        $('#custom-post-pgpb').on('change', function () {
            if ($(this).prop('checked')) {
                $('.tax-models').prop('checked', false);
                $('.tax-pgpb-label').removeClass('disabled');
                $('.tax-model-label').addClass('disabled');
                $('.tax-pgpb').attr('disabled', false);
                $('.tax-models').attr('disabled', true);
            }
        });
        if (window.File && window.FileList && window.FileReader) {
            Init();
        }
    });

    // getElementById
    function getId(id) {
        return document.getElementById(id);
    }


    // output information
    function Output(msg) {
        //var m = $id("messages");
        //m.innerHTML = msg + m.innerHTML;
        //console.log(msg);
    }


    // file drag hover
    function FileDragHover(e) {
        e.stopPropagation();
        e.preventDefault();
        //console.log(e.target);
        //$()
        if (e.type == "dragover") {
            $("#inputImagesDrag").addClass("dragover");
        } else {
            $("#inputImagesDrag").removeClass("dragover");
        }
        
    }


    // file selection
    function FileSelectHandler(e) {

        // cancel event and hover styling
        FileDragHover(e);

        // fetch FileList object
        var files = e.target.files || e.dataTransfer.files;

        // process all File objects
        $("#inputImagesDrag span.file-count").html("<br />You choose " + files.length + " file(s)");
        for (var i = 0, f; f = files[i]; i++) {
            ParseFile(f);
        }
        
        $("#inputImages").prop("files", files);
    }


    // output file information
    function ParseFile(file) {

//        Output(
//                "<p>File information: <strong>" + file.name +
//                "</strong> type: <strong>" + file.type +
//                "</strong> size: <strong>" + file.size +
//                "</strong> bytes</p>"
//                );

        // display an image
        if (file.type.indexOf("image") == 0) {
            var reader = new FileReader();
            reader.onload = function (e) {
//                Output(
//                        "<p><strong>" + file.name + ":</strong><br />" +
//                        '<img src="' + e.target.result + '" /></p>'
//                        );
                //$(".inputImages-thumb > ul").append('<li><img src="' + e.target.result + '" /></li>');
            }
            reader.readAsDataURL(file);
        }
    }


    // initialize
    function Init() {

        var fileselect = getId("inputImages"),
            filedrag = getId("inputImagesDrag");
            //submitbutton = $id("submitbutton");

        // file select
        if (fileselect != null){
            fileselect.addEventListener("change", FileSelectHandler, false);
        }
        

        // is XHR2 available?
        var xhr = new XMLHttpRequest();
        if (xhr.upload) {

            // file drop
            if (filedrag!= null) {
                filedrag.addEventListener("dragover", FileDragHover, false);
            filedrag.addEventListener("dragleave", FileDragHover, false);
            filedrag.addEventListener("drop", FileSelectHandler, false);
            filedrag.style.display = "block";
            }
            

            // remove submit button
            //submitbutton.style.display = "none";
        }

    }

    // call initialization file
    
    function SwiperRender() {
        var w = window.innerWidth;
        var h = window.innerHeight;
        var check = false;
        (function (a) { if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true; })(navigator.userAgent || navigator.vendor || window.opera);
        if (check === true) {
            if (w > 1024) {
                SwiperRenderDesktop();
            } else if (w >= 640) {
                SwiperRenderDesktop();
            } else {
                SwiperRenderMobile();
            }
        } else {
            SwiperRenderDesktop();
        }
    };
    
    function SwiperRenderDesktop() {
        var swiperHome = new Swiper('.models-slide', {
            nextButton: '.swiper-models-slide-next',
            prevButton: '.swiper-models-slide-prev',
            paginationClickable: true,
            spaceBetween: 20,
            slidesPerColumn: 2,
            slidesPerView: 5,
        });

        var swiperPartner = new Swiper('.partners-slide', {
            nextButton: '.swiper-partner-slide-next',
            prevButton: '.swiper-partner-slide-prev',
            paginationClickable: true,
            spaceBetween: 20,
            slidesPerView: 5,
        });


        var swiperDetail = new Swiper('.main-profile-img-list', {
            nextButton: '.swiper-detail-slide-next',
            prevButton: '.swiper-detail-slide-prev',
            paginationClickable: true,
            spaceBetween: 10,
            slidesPerView: 7,
        });
    }
    
    function SwiperRenderMobile() {
        var swiperHome = new Swiper('.models-slide', {
            nextButton: '.swiper-models-slide-next',
            prevButton: '.swiper-models-slide-prev',
            paginationClickable: true,
            spaceBetween: 20,
            slidesPerColumn: 2,
            slidesPerView: 2,
        });

        var swiperPartner = new Swiper('.partners-slide', {
            nextButton: '.swiper-partner-slide-next',
            prevButton: '.swiper-partner-slide-prev',
            paginationClickable: true,
            spaceBetween: 20,
            slidesPerView: 2,
        });


        var swiperDetail = new Swiper('.main-profile-img-list', {
            nextButton: '.swiper-detail-slide-next',
            prevButton: '.swiper-detail-slide-prev',
            paginationClickable: true,
            spaceBetween: 10,
            slidesPerView: 2,
        });
    }
})(jQuery);
