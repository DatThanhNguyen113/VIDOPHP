<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin chuyển hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Billing Details -->

                <div class="billing-details">
                    <div class="form-group">
                        <input class="input" type="text" id="first-name" placeholder="Họ" name="first-name">
                        <p id="excuteFirstName"></p>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" id="last-name" placeholder="Tên" name="last-name">
                        <p id="excuteLastName"></p>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" id="address" placeholder="Địa chỉ" name="address">
                        <p id="excuteAddress"></p>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" id="city" placeholder="Thành phố" name="city">
                        <p id="excuteCity"></p>
                    </div>
                    <div class="form-group">
                        <input class="input" type="tel" id="tel" placeholder="Liên lạc" name="tel">
                        <p id="excuteTel"></p>
                    </div>
                </div>

                <!-- /Billing Details -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary" onclick="excuteBill();">Đồng ý</button>
            </div>
        </div>
    </div>
</div>