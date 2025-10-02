@extends('layouts.app')

@section('content')
<h2>Chọn ghế cho suất chiếu: {{ $suatchieu->phim->TenPhim }} (Phòng: {{ $suatchieu->phongChieu->TenPhong }})</h2>

@if(session('error'))
    <div style="color: red;">{{ session('error') }}</div>
@endif

<form method="POST" action="{{ route('customer.ghe.chon', $suatchieu->MaSuatChieu) }}">
    @csrf
    <div id="ghe-container" style="margin-bottom: 20px;">
        @php
            // Nhóm ghế theo hàng (chữ cái đầu)
            $groupedGhe = [];
            foreach($danhSachGhe as $ghe) {
                $row = preg_replace('/\d+/', '', $ghe); // lấy chữ cái đầu
                $groupedGhe[$row][] = $ghe;
            }
        @endphp

        @foreach($groupedGhe as $row => $ghes)
            <div style="margin-bottom: 5px;">
                @foreach($ghes as $soGhe)
                    @php
                        $isBooked = in_array($soGhe, $vedat);
                    @endphp
                    <button 
                        type="button"
                        class="ghe-btn {{ $isBooked ? 'booked' : '' }}"
                        data-ghe="{{ $soGhe }}"
                        {{ $isBooked ? 'disabled' : '' }}
                    >
                        {{ $soGhe }}
                    </button>
                @endforeach
            </div>
        @endforeach
    </div>

    <button type="submit">Xác nhận ghế</button>
</form>

<style>
.ghe-btn {
    width: 40px;
    height: 40px;
    margin: 2px;
    border: 1px solid #333;
    border-radius: 5px;
    background-color: #4CAF50; /* xanh trống */
    color: white;
    cursor: pointer;
}

.ghe-btn.booked {
    background-color: #888; /* xám đã đặt */
    cursor: not-allowed;
}

.ghe-btn.selected {
    background-color: #e74c3c; /* đỏ ghế đang chọn */
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.ghe-btn');
    let selectedGhe = [];

    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            const ghe = this.dataset.ghe;
            if (this.classList.contains('selected')) {
                this.classList.remove('selected');
                selectedGhe = selectedGhe.filter(g => g !== ghe);
            } else {
                this.classList.add('selected');
                selectedGhe.push(ghe);
            }
        });
    });

    document.querySelector('form').addEventListener('submit', function(e) {
        const form = e.target;
        // Xóa input cũ
        const oldInputs = form.querySelectorAll('input[name="chon_ghe[]"]');
        oldInputs.forEach(i => i.remove());
        // Tạo input mới cho từng ghế
        selectedGhe.forEach(ghe => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'chon_ghe[]';
            input.value = ghe;
            form.appendChild(input);
        });
        if(selectedGhe.length === 0) {
            e.preventDefault();
            alert('Bạn chưa chọn ghế!');
        }
    });
});
</script>
@endsection
