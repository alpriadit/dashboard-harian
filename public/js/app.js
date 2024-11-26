$(function () {
    $("#dataTableSatu, #dataTableDua, #dataTableTiga, #dataTableDkrp, #dataTableDbp, #dataTablePrr, #dataTableLancar, #dataTableDph").DataTable({
        scrollX: true,
        order: false,
        paging: false,
        searching: false,
    });

    $(document).ready(function () {
        // Tampilkan default section
        $('#dashboard-transaksi').show();
        $('#dashboard-rekon, #proses-rekon').hide();
    
        // Event listener untuk navigasi menu
        $('.nav-link').on('click', function () {
            // Remove active class dari semua menu
            $('.nav-link').removeClass('active');
            // Tambahkan active class ke menu yang diklik
            $(this).addClass('active');
    
            // Sembunyikan semua konten
            $('.content').hide();
    
            // Tampilkan konten berdasarkan ID menu yang dipilih
            if (this.id === 'menu-transaksi-H0') {
                $('#dashboard-transaksi-H0').show();
            } else if (this.id === 'menu-transaksi-H1') {
                $('#dashboard-transaksi-H1').show();
            } else if (this.id === 'menu-rekon-naik') {
                $('#dashboard-rekon').show();
            } else if (this.id === 'menu-proses-rekon') {
                $('#proses-rekon').show();
            }
        });
    });

    window.setInterval(function () {
        loadDataP2apst();
    }, 1200000);

    function updateRunningText() {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const now = new Date();
        const dayDate = now.toLocaleDateString('id-ID', options);
        const time = now.toLocaleTimeString('id-ID');
        
        document.getElementById('runningText').textContent = `Hari: ${dayDate}, Jam: ${time}`;
     }
     
     updateRunningText();
     
     setInterval(updateRunningText, 1000);
});
