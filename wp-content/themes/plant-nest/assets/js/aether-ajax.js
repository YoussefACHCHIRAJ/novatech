jQuery(document).ready(function($) {
    function loadPosts(page, category) {
        $.ajax({
            url: aether_ajax_obj.ajax_url,
            type: 'POST',
            data: {
                action: 'aether_load_more_posts',
                page: page,
                category: category
            },
            success: function(response) {
                if (response) {
                    $('#aether-posts-wrapper').append(response);
                } else {
                    $('#aether-load-more').hide();
                }
            }
        });
    }

    loadPosts(1, $('#aether-load-more').data('category')); // Load first page

    $('#aether-load-more').on('click', function() {
        let button = $(this);
        let page = parseInt(button.attr('data-page')) + 1;
        let category = button.data('category');

        button.attr('data-page', page);
        loadPosts(page, category);
    });
});
