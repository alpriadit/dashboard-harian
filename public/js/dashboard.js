window.Apex = {
    chart: {
        foreColor: "#fff",
        toolbar: {
            show: false,
        },
    },
    colors: ["#FCCF31", "#17ead9", "#f02fc2"],
    stroke: {
        width: 3,
    },
    dataLabels: {
        enabled: false,
    },
    grid: {
        borderColor: "#40475D",
    },
    xaxis: {
        axisTicks: {
            color: "#333",
        },
        axisBorder: {
            color: "#333",
        },
    },
    fill: {
        type: "gradient",
        gradient: {
            gradientToColors: ["#F55555", "#6078ea", "#6094ea"],
        },
    },
    tooltip: {
        theme: "dark",
        x: {
            formatter: function (val) {
                return moment(new Date(val)).format("HH:mm:ss");
            },
        },
    },
    yaxis: {
        decimalsInFloat: 2,
        opposite: true,
        labels: {
            offsetX: -10,
        },
    },
};

var trigoStrength = 3;
var iteration = 11;

function getRandom() {
    var i = iteration;
    return (
        (Math.sin(i / trigoStrength) * (i / trigoStrength) +
            i / trigoStrength +
            1) *
        (trigoStrength * 2)
    );
}

function getRangeRandom(yrange) {
    return (
        Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min
    );
}

function generateMinuteWiseTimeSeries(baseval, count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
        var x = baseval;
        var y =
            (Math.sin(i / trigoStrength) * (i / trigoStrength) +
                i / trigoStrength +
                1) *
            (trigoStrength * 2);

        series.push([x, y]);
        baseval += 300000;
        i++;
    }
    return series;
}

function getNewData(baseval, yrange) {
    var newTime = baseval + 300000;
    return {
        x: newTime,
        y:
            Math.floor(Math.random() * (yrange.max - yrange.min + 1)) +
            yrange.min,
    };
}

