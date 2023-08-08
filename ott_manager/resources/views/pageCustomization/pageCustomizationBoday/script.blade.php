@push('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
    //   $('#saveBtn').click(function(e) {
        $("form#pcBannerForm").submit(function(e) {
            // alert("ammu");
        e.preventDefault();
        var formData = new FormData(this);
       $(this).html('Sending..');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr(
                    'content')
            }
        });
        $.ajax({
            url: "{{ route('page_customization.bannerStore') }}",
            type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
            success: function(data) {
                Swal.fire("Banner Uploaded successfully");
                $("form#pcBannerForm")[0].reset();
                // $('form#logoHeaderForm').reset();
            },
            error: function(data) {
                console.log('Error:', data);
                $('form#pcBannerForm').html('Save Changes');
            }
        });
    });

    // search banner
    $('#searchBanner').on('keyup', function(){
        myFunction();
});
// update banner details

$('.Edt_frm').click(function(e){
    var img_id = $("#img_id").val();
    console.log(img_id)
    e.preventDefault();
    $('.ovrly_wppr').addClass('ovrly-hide');
    setTimeout(function () {
        $('.edt_bnnr_wppr').slideDown('slow')
    }, 500);
    var id = $(this).data('id');
    alert(id);
    let rawURl = '{{ route("pc-slider.edit",":id") }}';
    const url = rawURl.replace(':id', id);
    // alert(url)
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: 'GET',
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: false,
        crossDomain: false,
        success: function(res) {         
            $('#edt_bnnr_wppr').html("Edit Banner Details");
            $('#img_id').val(res.img_id);
            $('#edit_videoType').text(res.theme);
            $('#edit_video_id').val(res.theme);
            console.log('data', res)
            if(res.theme == 'external'){
                $('.vdo_url').slideDown('slow');
                $('.vdo_id').slideUp('slow');
                $('#edit_url').val(res.ventryid);
                $('#edit_ventryid').text("...Select...");
            } else if(res.theme== 'internal'){
                $('.vdo_url').slideUp('slow');
                $('.vdo_id').slideDown('slow');
                $('#edit_ventryid').text(res.ventryid);
                $('#edit_entrid').val(res.ventryid);
            } 
            else{
                $('.vdo_url, .vdo_id').slideUp('slow');
                $('#edit_ventryid').text("...Select...");
            }       
            $('#edit_hdr_id').val(res.header_id);
            $('#edit_description').text(res.slider_msg);
            $('#edit_header_id ~ ul li').each(function(){
                var $This = $(this),
                    ThisVlu = $This.attr('data-val');
                if(ThisVlu == res.header_id){
                    $('#edit_header_id').text($This.text());
                }
            });
        }
    });
});

    // Update Plan
    $('#pcUpdateForm').on('submit', function(e) {
        var id = $('#img_id').val();
        // alert(id);
        e.preventDefault();
        let data = $('#pcUpdateForm').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var urlRaw = '{{ route("pc-slider.update", ":id") }}';
        const url = urlRaw.replace(':id', id)
        // console.log(url);
        $.ajax({
            url: url,
            method: 'PUT',
            data: $('#pcUpdateForm').serialize(),
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                console.log(res);
                if (res.status == 200) {
                    // $('#ajaxModel1').modal('hide');
                    Swal.fire("Slider Details updated Successfully");
                    // table.draw();
                }
            }
        })
    });
// update dates
$('.dateInactive').click(function(){
    var status = $(this).data('val');
    if(status=="0"){
        $(this).parents('.lead-bnnr-img-itm').removeClass('actv_bnnr')
    }    
});
$('.dateActive').click(function(){
    var status = $(this).data('val');
    if(status=="1"){
        $(this).parents('.lead-bnnr-img-itm').addClass('actv_bnnr')
    }    
});

$(".time_edt_wppr").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    var img_id = $("#img_id").val();
    var id = $(this).data('id');
    var $This = $(this),
        inptTxt = $This.parents('.lead-bnnr-img-itm').find('.datepicker');
    // console.log('nitin-aaa', $This)
    inptTxt.addClass('actv_indx');
    $(inptTxt).datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss', 
    });
        
    let rawURl = '{{ route("pc-slider.edit",":id") }}';
    const url = rawURl.replace(':id', id);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: 'GET',
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: false,
        crossDomain: false,
        success: function(res) {         
            console.log(res);
            $('#edit_start_time').val(res.start_time);       
            $('#edit_end_time').val(res.end_time);
        }
    });
    
});
$('.dateActive').on('click', function(e) {
        var id = $(this).attr('data-id');
        var strtDate = $(this).parents('.lead-bnnr-img-itm').children('#editDates').find('#edit_start_time').val();
        var endDate = $(this).parents('.lead-bnnr-img-itm').children('#editDates').find('#edit_end_time').val();
        // alert(id);
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var urlRaw = '{{ route("pc-slider.update", ":id") }}';
        const url = urlRaw.replace(':id', id)
        // console.log(url);
        $.ajax({
            url: url,
            method: 'PUT',
            data: {
                strtDate:strtDate,
                endDate:endDate
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                console.log(res);
                if (res.status == 200) {
                    Swal.fire("Slider Dates Updated");
                }
            }
        })
    });




myFunction();

function myFunction(res) {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = $("#searchBanner");
  filter = input.val();
  table = $(".mdia-itm-wppr");
  tr = $(".col-4");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("p")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";      
        if (tr.length == 0) {
            alert('if')
        }
        
      }
    //   $('.mdia-itm-wppr').append("<div class='nt-fnt-dt display-flex align-items-center justify-content-center'> <h5> No Result Found !!! </h5> </div>")
      
    }
    
  }
  
}
   </script>


<!-- Amrita code start -->




@endpush
