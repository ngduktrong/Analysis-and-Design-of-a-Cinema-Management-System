<!DOCTYPE html>
<html lang="vi">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quản lý nhân viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Tông màu chủ đạo đen trắng cổ điển */
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #34495e;
        --accent-color: #7f8c8d;
        --light-color: #ecf0f1;
        --dark-color: #2c3e50;
        --success-color: #27ae60;
        --warning-color: #f39c12;
        --danger-color: #e74c3c;
    }

    body {
        background-color: #f8f9fa;
        color: #333;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
    }

    .container-fluid {
        padding: 20px;
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Header và tiêu đề */
    h1 {
        color: var(--primary-color);
        font-weight: 600;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--accent-color);
    }

    h4 {
        color: var(--secondary-color);
        font-weight: 500;
        margin-bottom: 1.2rem;
    }

    /* Nút quay lại Dashboard */
    .btn-outline-secondary {
        border-color: var(--accent-color);
        color: var(--secondary-color);
        transition: all 0.3s ease;
        margin-bottom: 1.5rem;
        padding: 0.5rem 1.2rem;
        font-weight: 500;
    }

    .btn-outline-secondary:hover {
        background-color: var(--secondary-color);
        color: white;
        border-color: var(--secondary-color);
    }

    /* Container cho form và danh sách */
    .form-container, .list-container {
        background: white;
        padding: 25px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        border: 1px solid #e1e5e9;
    }

    /* Form elements */
    .form-label {
        font-weight: 500;
        color: var(--secondary-color);
        margin-bottom: 0.5rem;
    }

    .form-control, .form-select {
        border: 1px solid #dce1e5;
        border-radius: 4px;
        padding: 0.6rem 0.75rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 0.2rem rgba(127, 140, 141, 0.25);
    }

    .form-text {
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    /* Table styling */
    .table {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
    }

    .table th {
        background-color: var(--primary-color);
        color: white;
        font-weight: 500;
        padding: 0.85rem 0.75rem;
        border: none;
    }

    .table td {
        padding: 0.75rem;
        vertical-align: middle;
        border-bottom: 1px solid #e9ecef;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.04);
    }

    /* Badge styling */
    .badge {
        font-size: 0.75rem;
        padding: 0.35em 0.65em;
        font-weight: 500;
    }

    .bg-danger { background-color: var(--danger-color) !important; }
    .bg-warning { background-color: var(--warning-color) !important; }
    .bg-info { background-color: var(--accent-color) !important; }

    /* Button styling */
    .btn {
        border-radius: 4px;
        font-weight: 500;
        padding: 0.5rem 1rem;
        transition: all 0.2s ease;
    }

    .btn-success {
        background-color: var(--success-color);
        border-color: var(--success-color);
    }

    .btn-success:hover {
        background-color: #219653;
        border-color: #219653;
    }

    .btn-warning {
        background-color: var(--warning-color);
        border-color: var(--warning-color);
        color: white;
    }

    .btn-warning:hover {
        background-color: #e67e22;
        border-color: #e67e22;
        color: white;
    }

    .btn-danger {
        background-color: var(--danger-color);
        border-color: var(--danger-color);
    }

    .btn-danger:hover {
        background-color: #c0392b;
        border-color: #c0392b;
    }

    .btn-secondary {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
    }

    .btn-secondary:hover {
        background-color: #6c7a7d;
        border-color: #6c7a7d;
    }

    /* Action buttons in table */
    .table .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
        margin: 0 2px;
    }

    /* Alert container */
    .alert-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .container-fluid {
            padding: 15px;
        }
        
        .form-container, .list-container {
            padding: 15px;
        }
        
        .btn {
            width: 100%;
            margin-bottom: 10px;
        }
        
        .table .btn-sm {
            width: auto;
            margin-bottom: 0;
        }
    }

    /* Additional spacing and visual improvements */
    .mb-3 {
        margin-bottom: 1.2rem !important;
    }

    .mb-4 {
        margin-bottom: 2rem !important;
    }

    .text-center {
        text-align: center;
    }

    
    .btn:focus, .form-control:focus, .form-select:focus {
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.25);
    }
