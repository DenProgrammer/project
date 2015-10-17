/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    var Data = new Array();
    var keys = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
    var activeKey = 0;

    $('#add').click(function () {
        var val1 = $('#val1').val();
        var val2 = $('#val2').val();

        if (val1 > 0 && val2 > 0 && val2 > val1) {
            var values = new Array();
            values['smv'] = activeKey;
            values['min'] = val1;
            values['max'] = val2;
            Data[activeKey] = values;

            activeKey++;

            $('#val0').html(keys[activeKey]);
            $('#val1').val('');
            $('#val2').val('');

            var html = '';
            $.each(Data, function (i, item) {
                html += keys[Data[i]['smv']] + ' => ' + Data[i]['min'] + ' / ' + Data[i]['max'] + '<br />';
            });

            $('#data').html(html);
        } else {
            alert('error');
        }
    });

    $('#calc').click(function () {
        var middle = 1;
        $.each(Data, function (i, item) {
            middle = middle * Data[i]['max'];
        });

        var Aitog = new Array();
        var percent100 = 0;
        $.each(Data, function (i, item) {
            Aitog[i] = middle * Data[i]['min'] / Data[i]['max'];
            percent100 += middle * Data[i]['min'] / Data[i]['max'];
        });

        var random = Math.floor((Math.random() * 100) + 1);

        var html = '';
        var map = '';
        var resKey = '';
        var perc = 0;
        var allperc = 0;
        $.each(Data, function (i, item) {
            perc = Aitog[i] * 100 / percent100;
            allperc += perc;
            if (random < allperc && resKey === ''){
                resKey = keys[i];
            }
            
            html += keys[Data[i]['smv']] + ' => ' + Math.round(perc) + '%<br />';
            map += '<div style="width: ' + Math.round(perc) * 6 + 'px"><span>' + keys[i] + '</span></div>';
        });

            map += '<div id="mapCursor" style="left: ' + random * 6 + 'px"></div>';
            
        $('#percents').html(html);
        $('#map').html(map);
        $('#outputVal').val(resKey);

        console.log(random);
    });
});


