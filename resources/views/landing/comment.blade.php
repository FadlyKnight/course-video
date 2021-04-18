<style>

.mt-100 {
    margin-top: 100px
}

.mb-100 {
    margin-bottom: 100px
}

.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid transparent;
    border-radius: 0px
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem
}

.card .card-title {
    position: relative;
    font-weight: 600;
    margin-bottom: 10px
}

.comment-widgets {
    position: relative;
    margin-bottom: 10px
}

.comment-widgets .comment-row {
    border-bottom: 1px solid transparent;
    padding: 14px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin: 10px 0
}

.p-2 {
    padding: 0.5rem !important
}

.comment-text {
    padding-left: 15px
}

.w-100 {
    width: 100% !important
}

.m-b-15 {
    margin-bottom: 15px
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.76563rem;
    line-height: 1.5;
    border-radius: 1px
}

.btn-cyan {
    color: #fff;
    background-color: #27a9e3;
    border-color: #27a9e3
}

.btn-cyan:hover {
    color: #fff;
    background-color: #1a93ca;
    border-color: #198bbe
}

.comment-widgets .comment-row:hover {
    background: rgba(0, 0, 0, 0.05)
}
</style>
<div class="row d-flex justify-content-center">
    <div class="col-lg-6">
        <div class="error"></div>
        <form action="#" method="post" id="form-diskusi" class="text-right">
            @csrf
            <textarea name="komentar" style="height: 150px;" id="komentar" class="form-control"></textarea>
            <div style="height: 20px"></div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">Umpan Diskusi</h4>
            </div>
            <div class="comment-widgets" style="overflow-y: scroll; height: 400px;">
                <!-- Comment Row -->

                <!-- Comment Row -->
            </div> <!-- Card -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "{{ route('diskusi.index', encrypt($video->id) ) }}",
            dataType: "json",
            encode: true,
        }).done(function (data) {
            
            if(data.status){
                let newData = data.data;
                let commentHtml = `Tidak ada diskusi`;
                if(newData.length > 0)
                {
                    commentHtml = newData.map(d => {
                        let btnDelete = '';
                        if(d.canDelete){
                            btnDelete = `<button type="button" class="btn btn-danger btn-sm delete-comment" data-comment="${d.id}" >Delete</button> </div>`;
                        }
                        html = `<div class="d-flex flex-row comment-row m-t-0 comment-id-${d.id}">
                                <div class="p-2"><img src="{{ asset('style/assets/img/avatar/avatar-1.png') }}" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">${d.name}</h6> <span class="m-b-15 d-block">${d.komentar}</span>
                                    <div class="comment-footer"> <span class="text-muted float-right">${d.date_human}</span> 
                                        ${btnDelete}
                                </div>
                            </div>`;
                        return html;
                    });
                }
                $('.comment-widgets').html(commentHtml);
            } else {
                $('.error').html(`<div class="alert alert-danger">${data.msg}</div>`);
            }

        }).fail(function (err) {
            $('.error').html(`<div class="alert alert-danger">${data.msg}</div>`);
        });

        $("form#form-diskusi").submit(function (event) {
            var formData = {
                _token : "{{ csrf_token() }}",
                komentar: $("#komentar").val(),
            };

            $.ajax({
                type: "POST",
                url: "{{ route('diskusi.store', encrypt($video->id) ) }}",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function (data) {
                if(data.status)
                {
                    let d = data.data;
                        let btnDelete = '';
                        if(d.canDelete){
                            btnDelete = `<button type="button" class="btn btn-danger btn-sm delete-comment" data-comment="${d.id}" >Delete</button> </div>`;
                        }
                        html = `<div class="d-flex flex-row comment-row m-t-0 comment-id-${d.id}">
                                <div class="p-2"><img src="{{ asset('style/assets/img/avatar/avatar-1.png') }}" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">${d.name}</h6> <span class="m-b-15 d-block">${d.komentar}</span>
                                    <div class="comment-footer"> <span class="text-muted float-right">${d.date_human}</span> 
                                        ${btnDelete}
                                </div>
                            </div>`;

                    $('.comment-widgets').prepend(html);
                    $('#komentar').val('');
                } else {
                    $('.error').html(`<div class="alert alert-danger">${data.msg}</div>`);
                }

            }).fail(function (err) {
                $('.error').html(`<div class="alert alert-danger">Something Error ::err::</div>`);
            });
            
            // alert("Thank you for your comment!");
            event.preventDefault();
        });

        $(".comment-widgets").on("click", "button.delete-comment", function(){
            // alert($(this).data('comment'));
            let id_comment = $(this).data('comment');
            $.ajax({
                type: "POST",
                data: {
                    id : id_comment, 
                    _token : "{{ csrf_token() }}"
                },
                url: "{{ route('diskusi.destroy') }}",
                dataType: "json",
                encode: true,
            }).done(function(data){
                if (data.status) {
                    $('.comment-id-'+id_comment).remove();
                } else {   
                    $('.error').html(`<div class="alert alert-danger">${data.msg}</div>`);
                }
            }).fail(function(data){
                $('.error').html(`<div class="alert alert-danger">Something Error ::err::</div>`);
            });
        });
        

    });

    
</script>