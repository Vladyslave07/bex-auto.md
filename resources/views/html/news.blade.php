@extends('layouts.app')

@section('title', 'Новини')

@push('styles')
    <link rel="stylesheet" href="{{ mix('css/news.css') }}">
@endpush

@push('scripts')
    <script src="{{ mix('js/news.js') }}" defer></script>
@endpush

@section('content')

<!-- ///ХЛЕБНЫЕ КРОШКИ/// -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Bexhill Trading Auto</a></li>
            <li class="breadcrumb-item"><a href="/">Про компанiю</a></li>
            <li class="breadcrumb-item" aria-current="page">Новини</li>
        </ol>
    </nav>
</div>
<!-- ///:end/// -->

<!-- ///НОВИНИ/// -->
<div class="news container">
    <div class="news-list">
        <div class="article">
            <time class="date" datetime="2021-09-02">2 Весерня 2021</time>
            <a href="#">
                <picture>
                    <source type="image/webp" srcset="{{ asset('img/example/img_28.webp') }}">
                    <img width="666" height="400" src="{{ asset('img/example/img_28.png.png') }}" alt="">
                </picture>
            </a>
            <a href="#" class="title">К чему приведут новые правила аукциона Copart</a>
            <div class="description">Начиная с апреля текущего года Copart ввел новые правила, касающиеся получения автомобилей. Все перевозчики теперь должны занимать место в электронной очереди, которую контролирует аукцион, используя приложение “Copart Transportation app”.</div>
            <a href="#" class="read-more">Читати далi</a>
        </div>
        <div class="article">
        <time class="date" datetime="2021-08-12">12 Серпня 2021</time>
            <a href="#">
                <picture>
                    <source type="image/webp" srcset="{{ asset('img/example/img_29.webp') }}">
                    <img width="666" height="400" src="{{ asset('img/example/img_29.png.png') }}" alt="">
                </picture>
            </a>
            <a href="#" class="title">Электрические и гибридные автомобили приравняли к опасным грузам</a>
            <div class="description">Благодаря последним научным разработкам и достижениям в области производства литий-ионных аккумуляторов...</div>
            <a href="#" class="read-more">Читати далi</a>
        </div>
        <div class="article">
            <time class="date" datetime="2021-09-02">2 Весерня 2021</time>
            <a href="#">
                <picture>
                    <source type="image/webp" srcset="{{ asset('img/example/img_28.webp') }}">
                    <img width="666" height="400" src="{{ asset('img/example/img_28.png.png') }}" alt="">
                </picture>
            </a>
            <a href="#" class="title">К чему приведут новые правила аукциона Copart</a>
            <div class="description">Начиная с апреля текущего года Copart ввел новые правила, касающиеся получения автомобилей. Все перевозчики теперь должны занимать место в электронной очереди, которую контролирует аукцион, используя приложение “Copart Transportation app”.</div>
            <a href="#" class="read-more">Читати далi</a>
        </div>
        <div class="article">
        <time class="date" datetime="2021-08-12">12 Серпня 2021</time>
            <a href="#">
                <picture>
                    <source type="image/webp" srcset="{{ asset('img/example/img_29.webp') }}">
                    <img width="666" height="400" src="{{ asset('img/example/img_29.png.png') }}" alt="">
                </picture>
            </a>
            <a href="#" class="title">Электрические и гибридные автомобили приравняли к опасным грузам</a>
            <div class="description">Благодаря последним научным разработкам и достижениям в области производства литий-ионных аккумуляторов...</div>
            <a href="#" class="read-more">Читати далi</a>
        </div>
    </div>
    <nav class="pagination">
        <a href="#" aria-label="pagination.previous"><svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg></a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">...</a>
        <a href="#">8</a>
        <a href="#" aria-label="pagination.next"><svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg></a>
    </nav>
</div>
<!-- ///:end/// -->

