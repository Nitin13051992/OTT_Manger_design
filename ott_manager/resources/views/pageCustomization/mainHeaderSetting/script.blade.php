@push('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
    //   $('#saveBtn').click(function(e) {
       /* $("form#logoHeaderForm").submit(function(e) {
        e.preventDefault();
        // var formData = new FormData(this);
    //    $(this).html('Sending..');
    e.preventDefault();
        let data = $('#logoHeaderForm').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr(
                    'content')
            }
        });
        var urlRaw = '{{ route("page_customization.update", ":id") }}';
        const url = urlRaw.replace(':id', id)
        $.ajax({
        url: url,
        type: 'PUT',
        data: data,
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
            success: function(data) {
                Swal.fire("Logo Uploaded successfully");
                $('form#logoHeaderForm').html();
                // $('form#logoHeaderForm').reset();
            },
            error: function(data) {
                console.log('Error:', data);
                $('form#logoHeaderForm').html();
            }
        });
    });
*/
$("form#logoHeaderForm").submit(function(e) {
        e.preventDefault();
        const menu_names = $('.cstm-menu-txt').map(function(_,el){
          return {
            'id':(typeof el.dataset.menucode != 'undefined')?el.dataset.menucode:'NULL',
            'value':el.value,
          };
        }).get();
        let data = new FormData();
        // data.append('file', $('#file')[0].files[0]);
        data.append('menu_names',JSON.stringify(menu_names))
    //    let data = $('#logoHeaderForm').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var urlRaw = '{{ route("page_customization.update", ":id") }}';
        const url = urlRaw.replace(':id', 1)

        $.ajax({
            url: url,
            method: 'POST',
            data:data,
            cache:false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                console.log(res);
                if (res.status == 200) {
                    // $('#logoHeaderForm').reset();
                    // Swal.fire("Plan Details updated Successfully");
                    // table.draw();
                }
            }
        })
    });
    // Start ----- Edit fetch Plan
    $('body').on('click', '.stng-btn', function(e) {
        e.preventDefault();
        var id = $(this).attr("id");
        var values = $("input[name^='data-menu-lst']").map(function (idx, ele) {
   return $(ele).val();
}).get();
console.log(values);

        let rawURl = '{{ route("page_customization.edit",":id") }}';
        const url = rawURl.replace(':id', id);
        let data = $('form#logoHeaderForm').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: url,
            data:data,
            method: 'GET',
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            cache: false,
            crossDomain: false,
            success: function(data) {
                $('#editid').val(data.id);
                $('#logo_name').val(data.name);
                $('.upld-txt').text(data.original_url_logo);
                $('#logo_size').val(data.logo_size);
                $('#photo').text(data.original_url_logo);
                $('#bg_color').val(data.bg_color);
                $('#bg_color_optacity').val(data.bg_color_optacity);
                $('#text_color').val(data.text_color);
                $('#text_color_optacity').val(data.text_color_optacity);
                $('#data-menu-lst').attr('href',data.values);
            }
        });
    });
    $('body').on('click', '.bg-trspnt', function() {
        var header_status = $(this).prop('checked') == true ? 1 : 0;
        var hid = $(this).data('menu-id');
        alert(header_status);
        var Status = confirm("Are You sure want to Change Status !");
        // alert(Status);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{route('header_menu_status')}}",
            data: {
                header_status: header_status,
                hid: hid,
            },
            success: function(data) {
                // var data = data.res;
                console.log(data);
                    Swal.fire("Header Menu updated Successfully");
                // table.draw();
            }
        });
    })
   </script>
@endpush
