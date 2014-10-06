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
        $('button.user-profile-subheader-games-add-button').on('click', this.toggleAddGameDropdown);
    },
    toggleDropdown: function(e) {
        e.preventDefault();
        $(this).closest('.dropdown').toggleClass('open');
    },
    hideDropdown: function(e) {
        e.preventDefault();
        $(this).closest('.dropdown').removeClass('open');
    },
    toggleAddGameDropdown: function(e) {
        e.preventDefault();
        $(this).closest('.user-profile-subheader-games-add').toggleClass('open');
    }
};

Bealeet.chosen = {
    init: function() {
        $('div.user-profile-subheader-games-add select.chosen-list')
            .chosen({width: "100%"})
            .change(this.userChangeGames);
    },
    userChangeGames: function(data, gameChange) {
        var form = $(this).closest('form');
        var url = form.attr('action');

        $.ajax({
            url: url,
            type: 'put',
            dataType: 'json',
            data: gameChange,
            success: function(data) {
                console.log(data);
            }
        });
    }
};

$(function() {
    Bealeet.toggle.init();
    Bealeet.chosen.init();
});