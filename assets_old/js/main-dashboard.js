var financeData;
var monthtoMM = {1:"01",2:"02",3:"03",4:"04",5:"05",6:"06",7:"07",8:"08",9:"09",10:"10",11:"11",12:"12"};

function drawChartRefund(data){
    var dataArr = [];
    if(data){
        for (const [idx, ele] of Object.entries(data)) {
            var tempArr = {label: idx, y: (ele) ? parseInt(ele) : 0};
            dataArr.push(tempArr);
        }
    }

    var chart = new CanvasJS.Chart("chart-pie-refund", {
        backgroundColor: "transparent",
        animationEnabled: true,
        colorSet: "primaryShades",
        data: [{
            type: "doughnut",
            startAngle: 20,
            indexLabelFontSize: 13,
            indexLabel: "{label} - #percent%",
            toolTipContent: "<b>{label}:</b> {y} (#percent%)",
            dataPoints: dataArr
        }]
    });
    chart.render();
}

function drawChartClearance(data){
    var dataArr = [];
    if(data){
        for (const [idx, ele] of Object.entries(data)) {
            var tempArr = {label: idx, y: (ele) ? parseInt(ele) : 0};
            dataArr.push(tempArr);
        }
    }

    var chart = new CanvasJS.Chart("chart-pie-clearance", {
        backgroundColor: "transparent",
        animationEnabled: true,
        colorSet: "primaryShades",
        data: [{
            type: "pie",
            startAngle: 240,
            yValueFormatString: "##0.00\"%\"",
            indexLabel: "{label} {y}",
            dataPoints: dataArr
        }]
    });
    chart.render();
}

function drawLinePayOutIn (dataRefund, dataClearance){
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();

    var dumbArr = [];
    var dumbArr2 = [];
    var dataArrRefund = [];
    var dataArrClearance = [];

    var catArr = [];

    if(dataRefund){
        for (const [idx, ele] of Object.entries(dataRefund)) {
            var monthYear = idx + "-" + currentYear;
            if (!catArr.includes(monthYear)) {
                catArr.push(monthYear);
            }
            dumbArr.push({key: monthYear, value: ele.total});
        }
    }

    if(dataClearance){
        for (const [idx, ele] of Object.entries(dataClearance)) {
            var monthYear = idx + "-" + currentYear;
            if (!catArr.includes(monthYear)) {
                catArr.push(monthYear);
            }
            dumbArr2.push({key: monthYear, value: ele.total});
        }
    }

    catArr.sort();

    for (const [idx, ele] of Object.entries(catArr)) {
        var value = 0;
        var value2 = 0;

        for (const [idx2, ele2] of Object.entries(dumbArr)) {
            if(ele == ele2.key){
                value = ele2.value;
            }
        }

        for (const [idx2, ele2] of Object.entries(dumbArr2)) {
            if(ele == ele2.key){
                value2 = ele2.value;
            }
        }

        var tempArr = {label: ele, y: (value != 0) ? parseFloat(value.toFixed(2)) : 0.00, color: '#004E70'};
        dataArrRefund.push(tempArr);

        var tempArr2 = {label: ele, y: (value2 != 0) ? parseFloat(value2.toFixed(2)) : 0.00, color: '#31C090'};
        dataArrClearance.push(tempArr2);
    }

    var chart = new CanvasJS.Chart("chart-line", {
        backgroundColor: "transparent",
        animationEnabled: true,
        colorSet: "primaryShades",
        title: {
            text: ""
        },
        axisX: {
            lineThickness: 0.2,
        },
        axisY2: {
            title: "Total",
            prefix: "RM",
            lineThickness: 0.2,
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor: "pointer",
            verticalAlign: "top",
            horizontalAlign: "center",
            dockInsidePlotArea: true,
            itemclick: toogleDataSeries
        },
        data: [{
            type:"line",
            axisYType: "secondary",
            name: "Payment Out (Refund)",
            showInLegend: true,
            markerSize: 0,
            yValueFormatString: "RM#,###",
            color: '#00748E',
            dataPoints: dataArrRefund
        },
        {
            type: "line",
            axisYType: "secondary",
            name: "Payment In (Clearance)",
            showInLegend: true,
            markerSize: 0,
            yValueFormatString: "RM#,###",
            color: '#31C090',
            dataPoints: dataArrClearance
        }]
    });
    chart.render();
}

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	chart.render();
}

