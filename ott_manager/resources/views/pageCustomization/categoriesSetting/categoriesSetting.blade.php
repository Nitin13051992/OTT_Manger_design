<div class="ctgrt-stng-wppr ctgry-stng-popup">
<div class="srch-fltr-ctgry">
        <div class="srch-wppr">
            <div class="srch-icn">
                <img src="assets/images/pageCustomization/icon/search.svg" alt="search">
            </div>
            <fieldset>
                <input type="text" placeholder="Search Category" name="text" class="srch-txt-bx">
            </fieldset>
        </div>
        <div class="fltr-cin-wppr">
            <button class="fltr-icn">
                <img src="assets/images/pageCustomization/icon/priority.svg" alt="priority">
            </button>
        </div>
    </div>
    <input type="text" id="headerById" name="headerById">
    <div class="ctgry-lst-itm-wppr">
        <div class="ctgry-lst-itm">
            <div class="ctgry-hdng">
                <h3>Latest & Trending</h3>
                <div class="ctgry-sldr-edt-btn">
                    <button class="edt-btn">...</button>
                    <ul>
                        <li>Horizontal Thumbnail</li>
                        <li>Vertical Thumbnail</li>
                        <li class="ctgry-edt-btn">Category Edit</li>
                    </ul>
                </div>
            </div>
            <div class="ctgry-sld-wppr">
                <div class="ctgry-sldr-bx">
                    <div class="ctgry-sldr owl-carousel owl-theme">
                        <div class="ctgry-sld-itm">
                            <span>
                                <img src="assets/images/pageCustomization/slide-1.png" alt="Slide">
                            </span>
                        </div>
                        <div class="ctgry-sld-itm">
                            <span>
                                <img src="assets/images/pageCustomization/slide-2.png" alt="Slide">
                            </span>
                        </div>
                        <div class="ctgry-sld-itm">
                            <span>
                                <img src="assets/images/pageCustomization/slide-3.png" alt="Slide">
                            </span>
                        </div>
                        <div class="ctgry-sld-itm">
                            <span>
                                <img src="assets/images/pageCustomization/slide-4.png" alt="Slide">
                            </span>
                        </div>
                        <div class="ctgry-sld-itm">
                            <span>
                                <img src="assets/images/pageCustomization/slide-5.png" alt="Slide">
                            </span>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
<div class="ctgrt-stng-wppr srirs-stng-popup">
    <div class="srch-fltr-ctgry">
        <div class="srch-wppr">
            <div class="srch-icn">
            <img src="assets/images/pageCustomization/icon/search.svg" alt="search">
            </div>
            <form method="post" action="">
                @csrf
            <fieldset>
                <input type="text" id="search_cat" placeholder="Search Category" name="text" class="srch-txt-bx">
                <!-- <span class="input-group-addon">
                            <button type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>  
                        </span> -->
            </fieldset>
            </form>
            <div id="result"></div>
        </div>
        <div class="fltr-cin-wppr">
            <button class="fltr-icn">
            <img src="assets/images/pageCustomization/icon/priority.svg" alt="priority">
            </button>
        </div>
    </div>
    <div class="ctgry-lst-itm-wppr">  
        @if(isset($seriesPCThumb))
        @foreach($seriesPCThumb as $datas)
        <div class="ctgry-sirs-sld">
            <div class="title">
                <button type="button" class="sirs-bck-btn"><img src="assets/images/pageCustomization/icon/arrow.svg" alt="" class="arrow"> </button>
                <h3>{{$datas->cat_name}}</h3>                
                <div class="ctgry-sldr-edt-btn d-none">
                    <button class="edt-btn">...</button>
                    <ul>
                        <li class="ser_h">Horizontal Thumbnail</li>
                        <li class="ser_v">Vertical Thumbnail</li>
                        <li class="ctgry-edt-btn">Category Edit</li>
                    </ul>
                </div>
            </div>
            @foreach ($datas->getEntriesRelation->take(1) as $values)
            @if(isset($values->entryThumbnail))
            @if($values->entryThumbnail->ir_id == "6")
            <div class="sirs-itm-wppr">
                <div class="sirs-thmlng-img">
                    <!-- <img src="assets/images/pageCustomization/series-thml.png" alt=""> -->
                    <img src="{{optional($values->entryThumbnail)->host_url .'/'. Auth::user()->publisherID.'/'.optional($values->entryThumbnail)->entryid.'/'.
                    optional($values->entryThumbnail)->img_name}}" alt="Slide">
                </div>
            </div>
            @endif
            @endif
            @endforeach
            <div class="ctgry-lst-itm d-none">
                <div class="ctgry-sld-wppr">
                    <div class="ctgry-sldr-bx">
                        <div class="ctgry-sldr owl-carousel owl-theme">
                        @foreach ($datas->getEntriesRelation as $values)
                        @if(isset($values->entryThumbnail))
                        @if($values->entryThumbnail->ir_id == "6")
                            <div class="ctgry-sld-itm">
                                <span>
                                    <img src="{{optional($values->entryThumbnail)->host_url .'/'. Auth::user()->publisherID.'/'.optional($values->entryThumbnail)->entryid.'/'.
                    optional($values->entryThumbnail)->img_name}}" alt="Slide">
                                    <p></p>
                                </span>
                            </div>
                            @endif
                            @endif
                            @endforeach
                        </div>
                    </div>                    
                </div>
                <div class="edit-sldr-wppr">
                    <div class="edt-hdng">
                        <div class="title">
                            <small>Edit Categories</small>
                            <h6>Popular Shows</h6>
                        </div>
                        <buttton type="button" class="cls-edt-btn">Close</buttton>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif   
    </div>
    <div class="cntnt-ldr-wppr hide-ldng">
        <div class="lodng-gif">
            <img src="assets/images/pageCustomization/loading_gif.gif" alt="loading_gif">
        </div>
    </div>
</div>
@include('pageCustomization.categoriesSetting.script')

