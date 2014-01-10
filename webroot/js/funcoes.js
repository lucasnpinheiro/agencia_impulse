// funçoes do painel
painel = {
    complete_dominio: function() {
        $('#UsuarioLoginForm #UsuarioEmail').on("keyup keypress keydown", function(event) {
            if (funcoes.verificaTeclaPress(event, 42)) {
                event.preventDefault();
                var user_atual = $(this).val().split("@");
                $(this).val(user_atual[0] + "@williarts.com.br");
                var user = $(this).val();
                $(this).val(user.replace("*", ""));
                $('#UsuarioLoginForm #UsuarioSenha').focus();
            }
        });
    }
};

// funçoes gerais
funcoes = {
    mascaras: function() {
        $(".data").datepicker({changeMonth: true, changeYear: true});
        $(".dataniver").datepicker({changeMonth: true, changeYear: true, yearRange: "c-70:c+0"});
        $(".data, .dataniver").mask('99/99/9999');
        $(".hora").timepicker().mask('99:99:99');
        $('.datatime').datetimepicker({
            onSelect: function(dateText,obj) {
                $(this).change();
            },
            addSliderAccess: true,
            sliderAccessArgs: {touchonly: false}
        }).change(function() {
            if(typeof (datepickerChange) === 'function'){
                datepickerChange(this);
            }
        }).mask('99/99/9999 99:99:99');
        $(".numero").keypress(funcoes.numero);
        $('.telefone').mask('(99) 9999-99999');
        $('.celular').mask('(99) 99999-9999');
        $('.cep').mask('99999-999');
        $('.cnpj').mask("99.999.999/9999-99");
        $('.cpf').mask("999.999.999-99");
        $('.moeda, .porcentagem').maskMoney('destroy');
        $('.moeda').maskMoney({
            'symbol': 'R$ ',
            'symbolStay': true,
            'thousands': '.',
            'decimal': ',',
            'allowNegative': true
        });
        $('.porcentagem').maskMoney({
            'symbol': '% ',
            'symbolStay': true,
            'thousands': '.',
            'decimal': ',',
            'allowNegative': false,
            'precision': 0
        });
        $(':input[autofocus]').eq(0).focus();
    },
    numero: function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    },
    caresp: Array('<', '>', '!', '#', '$', '%', '¨', '&', '*', '(', ')', '+', '=', '{', '}', '[', ']', '?', ';', ':', ',', '|', '"', '~', '^', '´', '`', '¨', 'æ', 'Æ', 'ø', '£', 'Ø', 'ƒ', 'ª', 'º', '¿', '®', '½', '¼', 'ß', 'µ', 'þ', 'ý', 'Ý', '\'', '\\', '/', ' ', 'á', 'à', 'ã', 'â', 'ä', 'Á', 'À', 'Ã', 'Â', 'Ä', 'é', 'è', 'É', 'È', 'í', 'ì', 'Í', 'Ì', 'ó', 'ò', 'ö', 'õ', 'ô', 'Ó', 'Ò', 'Ö', 'Õ', 'Ô', 'ú', 'ù', 'ü', 'Ú', 'Ù', 'Ü', 'ç', 'Ç', 'ñ', 'Ñ', '§', '¬', '³', '²', '¹', '°'),
    carsfim: Array('.', '@', '_', '-'),
    in_array: function(needle, haystack, argStrict) {
        var key = '',
                strict = !!argStrict;
        if (strict) {
            for (key in haystack) {
                if (haystack[key] === needle) {
                    return true;
                }
            }
        } else {
            for (key in haystack) {
                if (haystack[key] == needle) {
                    return true;
                }
            }
        }
        return false;
    },
    verificaTeclaPress: function(event, codTecla) {
        var teclaPres;
        if (event && event.which) {
            event = event;
            teclaPres = event.which;
        } else {
            event = event;
            teclaPres = event.keyCode;
        }
        if (teclaPres == codTecla) {
            return true;
        } else {
            return false;
        }
    },
    confirma: function(msg, title, options) {
        title = (!title ? '' : title);
        if ($('#dialog-message').length == 0) {
            $('body').append('<div id="dialog-message" title="' + title + '"><p></p></div>');
        } else {
            $("#dialog-message").dialog("destroy");
        }
        $('#dialog-message p').html(msg);
        $("#dialog-message").dialog({
            modal: true,
            width: 300,
            height: 200,
            my: "center",
            at: "center",
            resizable: false,
            closeText: "Fechar",
            buttons: {
                'Sim': function() {
                    $(this).dialog("close");
                    if (typeof options.redirect != 'undefined' && options.redirect != '') {
                        window.location.href = options.redirect;
                    }
                    else {
                        var settings = $.extend(true, {
                            data: {},
                            dataType: 'json',
                            type: 'POST',
                            url: '',
                            tr: null,
                            console: false,
                            success: function(result, options) {

                            },
                            error: function(result, options) {

                            },
                            beforeSend: function(options) {

                            }
                        }, options);
                        $.ajax({
                            url: settings.url,
                            data: settings.data,
                            dataType: settings.dataType,
                            type: settings.type,
                            success: function(result) {
                                if (typeof result.msg != 'undefined') {
                                    funcoes.modal(result.msg, title);
                                }
                                if (result.cod == 111) {
                                    settings.error.call(null, result, settings);
                                } else {
                                    if (settings.tr != null) {
                                        $(settings.tr).remove();
                                    }
                                    settings.success.call(null, result, settings);
                                }
                            },
                            beforeSend: function() {
                                settings.beforeSend.call(null, settings);
                            }
                        });
                    }
                },
                'Não': function() {
                    $(this).dialog("close");
                }
            }
        });
    },
    modal: function(msg, title, redirect) {
        title = (!title ? '' : title);
        if ($('#dialog-message').length == 0) {
            $('body').append('<div id="dialog-message" title="' + title + '"><p></p></div>');
        }
        $("#dialog:ui-dialog, #dialog-message").dialog("destroy");
        $('#dialog-message p').html(msg);
        $("#dialog-message").dialog({
            modal: true,
            width: 300,
            height: 200,
            my: "center",
            at: "center",
            buttons: {
                Ok: function() {
                    $(this).dialog("close");
                    if (typeof redirect != 'undefined' && $.trim(redirect) != '') {
                        location.href = redirect;
                    }
                }
            }
        });
    },
    tr_editar: function() {
        $('.tr_editar').on('dblclick', function(e) {
            e.preventDefault();
            window.location.href = $(this).find('td').find('.link_tr_editar').attr('href');
        });
    },
    replaceAll: function(string, token, newtoken) {
        while (string.indexOf(token) != -1) {
            string = string.replace(token, newtoken);
        }
        return string;
    }
};
$(document).ready(function() {
    painel.complete_dominio();
    funcoes.mascaras();
    funcoes.tr_editar();
});

