<!-- Deleted Promotion Student -->
<div class="modal fade" id="Delete_All" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Students_trans.Delete_attachment') }}</h5>

            </div>
            <div class="modal-body">
                <form action="{{ route('Promotions.destroy', $promotion->id) }}" method="post">
                    @csrf
                    @method('DELETE')



                    <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('Students_trans.back_promotions_update') }}
                    </h5>

                    <input type="hidden" name="page_id" value="1">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('Students_trans.Close') }}</button>
                        <button class="btn btn-danger">{{ trans('Students_trans.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
