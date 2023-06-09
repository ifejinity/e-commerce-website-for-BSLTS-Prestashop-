/**
 * Copyright © Lyra Network.
 * This file is part of Lyra Collect plugin for PrestaShop. See COPYING.md for license details.
 *
 * @author    Lyra Network (https://www.lyra.com/)
 * @copyright Lyra Network
 * @license   https://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 */

/**
 * REST API JS tools.
 */

$(function() {
    $('#total_price').on('DOMSubtreeModified', function() {
        // If it's one-page checkout, do nothing.
        if (lyra.pageType === 'order-opc') {
            return;
        }

        var refreshData = 'refreshToken=1';
        if (typeof $('#lyra_payment_by_identifier') !== 'undefined') {
            refreshData += '&refreshIdentifierToken=1';
        }

        $.ajax({
            type: 'POST',
            url: decodeURIComponent(lyra.restUrl),
            async: false,
            cache: false,
            data: refreshData,
            success: function(json) {
                var response = JSON.parse(json);

                if (response.token) {
                    var token = response.token;
                    sessionStorage.setItem('lyraToken', response.token);

                    if (response.identifierToken) {
                        sessionStorage.setItem('lyraIdentifierToken', response.identifierToken);

                        if ($('#lyra_payment_by_identifier').val() == '1') {
                            token = response.identifierToken;
                        }
                    }

                    KR.setFormConfig({ formToken: token,  language: LYRA_LANGUAGE });
                }
            }
        });
    });

    setTimeout(function() {
        if ($('#cgv').length) {
            if ($('#cgv').is(':checked')) {
                $('.lyra .kr-payment-button').removeAttr('disabled');
            } else {
                // Unchecked CVG, disable payment button.
                $('.lyra .kr-payment-button').attr('disabled', 'disabled');
            }
        }

        $('.lyra .kr-payment-button').click(function(e) {
            $('.lyra .kr-form-error').html('');
        });

        lyraInitRestEvents();
    }, 0);
});

// Use default messages for these errors.
const LYRA_DEFAULT_MESSAGES = [
    'CLIENT_300', 'CLIENT_304', 'CLIENT_502', 'PSP_539'
];

// Errors requiring page reloading.
const LYRA_EXPIRY_ERRORS = [
    'PSP_108', 'PSP_136', 'PSP_649'
];

var lyraInitRestEvents = function() {
    KR.onError(function(e) {
        $('.lyra .processing').css('display', 'none');
        $('#lyra_oneclick_payment_description').show();

        if ($('#lyra_standard').length && $('#lyra_standard').data('submitted')) {
            // PrestaShop 1.7 template.
            $('#payment-confirmation button').removeAttr('disabled');
            $('#lyra_standard').data('submitted', false);
        }

        var msg = '';
        if (LYRA_DEFAULT_MESSAGES.indexOf(e.errorCode) > -1) {
            msg = e.errorMessage;
            var endsWithDot = (msg.lastIndexOf('.') == (msg.length - 1) && msg.lastIndexOf('.') >= 0);

            msg += (endsWithDot ? '' : '.');
        } else {
            msg = lyraTranslate(e.errorCode);
        }

        // Non recoverable errors, display a link to refresh the page.
        if (LYRA_EXPIRY_ERRORS.indexOf(e.errorCode) > -1) {
            msg += ' <a href="#" onclick="window.location.reload(); return false;">' + lyraTranslate('RELOAD_LINK') + '</a>';
        }

        $('.lyra .kr-form-error').html('<span style="color: red;"><span>' + msg + '</span></span>');
    });

    KR.onFocus(function(e) {
        $('.lyra .kr-form-error').html('');
    });

    KR.button.onClick(function() {
        // Hide oneclick description if it is present and is not popin mode.
        if ($('#lyra_oneclick_payment_description').length && ! $('.lyra .kr-popin-button').length) {
            $('#lyra_oneclick_payment_description').hide();
        }
    });
};

// Translate error message.
var lyraTranslate = function(code) {
    var lang = LYRA_LANGUAGE; // Global variable that contains current language.
    var messages = LYRA_ERROR_MESSAGES.hasOwnProperty(lang) ? LYRA_ERROR_MESSAGES[lang] : LYRA_ERROR_MESSAGES['en'];

    if (!messages.hasOwnProperty(code)) {
        var index = code.lastIndexOf('_');
        code = code.substring(0, index + 1) + '999';
    }

    return messages[code];
};

