<!-- Modal -->
<div class="modal fade" id="confirm<?= $index ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirm<?= $index ?>" aria-hidden="true"  data-bs-theme="dark">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5 text-light text-center" id="confirm<?= $index ?>"><i class="fa">Appointment</i></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-success bg-gradient p-4">
                <h4 class="text-white text-center"><i class="fa fa-circle-check"> Are you sure you want to confirm this appointment?</i></h4>

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn bg-dark bg-gradient text-white shadow" data-bs-dismiss="modal">Close</button>
                    <button name="btnConfirm" class="btn bg-primary bg-gradient text-white shadow" value="<?= $item->appoint_id ?>">Proceed Confirmation</button>
                </form>
            </div>
        </div>
    </div>
</div>