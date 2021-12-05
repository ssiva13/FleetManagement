<!--  Modal content for the above example -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="main-modal" id="main-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm modal-dialog-centered">">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0 text-primary text-center text-capitalize" id="main-modalmodalHeader"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="modalContent"></div>
            <div class="modal-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="float-right"> © {{ date('Y'). ' ' . env('APP_NAME') }} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


{{--<script>--}}
{{--    console.log('fffffffffffffffffff');--}}
{{--    $(`.select2`).select2({--}}
{{--        dropdownParent: $('#main-modal .modal-content')--}}
{{--    });--}}
{{--    console.log('dddddddddd');--}}
{{--</script>--}}
