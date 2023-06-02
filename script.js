window.onload = function() {
    var industriesList = document.getElementById('industries-list');
    var industryLinks = industriesList.getElementsByTagName('a');

    for (var i = 0; i < industryLinks.length; i++) {
        industryLinks[i].addEventListener('click', handleIndustryClick);
    }

    function handleIndustryClick(event) {
        event.preventDefault();
        var industryId = this.getAttribute('href').split('=')[1];
        window.location.href = 'organizations.php?industry=' + industryId;
    }
};