<!-- ///ПОПУЛЯРНІ МАРКИ АВТО/// -->
<div class="popular-brands">
    <div class="container">
        <div class="main-title text-center">Популярні марки авто</div>
    </div>
    <div class="list">
        <div class="container">
            <a href="#" title="Alfa Romeo">Alfa Romeo</a>
            <a href="#" title="Aston Martin">Aston Martin</a>
            <a href="#" title="Audi">Audi</a>
            <a href="#" title="Bentley">Bentley</a>
            <a href="#" title="BMW">BMW</a>
            <a href="#" title="Buick">Buick</a>
            <a href="#" title="Cadillac">Cadillac</a>
            <a href="#" title="Chevrolet">Chevrolet</a>
            <a href="#" title="Chrysler">Chrysler</a>
            <a href="#" title="Dodge">Dodge</a>
            <a href="#" title="Ducati">Ducati</a>
            <a href="#" title="Ferrari">Ferrari</a>
            <a href="#" title="Fiat">Fiat</a>
            <a href="#" title="Ford">Ford</a>
            <a href="#" title="GMC">GMC</a>
            <a href="#" title="Harley Davidson">Harley Davidson</a>
            <a href="#" title="Honda">Honda</a>
            <a href="#" title="Hummer">Hummer</a>
            <a href="#" title="Hyundai">Hyundai</a>
            <a href="#" title="Infiniti">Infiniti</a>
            <a href="#" title="Jaguar">Jaguar</a>
            <a href="#" title="Jeep">Jeep</a>
            <a href="#" title="Kawasaki">Kawasaki</a>
            <a href="#" title="KIA">KIA</a>
            <a href="#" title="Lamborghini">Lamborghini</a>
            <a href="#" title="Land Rover">Land Rover</a>
            <a href="#" title="Lexus">Lexus</a>
            <a href="#" title="Lincoln Maserati">Lincoln Maserati</a>
            <a href="#" title="Maybach">Maybach</a>
            <a href="#" title="Mazda">Mazda</a>
            <a href="#" title="McLaren">McLaren</a>
            <a href="#" title="Mercedes-Benz">Mercedes-Benz</a>
            <a href="#" title="Mini Cooper">Mini Cooper</a>
            <a href="#" title="Mitsubishi">Mitsubishi</a>
            <a href="#" title="Nissan">Nissan</a>
            <a href="#" title="Pontiac">Pontiac</a>
            <a href="#" title="Porsche">Porsche</a>
            <a href="#" title="RAM">RAM</a>
            <a href="#" title="Range Rover">Range Rover</a>
            <a href="#" title="Renault">Renault</a>
            <a href="#" title="Rolls Royce">Rolls Royce</a>
            <a href="#" title="Scion">Scion</a>
            <a href="#" title="Smart">Smart</a>
            <a href="#" title="Subaru">Subaru</a>
            <a href="#" title="Suzuki">Suzuki</a>
            <a href="#" title="Tesla">Tesla</a>
            <a href="#" title="Toyota">Toyota</a>
            <a href="#" title="Volkswagen">Volkswagen</a>
            <a href="#" title="Volvo">Volvo</a>
            <a href="#" title="Yamaha">Yamaha</a>
        </div>
    </div>
    <span class="toggle-btn visible-xs">Детальніше</span>
</div>
<!-- ///:end/// -->

<!-- ///ВІДПОВІДІ НА ПИТАННЯ/// -->
<div class="section-faq container">
    <div class="main-title text-center line-left">Відповіді на питання</div>
    <div class="item">
        <div class="title toggle-btn">
            Як перевіряються автомобілі з США?
            <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
        </div>
        <div class="body">
            <p>Перш ніж приступити до торгів, менеджери компанії проводять більше 8 етапів ретельної перевірки автомобіля. Це дозволить дізнатися, чи був автомобіль учасником ДТП, кількість власників, історію його обслуговування, надійність продавця і т.д. Всі дані про автомобіль надаються клієнту і, тільки після його схвалення, менеджер приступає до процесу торгів.</p>
        </div>
    </div>
    <div class="item">
        <div class="title toggle-btn">
            Є машини, які вже можна подивитися "вживу"?
            <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
        </div>
        <div class="body">
            <p>"Bexhill Trading Auto" надає можливість придбання авто на території України. Перед покупкою можна подивитися вподобаний автомобіль в тому місті, де він знаходиться (в Одесі, Києві, Харкові чи Львові). Ознайомитися з асортиментом можна в розділі - <a href="#">авто з США в наявності</a>.</p>
        </div>
    </div>
    <div class="item open">
        <div class="title toggle-btn">
            Що включає в себе поняття "авто під ключ"?
            <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
        </div>
        <div class="body">
            <p>При покупці авто під ключ компанія здійснює комплекс послуг, який включає підбір авто, торги, оформлення необхідних документів, транспортування по США, доставку в порт України і розмитнення. У розділі "<a href="#">Авто з американських аукціонів</a>" можна подивитися цікаві варіанти, які можна пригнати під ключ. Крім того, "Bexhill Trading Auto" надає послуги з ремонту та сертифікації, які оплачуються окремо.</p>
        </div>
    </div>
    <div class="item">
        <div class="title toggle-btn">
            Які документи отримують наші клієнти на автомобілі з США?
            <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
        </div>
        <div class="body">
            <p>TITLE (техпаспорт на автомобіль), інвойс, свідоцтво про реєстрацію та митна декларація.</p>
        </div>
    </div>
    <div class="item">
        <div class="title toggle-btn">
            Чи надає компанія гарантії?
            <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
        </div>
        <div class="body">
            <p>Компанія укладає договір з кожним клієнтом і зобов’язується виконувати всі умови договору. Всі платежі здійснюються поетапно і відправляються на розрахунковий рахунок, вказаний в договорі. Фахівці компанії зобов’язуються здійснювати якісний підбір авто і забезпечувати супровід аж до прибуття автомобіля в Україну. Крім того, ми рекомендуємо застрахувати авто на час перевезення з США в Україну, що послужить додатковою гарантією. Ця послуга не є обов’язковою і здійснюється тільки на розсуд клієнта.</p>
        </div>
    </div>
    <div class="item">
        <div class="title toggle-btn">
            Скільки часу займає доставка авто з США?
            <svg width="24" height="30"><use xlink:href="#arrow-icon"></use></svg>
        </div>
        <div class="body">
            <p>Терміни доставки авто з США залежать від: віддаленості авто від місцезнаходження аукціону і порту відправлення; погодних умов або непередбачених ситуацій, на які неможливо вплинути; приблизний термін доставки авто в Україні складає від 30 до 60 днів.</p>
        </div>
    </div>