var optionsColumn = {
    chart: {
        height: 350,
        type: "bar",
        animations: {
            enabled: false,
        },
        events: {
            animationEnd: function (chartCtx, opts) {
                const newData = chartCtx.w.config.series[0].data.slice();
                newData.shift();
                window.setTimeout(function () {
                    chartCtx.updateOptions(
                        {
                            series: [
                                {
                                    data: newData,
                                },
                            ],
                            xaxis: {
                                min: chartCtx.minX,
                                max: chartCtx.maxX,
                            },
                            subtitle: {
                                text:
                                    parseInt(
                                        getRangeRandom({ min: 1, max: 20 })
                                    ).toString() + "%",
                            },
                        },
                        false,
                        false
                    );
                }, 300);
            },
        },
        toolbar: {
            show: false,
        },
        zoom: {
            enabled: false,
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        width: 0,
    },
    series: [
        {
            name: "Load Average",
            data: generateMinuteWiseTimeSeries(
                new Date("12/12/2016 00:00:00").getTime(),
                12,
                {
                    min: 10,
                    max: 110,
                }
            ),
        },
    ],
    title: {
        text: "Load Average",
        align: "left",
        style: {
            fontSize: "12px",
        },
    },
    subtitle: {
        text: "20%",
        floating: true,
        align: "right",
        offsetY: 0,
        style: {
            fontSize: "22px",
        },
    },
    fill: {
        type: "gradient",
        gradient: {
            shade: "dark",
            type: "vertical",
            shadeIntensity: 0.5,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 0.8,
            stops: [0, 100],
        },
    },
    xaxis: {
        type: "datetime",
        range: 2700000,
    },
    legend: {
        show: true,
    },
};

var chartColumn = new ApexCharts(
    document.querySelector("#columnchart"),
    optionsColumn
);
chartColumn.render();

var optionsLine = {
    chart: {
        height: 350,
        type: "line",
        stacked: true,
        animations: {
            enabled: true,
            easing: "linear",
            dynamicAnimation: {
                speed: 1000,
            },
        },
        dropShadow: {
            enabled: true,
            opacity: 0.3,
            blur: 5,
            left: -7,
            top: 22,
        },
        events: {
            animationEnd: function (chartCtx, opts) {
                const newData1 = chartCtx.w.config.series[0].data.slice();
                newData1.shift();
                const newData2 = chartCtx.w.config.series[1].data.slice();
                newData2.shift();

                // check animation end event for just 1 series to avoid multiple updates
                if (opts.el.node.getAttribute("index") === "0") {
                    window.setTimeout(function () {
                        chartCtx.updateOptions(
                            {
                                series: [
                                    {
                                        data: newData1,
                                    },
                                    {
                                        data: newData2,
                                    },
                                ],
                                subtitle: {
                                    text: parseInt(
                                        getRandom() * Math.random()
                                    ).toString(),
                                },
                            },
                            false,
                            false
                        );
                    }, 300);
                }
            },
        },
        toolbar: {
            show: false,
        },
        zoom: {
            enabled: false,
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        curve: "straight",
        width: 5,
    },
    grid: {
        padding: {
            left: 0,
            right: 0,
        },
    },
    markers: {
        size: 0,
        hover: {
            size: 0,
        },
    },
    series: [
        {
            name: "Running",
            data: generateMinuteWiseTimeSeries(
                new Date("12/12/2016 00:00:00").getTime(),
                12,
                {
                    min: 30,
                    max: 110,
                }
            ),
        },
        {
            name: "Waiting",
            data: generateMinuteWiseTimeSeries(
                new Date("12/12/2016 00:00:00").getTime(),
                12,
                {
                    min: 30,
                    max: 110,
                }
            ),
        },
    ],
    xaxis: {
        type: "datetime",
        range: 2700000,
    },
    title: {
        text: "Processes",
        align: "left",
        style: {
            fontSize: "12px",
        },
    },
    subtitle: {
        text: "20",
        floating: true,
        align: "right",
        offsetY: 0,
        style: {
            fontSize: "22px",
        },
    },
    legend: {
        show: true,
        floating: true,
        horizontalAlign: "left",
        onItemClick: {
            toggleDataSeries: false,
        },
        position: "top",
        offsetY: -28,
        offsetX: 60,
    },
};

var chartLine = new ApexCharts(
    document.querySelector("#linechart"),
    optionsLine
);
chartLine.render();

var nilaiNontaglisP2apst = $('#nontaglisp2apst').val();
var nilaiTaglisP2apst = $("#taglisp2apst").val();
console.log(nilaiNontaglisP2apst, '|' , nilaiTaglisP2apst);

var optionsBar = {
  series: [{
    name: 'Non Taglis',
    data: [nilaiNontaglisP2apst]
  }, {
    name: 'Taglis',
    data: [nilaiTaglisP2apst]
  }],
  chart: {
    type: 'bar',
    height: 150,
    stacked: true,
    stackType: '100%'
  },
  plotOptions: {
    bar: {
      horizontal: true,
    },
  },
  stroke: {
    width: 1,
    colors: ['#fff']
  },
  xaxis: {
    categories: ['28/09/2024'],
  },
  tooltip: {
    y: {
      formatter: function (val) {
        return val + "%"
      }
    }
  },
  fill: {
    opacity: 1
  },
  legend: {
    position: 'top',
    horizontalAlign: 'left',
    offsetX: 40
  }
};

var chartBar = new ApexCharts(
    document.querySelector("#stackedBar"), 
    optionsBar
);
chartBar.render();

window.setInterval(function () {
    iteration++;

    chartColumn.updateSeries([
        {
            data: [
                ...chartColumn.w.config.series[0].data,
                [chartColumn.w.globals.maxX + 300000, getRandom()],
            ],
        },
    ]);

    chartLine.updateSeries([
        {
            data: [
                ...chartLine.w.config.series[0].data,
                [chartLine.w.globals.maxX + 3600000, getRandom()],
            ],
        },
        {
            data: [
                ...chartLine.w.config.series[1].data,
                [chartLine.w.globals.maxX + 3600000, getRandom()],
            ],
        },
    ]);
}, 3000);
