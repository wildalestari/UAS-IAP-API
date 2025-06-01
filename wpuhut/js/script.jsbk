$(document).ready(function () {
  function tampilkanMenu(kategori) {
    $('#daftar-menu').html('');

    $.getJSON('data/pizza.json', function (data) {
      let menu = data.menu;
      let content = '';

      $.each(menu, function (i, item) {
        // Bandingkan kategori secara case-insensitive dan buang spasi
        if (kategori === 'All menu' || kategori.trim().toLowerCase() === item.kategori.trim().toLowerCase()) {
          content += `
            <div class="col-md-4">
              <div class="card mb-3">
                <img src="img/pizza/${item.gambar}" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">${item.nama}</h5>
                  <p class="card-text">${item.deskripsi || ''}</p>
                  <p class="card-text"><strong>Rp. ${Number(item.harga).toLocaleString('id-ID')}</strong></p>
                </div>
              </div>
            </div>
          `;
        }
      });

      $('#daftar-menu').html(content || '<p class="text-center">Tidak ada menu ditemukan.</p>');
    }).fail(function () {
      $('#daftar-menu').html('<p class="text-center text-danger">Gagal memuat data.</p>');
    });
  }

  // Tampilkan semua menu saat pertama kali
  tampilkanMenu('All menu');

  // Event klik kategori
  $('.nav-link').on('click', function () {
    $('.nav-link').removeClass('active');
    $(this).addClass('active');

    const kategori = $(this).data('kategori');
    $('h1').text(kategori);
    tampilkanMenu(kategori);
  });
});