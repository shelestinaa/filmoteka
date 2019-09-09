const $ = require('jquery');
require('select2');

$(document).ready(function () {
    var tagSelect = $('.selecting').select2({
        tags: true
    }).on('select2:select', function (e) {
        var data = e.params.data;

        if (typeof data.disabled === "undefined") {
            checkTagExists(data);
        }
    });

    function checkTagExists(data) {

        $(".selecting").prop("disabled", true);
        $(".btn-warning").disabled = true;
        $('#myInput').show();
        $('#myInput').modal({backdrop: 'static', keyboard: false});

        var title = data.text;

        $.ajax({
            type: 'GET',
            url: '/tag/check/' + title
        }).then(function (tag) {
            $(".selecting").prop("disabled", false);
            $('#myInput').hide();
            $('.modal-backdrop').hide();
            tagSelect.val(tagSelect.val().filter(function (val) {
                return val !== tag.title
            }));

            var option = new Option(tag.title, tag.id, true, true);
            tagSelect.append(option).trigger('change');

            tag.disabled = false;
            tag.selected = true;

            tagSelect.trigger({
                type: 'select2:select',
                params: {
                    data: tag
                }
            });
        });

        return null;
    }
});