//Ajax
jQuery.ajaxSetup({
    dataType: "json",
    type: "post",
    error: function(a, b, c) {
        var errors = '';
        if (a.status == 0) {
            errors = ('You are offline!!<br /> Please Check Your Network.');
        } else if (a.status == 404) {
            errors = ('URL not found.');
        } else if (a.status == 500) {
            errors = ('Internel Server Error.');
        } else if (b == 'parsererror') {
            errors = ('Error.<br />Parsing JSON Request failed.');
        } else if (b == 'timeout') {
            errors = ('Request Time out.');
        } else {
            errors = ('Unknow Error.<br />' + a.responseText);
        }
        errors += '<br /><br />Duvidas entrar em contato com o administador do site.';
        _logs(a.status);
        _logs(b);
        _logs(c);
        _logs(errors);
    }
});


//Cookie
jQuery.cookie = function(key, value, options) {
    if (arguments.length > 1 && String(value) !== "[object Object]") {
        options = jQuery.extend({}, options);
        if (value === null || value === undefined) {
            options.expires = -1
        }
        if (typeof options.expires === 'number') {
            var days = options.expires, t = options.expires = new Date();
            t.setDate(t.getDate() + days)
        }
        value = String(value);
        return(document.cookie = [encodeURIComponent(key), '=', options.raw ? value : encodeURIComponent(value), options.expires ? '; expires=' + options.expires.toUTCString() : '', options.path ? '; path=' + options.path : '', options.domain ? '; domain=' + options.domain : '', options.secure ? '; secure' : ''].join(''))
    }
    options = value || {};
    var result, decode = options.raw ? function(s) {
        return s
    } : decodeURIComponent;
    return(result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null
};

_logs = function(dados, z) {
    z = (!z ? 0 : z);
    function __logs(k, v) {
        var d = new Date();
        var q = '';
        d.setMonth(d.getMonth() + 1);
        var l = '';
        l += 'Debugando ' + d.getDate() + '/' + d.getMonth() + '/' + d.getYear() + ' ' + d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds() + "\n";
        l += '[' + k + '] => ' + $.type(v) + ' ';
        if (v === null) {
            q = 'NULL';
        } else if (typeof v === 'boolean') {
            q = 'bool(' + v + ')';
        } else if (typeof v === 'string') {
            q = 'string(' + v.length + ') "' + v + '"';
        } else if (typeof v === 'number') {
            if (parseFloat(v) == parseInt(v, 10)) {
                q = 'int(' + v + ')';
            } else {
                q = 'float(' + v + ')';
            }
        }
        l += q + "\n";
        l += "---------------------------------------------------------------------------------------------------" + "\n";
        console.log(l);
    }
    if ($.type(dados) === 'array' || $.type(dados) === 'object') {
        $.each(dados, function(k, v) {
            _logs(v, k);
        });
    } else {
        __logs(z, dados);
    }
}

/* Brazilian initialisation for the jQuery UI date picker plugin. */
/* Written by Leonildo Costa Silva (leocsilva@gmail.com). */
jQuery(function($) {
    $.datepicker.regional['pt-BR'] = {
        closeText: 'Fechar',
        prevText: '&#x3C;Anterior',
        nextText: 'Próximo&#x3E;',
        currentText: 'Hoje',
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
            'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
            'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        dayNames: ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'],
        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''};
    $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
});

