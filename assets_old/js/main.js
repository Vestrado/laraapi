
function formatCurrency(val) {
    return parseFloat(val).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}

$(document).ready(function (){

    var pathname = window.location.pathname;
    var pathArr = pathname.split('/');
    if(pathArr[3] == ''){
        $(".nav-item").removeClass('active');
        $("#click_dashboard").addClass('active');
    }
    else if(pathArr[3] == 'search'){
        $(".nav-item").removeClass('active');
        $("#click_search").addClass('active');
    }
    else if(pathArr[3] == 'refundList'){
        $(".nav-item").removeClass('active');
        $("#click_refund").addClass('active');
    }
    else if(pathArr[3] == 'ClearanceRequest'){
        $(".nav-item").removeClass('active');
        $("#click_clearance").addClass('active');
    }
    else if(pathArr[3] == 'BankClearanceList'){
        $(".nav-item").removeClass('active');
        $("#click_clearance").addClass('active');
    }

    $("#click_search").click(function (){
        $(".nav-item").removeClass('active');
        $("#click_search").addClass('active');
    });

    $("#click_dashboard").click(function (){
        $(".nav-item").removeClass('active');
        $("#click_dashboard").addClass('active');
    });

    $("#click_refund").click(function (){
        $(".nav-item").removeClass('active');
        $("#click_refund").addClass('active');
    });

    $("#click_clearance").click(function (){
        $(".nav-item").removeClass('active');
        $("#click_clearance").addClass('active');
    });

    $("#click_back_main").click(function (){
        $(".nav-item").removeClass('active');
        $("#click_back_main").addClass('active');
    });
})