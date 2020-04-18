<div class="container rules-container">
    <div class="card-deck mb-3 text-center">
        <div class="card mb-6 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">1</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Если найдены блюда с полным совпадением ингредиентов выводятся только
                        они.
                    </li>
                </ul>
            </div>
        </div>
        <div class="card mb-6 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">2</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Если найдены блюда с частичным совпадением ингредиентов - выводим
                        в порядке уменьшения совпадения ингредиентов вплоть до 2х
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-deck mb-3 text-center">
        <div class="card mb-6 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">3</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Если найдены блюда с совпадением менее чем 2 ингредиента или не
                        найдены вовсе, выводится
                        “Ничего не найдено”
                    </li>
                </ul>
            </div>
        </div>
        <div class="card mb-6 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">4</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Если выбрано менее 2х
                        ингредиентов не ищем, нужно больше ингредиентов
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>