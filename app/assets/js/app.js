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
                FlashMessage.success(data.message);
            },
            error: function(data) {
                var data = $.parseJSON(data.responseText);
                if(data.message) {
                    FlashMessage.error(data.message);
                } else {
                    FlashMessage.error(data.error.message);
                }
            }
        });
    }
};

Bealeet.switcher = {
    init: function() {
        $('input#user-profile-searching-switcher').on('change', this.userChangeSearchStatus)
    },
    userChangeSearchStatus: function() {
        var form = $(this).closest('form');
        var url = form.attr('action');
        var isSearching = $(this).prop('checked');

        $.ajax({
            url: url,
            type: 'put',
            dataType: 'json',
            data: {isSearching: isSearching},
            success: function(data) {
                FlashMessage.success(data.message);
            },
            error: function(data) {
                var data = $.parseJSON(data.responseText);
                if(data.message) {
                    FlashMessage.error(data.message);
                } else {
                    FlashMessage.error(data.error.message);
                }
            }
        })
    }
}

Bealeet.selectpicker = {
    init: function() {
        $('select.selectpicker').selectpicker();

        $('div.user-profile-subheader-games-primary select')
            .selectpicker()
            .on('change', this.userChangePrimaryGame);
    },
    userChangePrimaryGame: function() {
        var form = $(this).closest('form');
        var url = form.attr('action');
        var favoriteGame = $(this).val();

        $.ajax({
            url: url,
            type: 'put',
            dataType: 'json',
            data: {favoriteGameId: favoriteGame},
            success: function(data) {
                FlashMessage.success(data.message);
            },
            error: function(data) {
                var data = $.parseJSON(data.responseText);
                if(data.message) {
                    FlashMessage.error(data.message);
                } else {
                    FlashMessage.error(data.error.message);
                }
            }
        });
    }
}

$(function() {
    Bealeet.toggle.init();
    Bealeet.chosen.init();
    Bealeet.selectpicker.init();
    Bealeet.switcher.init();
});