<div class="hidden col-span-full row-span-2 w-full mt-6 border-t border-t-gray-300 peer-has-[:checked]:block animate-[opacityIn_.3s_linear]">
    <div class="w-full table table-fixed border-collapse">
        <div class="w-full table-row-group">
            <div class="table-row w-full border-b border-gray-300 py-6 bg-yellow-200/40">
                <div class="table-cell w-[calc(100%/(22/2))]"></div>
                <div class="table-cell py-6 font-medium text-center">Mã đơn hàng</div>
                <div class="table-cell py-6 font-medium text-center">Khách hàng</div>
                <div class="table-cell py-6 font-medium text-center">Số lượng</div>
                <div class="table-cell py-6 font-medium text-center">Tổng</div>
                <div class="table-cell py-6 font-medium text-center">Địa chỉ</div>
                <div class="table-cell py-6 font-medium text-center">Trạng thái</div>
                <div class="table-cell w-[calc(100%/(22/2))]"></div>
            </div>
        </div>
        <div class="w-full table-row-group">
            <div class="w-full table-row border-b last:border-b-0 border-b-gray-300">
                <div class="table-cell w-[calc(100%/(22/2))]"></div>
                <div class="text-center pt-6 table-cell" colspan="3">
                    1
                </div>
                <div class="text-center pt-6 table-cell" colspan="3">
                    <a href="/admin/account/edit/1" class="text-blue-500 hover:underline">Nguyễn Văn A</a>
                </div>
                <div class="text-center pt-6 table-cell" colspan="3">1</div>
                <div class="text-center pt-6 table-cell" colspan="3">20.000đ</div>
                <div class="text-center pt-6 table-cell" colspan="3">
                    123, Đường ABC, Quận XYZ, TP. HCM
                </div>
                <div class="text-gray-500 font-medium px-2 table-cell" colspan="3">
                    <select name="status" id="status" class="w-full h-8 px-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-400">
                        <option value="1">Chờ xác nhận</option>
                        <option value="2">Đang vận chuyển</option>
                        <option value="3">Đã giao hàng</option>
                        <option value="4">Đã hủy</option>
                    </select>
                </div>
                <div class="px-2 table-cell w-[calc(100%/(22/2))]">
                    <button class="w-full h-10 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors duration-300">Lưu</button>
                </div>
            </div>
        </div>
    </div>
</div>