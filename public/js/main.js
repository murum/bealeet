window.fbAsyncInit=function(){FB.init({appId:"671187556307321",xfbml:!0,version:"v2.1"})},$(function(){}),jQuery(document).ready(function(e){function t(){a.addClass("is-selected"),n.removeClass("is-selected"),r.removeClass("is-selected"),c.addClass("selected"),d.removeClass("selected")}function s(){a.removeClass("is-selected"),n.addClass("is-selected"),r.removeClass("is-selected"),c.removeClass("selected"),d.addClass("selected")}function l(){a.removeClass("is-selected"),n.removeClass("is-selected"),r.addClass("is-selected")}var i=e(".bealeet-user-modal"),a=i.find("#bealeet-login"),n=i.find("#bealeet-signup"),r=i.find("#bealeet-reset-password"),o=e(".bealeet-switcher"),c=o.children("li").eq(0).children("a"),d=o.children("li").eq(1).children("a"),u=a.find(".bealeet-form-bottom-message a"),v=r.find(".bealeet-form-bottom-message a"),f=e(".navbar-nav");f.on("click",function(l){e(l.target).is(f)?e(this).children("ul").toggleClass("is-visible"):(f.children("ul").removeClass("is-visible"),i.addClass("is-visible"),e(l.target).is(".bealeet-signup")?s():t())}),e(".bealeet-user-modal").on("click",function(t){(e(t.target).is(i)||e(t.target).is(".bealeet-close-form"))&&i.removeClass("is-visible")}),e(document).keyup(function(e){"27"==e.which&&i.removeClass("is-visible")}),o.on("click",function(l){l.preventDefault(),e(l.target).is(c)?t():s()}),e(".hide-password").on("click",function(){var t=e(this),s=t.prev("input");"password"==s.attr("type")?s.attr("type","text"):s.attr("type","password"),"Hide"==t.text()?t.text("Show"):t.text("Hide"),s.putCursorAtEnd()}),u.on("click",function(e){e.preventDefault(),l()}),v.on("click",function(e){e.preventDefault(),t()}),Modernizr.input.placeholder||(e("[placeholder]").focus(function(){var t=e(this);t.val()==t.attr("placeholder")&&t.val("")}).blur(function(){var t=e(this);(""==t.val()||t.val()==t.attr("placeholder"))&&t.val(t.attr("placeholder"))}).blur(),e("[placeholder]").parents("form").submit(function(){e(this).find("[placeholder]").each(function(){var t=e(this);t.val()==t.attr("placeholder")&&t.val("")})}))}),jQuery.fn.putCursorAtEnd=function(){return this.each(function(){if(this.setSelectionRange){var e=2*$(this).val().length;this.setSelectionRange(e,e)}else $(this).val($(this).val())})};