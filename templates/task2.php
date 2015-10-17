<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript" src="js/script.js" ></script>
<div class="row">
    <div class="col-md-12 text-left header">Введите данные входящего массива</div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="subform">
            <span id="val0">a</span>
            <span>)</span>
            <input class="form-control inline" type="text" id="val1" />
            <span class="sim"> / </span>
            <input class="form-control inline" type="text" id="val2" />
            <input class="btn btn-primary inline" type="button" id="add" value="Добавить" />
        </div>

    </div>
    <div class="col-md-6 text-left">
        <div class="warning-text">
            <div class="warning">!</div>Числитель не может быть отрицательным.
        </div>
        <div>
            <div class="warning">!</div>Знаменатель должен быть больше 0.
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div id="data"></div>
    </div>

</div>
<div class="row">
    <div class="col-md-12 text-left header">Решение данной задачи</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="subform">
            <div class="row">
                <div class="col-md-6">
                    <div id="percents"></div>
                </div>

                <div class="col-md-6 form-inline">
                    <span>Выходной параметр: </span>
                    <input class="form-control input-sm" type="text" id="outputVal" value="" />
                    <input type="button" class="btn btn-success" id="calc" value="Выполнить" />
                </div>
            </div>
            <div class="row">
                <div id="map"></div>
            </div>
        </div>
    </div>
</div>
