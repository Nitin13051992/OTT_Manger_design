<div class="bnnr-slidr-itm-wppr">
    @foreach($bannerImg as $img)
    <!-- {{$img}} -->
    <div class="lead-bnnr-img-itm actv_bnnr">
        <div class="bnnr-title-wpprr">
            <img src="assets/images/pageCustomization/icon/image-icn.svg" alt="Image Icon" class="img-icn">
            <div class="title">
                <p>{{$img->img_name}}</p>
            </div>
            <div class="img-ctgry-btn">
                <button type="button" class="ctgry-btn"> ... </button>
                <div class="ctgry-btn-lst">
                    <ul>
                        <li class="Edt_frm"data-id="{{$img->img_id}}">Edit</li>
                        <li class="time_edt_wppr" data-id="{{$img->img_id}}"id="editRelaseDate">Set Schedule </li>
                        <li><input type="submit" data-id="{{$img->img_id}}" data-val="{{$img->img_status}}" id="dateSubmit" class="dateActive" value="Active"></li>
                        <!-- <li><a href="javascript:void(0)" class="time_edt_wppr" data-id="{{$img->img_id}}"id="editRelaseDate">Edit</a></li> -->
                        <li><input type="submit" data-id="{{$img->img_id}}" data-val="{{$img->img_status}}" id="dateInactive" class="dateInactive" value="Inactive"></li>
                    </ul>
                </div>
            </div>            
        </div>
        <div class="lead-bnner-img-bx">
            <img src="{{$img->host_url . $img->img_url}}" alt="">
            <button type="button" class="cls-img-sld">+</button>
        </div>
        <form id="editDates" name="editDates"method="post">
        <div class="bnnr-time-durtn-wppr">
            <div class="title">
                <input placeholder="Release Date" value="{{$img->start_time}}" class="datepicker" id="edit_start_time" name="start_time" autocomplete="off">                
            </div>
            <div class="title">
                <input placeholder="Expiration Date" value="{{$img->end_time}}" class="datepicker" id="edit_end_time" name="end_time" autocomplete="off">
            </div>
        </div>
        </form>
    </div>
    @endforeach
</div>
<div class="add-bnnr-btn-wppr">
    <button class="add-bnnr-btn"> + Add Banner</button>
</div>
