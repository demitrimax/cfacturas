var options = {
    ajax          : {
        url     : '/GetClaveps',
        type    : 'GET',
        dataType: 'json',
        // Use '{{{q}}}' as a placeholder and Ajax Bootstrap Select will
        // automatically replace it with the value of the search query.
        data    : {
            q: '{{{q}}}'
        }
    },
    locale        : {
        emptyTitle: 'Seleccione y escriba un texto'
    },
    log           : 3,
    langCode: 'es-ES',
    preprocessData: function (data) {
        var i, l = data.length, array = [];
        if (l) {
            for (i = 0; i < l; i++) {
                array.push($.extend(true, data[i], {
                    text : data[i].id,
                    value: data[i].id,
                    data : {
                        subtext: data[i].nombre
                    }
                }));
            }
        }
        // You must always return a valid array when processing data. The
        // data argument passed is a clone and cannot be modified directly.
        return array;
    }
};

$('.selectpicker').selectpicker().filter('.with-ajax').ajaxSelectPicker(options);
