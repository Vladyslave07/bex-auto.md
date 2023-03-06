<div class="card">
    <div class="bg">
        <div class="container">

            @include('partials.full_card.gallery')

            <div class="card-title">
                <h1 class="main-title">{{ $car->titleWithYear }}</h1>
                <h2 class="sub-title">Smart Edition</h2>
            </div>
            <div class="card-btn">
                <div>
                    <div class="price">$23 500</div>
                    <p>Под заказ</p>
                </div>
                <a href="#" class="btn">Заказать</a>
            </div>
            <div class="card-btn">
                <div>
                    <p>Кредит (Условия)</p>
                    <div class="price-credit">926$ / мес</div>
                </div>
                <a href="#" class="btn btn-blue">В кредит</a>
            </div>
            <div class="card-options">
                <div class="item">
                    <div class="title">Состояние</div>
                    <div class="form-check">
                        <label>
                            <input class="form-radio" type="radio" name="status" checked>
                            Новая
                        </label>
                    </div>
                    <div class="form-check">
                        <label>
                            <input class="form-radio" type="radio" name="status">
                            С пробегом
                        </label>
                    </div>
                </div>
                <div class="item">
                    <div class="title">Комплектация</div>
                    <div class="tab-content">
                        <div id="equipments_1" class="tab-pane active">
                            <div class="ul">
                                <label class="li">
                                    <input type="radio" name="battery" checked>
                                    <svg width="32" height="25"><use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use></svg>
                                    <span>93 kWh</span>
                                </label>
                                <label class="li">
                                    <input type="radio" name="battery">
                                    <svg width="32" height="25"><use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use></svg>
                                    <span>144 kWh</span>
                                </label>
                            </div>
                        </div>
                        <div id="equipments_2" class="tab-pane">
                            <div class="ul">
                                <label class="li">
                                    <input type="radio" name="battery2" checked>
                                    <svg width="32" height="25"><use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use></svg>
                                    <span>100 kWh</span>
                                </label>
                            </div>
                        </div>
                        <div id="equipments_3" class="tab-pane">
                            <div class="ul">
                                <label class="li">
                                    <input type="radio" name="battery3" checked>
                                    <svg width="32" height="25"><use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use></svg>
                                    <span>50 kWh</span>
                                </label>
                                <label class="li">
                                    <input type="radio" name="battery3">
                                    <svg width="32" height="25"><use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use></svg>
                                    <span>100 kWh</span>
                                </label>
                                <label class="li">
                                    <input type="radio" name="battery3">
                                    <svg width="32" height="25"><use xlink:href="{{ asset('img/icons/sprite.svg#battery') }}"></use></svg>
                                    <span>114 kWh</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="nav-tabs">
                        <label data-toggle="tab" data-target="#equipments_1">
                            <input type="radio" name="engine" checked>
                            <span>Smart Edition</span>
                        </label>
                        <label data-toggle="tab" data-target="#equipments_2">
                            <input type="radio" name="engine">
                            <span>Plus 80D Ultimate</span>
                        </label>
                        <label data-toggle="tab" data-target="#equipments_3">
                            <input type="radio" name="engine">
                            <span>Plus 80D Max</span>
                        </label>
                    </div>
                </div>
                <div class="item">
                    <div class="title">Цвет</div>
                    <div class="colors">
                        <label>
                            <input class="form-radio" type="radio" name="colors">
                            <span style="background:#2D9CDB"></span>
                        </label>
                        <label>
                            <input class="form-radio" type="radio" name="colors">
                            <span style="background:#BDBDBD"></span>
                        </label>
                        <label>
                            <input class="form-radio" type="radio" name="colors">
                            <span style="background:#FBFBFB; border-color: #4F4F4F;"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="card-features">
                <div class="main-title">Характеристики энергоэффективности:</div>
                <ul>
                    <li>Батарея на 144 кВт-год / 1008 км (NEDC)</li>
                    <li>Розгін до 100 км / год за 3,9 секунд</li>
                    <li>Потужність 360 kW / 489 к.с.</li>
                    <li>Крутний момент 700 Нм</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card-description">
            <div class="item">
                <div class="img">
                    <picture>
                        <source type="image/webp" srcset="https://placehold.jp/2A3D68/ffffff/550x400.png">
                        <img width="550" height="400" src="https://placehold.jp/2A3D68/ffffff/550x400.png" loading="lazy" alt="">
                    </picture>
                </div>
                <div class="text">
                    <h4>УСІ СКАЖУТЬ: ВАУ!</h4>
                    <p>GAC AION LX відверто приваблює зовнішнім виглядом. Авто має стрімкий, сучасний і продуманий до дрібних деталей дизайн. Своїми формами GAC AION LX схожий на фантастичні автівки з майбутнього, яке вже стало реальністю. Лаконічні лінії силуету підкреслюють силу і потужність, впевненість і раціональність.</p>
                </div>
            </div>
            <div class="item">
                <div class="img">
                    <picture>
                        <source type="image/webp" srcset="https://placehold.jp/2A3D68/ffffff/550x400.png">
                        <img width="550" height="400" src="https://placehold.jp/2A3D68/ffffff/550x400.png" loading="lazy" alt="">
                    </picture>
                </div>
                <div class="text">
                    <h4>БЕРИ ЗСОБОЮ ВСЕ НЕОБХІДНЕ</h4>
                    <p>Величезна кришка та місткість багажного відділення дозволяють без проблем вкладати та перевозити: великі валізи, дитячі візочки, велосипеди, багаж для великої сімейної подорожі, габаритні коробки при переїзді, побутову техніку, навіть будівельні матеріали та устаткування.</p>
                </div>
            </div>
            <div class="item">
                <div class="img">
                    <picture>
                        <source type="image/webp" srcset="https://placehold.jp/2A3D68/ffffff/550x400.png">
                        <img width="550" height="400" src="https://placehold.jp/2A3D68/ffffff/550x400.png" loading="lazy" alt="">
                    </picture>
                </div>
                <div class="text">
                    <h4>ВНОЧІ ЯК ВДЕНЬ</h4>
                    <p>Встановлена Full LED оптика є надзвичайно економічною. Нова технологія не потребує значної витрати заряду автомобіля. Яскравість освітлення дозволяє отримувати максимум просторової інформації на дорозі, навіть при світлі зустрічного транспорту. А суцільні задні габарити мають не лише стильний вигляд, а й підвищують безпеку, інтенсивно попереджаючи інших учасників руху.</p>
                </div>
            </div>
            <div class="item">
                <div class="img">
                    <picture>
                        <source type="image/webp" srcset="https://placehold.jp/2A3D68/ffffff/550x400.png">
                        <img width="550" height="400" src="https://placehold.jp/2A3D68/ffffff/550x400.png" loading="lazy" alt="">
                    </picture>
                </div>
                <div class="text">
                    <h4>ВСТИГАЙ ВСЕ І ВСЮДИ</h4>
                    <p>Прискорюйся від 0 до 100 км/год за 3,9 секунди! Двигун потужністю 360 kW та літій-залізо-фосфатна батарея на 144 hWh, дозволять весело та економно прошелестіти впевнені 1008 км! </p>
                </div>
            </div>
        </div>
        <div class="card-equipments">
            <table>
                <thead>
                <tr>
                    <td><span>Комплектация</span></td>
                    <td><span>Plus 80D EDITION</span></td>
                    <td><span>Plus 80D Ultimate</span></td>
                    <td><span>Plus 80D MAX</span></td>
                    <td><span>Plus Inside version</span></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Запас ходу (км)</td>
                    <td>650</td>
                    <td>600</td>
                    <td>600</td>
                    <td>1008</td>
                </tr>
                <tr>
                    <td>Час швидкого заряджання (хв)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Час повільного заряджання (год)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Максимальна потужність двигуна</td>
                    <td>180</td>
                    <td>360</td>
                    <td>360</td>
                    <td>180</td>
                </tr>
                <tr>
                    <td>Максимальний крутний момент</td>
                    <td>350</td>
                    <td>700</td>
                    <td>700</td>
                    <td>350</td>
                </tr>
                <tr>
                    <td>Кузов</td>
                    <td>5 дверний 5 місний кросовер </td>
                    <td>5 дверний 5 місний кросовер </td>
                    <td>5 дверний 5 місний кросовер </td>
                    <td>5 дверний 5 місний кросовер </td>
                </tr>
                <tr>
                    <td>Максимальна швидкість (км/год)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Прискорення 0-100 (сек)</td>
                    <td>8</td>
                    <td>4</td>
                    <td>4</td>
                    <td>8</td>
                </tr>
                <tr>
                    <td>Гальмування 100-0 (м)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Гарантія виробника</td>
                    <td>4 роки або 150 000 км </td>
                    <td>4 роки або 150 000 км </td>
                    <td>4 роки або 150 000 км </td>
                    <td>4 роки або 150 000 км </td>
                </tr>
                <tr>
                    <td>Довжина (мм)</td>
                    <td>4835</td>
                    <td>4835</td>
                    <td>4835</td>
                    <td>4835</td>
                </tr>
                <tr>
                    <td>Ширина (мм)</td>
                    <td>1935</td>
                    <td>1935</td>
                    <td>1935</td>
                    <td>1935</td>
                </tr>
                <tr>
                    <td>Висота (мм)</td>
                    <td>1685</td>
                    <td>1685</td>
                    <td>1685</td>
                    <td>1685</td>
                </tr>
                <tr>
                    <td>Колісна база (мм)</td>
                    <td>2920</td>
                    <td>2920</td>
                    <td>2920</td>
                    <td>2920</td>
                </tr>
                <tr>
                    <td>Кліренс (мм)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Кількість дверей</td>
                    <td>5</td>
                    <td>5</td>
                    <td>5</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>Кількість місць</td>
                    <td>5</td>
                    <td>5</td>
                    <td>5</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>Вага (кг)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Тип двигуна</td>
                    <td>Синхронний, постійний магніт</td>
                    <td>Синхронний, постійний магніт</td>
                    <td>Синхронний, постійний магніт</td>
                    <td>Синхронний, постійний магніт</td>
                </tr>
                <tr>
                    <td>Композит батареї</td>
                    <td>Літій-залізо фосфат (LiFePO4)</td>
                    <td>Літій-залізо фосфат (LiFePO4)</td>
                    <td>Літій-залізо фосфат (LiFePO4)</td>
                    <td>Літій-залізо фосфат (LiFePO4)</td>
                </tr>
                <tr>
                    <td>Ємність батареї (кВч)</td>
                    <td>93</td>
                    <td>93</td>
                    <td>93</td>
                    <td>93</td>
                </tr>
                <tr>
                    <td>Гарантія на батарею</td>
                    <td>Довічна для першого власника</td>
                    <td>Довічна для першого власника</td>
                    <td>Довічна для першого власника</td>
                    <td>Довічна для першого власника</td>
                </tr>
                <tr>
                    <td>Привід</td>
                    <td>Передній</td>
                    <td>Передній</td>
                    <td>Передній</td>
                    <td>Передній</td>
                </tr>
                <tr>
                    <td>Передня підвіска</td>
                    <td>Незалежна</td>
                    <td>Незалежна</td>
                    <td>Незалежна</td>
                    <td>Незалежна</td>
                </tr>
                <tr>
                    <td>Задня підвіска</td>
                    <td>Незалежна</td>
                    <td>Незалежна</td>
                    <td>Незалежна</td>
                    <td>Незалежна</td>
                </tr>
                <tr>
                    <td>Тип гальма перед</td>
                    <td>Диск</td>
                    <td>Диск</td>
                    <td>Диск</td>
                    <td>Диск</td>
                </tr>
                <tr>
                    <td>Тип гальма зад</td>
                    <td>Диск</td>
                    <td>Диск</td>
                    <td>Диск</td>
                    <td>Диск</td>
                </tr>
                <tr>
                    <td>Ручне гальмо</td>
                    <td>Електричне</td>
                    <td>Електричне</td>
                    <td>Електричне</td>
                    <td>Електричне</td>
                </tr>
                <tr>
                    <td>Розмір коліс</td>
                    <td>245/50 R19</td>
                    <td>245/50 R19</td>
                    <td>245/50 R19</td>
                    <td>245/50 R19</td>
                </tr>
                <tr>
                    <td>SRS передні</td>
                    <td>Водій, пасажир</td>
                    <td>Водій, пасажир</td>
                    <td>Водій, пасажир</td>
                    <td>Водій, пасажир</td>
                </tr>
                <tr>
                    <td>SRS бічні</td>
                    <td>Передній ряд</td>
                    <td>Передній ряд</td>
                    <td>Передній ряд</td>
                    <td>Передній ряд</td>
                </tr>
                <tr>
                    <td>SRS задні</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>Isofix</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>ABS</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>EBD/CBC</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>ASR / TCS / TRC</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>ESC / ESP / DSC</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>Парктронік</td>
                    <td>Спереду, позаду</td>
                    <td>Спереду, позаду</td>
                    <td>Спереду, позаду</td>
                    <td>Спереду, позаду</td>
                </tr>
                <tr>
                    <td>Камера</td>
                    <td>360° панорамна</td>
                    <td>360° панорамна</td>
                    <td>360° панорамна</td>
                    <td>360° панорамна</td>
                </tr>
                <tr>
                    <td>Круїз контроль</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>Режими їзди</td>
                    <td>Eco, Eco+, Normal, Sport</td>
                    <td>Eco, Eco+, Normal, Sport</td>
                    <td>Eco, Eco+, Normal, Sport</td>
                    <td>Eco, Eco+, Normal, Sport</td>
                </tr>
                <tr>
                    <td>Центральний замок</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>Безключовий доступ</td>
                    <td>Bluetooth-ключ</td>
                    <td>Bluetooth-ключ</td>
                    <td>Bluetooth-ключ</td>
                    <td>Bluetooth-ключ</td>
                </tr>
                <tr>
                    <td>Система запуску без ключа</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>Датчик дощу</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>Матеріал керма</td>
                    <td>Шкіра</td>
                    <td>Шкіра</td>
                    <td>Шкіра</td>
                    <td>Шкіра</td>
                </tr>
                <tr>
                    <td>Регулювання положнння керма</td>
                    <td>Електричне. По висоті, по вильоту</td>
                    <td>Електричне. По висоті, по вильоту</td>
                    <td>Електричне. По висоті, по вильоту</td>
                    <td>Електричне. По висоті, по вильоту</td>
                </tr>
                <tr>
                    <td>Мультируль</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>Головний дисплей</td>
                    <td>15" Тачскрін</td>
                    <td>15" Тачскрін</td>
                    <td>15" Тачскрін</td>
                    <td>15" Тачскрін</td>
                </tr>
                <tr>
                    <td>Матеріал сидіння</td>
                    <td>Шкіра</td>
                    <td>Шкіра</td>
                    <td>Шкіра</td>
                    <td>Шкіра</td>
                </tr>
                <tr>
                    <td>Регулювання водійського крісла</td>
                    <td>Електричне. Перед/зад, вгору/вниз, спинка</td>
                    <td>Електричне. Перед/зад, вгору/вниз, спинка</td>
                    <td>Електричне. Перед/зад, вгору/вниз, спинка</td>
                    <td>Електричне. Перед/зад, вгору/вниз, спинка</td>
                </tr>
                <tr>
                    <td>Мультимедіа</td>
                    <td>Bluetooth, USB</td>
                    <td>Bluetooth, USB</td>
                    <td>Bluetooth, USB</td>
                    <td>Bluetooth, USB</td>
                </tr>
                <tr>
                    <td>Керування голосом</td>
                    <td>Мультимедіа, Навігація, Телефон, Конд</td>
                    <td>Мультимедіа, Навігація, Телефон, Конд</td>
                    <td>Мультимедіа, Навігація, Телефон, Конд</td>
                    <td>Мультимедіа, Навігація, Телефон, Конд</td>
                </tr>
                <tr>
                    <td>Кількість динаміків</td>
                    <td>10</td>
                    <td>10</td>
                    <td>10</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>Світло</td>
                    <td>LED</td>
                    <td>LED</td>
                    <td>LED</td>
                    <td>LED</td>
                </tr>
                <tr>
                    <td>Ближнє</td>
                    <td>LED</td>
                    <td>LED</td>
                    <td>LED</td>
                    <td>LED</td>
                </tr>
                <tr>
                    <td>Дальнє</td>
                    <td>LED</td>
                    <td>LED</td>
                    <td>LED</td>
                    <td>LED</td>
                </tr>
                <tr>
                    <td>Ходові вогні</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>Регулювання висоти світла</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>Електричні склопідйомники</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>Тип регулювання дзеркал</td>
                    <td>Електричний</td>
                    <td>Електричний</td>
                    <td>Електричний</td>
                    <td>Електричний</td>
                </tr>
                <tr>
                    <td>Функція підігріву дзеркал</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                    <td>Так</td>
                </tr>
                <tr>
                    <td>Контроль клімату</td>
                    <td>Автоматичний для кожного ряду</td>
                    <td>Автоматичний для кожного ряду</td>
                    <td>Автоматичний для кожного ряду</td>
                    <td>Автоматичний для кожного ряду</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
