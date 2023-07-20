

    <form action="<?= esc_url(home_url('/')) ?>" class="input-group mb-5">
        <input type="text" class="form-control border-0 bg-blue border-bottom" name="s" placeholder="Type something to search…" value="<?= get_search_query() ?>">
        <div class="input-group-append">
                <button type="submit" class="input-group-text border-0 bg-blue">
                    <img src="<?= get_template_directory_uri() . '/assets/image/search.svg' ?>" alt="search">
                </button>
        </div>
    </form>