</div>
<!-- ///:end/// -->

<!-- ///SEO - ТЕКСТ/// -->
<div class="section-seo container">
    <div class="seo-inner">
        <h2 class="main-title noline"> <span class="hidden-xs">Компания</span> <span class="color-red">Bexhill</span> <span class="color-blue">Trading</span> Auto – автомобили из США</h2>
        <p>Bexhill Trading Auto – официальный дилер IAAI, Copart, Manheim на территории Украины, занимающееся пригоном и продажей авто из США. мы являемся официальным партнером автомобильных аукционов, таких как IAAI, Copart и Manheim. Одновременно наша компания активно развивается на востоке – уже более двух лет возим авто из Кореи.</p>
        <h3>Почему ввоз <span class="color-red">авто из США?</span></h3>
        <p>Ми порівняли ринки США з Європейськими та зрозуміли, що покупка автомобіля в Америці вигідніше в кілька разів, як би парадоксально це не звучало. Це спричинено продуманою логістикою, рівнем розвитку сервісів по оцінюванню стану авто та самим процесом покупки автомобіля.</p>
        <p>Більшість громадян США беруть автомобіль в лізинг на кілька років і весь час експлуатації сама лізингова компанія займається постійним ТО автомобіля, внаслідок чого, машини з США – один з кращих виборів для автолюбителів України.</p>
        <h3>Через що така низька ціна?</h3>
        <p>Биті автомобілі з США викуповуються з аукціонів страхових компаній. На цих аукціонах машина втрачає половину ціни навіть через мінімальні пошкодження. Якщо враховувати грошові витрати, а саме викуп, доставку, митницю і ремонт, то ціна аналогічного за станом автомобіля в Україні буде вище на 35-50%, а нові будуть коштувати космічних грошей.</p>
        <h3>Комплектації європейських і американських автомобілів</h3>
        <p>Відмітна риса автомобілів з США – переважання повної комплектації над базовою. Через це автомобіль в «максималці» буде коштувати трохи дорожче «порожнього» автомобіля, тому найвигідніше рішення – покупка машини з США в «повному фарші». Більш детально ви можете прочитати в нашій статті – “Основні відмінності американських авто від європейських”.</p>
        <h3>Пробіг</h3>
        <p>Ми спеціально підбираємо автомобілі з Америки на аукціонах з найнижчим показником пробігу. Це дозволяє вам надалі чітко розуміти, як буде вести себе автомобіль на дистанції в декілька років.</p>
        <h3>Обслуговування</h3>
        <p>Сфера автомобільного обслуговування в Америці розвивалася разом зі світовим автомобілебудуванням. Всі американці чесно проходять ТО, і записи про це залишаються в базі, автомобіль майже зі стовідсотковою ймовірністю буде прогнозованим. Продаж в більшості випадків проходить без посередників.</p>
        <h3>Модельний ряд</h3>
        <p>Американці щорічно продають сотні тисяч особистих автомобілів різних марок на аукціонах авто в США.</p>
        <h3>Робота аукціонів з американськими автомобілями:</h3>
        <p>Після отримання доступу до торгів наш співробітник робить ставку на викуп машини.</p>
        <p>Автомобіль дістається тому, чия ставка буде вище за інших. Якщо ставка зайшла, то починається складний процес отримання документів на автомобіль, транспортування на майданчик компанії в США, потім в порт і далі в Україну.</p>
        <p>Що потрібно від клієнта? Вам потрібно оголосити максимальну вартість викупу машини (цей момент обговорюється ще до торгів на аукціоні, виходячи з прогнозованої ціни на торгах прораховується автомобіль «під ключ» в Україні.</p>
        <p>Далі машина відправляється в плавання до України. Час транспортування буває не більше 10 тижнів з моменту виграшу і оформлення автомобіля.</p>
        <h3>Особливість торгів на аукціонах</h3>
        <p>Як вже говорилося вище, для участі в торгах людина повинна мати спеціальний доступ, тому покупка автомобіля з аукціону в США для рядового громадянина України буде непростим завданням, але тільки не для нас. Компанія Bexhill Trading Auto отримала доступ до відкритих і закритих аукціонів, що дозволяє купити авто з США, орієнтуючись на переваги клієнта і здійснювати пригін авто в Україну під замовлення.</p>
        <p>Наші клієнти замовляють автомобіль зі Сполучених штатів Америки за ціною на 35-50% нижчою від ринкової. На аукціонах щотижня реалізуються тисячі автомобілів страхових компаній, серед них є дизельні, бензинові, гібриди і електромобілі. Ми можемо організувати транспортування автомобіля не тільки до України, але і по території України (крім тимчасово окупованих територій Донецької і Луганської області, і АР Крим).</p>
        <h3>Чому ми?</h3>
        <h3>Власні автосалони</h3>
        <p>Компанія Bexhill Trading Auto відкрила власні автомобільні салони в містах України: Києві, Одесі, Харкові та Миколаєві. Нам дуже важливо, щоб клієнти відчували себе безпечно в процесі покупки і доставки автомобіля з США. Кількість салонів згодом тільки зростає, заплановані відкриття філій в інших містах України, щоб постійно клієнти вибирали авто з Америки в наявності.</p>
        <h3>Посередники</h3>
        <p>Компанія Bexhill Trading Auto уклала договір з посередниками в Штатах, які допомагають нам привезти авто в цілості й схоронності, зіставляють заявлений та реальний стан автомобіля, перевіряють машину і всі агрегати на наявність прихованих пошкоджень.</p>
        <h3>Особистий кабінет</h3>
        <p>Покупці після укладення угоди отримують доступ до особистого кабінету клієнта Bexhill Trading Auto, де вони можуть спостерігати за статусом автомобіля, бачити повну суму виплат і іншу необхідну інформацію.</p>
        <h3>Консультування</h3>
        <p>Наші фахівці готові 24/7 консультувати з будь-яких питань, пов’язаних з бажанням купити авто з США б/у. За консультації не потрібно платити додатково, наша внутрішня політика передбачає роботу з клієнтом як до укладення договору, так і після транспортування автомобіля в Україну.</p>
        <h3>Ремонт американських авто і підбір запчастин</h3>
        <p>Спеціально для допомоги клієнтам відкрили власну СТО, де наші механіки продіагностують автомобілі з США б/у, відремонтують або допоможуть замовити необхідні запчастини, які не знайдеш на ринку України.</p>
        <h3>Автомобіль з Америки під ключ</h3>
        <p>Надаємо послуги з купівлі авто з США під ключ, коли клієнт лише називає свій бюджет, а наші фахівці самі займаються пошуком авто, купівлею, транспортуванням в Україну, митним очищенням і постановкою на облік.</p>
        <h3>Купити авто з США</h3>
        <p>Компанія Bexhill Trading Auto з радістю допоможе вибрати, придбати і отримати автомобіль мрії з США. Менеджери врахують всі вимоги та побажання, звернуть увагу на нюанси покупки конкретної моделі і будуть на зв’язку 24 години на добу, щоб проконсультувати з питань, пов’язаних з роботою компанії.</p>
    </div>
    <span class="toggle-btn" data-text="Згорнути">Детальніше</span>
</div>
<!-- ///:end/// -->

<!-- ///ЗАМОВТЕ РОЗРАХУНОК/// -->
<div class="section-order-calculation container">
    <div class="text">
        <div class="main-title noline">Замовте розрахунок вартості <span class="color-blue">придбання та доставки вашого авто</span></div>
        <form class="form" action="#" novalidate autocomplete="off">
            <strong class="title">Вкажіть ваш телефон та наш менеджер зв'яжеться з вами</strong>
            <div class="form-group">
                <input class="form-control" placeholder="Им`я" type="text" oninput="this.value = this.value.replace(/[0-9]/g, '');" required>
                <div class="invalid-feedback">Поле обов'язкове до заповнення</div>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="+380 ( _____ )" data-type="tel" required>
                <div class="invalid-feedback">Поле обов'язкове до заповнення</div>
            </div>
            <button class="btn" type="submit">Замовити розрахунок</button>
        </form>
    </div>
    <picture class="img">
        <source type="image/webp" srcset="{{ asset('img/order-calculation.webp') }}">
        <img width="340" height="346" src="{{ asset('img/order-calculation.png') }}" loading="lazy" alt="">
    </picture>
</div>
<!-- ///:end/// -->
@endsection