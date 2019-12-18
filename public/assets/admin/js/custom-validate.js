//BirthDay
$.validator.addMethod("bday-validate", function (value, element) {
    let dateData = value.split('/');
    let dateValue = new Date(dateData[2],dateData[1]-1,dateData[0]);
    let toDay = new Date();
    return this.optional(element) || dateValue.getFullYear() <= (toDay.getFullYear() - 18);
},$.validator.format("Bạn phải đủ 18 tuổi mới có thể đăng kí tài khoản."));
//UID
$.validator.addMethod("uid-validate", function (value, element) {
    return this.optional(element) || /^[1-9]\d{8}/.test( value );;
},$.validator.format("Số Chứng minh nhân dân của bạn không đúng."));
//Vietnamese phone number
$.validator.addMethod("vi-phone-validate", function (value, element) {
    return this.optional(element) || /^0(1\d{9}|9\d{8})$/.test( value );;
},$.validator.format("Số điện thoại của bạn không đúng."));
$.validator.addMethod("password-validate", function (value, element) {
    return this.optional(element) || /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test( value );
},$.validator.format("Yêu cầu Mật khẩu có ít nhất 8 kí tự cả số và chữ."));
$.validator.addMethod("validatePassword", function (value, element) {
    return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
},$.validator.format("Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số"));
$.validator.addMethod("flat-icon-validate", function (value, element) {
    return this.optional(element) || value.length < 2;
},$.validator.format("Bạn phải chọn icon trong danh sách."));