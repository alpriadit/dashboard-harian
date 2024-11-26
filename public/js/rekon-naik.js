$(function () {
    loadDataRekon();
    function loadDataRekon() {
        const csrfToken = $('meta[name="csrf-token"]').attr("content");
        munculLoading();
        $.ajax({
            url: "/getRekonNaik",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                console.log(response);
                if (response.success) {

                    let dkrp = response.data.dkrp;
                    if (!dkrp || dkrp.length === 0) {
                        alert("Data DKRP Tidak Ditemukan!");
                    } else {
                        // Data P2apst
                        if ($.fn.DataTable.isDataTable("#dataTableDkrp")) {
                            let tableDkrp = $("#dataTableDkrp").DataTable();
                            tableDkrp.clear().draw();
                        }

                        if (dkrp && dkrp.length > 0) {
                            $("#dataTableDkrp").DataTable({
                                processing: true,
                                stateSave: true,
                                dom: "Blfrtip",
                                destroy: true,
                                data: dkrp,
                                columns: [
                                    { data: "tgl" },
                                    { data: "lbr_p2apst" },
                                    { data: "lbr_ap2t" },
                                    { data: "selisih_lembar" },
                                    { data: "rp_p2apst" },
                                    { data: "rp_ap2t" },
                                    { data: "selisih_rupiah" },
                                ],
                                info: false,
                                paging: false,
                                searching: false,
                                order: false,
                            });
                        }

                    }

                    let dbp = response.data.dbp;
                    if (!dbp || dbp.length === 0) {
                        alert("Data DBP Tidak Ditemukan!");
                    } else {
                        // Data P2apst
                        if ($.fn.DataTable.isDataTable("#dataTableDbp")) {
                            let tableDbp = $("#dataTableDbp").DataTable();
                            tableDbp.clear().draw();
                        }

                        if (dbp && dbp.length > 0) {
                            $("#dataTableDbp").DataTable({
                                processing: true,
                                stateSave: true,
                                dom: "Blfrtip",
                                destroy: true,
                                data: dbp,
                                columns: [
                                    { data: "tgl" },
                                    { data: "lbr_p2apst" },
                                    { data: "lbr_ap2t" },
                                    { data: "selisih_lembar" },
                                    { data: "rp_p2apst" },
                                    { data: "rp_ap2t" },
                                    { data: "selisih_rupiah" },
                                ],
                                info: false,
                                paging: false,
                                searching: false,
                                order: false,
                            });
                        }

                    }

                    let prr = response.data.prr;
                    if (!prr || prr.length === 0) {
                        $("#dataTablePrr").DataTable({
                            processing: true,
                            stateSave: true,
                            dom: "Blfrtip",
                            destroy: true,
                            data: [{ 0: 0, 1: 0, 2: 0, 3: 0, 4: 0, 5: 0, 6: 0 }],
                            columns: [
                                { data: 0 },
                                { data: 1 },
                                { data: 2 },
                                { data: 3 },
                                { data: 4 },
                                { data: 5 },
                                { data: 6 },
                            ],
                            info: false,
                            paging: false,
                            searching: false,
                            order: false,
                        });
                    } else {
                        // Data P2apst
                        if ($.fn.DataTable.isDataTable("#dataTablePrr")) {
                            let tablePrr = $("#dataTablePrr").DataTable();
                            tablePrr.clear().draw();
                        }

                        if (prr && prr.length > 0) {
                            $("#dataTablePrr").DataTable({
                                processing: true,
                                stateSave: true,
                                dom: "Blfrtip",
                                destroy: true,
                                data: prr,
                                columns: [
                                    { data: "tgl" },
                                    { data: "lbr_p2apst" },
                                    { data: "lbr_ap2t" },
                                    { data: "selisih_lembar" },
                                    { data: "rp_p2apst" },
                                    { data: "rp_ap2t" },
                                    { data: "selisih_rupiah" },
                                ],
                                info: false,
                                paging: false,
                                searching: false,
                                order: false,
                            });
                        }

                    }

                    let lancar = response.data.lancar;
                    if (!lancar || lancar.length === 0) {
                        $("#dataTableLancar").DataTable({
                            processing: true,
                            stateSave: true,
                            dom: "Blfrtip",
                            destroy: true,
                            data: [{ 0: 0, 1: 0, 2: 0, 3: 0, 4: 0, 5: 0, 6: 0 }],
                            columns: [
                                { data: 0 },
                                { data: 1 },
                                { data: 2 },
                                { data: 3 },
                                { data: 4 },
                                { data: 5 },
                                { data: 6 },
                            ],
                            info: false,
                            paging: false,
                            searching: false,
                            order: false,
                        });
                    } else {
                        // Data P2apst
                        if ($.fn.DataTable.isDataTable("#dataTableLancar")) {
                            let tableLancar = $("#dataTableLancar").DataTable();
                            tableLancar.clear().draw();
                        }

                        if (lancar && lancar.length > 0) {
                            $("#dataTableLancar").DataTable({
                                processing: true,
                                stateSave: true,
                                dom: "Blfrtip",
                                destroy: true,
                                data: lancar,
                                columns: [
                                    { data: "tgl" },
                                    { data: "lbr_p2apst" },
                                    { data: "lbr_ap2t" },
                                    { data: "selisih_lembar" },
                                    { data: "rp_p2apst" },
                                    { data: "rp_ap2t" },
                                    { data: "selisih_rupiah" },
                                ],
                                info: false,
                                paging: false,
                                searching: false,
                                order: false,
                            });
                        }

                    }

                    let dph = response.data.dph;
                    if (!dph || dph.length === 0) {
                        alert("Data DPH Tidak Ditemukan!");
                    } else {
                        // Data P2apst
                        if ($.fn.DataTable.isDataTable("#dataTableDph")) {
                            let tableDph = $("#dataTableDph").DataTable();
                            tableDph.clear().draw();
                        }

                        if (dph && dph.length > 0) {
                            $("#dataTableDph").DataTable({
                                processing: true,
                                stateSave: true,
                                dom: "Blfrtip",
                                destroy: true,
                                data: dph,
                                columns: [
                                    { data: "tgl" },
                                    { data: "lbr_p2apst" },
                                    { data: "lbr_ap2t" },
                                    { data: "selisih_lembar" },
                                    { data: "rp_p2apst" },
                                    { data: "rp_ap2t" },
                                    { data: "selisih_rupiah" },
                                ],
                                info: false,
                                paging: false,
                                searching: false,
                                order: false,
                            });
                        }

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