/*
 
 jQuery Browser Plugin
 * Version 2.3
 * 2008-09-17 19:27:05
 * URL: http://jquery.thewikies.com/browser
 * Description: jQuery Browser Plugin extends browser detection capabilities and can assign browser selectors to CSS classes.
 * Author: Nate Cavanaugh, Minhchau Dang, & Jonathan Neal
 * Copyright: Copyright (c) 2008 Jonathan Neal under dual MIT/GPL license.
 * JSLint: This javascript file passes JSLint verification.
 *//*jslint
  bitwise: true,
  browser: true,
  eqeqeq: true,
  forin: true,
  nomen: true,
  plusplus: true,
  undef: true,
  white: true
  *//*global
   jQuery
   */

(function($) {
    $.browserTest = function(a, z) {
        var u = 'unknown', x = 'X', m = function(r, h) {
            for (var i = 0; i < h.length; i = i + 1) {
                r = r.replace(h[i][0], h[i][1]);
            }

            return r;
        }, c = function(i, a, b, c) {
            var r = {
                name: m((a.exec(i) || [u, u])[1], b)
            };

            r[r.name] = true;

            r.version = (c.exec(i) || [x, x, x, x])[3];

            if (r.name.match(/safari/) && r.version > 400) {
                r.version = '2.0';
            }

            if (r.name === 'presto') {
                r.version = ($.browser.version > 9.27) ? 'futhark' : 'linear_b';
            }
            r.versionNumber = parseFloat(r.version, 10) || 0;
            r.versionX = (r.version !== x) ? (r.version + '').substr(0, 1) : x;
            r.className = r.name + r.versionX;

            return r;
        };

        a = (a.match(/Opera|Navigator|Minefield|KHTML|Chrome/) ? m(a, [
            [/(Firefox|MSIE|KHTML,\slike\sGecko|Konqueror)/, ''],
            ['Chrome Safari', 'Chrome'],
            ['KHTML', 'Konqueror'],
            ['Minefield', 'Firefox'],
            ['Navigator', 'Netscape']
        ]) : a).toLowerCase();

        $.browser = $.extend((!z) ? $.browser : {}, c(a, /(camino|chrome|firefox|netscape|konqueror|lynx|msie|opera|safari)/, [], /(camino|chrome|firefox|netscape|netscape6|opera|version|konqueror|lynx|msie|safari)(\/|\s)([a-z0-9\.\+]*?)(\;|dev|rel|\s|$)/));

        $.layout = c(a, /(gecko|konqueror|msie|opera|webkit)/, [
            ['konqueror', 'khtml'],
            ['msie', 'trident'],
            ['opera', 'presto']
        ], /(applewebkit|rv|konqueror|msie)(\:|\/|\s)([a-z0-9\.]*?)(\;|\)|\s)/);

        $.os = {
            name: (/(win|mac|linux|sunos|solaris|iphone)/.exec(navigator.platform.toLowerCase()) || [u])[0].replace('sunos', 'solaris')
        };

        if (!z) {
            $('html').addClass([$.os.name, $.browser.name, $.browser.className, $.layout.name, $.layout.className].join(' '));
        }
    };

    $.browserTest(navigator.userAgent);
})(jQuery);

