window.fbAsyncInit = function() {
    FB.init({
        appId      : '671187556307321',
        xfbml      : true,
        version    : 'v2.1'
    });
};

var Bealeet = {};

Bealeet.toggle = {
    init: function() {
        $('.dropdown a.dropdown-toggle').on('click', this.toggleDropdown);
        $('.dropdown a.dropdown-close').on('click', this.hideDropdown);
    },
    toggleDropdown: function(e) {
        e.preventDefault();
        $(this).closest('.dropdown').toggleClass('open');
    },
    hideDropdown: function(e) {
        e.preventDefault();
        $(this).closest('.dropdown').removeClass('open');
    }
};

$(function() {
    Bealeet.toggle.init();
});