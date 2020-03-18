/*-------------- 1 Pie chart amchart start ------------*/
var dsKhoa = $('input[name="dskhoa"]').val().split(",");
var mausac = [
    "#ff0000",
    "#a1c416",
    "#01aabb", 
    "#01bb08", 
    "#011fbb",
    "#bb01b4", 
    "#86d4dc",
    "#f47c00",
    "#2ba863",
    "#b30084",
    "#b3003ae3",
    "#b3005555",
   ];
if ($('#ampiechart1').length) {
    var chart = AmCharts.makeChart("ampiechart1", {
        "type": "pie",
        "labelRadius": -35,
        "labelText": "[[percents]]%",
        "color": "#fff",
        "colorField": "backgroundColor",
        "valueField": "litres",
        "titleField": "country",
        "dataProvider" : [],
    });
    var html = "";
    dsKhoa.map(function(value, key){
        khoa = value.split("/");
        $(".chitietbieudo1").html("");
        data = {
            "country": khoa[0],
            "litres": khoa[1],
            "backgroundColor": mausac[key],
        }
        html += '<div class="col-6 mt-3">';
        html += '<span class="mauBieudong" style="background:'+mausac[key]+'"></span><span class="khoaBieudo">'+khoa[0]+'</span>';
        html += '</div>';
        $(".chitietbieudo1").html(html);
        chart['dataProvider'].push(data);
    });
}

var chart;
var legend;
var selected;

var types = [];
var html1='';
dsKhoa.map(function(value, key){
    khoa = value.split("/");
    data = {
        "type": khoa[0],
        "percent": khoa[1],
        "color": mausac[key],
    }
    $(".chitietbieudo2").html("");
    html1 += '<div class="col-6 mt-3">';
    html1 += '<span class="mauBieudong" style="background:'+mausac[key]+'"></span><span class="khoaBieudo">'+khoa[0]+'</span>';
    html1 += '</div>';
    $(".chitietbieudo2").html(html1);
    types.push(data);
});
if ($('#ampiechart3').length) {
    AmCharts.makeChart("ampiechart3", {
        "type": "pie",
        "theme": "light",
        "labelRadius": -35,
        "labelText": "[[percents]]%",
        "dataProvider": generateChartData(),
        "balloonText": "[[title]]: [[value]]",
        "titleField": "type",
        "valueField": "percent",
        "outlineColor": "#FFFFFF",
        "outlineAlpha": 0.8,
        "outlineThickness": 2,
        "colorField": "color",
        "color": "#fff",
        "pulledField": "pulled",
        "titles": [{
            "text": "Click a slice to see the details"
        }],
        "listeners": [{
            "event": "clickSlice",
            "method": function(event) {
                var chart = event.chart;
                if (event.dataItem.dataContext.id != undefined) {
                    selected = event.dataItem.dataContext.id;
                } else {
                    selected = undefined;
                }
                chart.dataProvider = generateChartData();
                chart.validateData();
            }
        }],
        "export": {
            "enabled": false
        }
    });
}

function generateChartData() {
    var chartData = [];
    for (var i = 0; i < types.length; i++) {
        if (i == selected) {
            for (var x = 0; x < types[i].subs.length; x++) {
                chartData.push({
                    type: types[i].subs[x].type,
                    percent: types[i].subs[x].percent,
                    color: types[i].color,
                    pulled: true
                });
            }
        } else {
            chartData.push({
                type: types[i].type,
                percent: types[i].percent,
                color: types[i].color,
                id: i
            });
        }
    }
    return chartData;
}
