$(document).ready(function() {
	// Commain code js
    var SldtItem = 7
    $("body" ).on( "click", function() {
        $('.ctgry-btn-lst').slideUp('slow');
        $('.sldr-edt-wppr ul').slideUp('slow');
        $('.ctgry-sldr-edt-btn ul').slideUp('slow');
        // $('.drp_dwn_icn').slideUp('slow');
    });
    $('body').on('click', '.rsp-tab .title ul li', function(){
        $(this).siblings().removeClass('actv-mode');
        var DataID = $(this).attr('data-mode-typ');
        $(this).addClass('actv-mode');
        if($('.cstm-ldr-bnnr-wppr').hasClass('SlideDown')){
            setTimeout(function () {
               var ImgHrgt = $('.sld-img img').outerHeight();
               $(".cstm-ldr-bnnr-wppr").animate({
                   height: ImgHrgt + 'px'
               }, 1000 );
           }, 100);
        }
        if(DataID == '0'){
            var fitContent = 100
            SldtItem = 7
            $('#categoryTable').css('width', fitContent + '%');
            $('.ld-bnnr-wppr, .cstm-ldr-bnnr-wppr, .cstm-ctgry-wppr, .cstm-hdr-wppr').css('width', '1194px');
            $('.ld-bnnr-wppr').trigger('refresh.owl.carousel');
            $('#categoryTable').addClass('wdth-wppr');
            $('#categoryTable').removeClass('mobl-viw-stn');
            $('#categoryTable').removeClass('tab-viw-stn');
            $('.ctgry-sld-sldr').each(function(){
                if($(this).hasClass('owl-carousel')){
                    var $This = $(this)
                    $(this).removeClass('mobl_sldr');
                    $(this).removeClass('tab_sldr');
                    $This.trigger('destroy.owl.carousel');
                    setTimeout(function () {
                        $This.trigger('refresh.owl.carousel');
                        $This.owlCarousel({
                            navText: ["<img src='assets/images/pageCustomization/icon/previous.svg' alt='left'> ", "<img src='assets/images/pageCustomization/icon/next.svg' alt='next'>"],
                            mouseDrag: false,
                            autoplay: false,
                            items: SldtItem,
                            slideSpeed: 300,
                            loop: false,
                            nav: true,
                            nav: true,
                        });
                    }, 800);
                }
                else{
                    $(this).removeClass('mobl_sldr');
                    $(this).removeClass('tab_sldr');
                }
            });
            if($('.bgrd-clr').is(':checked')){
                $("#categoryTable").css({ paddingTop: 0});
            }
            else{
                setTimeout(function () {
                    var HdrHght = $('.cstm-hdr-wppr').outerHeight();
                    $(".main").css({paddingTop: HdrHght + 'px'});
                }, 1000);
            }
        }
        else if( DataID == '1'){
            var fitContent = 768
            SldtItem = 5
            $('#categoryTable').css('width', fitContent + 'px');
            $('.ld-bnnr-wppr, .cstm-ldr-bnnr-wppr, .cstm-ctgry-wppr, .cstm-hdr-wppr').css('width', fitContent + 'px');
            $('.ld-bnnr-wppr').trigger('refresh.owl.carousel');
            $('#categoryTable').removeClass('mobl-viw-stn');
            $('#categoryTable').removeClass('wdth-wppr');
            $('#categoryTable').addClass('tab-viw-stn');
            $('.cstm-ctgry-wppr').sortable({
                disabled: true
            });
            $('.ctgry-sld-sldr').each(function(){
                if($(this).hasClass('owl-carousel')){
                    var $This = $(this)
                    $(this).removeClass('mobl_sldr');
                    $(this).removeClass('tab_sldr');
                    $This.trigger('destroy.owl.carousel');
                    setTimeout(function () {
                        $This.trigger('refresh.owl.carousel');
                        $This.owlCarousel({
                            navText: ["<img src='assets/images/pageCustomization/icon/previous.svg' alt='left'> ", "<img src='assets/images/pageCustomization/icon/next.svg' alt='next'>"],
                            mouseDrag: false,
                            autoplay: false,
                            items: SldtItem,
                            slideSpeed: 300,
                            loop: false,
                            nav: true,
                            nav: true,
                        });
                    }, 800);
                }
                else{
                    $(this).removeClass('mobl_sldr');
                    $(this).addClass('tab_sldr');
                }
            });
            if($('.bgrd-clr').is(':checked')){
                $("#categoryTable").css({ paddingTop: 0});
            }
            else{
                setTimeout(function () {
                    var HdrHght = $('.cstm-hdr-wppr').outerHeight();
                    $(".main").css({paddingTop: HdrHght + 'px'});
                }, 1000);
            }
        }
        else{
            var fitContent = 360
            SldtItem = 4
            $('#categoryTable').css('width', fitContent + 'px');
            $('.ld-bnnr-wppr, .cstm-ldr-bnnr-wppr, .cstm-ctgry-wppr, .cstm-hdr-wppr').css('width', fitContent + 'px');
             $('.ld-bnnr-wppr').trigger('refresh.owl.carousel');
            $('#categoryTable').removeClass('tab-viw-stn');
            $('#categoryTable').removeClass('wdth-wppr');
            $('#categoryTable').addClass('mobl-viw-stn');
            $('.cstm-ctgry-wppr').sortable({
                disabled: true
            });
            $('.ctgry-sld-sldr').each(function(){
                if($(this).hasClass('owl-carousel')){
                    var $This = $(this)
                    $(this).removeClass('mobl_sldr');
                    $(this).removeClass('tab_sldr');
                    $This.trigger('destroy.owl.carousel');
                    setTimeout(function () {
                        $This.trigger('refresh.owl.carousel');
                        $This.owlCarousel({
                            navText: ["<img src='assets/images/pageCustomization/icon/previous.svg' alt='left'> ", "<img src='assets/images/pageCustomization/icon/next.svg' alt='next'>"],
                            mouseDrag: false,
                            autoplay: false,
                            items: SldtItem,
                            slideSpeed: 300,
                            loop: false,
                            nav: true,
                            nav: true,
                        });
                    }, 800);
                }
                else{
                    $(this).removeClass('tab_sldr');
                    $(this).addClass('mobl_sldr');
                }
            });
            if($('.bgrd-clr').is(':checked')){
                $("#categoryTable").css({ paddingTop: 0});
            }
            else{
                setTimeout(function () {
                    var HdrHght = $('.cstm-hdr-wppr').outerHeight();
                    $(".main").css({paddingTop: HdrHght + 'px'});
                }, 1000);
            }
        }
    });
    // End Here
    // Responsive menu function  js
    $('.burg-menu').click(function(){
        // $('nav').slideDown('slow');
        // $('.orvly-Shdw').slideDown('10000');
        $('nav').addClass('opn-menu')
        $('.orvly-Shdw').addClass('OpnLayBx')
    });
    $('.cls-menu, .orvly-Shdw').click(function(){
        $('nav').removeClass('opn-menu')
        $('.orvly-Shdw').removeClass('OpnLayBx')
    });
    $('.pblc-btn').click(function(){
        var HdrHght = $('.cstm-hdr-wppr').outerHeight()
        if($('.main').hasClass('wdth-wppr')){
            $('.cls-sctn-btn').hide('slow');
            $(".main").animate({
                maxHeight: '0',
                paddingTop: '0'
            }, 50 );
            setTimeout(function () {
                $('.ovrly-pop').addClass('ovrly-show');
            }, 1000);
            setTimeout(function () {
                $('.main').addClass('pblc-pop-show');
                $(".main").css({width: '1215px' });
            }, 1000);
            setTimeout(function () {
                $(".main").css({maxHeight: '95%', paddingTop: HdrHght + 'px'});
            }, 2000);
        }
        else{

            $('.cls-sctn-btn').hide('slow');
            $(".main").animate({
                maxHeight: '0',
                paddingTop: '0'
            }, 50 );
            setTimeout(function () {
                $('.ovrly-pop').addClass('ovrly-show');
            }, 1000);
            setTimeout(function () {
                $('.main').addClass('pblc-pop-show');
            }, 1000);
            setTimeout(function () {
                $(".main").css({maxHeight: '95%', paddingTop: HdrHght + 'px'});
            }, 2000);

        }

    });
    $('.ovrly-pop').click(function(){
        var HdrHght = $('.cstm-hdr-wppr').outerHeight()
        $('.cls-sctn-btn').show('slow');
        $(".main").animate({
            maxHeight: '0',
            paddingTop: '0'
        }, 50 );
        setTimeout(function () {
            $('.ovrly-pop').removeClass('ovrly-show');
            $('.main').removeClass('pblc-pop-show');
        }, 1000);
        setTimeout(function () {
            $(".main").css({maxHeight: 'calc(100vh - 90px)', paddingTop: HdrHght + 'px'});
        }, 2000);

    });
    // End Here
    // index page function  js
    $('.cstm-hdr-wppr .cls-sctn-btn, .ctgry-sld-wppr .cls-sctn-btn').click(function(){
        var Ctgry_Sldr = $(this).parent('.ctgry-sld-wppr').find('.ctgry-sld-sldr');
        $(this).parent('.ctgry-sld-wppr').slideUp('slow');
        $(this).parent('.comn-sctn').slideUp('slow');
        Ctgry_Sldr.trigger('destroy.owl.carousel');
        $(".main").css({ paddingTop:  '0px'});
    });
    $('.cstm-ldr-bnnr-wppr .cls-sctn-btn').click(function(){
        $('.cstm-ldr-bnnr-wppr').removeClass('SlideDown')
        $(".cstm-ldr-bnnr-wppr").animate({
            height: '0px'
        }, 1000 );
    });
    // End Here
    // Header Section js
    $('.bgrd-clr').change(function() {
        if(this.checked) {
            $(this).parents('fieldset').find('.text-bx').slideUp('slow');
            $(".main").css({ paddingTop: '0px'});
            $('.cstm-hdr-wppr').addClass('fixed-hdr');
        }
        else{
            var HdrHght = $('.cstm-hdr-wppr').outerHeight()
            $(this).parents('fieldset').find('.text-bx').slideDown('slow');
            $(".main").css({ paddingTop: HdrHght + 'px'});
            $('.cstm-hdr-wppr').removeClass('fixed-hdr')
        }
    });
    $(function() {
        $(".color_picker").colorpicker();
    });
    $("#photo").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $("#imgPreview").attr("src", event.target.result);
                $(".ftr_abt_wppr .title span a img").attr("src", event.target.result);
                $(".logo-ovrly img").attr("src", event.target.result);
                $(".menu_logo a img").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
    var dataItm = 1
    $('.add-meu-lst').click(function(){
        var $This = $(this)
        var PrntCls = $This.parents('.hdr-sctn-wppr').find('.cstm-menu-sld ul')
        PrntCls.append("<li data-menu-lst='"+ dataItm +"'><div class='text-flid-wppr'> <input type='text' name='menu_name' class='cstm-menu-txt'> <span class='cls-btn'></span> </div> <div class='actv-dacv-btn-wppr'> <input type='checkbox' name='radio' class='rdo-btn' checked> <label></label> </div></li>")
        dataItm++
    });
    $("body" ).on( "click", '.cls-btn', function() {
        var $This = $(this);
        var PrntCls = $This.parents('li');
        var Id = PrntCls.attr('data-menu-lst');
        $('nav ul li').each(function(){
            var DataId = $(this).attr('data-menu-id')
            if(DataId == Id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4318ff',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                      $(this).remove();
                      PrntCls.remove();
                    }
                });
            }
        });
    });
    $('.bgclr_pickr').change(function(){
        var inputVlu = $(this).val()
        $('.hdr-bg-kclr').css("background-color", inputVlu)
    });
    $('.txtclr_pickr').change(function(){
        var inputVlu = $(this).val()
        alert(inputVlu)
        $('.hdr-wppr nav ul li a').css("color", inputVlu)
    });
    $( function() {
        $( ".logo-img-vlue" ).slider({
            range: "min",
            value: 50,
            min: 30,
            max: 70,
            slide: function( event, ui ) {
              var HdrHght = $('.cstm-hdr-wppr').outerHeight()
              $( ".logo-wppr a img" ).css('width', ui.value + '%');
              $('#logo_size').val(ui.value);
              if(ui.value > 40){
                $(".main").css({ paddingTop: HdrHght + 'px'});
              }
              else{
                $(".main").css({ paddingTop: HdrHght + 'px'});
              }
            }
        });
    } );
    $( function() {
        $( ".txt-vlu-opcty" ).slider({
            range: "min",
            value: 10,
            min: 1,
            max: 10,
            slide: function( event, ui ) {
                var BgOpcty = ui.value / 10
                $('nav ul li a').css('opacity', BgOpcty)
                $('#text_color_optacity').val(BgOpcty)
            }
          });
    } );
    $( function() {
        $( ".bg-vlu-opcty" ).slider({
            range: "min",
            value: 10,
            min: 1,
            max: 10,
            slide: function( event, ui ) {
                var BgOpcty = ui.value / 10
                $('.hdr-bg-kclr').css('opacity', BgOpcty)
                $('#bg_color_optacity').val(BgOpcty)

            }
          });
    });
    $('.blck-btn,.bck-btn-arro a').click(function(){
        $(".blck-btn").text("Blocks");
        $('.cmn-pop-sld').slideUp('slow');
        $('.left-menu-wppr').slideDown('slow');
        $('.stng-btn').removeClass('active')
        $('.blk-stng-wppr').removeClass('stn-actv')
        $('.left-menu-wppr .title ul li').removeClass('lst-actv')
		$('.left-menu-wppr').slideDown('slow');
        $('.stng-btn').removeClass('active');
        $('.ctgry-btn-dsgn').slideUp('slow');
        $('.bck-btn-arro').slideUp('slow')
        $('.cmn-pop-sld').slideUp('slow');
        $(this).addClass('active');
        $('.cntnt-ldr-wppr').addClass('hide-ldng');
    });
    var i = 0
    $('.left-menu-wppr .title ul li').each(function(){
        $(this).attr('data-lst-itm', i)
        i++
    });
    var e = 0
    $('.cmn-pop-sld').each(function(){
        $(this).attr('data-lst-popup', e)
        e++
    });
    $('.left-menu-wppr .title ul li').click(function(){
       $('.blk-stng-wppr').addClass('stn-actv');
       $(this).siblings().removeClass('lst-actv');
       $(this).addClass('lst-actv');
       $('.blck-btn').text($(this).text())
    });
    $('.hdr-clk').click(function(){
        var HdrHght = $('.cstm-hdr-wppr').outerHeight()
        $('.cstm-hdr-wppr').slideDown('slow');
        $(".main").css({maxHeight: 'calc(100vh - 90px)', paddingTop: HdrHght + 'px'});
    });
    // amrita
    // $("body" ).on( "click", '.headerID', function()
    // {
    //     var id = $(this).attr('data-menu-id');
    //     alert(id);
        // if (id === "60") {
        //     $("#div1").click(function(){
        //         $("div").show();
        //       });
        //       $("#div2").click(function(){
        //         $("div").hide();
        //       });
        //       $("#div3").click(function(){
        //         $("div").hide();
        //       });
        //               } else if (id === "142") {
        //                 $("#div2").click(function(){
        //                     $("div").show();
        //                   });
        //                   $("#div1").click(function(){
        //                     $("div").hide();
        //                   });
        //                   $("#div3").click(function(){
        //                     $("div").hide();
        //                   });
        //                 } else {
        //                     $("#div3").click(function(){
        //                         $("div").show();
        //                       });
        //                       $("#div2").click(function(){
        //                         $("div").hide();
        //                       });
        //                       $("#div1").click(function(){
        //                         $("div").hide();
        //                       });
        //   }
    // })
    $('.cstm-menu-txt').each(function(){
        var $This = $(this)
        var inputVlue = $This.val()
        var dataId = $This.parents('li').attr('data-menu-lst')
        var Hstatus = $This.parents('li').attr('data-menu-val')
        // alert(Hstatus);
        if($This.hasClass('show')){
        }
        else{
            if(Hstatus === "1"){
                $('nav ul').append("<li class='headerID' data-menu-id="+ dataId +"> <a  href='javascript:void(0)'>" + inputVlue +" </a> </li> ")
                $This.addClass('show');
            }

            // $This.siblings().removeClass('actv_tab');
            // $This.addClass('actv_tab')
        }
    })
    // amrita
    //  page Loading js
    var HdrHght = $('.cstm-hdr-wppr').outerHeight();
    $(".main").css({paddingTop: HdrHght + 'px'});
    $('.cstm-hdr-wppr').slideDown('slow');
    $('.cstm-ctgry-wppr').slideDown('slow');
    setTimeout(function () {
        $('.cstm-ldr-bnnr-wppr').slideDown('slow');
        $('.cstm-ldr-bnnr-wppr').addClass('SlideDown');
        var ImgHrgt = $('.sld-img img').height();
        $(".cstm-ldr-bnnr-wppr").animate({ height: ImgHrgt + 'px' }, 1500 );
    }, 1000);
    // End Here
    $('.hdrfrm-sbmt').click(function(){
        var BckgrndClr = $('#bckgnd-clr').val()
        var TxtClr = $('#txt-clr').val()
        var MeneLngth = $('.cstm-menu-sld ul li').length
        $('.hdr-bg-kclr').css("background-color", BckgrndClr)
        $('.hdr-wppr nav ul li a').css("color", TxtClr);
        $('.cstm-menu-txt').each(function(){
            var $This = $(this)
            var inputVlue = $This.val()
            var dataId = $This.parents('li').attr('data-menu-lst')
            if($This.hasClass('show')){
            }
            else{
                $('nav ul').append("<li data-menu-id="+ dataId +"> <a class='headerID' href='javascript:void(0)' >" + inputVlue +" </a> </li> ")
                $This.addClass('show')
            }
        })

    });
    // End Here
    // left Menu upper section js
    $('.left-menu-wppr .title ul li').click(function(){
        var ItmID = $(this).attr('data-lst-itm')
        $('.cmn-pop-sld').each(function(){
            var PopupID = $(this).attr('data-lst-popup')
            if(PopupID == ItmID){
                $('.cmn-pop-sld').slideUp('slow')
                $(this).slideDown('slow');
                $('.bck-btn-arro').slideDown('slow');
                $('.left-menu-wppr').slideUp('slow');
                $('.live_chnl_wppr').slideUp('slow');
            }
            if(PopupID == "4"){
                $('.live_TV_Wppr').slideDown('slow');
            }
        })
    });
	// End Here
    // Lead Bnner Section  slide js
    $("body" ).on( "click", function() {
        $('.ctgry-btn-lst').slideUp('slow');
        $('.add-pop-wppr').slideUp('slow');
    });
    $(".datepicker").click(function(e){
        setTimeout(function(){
            $('.bootstrap-datetimepicker-widget').addClass('show_clndr')
        }, 100);
    })
    $(".ld-bnnr-wppr").owlCarousel({
        loop: true,
        mouseDrag: true,
        items: 1,
        autoplay: false,
        margin: 0,
        dots: true,
        slideSpeed: 300,
    });
    $('.ld-bnnr-clk').click(function(){
        var ImgHrgt = $('.sld-img img').height();
        $('.live_vdo_wppr ').slideUp('slow');
        setTimeout(function () {
            $('.cstm-ldr-bnnr-wppr').addClass('SlideDown');
            $(".cstm-ldr-bnnr-wppr").animate({height: ImgHrgt + 'px'}, 500 );
        }, 100);
    });
    $('.ctgry-btn').click(function(e){
        e.stopPropagation()
        $(this).parents('.lead-bnnr-img-itm').siblings().find('.ctgry-btn-lst').slideUp('slow')
        $(this).siblings('.ctgry-btn-lst').slideToggle('slow')
    });
    $('.slctr-txt-wppr span').click(function(e){
        e.stopPropagation();
        var $This = $(this);
        $This.parents('.logo-title').css("z-index", "3px");
        $This.parent('.slctr-txt-wppr').siblings().children('ul').slideUp('slow');
        $This.parents('fieldset').siblings().find('ul').slideUp('slow');
        $This.siblings('ul').slideToggle('slow');
    });
    $('.slctr-txt-wppr ul li').click(function(){
        var textVlue = $(this).text();
        $(this).parents('.slctr-txt-wppr').find('.slct-txt').text(textVlue);
        $(this).parent('ul').slideUp('slow');
    });
    $('#edit_videoType ~ ul li').click(function(e){
        e.stopPropagation();
        var $This = $(this),
            slctTxt = $This.attr('data-id-name');
        $('#edit_videoType').text(slctTxt)
        $This.parent('ul').slideUp('slow');
        if(slctTxt == "no_video"){
            $('.vdo_url, .vdo_id').slideUp('slow');
            $('#edit_entrid').val('');
            $('#edit_url').val('');
        }
        else if(slctTxt == "internal"){
            $('#edit_ventryid').text('...Select...');
            $('.vdo_id').slideDown('slow');
            $('.vdo_url').slideUp('slow');
            $('#edit_entrid').val('');
            $('#edit_url').val('');
            $('.lst_srch').val('');

        }
        else if(slctTxt == "external"){
            $('.vdo_url').slideDown('slow');
            $('.vdo_id').slideUp('slow');
            $('#edit_entrid').val('');
            $('#edit_url').val('');
        }
        else{
            $('.vdo_url, .vdo_id').slideUp('slow');
        }
    });
    $('.add-bnnr-btn, .add-pop-wppr').click(function(e){
        e.stopPropagation();
        $('.add-pop-wppr').slideDown('slow')
    });
    $('.pop-cls-btn, .ovrly_wppr').click(function(e){
        e.stopPropagation();
        $('.add-pop-wppr').slideUp('slow');
        $('.edt_bnnr_wppr').slideUp('slow');
        setTimeout(function () {
            $('.ovrly_wppr').removeClass('ovrly-hide');
        }, 500);

    });
    $(".upld_img").change(function () {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            var lstDiv = $('.mdia-itm-wppr').children('.col-4:last-child')
            var offset = lstDiv.offset().top;
            var topScrol = offset + 10000
            console.log(lstDiv)
            console.log(topScrol)
            reader.onload = function (event) {
                $('.mdia-itm-wppr').append("<div class='col-4 new_clm_add'> <span> <img src="+ event.target.result +" alt='Banner'> </span> <div class='title'> <p>C:fakepathWeb-Carousel_06_1920x768H_ATV.jpg</p> </div> </div>");
                $('.mdia-itm-wppr').animate({scrollTop: topScrol}, 'slow');
            };
            reader.readAsDataURL(file);
        }
    });
    $('.ctgry-btn-lst ul li').click(function(event){
        event.stopPropagation();
        $(this).addClass('active_tab');
        $(this).siblings().removeClass('active_tab');
        $(this).parents('.ctgry-btn-lst').slideUp('slow');

    });

     $(document).on("input propertychange paste change", '.lst_srch', function(e) {
        var value = $(this).val().toLowerCase();
        var $ul = $(this).closest('ul');
        var $li = $ul.find('li:gt(0)');
        $li.hide();
        $li.filter(function() {
          var text = $(this).text().toLowerCase();
          return text.indexOf(value)>=0;
        }).show();
    });

    // End Here
    // Categories Section - Setting  Slide js
    $('.ctgry-clk').click(function(){
        $('.cstm-ctgry-wppr').slideDown('slow');
        $('.ctgry-sld-wppr').slideDown('slow');
    });
    $("body" ).on( "click", '.edt-btn', function(e) {
        e.stopPropagation();
        var $This = $(this)
        $This.parents('.ctgry-sld-wppr').siblings().find('.sldr-edt-wppr ul').slideUp('slow')
        $This.siblings('ul').slideToggle('slow');
    });
    $(".ctgry-sldr").owlCarousel({
        loop: false,
        mouseDrag: true,
        items: 4,
        autoplay: false,
        margin: 5,
        dots: false,
        nav: true,
        slideSpeed: 300,
        navText: ["<img src='assets/images/pageCustomization/icon/previous.svg' alt='left'> ", "<img src='assets/images/pageCustomization/icon/next.svg' alt='next'>"],
    });
    $('.ctgry-edt-btn').click(function(){
        var $This = $(this)
        $This.parents('.ctgry-lst-itm').siblings().find('.edit-sldr-wppr').slideUp('slow');
        $This.parents('.ctgry-sirs-sld').siblings().find('.edit-sldr-wppr').slideUp('slow');
        $This.parents('.ctgry-lst-itm').find('.edit-sldr-wppr').slideDown('slow');
        $This.parents('.ctgry-sirs-sld').find('.edit-sldr-wppr').slideDown('slow');
    });
    $('.cls-edt-btn').click(function(){
        $('.edit-sldr-wppr').slideUp('slow');
        $('.ctgry-edt-btn ').removeClass('actv')
    });
    $('.ctgry-sldr-edt-btn ul li').click(function(){
        $(this).parent('ul').slideUp('slow');
        $(this).siblings('li').removeClass('actv')
        $(this).addClass('actv')
    });
    $('.ctgry-btn').click(function(){
        $('.sris-btn').removeClass('actv')
        $(this).addClass('actv');
        $('.srirs-stng-popup').slideUp('slow');
        $('.ctgry-sirs-sld .sirs-bck-btn ').slideUp('slow');
        $('.ctgry-sirs-sld .ctgry-lst-itm ').slideUp('slow');
        $('.ctgry-sirs-sld .ctgry-sldr-edt-btn ').slideUp('slow');
        $('.ctgry-sirs-sld .sirs-itm-wppr').slideDown('slow');
        $('.ctgry-stng-popup').slideDown('slow');
    });
    $('.sris-btn').click(function(){
        $('.ctgry-btn').removeClass('actv')
        $(this).addClass('actv');
        $('.ctgry-stng-popup').slideUp('slow');
        $('.srirs-stng-popup').slideDown('slow');
        $('.cntnt-ldr-wppr').addClass('hide-ldng');
        setTimeout(function () {
            $('.cntnt-ldr-wppr').removeClass('hide-ldng');
        }, 2000);
    });
    $('.sirs-itm-wppr').click(function(){
        $(this).parents('.ctgry-sirs-sld').find('.ctgry-lst-itm').removeClass('d-none');
        $(this).parents('.ctgry-sirs-sld').find('.ctgry-sldr-edt-btn').removeClass('d-none');
        $(this).parents('.ctgry-sirs-sld').find('.sirs-bck-btn').slideDown('slow');
        $(this).parents('.ctgry-sirs-sld').find('.ctgry-lst-itm').slideDown('slow');
        $(this).parents('.ctgry-sirs-sld').find('.ctgry-sldr-edt-btn').slideDown('slow');
        $(this).slideUp('fast')
    });
    $('.sirs-bck-btn').click(function(){
        $(this).slideUp('slow');
        $(this).siblings('.ctgry-sldr-edt-btn').slideUp('slow');
        $(this).parents('.ctgry-sirs-sld').find('.ctgry-lst-itm').slideUp('slow');
        $(this).parents('.ctgry-sirs-sld').find('.sirs-itm-wppr').slideDown('slow');
    });
    var Id = 0
    $('.ctgry-sld-itm').each(function(){
        $(this).attr('id', 'imageNo' + Id)
        Id++
    })
    var ctgySldrID = 0
    $('.ctgry-sld-wppr').each(function(){
        $(this).attr('id', 'imageNo' + ctgySldrID)
        ctgySldrID++
    });
    $('body').on('click', '.edt-img-sld', function(){
        var $This = $(this)
        var PrntCls = $This.parents('.ctgry-sld-wppr');
        var OwlSldr = PrntCls.find('.ctgry-sld-sldr');
        var Ctgry_Itm = PrntCls.find('.ctgry-sld-itm');
        PrntCls.removeClass('move_hvr')
        OwlSldr.trigger('destroy.owl.carousel');
        $('.cstm-ctgry-wppr').sortable({
            disabled: true
        });
        OwlSldr.sortable({
            disabled: false,
            update: function(event, ui) {
                getIdsOfImages();
            }
        });
        function getIdsOfImages() {
            var values = [];
            Ctgry_Itm.each(function (index) {
                values.push($(this).attr("id")
                .replace("imageNo", ""));
            });
        }
        OwlSldr.off('owlCarousel');
    });
    $('body').on('click', '.ctgr-sldr', function(){
        var $This = $(this);
        var PrntCls = $This.parents('.ctgry-sld-wppr');
        var OwlSldr = PrntCls.find('.ctgry-sld-sldr');
        var ScrlRmv = PrntCls.find('.ctgry-sldr-wppr');
        OwlSldr.addClass('owl-carousel owl-theme')
        PrntCls.addClass('move_hvr');
        ScrlRmv.addClass('scrl-hdie');
        $('.cstm-ctgry-wppr').sortable({
            disabled: false,
            placeholder: "ui-state-highlight",
            update: function(event, ui) {
                getIdsOfImages();

            }
        });
        function getIdsOfImages() {
            var values = [];
            $('.ctgry-sld-wppr').each(function (index) {
                values.push($(this).attr("id")
                .replace("imageNo", ""));
            });
        }
        $('.cstm-ctgry-wppr').disableSelection();
        OwlSldr.sortable({
            disabled: true
        });
        OwlSldr.owlCarousel({
            // navText: ["<i class='fa-solid fa-angle-left'></i>", "<i class='fa-solid fa-angle-right'></i>"],
            navText: ["<img src='assets/images/pageCustomization/icon/previous.svg' alt='left'> ", "<img src='assets/images/pageCustomization/icon/next.svg' alt='next'>"],
            slideSpeed: 300,
            autoplay: false,
            mouseDrag: true,
            loop: false,
            dots: false,
            margin: 0,
            nav: true,
            items: SldtItem,
        });

    });
    // End Here
    // Live Channel Setting js
    $('.slct_plyr_sz').click( function(){
        $(this).parents('.txt-fld-wppr').siblings().attr('style', '')
        $(this).parents('.txt-fld-wppr').css({
            "z-index": "3"
        });
        $(this).parents('.txt-fld-wppr').siblings().find('.slct_plyr_sz').children('ul').slideUp('slow')
    });
    $('.lvtv_clk').click(function(){
        $(".cstm-ldr-bnnr-wppr").animate({height: 0 + 'px'}, 100 );
        setTimeout(function () {
            $('.cstm-ldr-bnnr-wppr').removeClass('SlideDown');
            $('.live_vdo_wppr ').slideDown('slow');
        }, 1000);
    });
    $(".chnl_vdo").hover(function() {
        var $This = $(this);
        $This.find('.chnl_vdd_pstr').addClass('rmv_pstr');
        $This.find('video').get(0).play();
    },
    function() {
        var $This = $(this);
        $This.find('.chnl_vdd_pstr').removeClass('rmv_pstr');
        $This.find('video').get(0).pause();
    });
    $('.edt_Frm, .more_chnl_frm').click(function(){
        $('.live_chnl_wppr').slideDown('slow');
        $('.live_TV_Wppr').slideUp('slow');
    });
    $('.cls_lv_frm').click(function(){
        $('.live_chnl_wppr').slideUp('slow');
        $('.live_TV_Wppr').slideDown('slow');
    });
    $('.chnl_vdo').click(function(){
        $(this).parents('.add_chnl_itm').siblings().removeClass('actv_lv_chnl');
        $(this).parents('.add_chnl_itm').addClass('actv_lv_chnl');
    });
    // End Here
    // Footer Section-Setting Slide js
    var IcnItmID = 0
    $('.drp_dwn_icn ul li').each(function(){
        $(this).attr('data-icn-id', IcnItmID)
        IcnItmID++
    });
    $('.ftrlogo').change(function() {
        if(this.checked) {
            $('.ftr_abt_wppr .title span').slideUp('slow');
            $(this).parents('.logo-uplod').next().slideUp('slow')
        }
        else{
            $(this).parents('.logo-uplod').next().slideDown('slow')
            $('.ftr_abt_wppr .title span').slideDown('slow')
        }
    });
    $( ".fotr-logo-sldr" ).slider({
        range: "min",
        value: 80,
        min: 60,
        max: 100,
        slide: function( event, ui ) {
          $( "#fotrlogo" ).css('width', ui.value + '%');
        }
    });
    $( ".ftr-bg-opcty" ).slider({
        range: "min",
        value: 1000,
        min: 1,
        max: 1000,
        slide: function( event, ui ) {
            var BgOpcty = ui.value / 10
            $('.ftr_wppr').css("background", "rgb(0 0 0 /" + BgOpcty+"%)")

        }
    });
    $('.ftr_abt_clr').change(function(){
        var inputVlu = $(this).val();
        $('.ftr_abt_wppr .title p').css("color", inputVlu);
    });
    $('.scl_icn').change(function(){
        if(this.checked) {
            $(".scl_icn_wppr").removeClass('enbl_icn');
        }
        else{
            $(".scl_icn_wppr").addClass('enbl_icn');
        }
    });
    $('.app-icn-btn').click(function(){
        $(this).addClass('actv_app')
    })
    $( ".ftr_abt_opcty" ).slider({
        range: "min",
        value: 10,
        min: 1,
        max: 10,
        slide: function( event, ui ) {
          $( ".ftr_abt_wppr .title p" ).css('opacity', ui.value / 10 );
        }
    });
    $('.admr_icn_btn').click(function(event){
        event.stopPropagation();
        $('.drp_dwn_icn').slideDown('slow');
    });
    $('.drp_dwn_icn ul li').click(function(){
        var Slct_Icn = $(this).html(),
            Slct_ID = $(this).attr('data-icn-id');
            $This = $(this)
        $(this).siblings('li').removeClass('icn_slctd');
        $(this).addClass('icn_slctd');
        $('.url_link_wppr').slideDown('slow');
        $('.slct_icn').html(Slct_Icn);
        $('.slct_icn').attr('data-itm-id', Slct_ID);
        $('.itm_lngth').each(function(){
            var ItmID = $(this).attr('data-slct-id');
            $('.drp_dwn_icn ul li').each(function(){
                var LstItmID = $(this).attr('data-icn-id');
                if(LstItmID == ItmID){
                    $(this).addClass('icn_slctd');
                }
            })
        })
    });
    $('.sav_icn').click(function(){
        var Slct_Icn = $('.slct_icn').html(),
            Slct_Icn_Id = $('.slct_icn').attr('data-itm-id'),
            lst_lnth = $('.scl_icn_bx  ul li').length,
            lnkUrl = $(this).parents('.url_link_wppr').find('input.text-bx').val();
        $('.scl_icn_bx').slideDown('slow');
        $('.url_link_wppr').slideUp('slow');
        $('.drp_dwn_icn').slideUp('slow');
        $('.scl_icn_bx  ul').append("<li data-slct-id="+ Slct_Icn_Id +" data-url-lnk="+ lnkUrl + " class='itm_lngth'><button type='button' class='cls_btn'>+</button><span>"+ Slct_Icn + "</span></li>");
    });
    $('.lnk_rmv').click(function(){
        var lstItm =  $('.drp_dwn_icn ul li'),
            lstItmLnth =  lstItm.length,
            slctID = $(this).parents('.url_link_wppr').children('fieldset').find('.slct_icn').attr('data-itm-id');
        $('.url_link_wppr').slideUp('slow');
        $('.drp_dwn_icn').slideUp('slow');
        lstItm.each(function(){
            var dtID = $(this).attr('data-icn-id');
            if(dtID == slctID){
                $(this).removeClass('icn_slctd')
            }
        });
    });
    $('body,html').on('click', '.scl_icn_bx ul li .cls_btn', function(){
        var prntLiItm = $(this).parent('li'),
            liLnth = $('.itm_lngth').length,
            slctDataID = prntLiItm.attr('data-slct-id')
        prntLiItm.siblings('li').addClass('itm_lngth');

        prntLiItm.remove();
        if(liLnth == 1){
            $('.scl_icn_bx').slideUp();
            $('.drp_dwn_icn').slideUp('slow');
        }
        $('.icn_slctd').each(function(){
            var DtaItmCld = $(this).attr('data-icn-id')
            if(DtaItmCld == slctDataID){
                $(this).removeClass('icn_slctd')
            }
        })
    });
    $('.ftr_clk').click(function(){
        $('.ftr_wppr').slideDown('slow');
    });
    $('.cls_icn_popup').click(function(){
        $('.drp_dwn_icn').slideUp('slow');
    });
    $('.ftr_bg_clr').change(function(){
        var inputVlu = $(this).val()
        $('.ftr_wppr').css("background-color", inputVlu)
    });
});


