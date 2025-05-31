function fetchMovies() {
  const query = $('#search-input').val().trim();
  if (!query) return;

  $.ajax({
    url: 'https://www.omdbapi.com/',
    type: 'get',
    dataType: 'json',
    data: {
      apikey: 'd9bfae36',
      s: query
    },
    success: function(result) {
      if (result.Response === "True") {
        let htmlContent = '';
        $.each(result.Search, function(i, movie) {
          const poster = movie.Poster !== "N/A" ? movie.Poster : 'https://via.placeholder.com/300x450?text=No+Image';
          htmlContent += `
            <div class="col-md-4 my-3">
              <div class="card h-100 d-flex flex-column">
                <img src="${poster}" class="card-img-top" alt="${movie.Title}" />
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">${movie.Title}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">${movie.Year}</h6>
                  <a href="#" class="btn btn-dark mt-auto btn-detail" data-id="${movie.imdbID}" data-toggle="modal" data-target="#exampleModal">See Detail</a>
                </div>
              </div>
            </div>
          `;
        });
        $('#movie-list').html(htmlContent);
      } else {
        $('#movie-list').html(`<div class="col"><h3 class="text-center">${result.Error}</h3></div>`);
      }
    },
    error: function() {
      $('#movie-list').html(`<div class="col"><h3 class="text-center text-danger">Error fetching movies.</h3></div>`);
    }
  });
}

$(document).ready(function() {
  // Event tombol search
  $('#search-button').on('click', function() {
    fetchMovies();
  });

  // Event enter di input
  $('#search-input').on('keypress', function(e) {
    if (e.which === 13) {
      fetchMovies();
    }
  });

  // Event tombol detail - **PASTIKAN ini di luar fetchMovies()**
  $('#movie-list').on('click', '.btn-detail', function(e) {
    e.preventDefault();
    const imdbID = $(this).data('id');

    $('#exampleModalLabel').text('Loading...');
    $('.modal-body').html('<p>Loading details...</p>');

    $('#exampleModal').modal('show');

    $.ajax({
      url: 'https://www.omdbapi.com/',
      type: 'get',
      dataType: 'json',
      data: {
        apikey: 'd9bfae36',
        i: imdbID
      },
      success: function(movie) {
        if (movie.Response === "True") {
          const poster = movie.Poster !== "N/A" ? movie.Poster : 'https://via.placeholder.com/300x450?text=No+Image';
          $('#exampleModalLabel').text(movie.Title);
          $('.modal-body').html(`
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4">
                  <img src="${poster}" class="img-fluid" />
                </div>
                <div class="col-md-8">
                  <ul class="list-group">
                    <li class="list-group-item"><strong>Released:</strong> ${movie.Released}</li>
                    <li class="list-group-item"><strong>Genre:</strong> ${movie.Genre}</li>
                    <li class="list-group-item"><strong>Director:</strong> ${movie.Director}</li>
                    <li class="list-group-item"><strong>Actors:</strong> ${movie.Actors}</li>
                  </ul>
                </div>
              </div>
            </div>
          `);
        } else {
          $('.modal-body').html(`<p class="text-danger">${movie.Error}</p>`);
        }
      },
      error: function() {
        $('.modal-body').html('<p class="text-danger">Error loading movie details.</p>');
      }
    });
  });
});