function urldecode(str) {
    // http://kevin.vanzonneveld.net
    // +   original by: Philip Peterson
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: AJ
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // +      input by: travc
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Lars Fischer
    // +      input by: Ratheous
    // +   improved by: Orlando
    // +   reimplemented by: Brett Zamir (http://brett-zamir.me)
    // +      bugfixed by: Rob
    // +      input by: e-mike
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // +      input by: lovio
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // %        note 1: info on what encoding functions to use from: http://xkr.us/articles/javascript/encode-compare/
    // %        note 2: Please be aware that this function expects to decode from UTF-8 encoded strings, as found on
    // %        note 2: pages served as UTF-8
    // *     example 1: urldecode('Kevin+van+Zonneveld%21');
    // *     returns 1: 'Kevin van Zonneveld!'
    // *     example 2: urldecode('http%3A%2F%2Fkevin.vanzonneveld.net%2F');
    // *     returns 2: 'http://kevin.vanzonneveld.net/'
    // *     example 3: urldecode('http%3A%2F%2Fwww.google.nl%2Fsearch%3Fq%3Dphp.js%26ie%3Dutf-8%26oe%3Dutf-8%26aq%3Dt%26rls%3Dcom.ubuntu%3Aen-US%3Aunofficial%26client%3Dfirefox-a');
    // *     returns 3: 'http://www.google.nl/search?q=php.js&ie=utf-8&oe=utf-8&aq=t&rls=com.ubuntu:en-US:unofficial&client=firefox-a'
    // *     example 4: urldecode('%E5%A5%BD%3_4');
    // *     returns 4: '\u597d%3_4'
    return decodeURIComponent((str + '').replace(/%(?![\da-f]{2})/gi, function() {
        // PHP tolerates poorly formed escape sequences
        return '%25';
    }).replace(/\+/g, '%20'));
}

var msg = {
    error: function(div, msg) {
        $(div).find('.alert').remove();
        $(div).prepend('<div class="alert alert-warning"> <button class="close" data-dismiss="alert" type="button">×</button> ' + msg + '.</div>');
        $('html, body').animate({
            scrollTop: 0
        })
    },
    sucesso: function(div, msg) {
        $(div).find('.alert').remove();
        $(div).prepend('<div class="alert alert-success"> <button class="close" data-dismiss="alert" type="button">×</button> ' + msg + '.</div>');
        $('html, body').animate({
            scrollTop: 0
        })
    }
}

$(".excluir_ajax").on('click', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');
    funcoes.confirma("Você realmente deseja excluir?", "Confirmação", {'redirect': link});
});


(function($) {
    $.fn.novo_ceps = function(parametros) {

        var obj = this;

        var defaults = {
            remove_load: function() {
                $('#img_carregando').parent().remove();
            },
            msg_busca: "Aguarde... Consultando CEP.",
            tipo_consulta: "cep",
            exec_auto: false,
            campos: {
                'cep': '',
                'uf': '',
                'cidade': '',
                'bairro': '',
                'logradouro': '',
                'tipo_logradouro': '',
                'unico': ''
            },
            success: function(result, params, obj) {
            },
            error: function(result, params, obj) {
            },
            _consulta: function(exc, params, obj) {
                if (exc == true) {
                    if ($(obj).val() != '') {
                        $.ajax({
                            url: url + "ceps/cep/" + $(obj).val(),
                            dataType: "json",
                            async: true,
                            beforeSend: function() {
                                params.remove_load.call();
                                $(obj).after('<span class="exemplo_span">' + params.msg_busca + ' <img src="' + url + 'img/img_load_pequeno.gif" id="img_carregando"><span>');
                            },
                            success: function(result) {
                                if (result != undefined) {
                                    if (result.cod == 999) {
                                        params.success.call(null, result, params, obj);
                                    } else {
                                        params.error.call(null, result, params, obj);
                                        $(obj).subtitulo({msg: 'CEP não localizado.', css: {'color': 'red'}});
                                    }
                                } else {
                                    params.error.call(null, $.parseJSON('{"cod":"111","msg":"CEP não localizado."}'), params, obj);
                                    $(obj).subtitulo({msg: 'CEP não localizado.', css: {'color': 'red'}});
                                }
                                params.remove_load.call();
                            },
                            error: function() {
                                params.error.call(null, $.parseJSON('{"cod":"111","msg":"CEP não localizado."}'), params, obj);
                                $(obj).subtitulo({msg: 'CEP não localizado.', css: {'color': 'red'}});
                                params.remove_load.call();
                            }
                        });
                    }
                }
            }
        };

        var options = $.extend(true, defaults, parametros);
        options._consulta.call({}, options.exec_auto, options, obj);

        $(this).change(function() {
            options._consulta.call({}, true, options, obj);
        });

    };

})(jQuery);