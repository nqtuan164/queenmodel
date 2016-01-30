jQuery.noConflict();
(function ($) {
    $(document).ready(function () {
        var swiperHome = new Swiper('.models-slide', {
            nextButton: '.swiper-models-slide-next',
            prevButton: '.swiper-models-slide-prev',
            paginationClickable: true,
            spaceBetween: 20,
            slidesPerColumn: 2,
            slidesPerView: 5,
            breakpoints: {
                480: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                }
            }
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

        $(".fancybox").fancybox();
//        $("#inputBirthday").datepicker({
//            format: 'mm/dd/yyyy',
//            startDate: '-3d'
//        });
        
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
    

})(jQuery);
