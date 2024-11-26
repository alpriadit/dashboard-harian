@extends('layouts.app')

@section('content')
    <div id="app" data-get-data-url="{{ url('/getRekonNaik') }}"></div>

    <div id="wrapper" style="margin-top: 0px">
        <div class="content-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box tablebox mt-4">
                            <legend class="with-border">
                                DKRP (pengiriman data koreksi rekening)
                            </legend>
                            <div class="data-tables">
                                <table id="dataTableDkrp" class="table table-striped table-bordered text-center nowrap"
                                    style="width: 100%">
                                    <thead class="bg-light text-capitalize">
                                        <tr>
                                            <th class="text-uppercase">
                                                TANGGAL
                                            </th>
                                            <th class="text-uppercase">
                                                LBR P2APST
                                            </th>
                                            <th class="text-uppercase">
                                                LBR AP2T
                                            </th>
                                            <th class="text-uppercase" style="color: #df2800">
                                                SEL
                                            </th>
                                            <th class="text-uppercase">
                                                RUPIAH P2APST
                                            </th>
                                            <th class="text-uppercase">
                                                RUPIAH AP2T
                                            </th>
                                            <th class="text-uppercase" style="color: #df2800">
                                                SEL
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box tablebox mt-4">
                            <legend class="with-border">
                                DBP (pengiriman data batal piutang)
                            </legend>
                            <div class="data-tables">
                                <table id="dataTableDbp" class="table table-striped table-bordered text-center nowrap"
                                    style="width: 100%">
                                    <thead class="bg-dark text-capitalize">
                                        <tr>
                                            <th class="text-uppercase">
                                                TGL
                                            </th>
                                            <th class="text-uppercase">
                                                LBR P2APST
                                            </th>
                                            <th class="text-uppercase">
                                                LBR AP2T
                                            </th>
                                            <th class="text-uppercase" style="color: #df2800">
                                                SEL
                                            </th>
                                            <th class="text-uppercase">
                                                RUPIAH P2APST
                                            </th>
                                            <th class="text-uppercase">
                                                RUPIAH AP2T
                                            </th>
                                            <th class="text-uppercase" style="color: #df2800">
                                                SEL
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box tablebox mt-4">
                            <legend class="with-border">
                                PRR (pengiriman data piutang ragu-ragu)
                            </legend>
                            <div class="data-tables">
                                <table id="dataTablePrr" class="table table-striped table-bordered text-center nowrap"
                                    style="width: 100%">
                                    <thead class="bg-light text-capitalize">
                                        <tr>
                                            <th class="text-uppercase">
                                                TANGGAL
                                            </th>
                                            <th class="text-uppercase">
                                                LBR P2APST
                                            </th>
                                            <th class="text-uppercase">
                                                LBR AP2T
                                            </th>
                                            <th class="text-uppercase" style="color: #df2800">
                                                SEL
                                            </th>
                                            <th class="text-uppercase">
                                                RUPIAH P2APST
                                            </th>
                                            <th class="text-uppercase">
                                                RUPIAH AP2T
                                            </th>
                                            <th class="text-uppercase" style="color: #df2800">
                                                SEL
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box tablebox mt-4">
                            <legend class="with-border">
                                DPH (pengiriman data pelunasan nota dan offline)
                            </legend>
                            <div class="data-tables">
                                <table id="dataTableLancar" class="table table-striped table-bordered text-center nowrap"
                                    style="width: 100%">
                                    <thead class="bg-dark text-capitalize">
                                        <tr>
                                            <th class="text-uppercase">
                                                TGL
                                            </th>
                                            <th class="text-uppercase">
                                                LBR P2APST
                                            </th>
                                            <th class="text-uppercase">
                                                LBR AP2T
                                            </th>
                                            <th class="text-uppercase" style="color: #df2800">
                                                SEL
                                            </th>
                                            <th class="text-uppercase">
                                                RUPIAH P2APST
                                            </th>
                                            <th class="text-uppercase">
                                                RUPIAH AP2T
                                            </th>
                                            <th class="text-uppercase" style="color: #df2800">
                                                SEL
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box tablebox mt-4">
                            <legend class="with-border">
                                PRR KE LANCAR (pengiriman data piutang ragu-ragu yang dibatalkan untuk dikoreksi)
                            </legend>
                            <div class="data-tables">
                                <table id="dataTableDph" class="table table-striped table-bordered text-center nowrap"
                                    style="width: 100%">
                                    <thead class="bg-light text-capitalize">
                                        <tr>
                                            <th class="text-uppercase">
                                                TANGGAL
                                            </th>
                                            <th class="text-uppercase">
                                                LBR P2APST
                                            </th>
                                            <th class="text-uppercase">
                                                LBR AP2T
                                            </th>
                                            <th class="text-uppercase" style="color: #df2800">
                                                SEL
                                            </th>
                                            <th class="text-uppercase">
                                                RUPIAH P2APST
                                            </th>
                                            <th class="text-uppercase">
                                                RUPIAH AP2T
                                            </th>
                                            <th class="text-uppercase" style="color: #df2800">
                                                SEL
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/rekon-naik.js') }}"></script>
@endsection