var LYRA_ERROR_MESSAGES = {
    fr: {
        RELOAD_LINK: 'Veuillez rafraîchir la page.',
        CLIENT_001: 'Le paiement est refusé. Essayez de payer avec une autre carte.',
        CLIENT_101: 'Le paiement est annulé.',
        CLIENT_301: 'Le numéro de carte est invalide. Vérifiez le numéro et essayez à nouveau.',
        CLIENT_302: 'La date d\'expiration est invalide. Vérifiez la date et essayez à nouveau.',
        CLIENT_303: 'Le code de sécurité CVV est invalide. Vérifiez le code et essayez à nouveau.',
        CLIENT_999: 'Une erreur technique est survenue. Merci de réessayer plus tard.',

        INT_999: 'Une erreur technique est survenue. Merci de réessayer plus tard.',

        PSP_003: 'Le paiement est refusé. Essayez de payer avec une autre carte.',
        PSP_099: 'Trop de tentatives ont été effectuées. Merci de réessayer plus tard.',
        PSP_108: 'Le formulaire a expiré.',
        PSP_999: 'Une erreur est survenue durant le processus de paiement.',

        ACQ_001: 'Le paiement est refusé. Essayez de payer avec une autre carte.',
        ACQ_999: 'Une erreur est survenue durant le processus de paiement.'
    },

    en: {
        RELOAD_LINK: 'Please refresh the page.',
        CLIENT_001: 'Payment is refused. Try to pay with another card.',
        CLIENT_101: 'Payment is cancelled.',
        CLIENT_301: 'The card number is invalid. Please check the number and try again.',
        CLIENT_302: 'The expiration date is invalid. Please check the date and try again.',
        CLIENT_303: 'The card security code (CVV) is invalid. Please check the code and try again.',
        CLIENT_999: 'A technical error has occurred. Please try again later.',

        INT_999: 'A technical error has occurred. Please try again later.',

        PSP_003: 'Payment is refused. Try to pay with another card.',
        PSP_099: 'Too many attempts. Please try again later.',
        PSP_108: 'The form has expired.',
        PSP_999: 'An error has occurred during the payment process.',

        ACQ_001: 'Payment is refused. Try to pay with another card.',
        ACQ_999: 'An error has occurred during the payment process.'
    },

    de: {
        RELOAD_LINK: 'Bitte aktualisieren Sie die Seite.',
        CLIENT_001: 'Die Zahlung wird abgelehnt. Versuchen Sie, mit einer anderen Karte zu bezahlen.',
        CLIENT_101: 'Die Zahlung wird storniert.',
        CLIENT_301: 'Die Kartennummer ist ungültig. Bitte überprüfen Sie die Nummer und versuchen Sie es erneut.',
        CLIENT_302: 'Das Verfallsdatum ist ungültig. Bitte überprüfen Sie das Datum und versuchen Sie es erneut.',
        CLIENT_303: 'Der Kartenprüfnummer (CVC) ist ungültig. Bitte überprüfen Sie den Nummer und versuchen Sie es erneut.',
        CLIENT_999: 'Ein technischer Fehler ist aufgetreten. Bitte Versuchen Sie es später erneut.',

        INT_999: 'Ein technischer Fehler ist aufgetreten. Bitte Versuchen Sie es später erneut.',

        PSP_003: 'Die Zahlung wird abgelehnt. Versuchen Sie, mit einer anderen Karte zu bezahlen.',
        PSP_099: 'Zu viele Versuche. Bitte Versuchen Sie es später erneut.',
        PSP_108: 'Das Formular ist abgelaufen.',
        PSP_999: 'Ein Fehler ist während dem Zahlungsvorgang unterlaufen.',

        ACQ_001: 'Die Zahlung wird abgelehnt. Versuchen Sie, mit einer anderen Karte zu bezahlen.',
        ACQ_999: 'Ein Fehler ist während dem Zahlungsvorgang unterlaufen.'
    },

    es: {
        RELOAD_LINK: 'Por favor, actualice la página.',
        CLIENT_001: 'El pago es rechazado. Intenta pagar con otra tarjeta.',
        CLIENT_101: 'Se cancela el pago.',
        CLIENT_301: 'El número de tarjeta no es válido. Por favor, compruebe el número y vuelva a intentarlo.',
        CLIENT_302: 'La fecha de caducidad no es válida. Por favor, compruebe la fecha y vuelva a intentarlo.',
        CLIENT_303: 'El código de seguridad de la tarjeta (CVV) no es válido. Por favor revise el código y vuelva a intentarlo.',
        CLIENT_999: 'Ha ocurrido un error técnico. Por favor, inténtelo de nuevo más tarde.',

        INT_999: 'Ha ocurrido un error técnico. Por favor, inténtelo de nuevo más tarde.',

        PSP_003: 'El pago es rechazado. Intenta pagar con otra tarjeta.',
        PSP_099: 'Demasiados intentos. Por favor, inténtelo de nuevo más tarde.',
        PSP_108: 'El formulario ha expirado.',
        PSP_999: 'Ocurrió un error en el proceso de pago.',

        ACQ_001: 'El pago es rechazado. Intenta pagar con otra tarjeta.',
        ACQ_999: 'Ocurrió un error en el proceso de pago.'
    }
};
