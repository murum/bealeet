var FlashMessage = {};

FlashMessage.config = {
    messageContainer: $('div#messages-container')
};

FlashMessage.show = function(message, type) {
    // Create the alert message
    var alertDiv = document.createElement('div');
    alertDiv = $(alertDiv);
    alertDiv.addClass('alert').addClass('alert-'+type);
    alertDiv.append(message);

    // Add the message to DOM.
    FlashMessage.config.messageContainer.append(alertDiv);

    // Hide the message after 4s.
    alertDiv.delay(4000).fadeOut(1000);
};

FlashMessage.success = function(message) {
    FlashMessage.show(message, 'success')
};

FlashMessage.error = function(message) {
    FlashMessage.show(message, 'danger')
};

FlashMessage.info = function(message) {
    FlashMessage.show(message, 'info')
};

