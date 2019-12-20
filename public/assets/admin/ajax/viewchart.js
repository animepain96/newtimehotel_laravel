function LoadViewChart() {
    $.ajax({
        type: "POST",
        url: "ajax/viewChart",
        contentType: "application/json;charset=utf-8",
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        },
        data: {},
        dataType: "json",
        success: function (data) {
            if (data.length > 0) {
                let labels = new Array();
                let datas = new Array();
                for (let i = 0; i < data.length; i++) {
                    labels[i] = data[i]['date'];
                    datas[i] = data[i]['total'];
                }
                new Chart(document.getElementById("view"), {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: datas,
                            label: "Lượt truy cập",
                            borderColor: "#f44336",
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false,
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Ngày'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Lượt truy cập'
                                }
                            }]
                        },
                        title: {
                            fontSize: 18,
                            display: true,
                            text: 'Lượt truy cập trang tháng ' + (new Date().getMonth() + 1)
                        }
                    }
                });
            }
        },
    });
}
