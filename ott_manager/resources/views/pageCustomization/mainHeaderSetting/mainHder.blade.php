<form id="logoHeaderForm" method="post" name="logoHeaderForm" enctype="multipart/form-data" class="form-horizontal">
<div class="hdr-sctn-wppr">
    <input type="hidden" id="id" name="id">
    <input type="hidden" id="editid" name="id">
    <div class="txt-fld-wppr logo-title">
        <fieldset>
            <label >Text to display left side of navigation</label>
            <input type="text" name="name" id="logo_name" value="" class="text-bx" placeholder="Title">
        </fieldset>
    </div>
    <div class="txt-fld-wppr  logo-uplod">
        <fieldset>
            <label >Upload your logo( Replace left side text)</label>
            <input type="file" name="file" id="photo"  required="true" value="" class="inputfile inputfile-1" accept="image/gif, image/jpeg, image/png" />
            <small for="file-1" id="img_url" class="upld-txt"><span>Upload Logo ( 250x80 Size )</span></small>
        </fieldset>
    </div>
    <div class="txt-fld-wppr logo-title">
        <fieldset>
            <label >Logo size (Change the Size of logo)</label>
            <input type="text" id="logo_size" name="logo_size" class="slider-rang-vlue logo-img-size">
            <div class="slider-range-min logo-img-vlue"></div>
        </fieldset>
    </div>
    <div class="txt-fld-wppr logo-title">
        <fieldset>
            <label >Background  Colour</label>
            <div class="actv-dacv-btn-wppr">
                <input type="checkbox" name="radio" class="rdo-btn bgrd-clr bg-trspnt">
                <label></label>
            </div>
            <input type="text" placeholder="#000" id="bg_color" name="bg_color" value="#000" class="text-bx color_picker bgclr_pickr" >
        </fieldset>
    </div>
    <div class="txt-fld-wppr logo-title">
        <fieldset>
            <label >Backgroud Colour optacity</label>
            <input type="text" id="bg_color_optacity" value="" name="bg_color_optacity" class="slider-rang-vlue bg-clr-opcty">
            <div class="slider-range-min bg-vlu-opcty"></div>
        </fieldset>
    </div>
    <div class="txt-fld-wppr logo-title">
        <fieldset>
            <label >Text  Colour</label>
            <input placeholder="#FFFFFF" type="text" value="#FFFFFF" id="text_color" name="text_color" class="text-bx color_picker txtclr_pickr " >
        </fieldset>
    </div>
    <div class="txt-fld-wppr logo-title">
        <fieldset>
            <label >Text Colour optacity</label>
            <input type="text" id="text_color_optacity" value="" name="text_color_optacity" class="slider-rang-vlue txt-clr-opcty">
            <div class="slider-range-min txt-vlu-opcty"></div>
        </fieldset>
    </div>
    <div class="custm-menu-wppr">
        <div class="title">
            <h6>Menu Text</h6>
        </div>
        <div class="cstm-menu-sld">
            <ul>
				@foreach($headerMenu as $menu)
                <li data-menu-lst="{{$menu->hid??''}}"data-menu-val="{{$menu->header_status}}">
                    <div class="text-flid-wppr" >
                        <input type="text" name="data-menu-lst[]" value="{{$menu->header_name}}"
                         placeholder="Home" class="cstm-menu-txt">
                        <span class="cls-btn"></span>
                        <!-- <input id="Hstatus" type="hidden" name="Hstatus" value="{{$menu->header_status}}"> -->
                    </div>
                    <div class="actv-dacv-btn-wppr">
                        @if($menu->header_status=="1")
                            <input type="checkbox" data-menu-id="{{$menu->hid??''}}" name="radio" class="rdo-btn" checked>
                            @else
                            <input type="checkbox" data-menu-id="{{$menu->hid??''}}" name="radio" class="rdo-btn">
                            @endif
                        <label></label>
                    </div>
                </li>
				@endforeach
            </ul>
        </div>
    </div>
    <div class="hdr-frm-sbmt">
        <div class="add-meu-lst">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </div>
        <div class="frm-sbmt">
            <fieldset>
                <input type="submit" value="Save" class="hdrfrm-sbmt sbmit-btn ">
            </fieldset>
        </div>
    </div>
</div>
</form>
@include('pageCustomization.mainHeaderSetting.script')
