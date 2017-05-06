(function (document, isWatch) {

    if (! isWatch) {
        return;
    }

    //tab containers
    var carouselContainer = document.querySelector('.carousel-row');
    var previewContainer = document.querySelector('.all-results');
    var logoGridContainer = document.querySelector('.logo-grid-row');

    //list of all now and next thumbnails
    var previews = document.querySelectorAll('.all-results li');

    var previewTitle = document.getElementById('filter-title');

    var previewAlert = document.querySelector('.all-results .alert');

    //genre filter buttons
    var filterButtonList = document.querySelectorAll('.watch .page-nav-filter li a');

    //carousel button
    var carouselToggle = document.getElementById('carousel-toggle');

    //channel list button
    var logoGridToggle = document.getElementById('logo-grid-toggle');

    function applyFilterButtonState (current, buttonList) {
        //reset nav active state
        for (var buttonIndex = 0; buttonIndex < buttonList.length; buttonIndex++) {
            removeClass(buttonList[buttonIndex], 'active');
        }

        if (null !== current) {
            addClass(current, 'active');
        }
    };

    function toggleTab (tabName) {
        // hide all
        addClass(carouselContainer, 'hidden');
        addClass(previewContainer, 'hidden');
        addClass(logoGridContainer, 'hidden');

        //display relevant tab
        switch (tabName) {
            case 'carousel':
                removeClass(carouselContainer, 'hidden');
                break;
            case 'filters':
                removeClass(previewContainer, 'hidden');
                break;
            case 'logos':
                removeClass(logoGridContainer, 'hidden');
                break;
        }
    };

    function toggleAlert(show) {
        if (show) {
            if ( ! hasClass(previewAlert, 'hidden')) {
                addClass(previewAlert, 'hidden');
            }
        } else {
            if (hasClass(previewAlert, 'hidden')) {
                removeClass(previewAlert, 'hidden');
            }
        }
    }

    function filterPreviewsByGenre (previews, genre)
    {
        var results = 0;

        for (var previewIndex = 0; previewIndex < previews.length; previewIndex++) {
            if (hasClass(previews[previewIndex], genre)) {
                previews[previewIndex].style.display = 'block';
                results++;
            } else {
                previews[previewIndex].style.display = 'none';
            }
        }

        return results;
    };

    //filter button click event handler
    function applyFilters (event) {
        //suppress default click event
        event.preventDefault();

        removeClass(carouselToggle, 'active');
        removeClass(logoGridToggle, 'active');
        applyFilterButtonState(this, filterButtonList);

        toggleTab('filters');

        previewTitle.innerText = this.innerText;

        var thumbnailCount = filterPreviewsByGenre(previews, this.dataset.filter);

        toggleAlert(!! thumbnailCount);
    };

    //add event listener for each of the filter buttons
    for (var filterIndex = 0; filterIndex < filterButtonList.length; filterIndex++) {
        filterButtonList[filterIndex].addEventListener('click', applyFilters);
    }

    //add event listener to the carousel toggle
    carouselToggle.addEventListener('click', function (event) {
        event.preventDefault();

        applyFilterButtonState(null, filterButtonList);
        removeClass(logoGridToggle, 'active');
        addClass(carouselToggle, 'active');

        toggleTab('carousel');
    });

    //add event listener to the logo grid toggle
    logoGridToggle.addEventListener('click', function (event) {
        event.preventDefault();

        applyFilterButtonState(null, filterButtonList);
        removeClass(carouselToggle, 'active');
        addClass(logoGridToggle, 'active');

        toggleTab('logos');
    });

}(document, hasClass(document.body, 'watch')));