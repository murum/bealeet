window.fbAsyncInit = function () {
    FB.init({
        appId: '671187556307321',
        xfbml: true,
        version: 'v2.1'
    });
};

var Bealeet = {};

Bealeet.toggle = {
    init: function () {
        $('.dropdown a.dropdown-toggle').on('click', this.toggleDropdown);
        $('.dropdown a.dropdown-close').on('click', this.hideDropdown);
        $('button.user-profile-subheader-games-add-button').on('click', this.toggleAddGameDropdown);
        $('button.user-profile-skills-add-button').on('click', this.toggleAddSkillDropdown);
    },
    toggleDropdown: function (e) {
        e.preventDefault();
        $(this).closest('.dropdown').toggleClass('open');
    },
    hideDropdown: function (e) {
        e.preventDefault();
        $(this).closest('.dropdown').removeClass('open');
    },
    toggleAddGameDropdown: function (e) {
        e.preventDefault();
        $(this).closest('.user-profile-subheader-games-add').toggleClass('open');
    },
    toggleAddSkillDropdown: function (e) {
        e.preventDefault();
        $(this).closest('.user-profile-skills-add').toggleClass('open');
    }
};

Bealeet.chosen = {
    init: function () {
        $('div.user-profile-subheader-games-add select.chosen-list')
            .chosen({width: "100%"})
            .change(this.userChangeGames);
        $('div.user-profile-skills-add select.chosen-list')
            .chosen({width: "100%"})
            .change(this.userChangeSkills);
    },
    userChangeGames: function (data, gameChange) {
        var form = $(this).closest('form');
        var url = form.attr('action');

        $.ajax({
            url: url,
            type: 'put',
            dataType: 'json',
            data: gameChange,
            success: function (data) {
                FlashMessage.success(data.message);
            },
            error: function (data) {
                var data = $.parseJSON(data.responseText);
                if (data.message) {
                    FlashMessage.error(data.message);
                } else {
                    FlashMessage.error(data.error.message);
                }
            }
        });
    },
    userChangeSkills: function (data, skillChange) {
        var form = $(this).closest('form');
        var url = form.attr('action');

        if (skillChange.deselected) {
            swal({
                title: "Are you sure?",
                text: "When you remove a skill you will also lose all your points for the specific skill.!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#45c54b",
                confirmButtonText: "Yes, remove skill!",
                cancelButtonText: "Regret",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url,
                        type: 'put',
                        dataType: 'json',
                        data: skillChange,
                        success: function (data) {
                            FlashMessage.success(data.message);
                        },
                        error: function (data) {
                            var data = $.parseJSON(data.responseText);
                            if (data.message) {
                                FlashMessage.error(data.message);
                            } else {
                                FlashMessage.error(data.error.message);
                            }
                        }
                    });
                } else {
                    return false
                }
            });
        } else {
            $.ajax({
                url: url,
                type: 'put',
                dataType: 'json',
                data: skillChange,
                success: function (data) {
                    FlashMessage.success(data.message);
                },
                error: function (data) {
                    var data = $.parseJSON(data.responseText);
                    if (data.message) {
                        FlashMessage.error(data.message);
                    } else {
                        FlashMessage.error(data.error.message);
                    }
                }
            });
        }
    }
};

Bealeet.switcher = {
    init: function () {
        $('input#user-profile-searching-switcher').on('change', this.userChangeSearchStatus)
    },
    userChangeSearchStatus: function () {
        var form = $(this).closest('form');
        var url = form.attr('action');
        var isSearching = $(this).prop('checked');

        $.ajax({
            url: url,
            type: 'put',
            dataType: 'json',
            data: {isSearching: isSearching},
            success: function (data) {
                FlashMessage.success(data.message);
            },
            error: function (data) {
                var data = $.parseJSON(data.responseText);
                if (data.message) {
                    FlashMessage.error(data.message);
                } else {
                    FlashMessage.error(data.error.message);
                }
            }
        })
    }
}

Bealeet.selectpicker = {
    init: function () {
        $('select.selectpicker').selectpicker();

        $('div.user-profile-subheader-games-primary select')
            .selectpicker()
            .on('change', this.userChangePrimaryGame);
    },
    userChangePrimaryGame: function () {
        var form = $(this).closest('form');
        var url = form.attr('action');
        var favoriteGame = $(this).val();

        $.ajax({
            url: url,
            type: 'put',
            dataType: 'json',
            data: {favoriteGameId: favoriteGame},
            success: function (data) {
                FlashMessage.success(data.message);
            },
            error: function (data) {
                var data = $.parseJSON(data.responseText);
                if (data.message) {
                    FlashMessage.error(data.message);
                } else {
                    FlashMessage.error(data.error.message);
                }
            }
        });
    }
};

Bealeet.skills = {
    init: function () {
        $('.btn-testify-skill').on('click', this.addSkillPoint);
    },
    addSkillPoint: function () {
        var that = $(this),
            form = that.closest('form'),
            url = form.attr('action'),
            parent = that.closest('.user-profile-skills-item'),
            skill = parent.data('skill');

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {skillId: skill},
            success: function (data) {
                form.remove();
                parent.removeClass('plusable');

                parent.attr('data-amount', (parseInt(parent.data('amount')) + 1));

                FlashMessage.success(data.message);
            },
            error: function (data) {
                var data = $.parseJSON(data.responseText);
                if (data.message) {
                    FlashMessage.error(data.message);
                } else {
                    FlashMessage.error(data.error.message);
                }
            }
        });
    }
};

Bealeet.findPlayers = {
    init: function () {
        $("select#filterGames").on('change', this.filterGame);
    },
    filterGame: function () {

        window.location.replace(window.location.origin + '/find/players/' + this.value);
    }
};

Bealeet.fadeoutLinks = {
    init: function () {
        this.main();
    },
    main: function () {

        $('a').click(function () {
            if (($(this).attr('target') != '_blank') && ($(this).attr('href').indexOf('mailto') == -1) && ($(this).attr('href').indexOf('#') == -1)) {

                $('div.container').fadeOut(400);

            }
        });

    }
};

Bealeet.conversations = {
    init: function () {
        this.setConversationsTimes();
        $('form.conversation-form textarea').on('keyup', this.sendOnEnterClick);
    },
    setConversationsTimes: function () {
        $.each($('span.conversation__last__time'), function() {
            var value = moment($(this).data('time')).fromNow();
            $(this).html(value);
        });
    },
    sendOnEnterClick: function (e) {
        if (e.keyCode == 13 && !e.shiftKey) {
            $(this).closest('form').submit();
        }
        return false;
    }
};

$(function () {
    Bealeet.fadeoutLinks.init();

    Bealeet.toggle.init();
    Bealeet.chosen.init();
    Bealeet.selectpicker.init();
    Bealeet.switcher.init();

    Bealeet.skills.init();

    Bealeet.findPlayers.init();

    Bealeet.conversations.init();

    $(document).ready(function () {
        $("div.container").animate({
            opacity: 1
        }, 400);
    });
});