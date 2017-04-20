<div class="row">
    <div class="col-sm-6">
        <img id="image_{{ID}}" src="{{IMG_ORIG_PATH}}" alt="{{IMG_NAME}}" class="img-thumbnail">
    </div>
    <div class="col-sm-6">
        <table class="table table-striped table-hover table-condensed small">
            <tbody>
                <tr>
                    <td>Наименование:</td>
                    <td>{{NAME}}</td>
                </tr>
                <tr>
                    <td>Артикул:</td>
                    <td>{{ARTICUL}}</td>
                </tr>
                <tr>
                    <td>Описание:</td>
                    <td>{{DESCRIPTION}}</td>
                </tr>
                <tr>
                    <td>В наличии:</td>
                    <td>{{COUNT}}</td>
                </tr>
                <tr>
                    <td>Цена:</td>
                    <td>{{COST}} р.</td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <button id="prod-{{ID}}" class="btn btn-success btn-lg btn-add-buy">Купить!</button>
        </div>
    </div>
</div>