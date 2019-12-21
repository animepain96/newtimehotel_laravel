<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Bạn phải chấp nhận.',
    'active_url' => 'Không phải địa chỉ khả dụng.',
    'after' => 'Vui lòng chọn sau ngày :date.',
    'after_or_equal' => 'Vui lòng chọn từ ngày :date.',
    'alpha' => ':attribute chỉ chứa kí tự.',
    'alpha_dash' => ':attribute chỉ chứa kí tự, số hoặc kí tự đặc biệt.',
    'alpha_num' => ':attribute chỉ chứa chữ số và chữ cái.',
    'array' => ':attribute phải là một mảng.',
    'before' => ':attribute phải là ngày trước ngày :date.',
    'before_or_equal' => ':attribute phải là ngày hoặc trước ngày :date.',
    'between' => [
        'numeric' => ':attribute có giá trị trong :min và :max.',
        'file' => ':attribute có giá trị trong :min và :max KB.',
        'string' => ':attribute có giá trị trong :min và :max kí tự.',
        'array' => ':attribute có giá trị trong :min và :max tập tin.',
    ],
    'boolean' => ':attribute có giá trị đúng hoặc sai.',
    'confirmed' => ':attribute chưa được xác nhận.',
    'date' => ':attribute phải là ngày.',
    'date_equals' => ':attribute phải là ngày có giá trị :date.',
    'date_format' => ':attribute không đúng định dạng :format.',
    'different' => ':attribute phải khác :other.',
    'digits' => ':attribute phải là :digits kí tự.',
    'digits_between' => ':attribute phải nằm giữa :min và :max kí tự.',
    'dimensions' => ':attribute có kích thước không phù hợp.',
    'distinct' => ':attribute đã bị trùng giá trị.',
    'email' => ':attribute không đúng định dạng email.',
    'ends_with' => ':attribute phải kết thúc bằng: :values',
    'exists' => ':attribute được chọn không đúng.',
    'file' => ':attribute phải là tập tin.',
    'filled' => ':attribute phải có giá trị.',
    'gt' => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file' => ':attribute phải lớn hơn :value KB.',
        'string' => ':attribute phải lớn hơn :value kí tự.',
        'array' => ':attribute phải lớn hơn :value tập tin.',
    ],
    'gte' => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'file' => ':attribute phải lớn hơn hoặc bằng :value KB.',
        'string' => ':attribute phải lớn hơn hoặc bằng :value kí tự.',
        'array' => ':attribute phải lớn hơn hoặc bằng :value tập tin.',
    ],
    'image' => ':attribute phải là hình ảnh.',
    'in' => ':attribute được chọn không đúng.',
    'in_array' => ':attribute không tồn tại trong :other.',
    'integer' => ':attribute phải là số nguyên.',
    'ip' => ':attribute phải là địa chỉ IP hợp lệ.',
    'ipv4' => ':attribute phải là địa chỉ IPV4.',
    'ipv6' => ':attribute phải là địa chỉ IPV6.',
    'json' => ':attribute phải là chuỗi định dạng JSON.',
    'lt' => [
        'numeric' => ':attribute phải nhỏ hơn :value.',
        'file' => ':attribute phải nhỏ hơn :value KB.',
        'string' => ':attribute phải nhỏ hơn :value kí tự.',
        'array' => ':attribute phải nhỏ hơn :value tập tin.',
    ],
    'lte' => [
        'numeric' => ':attribute phải bằng hoặc nhỏ hơn :value.',
        'file' => ':attribute phải bằng hoặc nhỏ hơn :value KB.',
        'string' => ':attribute phải bằng hoặc nhỏ hơn :value kí tự.',
        'array' => ':attribute phải bằng hoặc nhỏ hơn :value tập tin.',
    ],
    'max' => [
        'numeric' => ':attribute phải nhỏ hơn :max.',
        'file' => ':attribute phải nhỏ hơn :max KB.',
        'string' => ':attribute phải nhỏ hơn :max kí tự.',
        'array' => ':attribute phải nhỏ hơn :max tập tin.',
    ],
    'mimes' => ':attribute phải là tập tin có kiểu: :values.',
    'mimetypes' => ':attribute phải là tập tin có kiểu: :values.',
    'min' => [
        'numeric' => ':attribute phải lớn hơn :min.',
        'file' => ':attribute phải lớn hơn :min KB.',
        'string' => ':attribute phải lớn hơn :min kí tự.',
        'array' => ':attribute phải lớn hơn :min tập tin.',
    ],
    'not_in' => ':attribute được chọn không đúng.',
    'not_regex' => ':attribute không đúng định dạng.',
    'numeric' => ':attribute phải là số.',
    'password' => 'Mật khẩu không đúng.',
    'present' => ':attribute phải có giá trị.',
    'regex' => ':attribute không đúng định dạng.',
    'required' => ':attribute phải có giá trị.',
    'required_if' => ':attribute phải có giá trị khi :other là :value.',
    'required_unless' => ':attribute phải có giá trị nếu :other không là :values.',
    'required_with' => ':attribute phải có giá trị khi :values có giá trị.',
    'required_with_all' => ':attribute phải có giá trị khi :values có giá trị.',
    'required_without' => ':attribute phải có giá trị khi :values không có giá trị.',
    'required_without_all' => ':attribute phải có giá trị khi :values không có giá trị.',
    'same' => ':attribute và :other không khớp.',
    'size' => [
        'numeric' => ':attribute phải có kích cỡ :size.',
        'file' => ':attribute phải có kích cỡ :size KB.',
        'string' => ':attribute phải có kích cỡ :size kí tự.',
        'array' => ':attribute phải có kích cỡ :size tập tin.',
    ],
    'starts_with' => ':attribute phải bắt đầu bằng: :values',
    'string' => ':attribute phải là chuỗi kí tự.',
    'timezone' => ':attribute phải là múi giờ hợp lệ.',
    'unique' => ':attribute đã có người sử dụng.',
    'uploaded' => ':attribute không thể tải lên.',
    'url' => ':attribute phải là địa chỉ Web hợp lệ.',
    'uuid' => ':attribute phải là UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'avarta' => 'Avatar',
        'email' => 'Địa chỉ Email',
        'tendangnhap' => 'Tên đăng nhập',
        'matkhau' => 'Mật khẩu',
        'dienthoai' => 'Số điện thoại',
        'hoten' => 'Họ tên',
        'ngaysinh' => 'Ngày sinh',
        'gioitinh' => 'Giới tính',
        'diachi' => 'Địa chỉ',
        'tinh' => 'Tỉnh',
        'thanhpho' => 'Thành phố',
        'xacnhan' => 'Xác nhận mật khẩu',
        'noidung' => 'Nội dung',
        'tieude' => 'Tiêu đề',
        'batdau' => 'Ngày bắt đầu',
        'ketthuc' => 'Ngày kết thúc',
        'trangthaithue' => 'Trạng thái thuê',
        'ghichu' => 'Ghi chú',
        'tenphong' => 'Tên phòng',
        'tienich' => 'Tiện ích',
        'songuoilon' => 'Số người lớn',
        'sotreem' => 'Số trẻ em',
        'dientich' => 'Diện tích',
        'sogiuong' => 'Số giường',
        'loaiphong' => 'Loại phòng',
        'vitri' => 'Vị trí',
        'hoatdong' => 'Hoạt động',
        'kichhoat' => 'Kích hoạt',
        'hinhdaidien' => 'Ảnh hiển thị',
        'anhmota' => 'Ảnh mô tả',
        'gia' => 'Giá',
        'mota' => 'Mô tả',
        'lienket' => 'Liên kết',
        'urlanh' => 'Ảnh',
        'loaitin' => 'Loại tin',
        'anhdaidien' => 'Ảnh hiển thị',
        'ten' => 'Tên',
    ],

];
