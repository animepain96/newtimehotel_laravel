function GetCity (ele){
    let pid = $(ele).children("option:selected").val();;
    if(pid>0){
        let xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#slCity").empty();
                $("#slCity").append("<option value=\"0\">-- Chọn thành phố --</option>");
                $("#slCity").append(this.responseText);
            }
        };
        xmlHttp.open("GET", "city.php?pid=" + pid, true);
        xmlHttp.send();
    }
};