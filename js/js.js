function checkForm(form){
    var mssv = document.getElementById('mssv');
    if (mssv.value == '' || mssv.value.length != 8){
        alert("MSSV phải đúng 8 ký tự! Vui lòng nhập lại");
        return false;
    }

    var hoten = document.getElementById('hoten');
    if (hoten.value == ''){
        alert("Họ Tên không được rỗng! Vui lòng nhập Họ và Tên");
        return false;
    }

    var sdt = document.getElementById('sdt');
    if (sdt.value.length != 10){
        alert("Số Điện thoại phải đúng 10 ký tự! Vui lòng nhập lại");
        return false;
    }

    var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    var email = document.getElementById('email');
    if(email.value == '' || emailReg.test(email.value) == false){
        alert("Email không hợp lệ! Vui lòng nhập lại");
        return false;
    }

    var gtNam = document.getElementById('gtNam');
    var gtNu = document.getElementById('gtNu');
    var khac = document.getElementById('khac');
    if (gtNam.checked == '' && gtNu.checked == '' && khac.checked == ''){
        alert("Giới tính không được bỏ trống! Vui lòng chọn giới tính");
        return false;
    }

    var ngaysinh = document.getElementById('ngaysinh');
    if (ngaysinh.value == '' || ((new Date(ngaysinh.value)).getTime() > (new Date()).getTime())){
        alert("Ngày sinh phải nhỏ hơn ngày hiện tại! Vui lòng nhập lại");
        return false;
    }

    var quequan = document.getElementById('quequan');
    if (quequan.value == ''){
        alert("Quê quán không được rỗng! Vui lòng nhập quê quán");
        return false;
    }

    var anhdaidien = document.getElementById('anhdaidien');
    if (anhdaidien.value == ''){
        alert("Ảnh đại diện không được rỗng! Vui lòng chọn ảnh đại diện");
        return false;
    }


    var pswReg = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/g;
    var mk = document.getElementById('mk');
    if (pswReg.test(mk.value) == false){
        alert("Mật khẩu phải có ít nhất 8 ký tự gồm ký tự HOA, thường, chữ số và ký tự đặc biệt! Vui lòng nhập lại");
        return false;
    }

    var nlmk = document.getElementById('nlmk');
    if (nlmk.value != mk.value){
        alert("Mật khẩu không khớp! Vui lòng nhập lại");
        return false;
    }
    alert("Đăng ký thành công!!!");


    return true;
}



var accountList ={
    "ac1": {
        "usr":"B1910389",
        "psw":"phanduongkhang",
        "mssv":"B1910389"
    },
    "ac2": {
        "usr":"B1910336",
        "psw":"letruongan",
        "mssv":"B1910336"
    }
};

function checkLogin(form){
    var usr = document.getElementById('usr');
    if (usr.value != '' && usr.value.length > 0){
        for(var ac in accountList){
            if(/ac[0-9]+/.test(ac)){
                console.log(accountList[ac].usr);
                if(accountList[ac].usr === usr.value) {
                    
                    var psw = document.getElementById('psw');
                    if(accountList[ac].psw === psw.value) {
                        alert("Sinh viên " + accountList[ac].mssv + " đăng nhập thành công");
                        return true;
                    } else {
                        alert("Mật khẩu không đúng");
                        return false;
                    }
                }
            }
        }
        alert("Tài khoản không đúng");
    }
    return false;
}