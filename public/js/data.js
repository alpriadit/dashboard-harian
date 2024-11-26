$(function () {

    loadDataP2apst();
    function loadDataP2apst() {
        // var getDataUrl = $('#app').data('get-data-url');
        const csrfToken = $('meta[name="csrf-token"]').attr("content");
        munculLoading();
        $.ajax({
            url: '/getData',
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                if (response.success) {
                    if (!response.data.p2apst || response.data.p2apst.length === 0) {
                        alert("Data Rekap Tidak Ditemukan!");
                    }else{
                        // Data P2apst
                        if ($.fn.DataTable.isDataTable("#dataTableSatu")) {
                            let tableSatu = $("#dataTableSatu").DataTable();
                            tableSatu.clear().draw();
                        }

                        if (response.data.p2apst && response.data.p2apst.length > 0) {
                            $("#dataTableSatu").DataTable({
                                processing: true,
                                stateSave: true,
                                dom: "Blfrtip",
                                destroy: true,
                                data: response.data.p2apst,
                                columns: [
                                    {
                                        data: "jam_rekap",
                                        render: function (data, type, row) {
                                            return data + ":00"; // Menambahkan ":00" di akhir jam_rekap
                                        },
                                    },
                                    { data: "lbr_nontaglis_p2apst" },
                                    { data: "lbr_postpaid_p2apst" },
                                ],
                                info: false,
                                paging: false,
                                searching: false,
                                order: false,
                            });
                        }

                        // Data Cargo
                        if ($.fn.DataTable.isDataTable("#dataTableDua")) {
                            let tableDua = $("#dataTableDua").DataTable();
                            tableDua.clear().draw();
                        }

                        if (response.data.cargo && response.data.cargo.length > 0) {
                            $("#dataTableDua").DataTable({
                                processing: true,
                                stateSave: true,
                                dom: "Blfrtip",
                                destroy: true,
                                data: response.data.cargo,
                                columns: [
                                    {
                                        data: "jam_rekap",
                                        render: function (data, type, row) {
                                            return data + ":00"; // Menambahkan ":00" di akhir jam_rekap
                                        },
                                    },
                                    { data: "lbr_nontaglis_cargo" },
                                    { data: "lbr_postpaid_cargo" },
                                ],
                                info: false,
                                paging: false,
                                searching: false,
                                order: false,
                            });
                        }

                        // Data Ap2t
                        if ($.fn.DataTable.isDataTable("#dataTableTiga")) {
                            let tableTiga = $("#dataTableTiga").DataTable();
                            tableTiga.clear().draw();
                        }

                        if (response.data.ap2t && response.data.ap2t.length > 0) {
                            $("#dataTableTiga").DataTable({
                                processing: true,
                                stateSave: true,
                                dom: "Blfrtip",
                                destroy: true,
                                data: response.data.ap2t,
                                columns: [
                                    {
                                        data: "jam_rekap",
                                        render: function (data, type, row) {
                                            return data + ":00"; // Menambahkan ":00" di akhir jam_rekap
                                        },
                                    },
                                    { data: "lbr_nontaglis_ap2t" },
                                    { data: "lbr_postpaid_ap2t" },
                                ],
                                info: false,
                                paging: false,
                                searching: false,
                                order: false,
                            });
                        }

                        let rekap_p2apst = response.data.rekap_p2apst.jml_p2apst;
                        let rekap_cargo = response.data.rekap_cargo.jml_cargo;
                        let rekap_ap2t = response.data.rekap_ap2t.jml_ap2t;
                        let taglis_p2apst = response.data.taglis_p2apst.taglis_p2apst;
                        let nontaglis_p2apst = response.data.nontaglis_p2apst.nontaglis_p2apst;
                        let taglis_cargo = response.data.taglis_cargo.taglis_cargo;
                        let nontaglis_cargo = response.data.nontaglis_cargo.nontaglis_cargo;
                        let taglis_ap2t = response.data.taglis_ap2t.taglis_ap2t;
                        let nontaglis_ap2t = response.data.nontaglis_ap2t.nontaglis_ap2t;
                        let sel_1 = rekap_p2apst - rekap_cargo;
                        let sel_2 = rekap_cargo - rekap_ap2t;
                        let sel_3 = rekap_p2apst - rekap_ap2t;
                        let sel_4 = taglis_p2apst - taglis_cargo;
                        let sel_5 = nontaglis_p2apst - nontaglis_cargo;
                        let sel_6 = taglis_cargo - taglis_ap2t;
                        let sel_7 = nontaglis_cargo - nontaglis_ap2t;
                        let sel_8 = taglis_p2apst - taglis_ap2t;
                        let sel_9 = nontaglis_p2apst - nontaglis_ap2t;

                        $("#r_p2apst").text(rekap_p2apst);
                        $("#r_cargo").text(rekap_cargo);
                        $("#r_ap2t").text(rekap_ap2t);

                        $("#sel1").text(sel_1);
                        $("#sel2").text(sel_2);
                        $("#sel3").text(sel_3);
                        $("#sel4").text(sel_4);
                        $("#sel5").text(sel_5);
                        $("#sel6").text(sel_6);
                        $("#sel7").text(sel_7);
                        $("#sel8").text(sel_8);
                        $("#sel9").text(sel_9);

                        $("#tgls_p").text(taglis_p2apst);
                        $("#ntgls_p").text(nontaglis_p2apst);
                        $("#tgls_c").text(taglis_cargo);
                        $("#ntgls_c").text(nontaglis_cargo);
                        $("#tgls_a").text(taglis_ap2t);
                        $("#ntgls_a").text(nontaglis_ap2t);

                        function padArrayWithNull(arr, total) {
                            while (arr.length < total) {
                                arr.push(null);
                            }
                            return arr;
                        }

                        let categories = ['02:00', '04:00', '06:00', '08:00', '10:00', '12:00', '14:00', '16:00', '18:00', '20:00', '22:00', '24:00']; // Sesuaikan dengan kategori pada xaxis
                        let totalCategories = categories.length;

                        let ar_p2apst = padArrayWithNull(
                            response.data.perjam_p2apst.map((item) => item.perjam_p2apst),
                            totalCategories
                        );
                        
                        let ar_cargo = padArrayWithNull(
                            response.data.perjam_cargo.map((item) => item.perjam_cargo),
                            totalCategories
                        );
                        
                        let ar_ap2t = padArrayWithNull(
                            response.data.perjam_ap2t.map((item) => item.perjam_ap2t),
                            totalCategories
                        );

                        let ar_jam_rekap = response.data.perjam_cargo.map(
                            (item) => item.jam_rekap
                        );

                        window.Apex = {
                            chart: {
                                foreColor: "#fff",
                                toolbar: {
                                    show: false,
                                },
                            },
                            colors: ["#FCCF31", "#17ead9", "#ffd300"],
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
                            tooltip: {
                                theme: "dark",
                            },
                            yaxis: {
                                decimalsInFloat: 2,
                                opposite: true,
                                labels: {
                                    offsetX: -10,
                                },
                            },
                        };

                        var optionsData = {
                            series: [
                                {
                                    name: "P2APST",
                                    data: ar_p2apst,
                                },
                                {
                                    name: "CARGO",
                                    data: ar_cargo,
                                },
                                {
                                    name: "AP2T",
                                    data: ar_ap2t,
                                },
                            ],
                            chart: {
                                height: 490,
                                type: "line",
                                dropShadow: {
                                    enabled: true,
                                    color: "#000",
                                    top: 18,
                                    left: 7,
                                    blur: 10,
                                    opacity: 0.2,
                                },
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            colors: ["#036fa1", "#ad22b2", "#028d25"],
                            dataLabels: {
                                enabled: true,
                            },
                            stroke: {
                                curve: "smooth",
                            },
                            title: {
                                text: "Pelunasan Taglis & Nontaglis PerJam",
                                align: "left",
                            },
                            grid: {
                                borderColor: "#979797",
                                row: {
                                    colors: ["#838383", "transparent"], // takes an array which will be repeated on columns
                                    opacity: 0.1,
                                },
                            },
                            markers: {
                                size: 1,
                            },
                            tooltip: {
                                y: {
                                    formatter: function (val) {
                                        return val + " lbr";
                                    },
                                },
                            },
                            xaxis: {
                                // categories: ar_jam_rekap.map((jam) => `${jam}:00`),
                                categories: categories,
                                title: {
                                    text: "Jam Rekap",
                                },
                            },
                            yaxis: {
                                title: {
                                    text: "Lembar",
                                },
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: true,
                                offsetY: -25,
                                offsetX: -5,
                            },
                        };

                        var lineData = new ApexCharts(
                            document.querySelector("#lineDataChart"),
                            optionsData
                        );
                        lineData.render();

                        var optionsColumn = {
                            series: [
                                {
                                    name: "Selisih",
                                    data: [sel_1, sel_2, sel_3],
                                },
                            ],
                            chart: {
                                height: 200,
                                type: "bar",
                            },
                            plotOptions: {
                                bar: {
                                    distributed: true,
                                    columnWidth: '50%',
                                    dataLabels: {
                                        position: "top", // top, center, bottom
                                    },
                                },
                            },
                            dataLabels: {
                                enabled: true,
                                formatter: function (val) {
                                    return val;
                                },
                                offsetY: 25, // Mengatur posisi label di atas bar
                                style: {
                                    fontSize: "18px",
                                    colors: ["#fff"], // Warna label teks
                                },
                            },
                            colors: ["#df2800", "#b22222", "#8d021f"], // Warna untuk setiap bar
                            xaxis: {
                                categories: [
                                    "P2APST vs CARGO",
                                    "CARGO vs AP2T",
                                    "P2APST vs AP2T",
                                ],
                                position: "bottom",
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                                labels: {
                                    show: true,
                                },
                                crosshairs: {
                                    fill: {
                                        type: "gradient",
                                        gradient: {
                                            colorFrom: "#D8E3F0",
                                            colorTo: "#BED1E6",
                                            stops: [0, 100],
                                            opacityFrom: 0.4,
                                            opacityTo: 0.5,
                                        },
                                    },
                                },
                                tooltip: {
                                    enabled: true,
                                },
                            },
                            yaxis: {
                                min: 0, // Nilai minimum y-axis
                                forceNiceScale: true,
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                                labels: {
                                    show: false,
                                    formatter: function (val) {
                                        return val;
                                    },
                                },
                            },
                            tooltip: {
                                y: {
                                    formatter: function (val) {
                                        return val + " lbr";
                                    },
                                },
                            },
                            title: {
                                text: "Selisih P2APST vs CARGO vs AP2T",
                                align: "top",
                                style: {
                                    color: "#fff", // Warna teks judul
                                    fontSize: "14px",
                                },
                            },
                            legend: {
                                show: false,
                            }
                        };

                        var columnChart = new ApexCharts(
                            document.querySelector("#columnChart"),
                            optionsColumn
                        );
                        columnChart.render();

                        var options2 = {
                            series: [
                                {
                                    name: "Taglis",
                                    data: [sel_4, sel_6, sel_8],
                                },
                                {
                                    name: "Nontaglis",
                                    data: [sel_5, sel_7, sel_9],
                                },
                            ],
                            chart: {
                                type: "bar",
                                height: 200,
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: "55%",
                                    endingShape: "rounded",
                                },
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ["transparent"],
                            },
                            dataLabels: {
                                enabled: true,
                                formatter: function (val) {
                                    return val;
                                },
                                offsetY: 0, // Mengatur posisi label di atas bar
                                style: {
                                    fontSize: "14px",
                                    colors: ["#fff"], // Warna label teks
                                },
                            },
                            colors: ["#8d021f", "#df2800"],
                            xaxis: {
                                categories: [
                                    "P2APST vs CARGO",
                                    "CARGO vs AP2T",
                                    "P2APST vs AP2T",
                                ],
                            },
                            yaxis: {
                                min: 0, // Nilai minimum y-axis
                                forceNiceScale: true,
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                                labels: {
                                    show: false,
                                    formatter: function (val) {
                                        return val;
                                    },
                                },
                            },
                            fill: {
                                opacity: 1,
                            },
                            tooltip: {
                                y: {
                                    formatter: function (val) {
                                        return val + " lbr";
                                    },
                                },
                            },
                            title: {
                                text: "Selisih Per Transaksi",
                                align: "top",
                                style: {
                                    color: "#fff", // Warna teks judul
                                    fontSize: "14px",
                                },
                            },
                        };

                        var columnChart2 = new ApexCharts(
                            document.querySelector("#columnChart2"),
                            options2
                        );
                        columnChart2.render();
                    } 
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr) {},
            complete: function () {
                hapusLoading();
            },
        });
    }

    function munculLoading() {
        $("#overlay").removeAttr("style");
    }

    function hapusLoading() {
        $("#overlay").css("display", "none");
    }

});