</style>
</head>
<body>
    <div class="alert-container" id="alertContainer"></div>
    
    <div class="container-fluid">
        <h1 class="text-center mb-4">Quản lý nhân viên</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary mb-3">
            ← Quay lại Dashboard
        </a>
        
        <div class="row">
            <!-- Ô thêm/sửa nhân viên -->
            <div class="col-md-6">
                <div class="form-container">
                    <h4 id="form-title">Thêm nhân viên</h4>
                    <form id="nhanvien-form">
                        @csrf
                        <div id="form-fields">
                            <div class="mb-3">
                                <label for="MaNguoiDung" class="form-label">Mã người dùng *</label>
                                <input type="text" class="form-control" id="MaNguoiDung" name="MaNguoiDung" required>
                                <div class="form-text" id="ma-nguoi-dung-check"></div>
                            </div>
                            <div class="mb-3">
                                <label for="ChucVu" class="form-label">Chức vụ *</label>
                                <input type="text" class="form-control" id="ChucVu" name="ChucVu" required>
                            </div>
                            <div class="mb-3">
                                <label for="Luong" class="form-label">Lương *</label>
                                <input type="number" class="form-control" id="Luong" name="Luong" min="0" step="0.01" required>
                            </div>
                            <div class="mb-3">
                                <label for="VaiTro" class="form-label">Vai trò *</label>
                                <select class="form-select" id="VaiTro" name="VaiTro" required>
                                    <option value="">Chọn vai trò</option>
                                    <option value="Admin">Admin</option>
                                    <option value="QuanLy">Quản lý</option>
                                    <option value="ThuNgan">Thu ngân</option>
                                    <option value="BanVe">Bán vé</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" id="submit-btn">Thêm nhân viên</button>
                        <button type="button" class="btn btn-secondary" id="cancel-btn" style="display: none;">Hủy</button>
                    </form>
                </div>
            </div>

            <!-- Ô danh sách nhân viên -->
            <div class="col-md-6">
                <div class="list-container">
                    <h4>Danh sách nhân viên</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Mã NV</th>
                                    <th>Họ tên</th>
                                    <th>Chức vụ</th>
                                    <th>Lương</th>
                                    <th>Vai trò</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nhanViens as $nv)
                                <tr>
                                    <td>{{ $nv->MaNguoiDung }}</td>
                                    <td>{{ $nv->nguoiDung->HoTen ?? 'N/A' }}</td>
                                    <td>{{ $nv->ChucVu }}</td>
                                    <td>{{ number_format($nv->Luong, 0, ',', '.') }} VNĐ</td>
                                    <td>
                                        <span class="badge bg-{{ $nv->VaiTro == 'Admin' ? 'danger' : ($nv->VaiTro == 'QuanLy' ? 'warning' : 'info') }}">
                                            {{ $nv->VaiTro }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning edit-btn" data-id="{{ $nv->MaNguoiDung }}">Sửa</button>
                                        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $nv->MaNguoiDung }}">Xóa</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
    let isEditMode = false;
    let currentEditId = null;

    // CSRF setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Hiển thị thông báo
    function showAlert(message, type = 'success') {
        const alertHtml = `
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        $('#alertContainer').html(alertHtml);
        setTimeout(() => {
            $('.alert').alert('close');
        }, 5000);
    }

    // Kiểm tra mã người dùng tồn tại - SỬA LẠI
    $('#MaNguoiDung').on('blur', function() {
        const maNguoiDung = $(this).val();
        if (maNguoiDung) {
            const checkUrl = '{{ route("admin.nhanvien.check", ["maNguoiDung" => "__ID__"]) }}'.replace('__ID__', maNguoiDung);
            
            $.ajax({
                url: checkUrl,
                type: 'GET',
                success: function(response) {
                    if (response.exists) {
                        if (response.isAlreadyEmployee) {
                            $('#ma-nguoi-dung-check').html('<span class="text-warning">⚠ Người dùng này đã là nhân viên</span>');
                        } else {
                            $('#ma-nguoi-dung-check').html('<span class="text-success">✓ Mã người dùng tồn tại</span>');
                        }
                    } else {
                        $('#ma-nguoi-dung-check').html('<span class="text-danger">✗ Mã người dùng không tồn tại</span>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error checking user:', error);
                    $('#ma-nguoi-dung-check').html('<span class="text-danger">❌ Lỗi kiểm tra mã người dùng</span>');
                }
            });
        } else {
            $('#ma-nguoi-dung-check').empty();
        }
    });

    // Xử lý submit form - SỬA LẠI
    $('#nhanvien-form').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        let url, method;

        if (isEditMode) {
            url = '{{ route("admin.nhanvien.update", ["id" => "__ID__"]) }}'.replace('__ID__', currentEditId);
            method = 'PUT';
            formData.append('_method', 'PUT');
        } else {
            url = '{{ route("admin.nhanvien.store") }}';
            method = 'POST';
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                showAlert(response.success, 'success');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    if (errors) {
                        let errorMessage = '';
                        for (const field in errors) {
                            errorMessage += errors[field][0] + '\n';
                        }
                        showAlert(errorMessage, 'danger');
                    }
                } else if (xhr.responseJSON && xhr.responseJSON.error) {
                    showAlert(xhr.responseJSON.error, 'danger');
                } else {
                    showAlert('Có lỗi xảy ra! Vui lòng thử lại.', 'danger');
                }
            }
        });
    });

    // Sửa nhân viên - SỬA LẠI
    $('.edit-btn').on('click', function() {
        const id = $(this).data('id');
        const editUrl = '{{ route("admin.nhanvien.edit", ["id" => "__ID__"]) }}'.replace('__ID__', id);
        
        $.ajax({
            url: editUrl,
            type: 'GET',
            success: function(response) {
                if (response.error) {
                    showAlert(response.error, 'danger');
                    return;
                }
                
                isEditMode = true;
                currentEditId = id;
                
                $('#form-title').text('Sửa nhân viên');
                $('#MaNguoiDung').val(response.MaNguoiDung).prop('readonly', true);
                $('#ChucVu').val(response.ChucVu);
                $('#Luong').val(response.Luong);
                $('#VaiTro').val(response.VaiTro);
                $('#submit-btn').text('Cập nhật nhân viên');
                $('#cancel-btn').show();
                $('#ma-nguoi-dung-check').html('<span class="text-info">📝 Chế độ chỉnh sửa</span>');
            },
            error: function(xhr, status, error) {
                console.error('Error loading employee:', error);
                showAlert('Lỗi khi tải thông tin nhân viên!', 'danger');
            }
        });
    });

    // Xóa nhân viên - SỬA LẠI
    $('.delete-btn').on('click', function() {
        if (confirm('Bạn có chắc chắn muốn xóa nhân viên này?')) {
            const id = $(this).data('id');
            const deleteUrl = '{{ route("admin.nhanvien.destroy", ["id" => "__ID__"]) }}'.replace('__ID__', id);
            
            $.ajax({
                url: deleteUrl,
                type: 'POST',
                data: {
                    _method: 'DELETE'
                },
                success: function(response) {
                    showAlert(response.success, 'success');
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting employee:', error);
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        showAlert(xhr.responseJSON.error, 'danger');
                    } else {
                        showAlert('Lỗi khi xóa nhân viên!', 'danger');
                    }
                }
            });
        }
    });


        function resetForm() {
            isEditMode = false;
            currentEditId = null;
            $('#form-title').text('Thêm nhân viên');
            $('#nhanvien-form')[0].reset();
            $('#MaNguoiDung').prop('readonly', false);
            $('#submit-btn').text('Thêm nhân viên');
            $('#cancel-btn').hide();
            $('#ma-nguoi-dung-check').empty();
        }
    });
    </script>
</body>
</html>