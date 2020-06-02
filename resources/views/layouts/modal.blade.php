<div class="modal fade" id="addModal" tabindex='-1' role='dialog' aria-labeledby='modalLabel' aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header text-center">
            <div class="modal-title font-weight-bolder w-100"  style='font-size:18px' id="modalLabel">{{$title}}</div>
            <button type="button" class="close" data-dismiss="modal" aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
        </div>
            @yield('modal')

        </div>
    </div>
</div>