function updateCard(data, data2){
    var currentDate = new Date();
    var currentDay = currentDate.getDate();
    var currentMonth = monthtoMM[currentDate.getMonth()+1];
    var currentYear = currentDate.getFullYear();

    var date_format = currentDay + "/" + currentMonth + "/" + currentYear;
    var as_of_date = 'As of ' + date_format;

    //set date
    $('#dateAllPayOut').html(as_of_date);
    $('#dateInPayOut').html(as_of_date);
    $('#dateOutPayOut').html(as_of_date);

    $('#dateAllPayIn').html(as_of_date);
    $('#dateInPayIn').html(as_of_date);
    $('#dateOutPayIn').html(as_of_date);

    if(data){
        var payOutTtl = (data.refund_total) ? formatCurrency(data.refund_total) : 0;
        var payOutPending = (data.refund_pending) ? formatCurrency(data.refund_pending) : 0;
        var payOutComplete = (data.refund_complete) ? formatCurrency(data.refund_complete) : 0;
        var payOutCancel = (data.refund_cancel) ? formatCurrency(data.refund_cancel) : 0;

        $('#ttlPayOut').html('RM ' +payOutTtl);
        $('#ttlPayPending').html('RM ' +payOutPending);
        $('#ttlPayComplete').html('RM ' +payOutComplete);
        $('#ttlPayCancel').html('RM ' +payOutCancel);

        var recOutTtl = (data.total_rec) ? data.total_rec : 0;
        var recOutPending = (data.pending_rec) ? data.pending_rec : 0;
        var recOutComplete = (data.complete_rec) ? data.complete_rec : 0;
        var recOutCancel = (data.cancel_rec) ? data.cancel_rec : 0;

        $('#allRecPayOut').html(recOutTtl + ' record(s)');
        $('#pendingRecPayOut').html(recOutPending + ' record(s)');
        $('#completeRecPayOut').html(recOutComplete + ' record(s)');
        $('#cancelRecPayOut').html(recOutCancel + ' record(s)');

    }

    if(data2){
        var payInTtl = (data2.clearance_total) ? formatCurrency(data2.clearance_total) : 0;
        var payInPending = (data2.clearance_pending) ? formatCurrency(data2.clearance_pending) : 0;
        var payInComplete = (data2.clearance_complete) ? formatCurrency(data2.clearance_complete) : 0;
        var payInCancel = (data2.clearance_cancel) ? formatCurrency(data2.clearance_cancel) : 0;

        $('#ttlPayIn').html('RM ' +payInTtl);
        $('#ttlPayInPending').html('RM ' +payInPending);
        $('#ttlPayInComplete').html('RM ' +payInComplete);
        $('#ttlPayInCancel').html('RM ' +payInCancel);

        var recInTtl = (data2.total_rec) ? data2.total_rec : 0;
        var recInPending = (data2.pending_rec) ? data2.pending_rec : 0;
        var recInComplete = (data2.complete_rec) ? data2.complete_rec : 0;
        var recInCancel = (data2.cancel_rec) ? data2.cancel_rec : 0;

        $('#allRecPayIn').html(recInTtl + ' record(s)');
        $('#pendingRecPayIn').html(recInPending + ' record(s)');
        $('#completeRecPayIn').html(recInComplete + ' record(s)');
        $('#cancelRecPayIn').html(recInCancel + ' record(s)');

    }


}

function getPrevious7Days() {
    const today = new Date();
    const dates = [];

    for (let i = 6; i >= 0; i--) {
        const prevDate = new Date(today);
        prevDate.setDate(today.getDate() - i);
        dates.push(prevDate.toISOString().slice(0, 10)); // Store in YYYY-MM-DD format
    }

    return dates;
}

function refreshInformation(){
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();

    // Get the array of dates for the previous 7 days
    const previous7DaysArray = getPrevious7Days();

    var refundData = (financeData && financeData.refund_data) ? financeData.refund_data : [];
    var clearData = (financeData && financeData.clearance_data) ? financeData.clearance_data : [];

    var refundDetails = (refundData && refundData.card) ? refundData.card : [];
    var clearDetails = (clearData && clearData.card) ? clearData.card : [];
    updateCard(refundDetails, clearDetails);

    var refundPie = (refundData && refundData.refund_mode) ? refundData.refund_mode : []
    drawChartRefund(refundPie);

    var clearancePie = (clearData && clearData.clearance_mode) ? clearData.clearance_mode : []
    drawChartClearance(clearancePie);

    var refundBarLine = (refundData && refundData.refund_chart && refundData.refund_chart[currentYear]) ? refundData.refund_chart[currentYear] : []
    var clearBarLine = (clearData && clearData.clearance_chart && clearData.clearance_chart[currentYear]) ? clearData.clearance_chart[currentYear] : []
    drawLinePayOutIn(refundBarLine, clearBarLine);
}

$(document).ready(function (){
    $.ajax({
        url: "maindetail",
        type: "GET",
        dataType: "json",
        success: function(response) {
            if(response){
                financeData = response;
            }
            refreshInformation();
        },
        error: function(error) {
            console.log(error);
        }
    });

    CanvasJS.addColorSet("primaryShades",
    [//colorSet Array
        "#004E70",
        "#00748E",
        "#009B99",
        "#31C090",
        "#97E07D",
        "#2FAB63",
        "#008E63",
    ]);

    CanvasJS.addColorSet("secondaryShades",
    [//colorSet Array
        "#954054",
        "#C46257",
        "#E68E56",
        "#F9C15A",
        "#A98C66",
        "#FFF8EC"
    ]);


})