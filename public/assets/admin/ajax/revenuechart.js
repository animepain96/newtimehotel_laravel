function LoadRevenueChart() {
    $.ajax({
        type: "POST",
        url: "ajax/revenueChart",
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
                    datas[i] = data[i]['revenue'];
                }
                new Chart(document.getElementById("revenue"), {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: datas,
                            label: "Doanh thu",
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
                                    labelString: 'Doanh thu'
                                }
                            }]
                        },
                        title: {
                            fontSize: 18,
                            display: true,
                            text: 'Doanh thu trong tháng ' + (new Date().getMonth() + 1)
                        }
                    }
                });
            }
        },
    });
}
