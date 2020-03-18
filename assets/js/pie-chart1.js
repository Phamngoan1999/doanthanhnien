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
     $(".chitietbieudo1").html("");
     $(".chitietbieudo2").html("");
        data = {
            "country": value,
            "litres": 11,
            "backgroundColor": mausac[key],
        }
        html += '<div class="col-6 mt-3">';
        html += '<span class="mauBieudong" style="background:'+mausac[key]+'"></span><span class="khoaBieudo">'+value+'</span>';
        html += '</div>';
        $(".chitietbieudo1").html(html);
        chart['dataProvider'].push(data);
    });
}


var chart;
var legend;
var selected;

var types = [{
    type: "CNTT",
    percent: 20.1,
    color: "#ff9e01",
}, {
    type: "Kinh tế",
    percent: 30.1,
    color: "#6E4FD1",
}];
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
/*-------------- 1 Pie chart amchart end ------------*/
if ($('#highpiechart4').length) {
    var pieColors = (function() {
        var colors = [],
            base = Highcharts.getOptions().colors[0],
            i;

        for (i = 0; i < 10; i += 1) {
            // Start out with a darkened base color (negative brighten), and end
            // up with a much brighter color
            colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
        }
        return colors;
    }());

    // Build the chart
    Highcharts.chart('highpiechart4', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Dollar market Values, 2018'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                colors: pieColors,
                dataLabels: {
                    style: { "color": "contrast", "fontSize": "11px", "fontWeight": "bold", "textOutline": "" },
                    enabled: true,
                    format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                    distance: -50,
                    filter: {
                        property: 'percentage',
                        operator: '>',
                        value: 4
                    }
                }
            }
        },
        series: [{
            name: 'Share',
            data: [
                { name: 'USD', y: 61.41 },
                { name: 'BTC', y: 11.84 },
                { name: 'TCN', y: 10.85 }
            ]
        }]
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
