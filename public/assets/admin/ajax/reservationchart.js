function LoadReservationChart() {
    $.ajax({
        type: "POST",
        url: "ajax/reservationChart",
        contentType: "application/json;charset=utf-8",
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        },
        data: {},
        dataType: "json",
        success: function (data) {
            let total = new Array();
            let label = new Array();
            let cancel = new Array();
            let success = new Array();
            if(data['total']!==undefined) {
                if (data['total'].length > 0) {
                    for (let i = 0; i < data['total'].length; i++) {
                        total[i] = data['total'][i]['count'];
                        label[i] = data['total'][i]['date'];
                        if(data['cancel']!==undefined) {
                            for (let j = 0; j < data['cancel'].length; j++) {
                                if (data['cancel'][j]['date'] === data['total'][i]['date']) {
                                    cancel[i] = data['cancel'][j]['count'];
                                    break;
                                }
                            }
                            if (cancel[i] === undefined) {
                                cancel[i] = 0;
                            }
                        }
                        else{
                            cancel[i] = 0;
                        }
                        if(data['success']!==undefined) {
                            for (let k = 0; k < data['success'].length; k++) {
                                if (data['success'][k]['date'] === data['total'][i]['date']) {
                                    success[i] = data['success'][k]['count'];
                                    break;
                                }
                            }
                            if (success[i] === undefined) {
                                success[i] = 0;
                            }
                        }
                        else{
                            success[i] = 0;
                        }
                    }
                }
            }
            new Chart(document.getElementById("reservation"), {
                type: 'line',
                data: {
                    labels: label,
                    datasets: [{
                        data: total,
                        label: "Phiếu thuê phòng",
                        borderColor: "#2196f3",
                        fill: false
                    },
                        {
                            data: cancel,
                            label: "Đã hủy",
                            borderColor: "#f44336",
                            fill: false
                        },
                        {
                            data: success,
                            label: "Thành công",
                            borderColor: "#FF9800",
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
                                labelString: 'Số lượng'
                            }
                        }]
                    },
                    title: {
                        fontSize: 18,
                        display: true,
                        text: 'Phiếu thuê trong tháng ' + (new Date().getMonth() + 1)
                    }
                }
            });

        },
    });
}
