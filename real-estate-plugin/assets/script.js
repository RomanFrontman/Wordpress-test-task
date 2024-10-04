jQuery(document).ready(function($) {
  const container = $('.content-grid');
  const submitForm = $('.form-filter');


  function filterPosts() {
    const formData = submitForm.serialize();

      $.ajax({
          url: ajaxUrl,
          type: 'POST',
          data: {
              action: 'filterPosts',
              filters: formData
          },
          success: function(response) {
            container.empty();
            container.html(response.data);
          },
          error: function(xhr, status, error) {
              console.log('Error: ' + error);
          }
      });
  }

  submitForm.on('submit', function(event) {
    event.preventDefault();
    filterPosts();
  });
});
