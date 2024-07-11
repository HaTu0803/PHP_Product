$(document).ready(() => {
    $( ".datepicker" ).datepicker({
        dateFormat: "yy年mm月dd日",
        dayNamesShort: ["日", "月", "火", "水", "木", "金", "土"],
        dayNamesMin: ["日", "月", "火", "水", "木", "金", "土"],
        monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
        showMonthAfterYear: true,
        yearSuffix: "年",
        altField: "#actualDate"
    });
});
