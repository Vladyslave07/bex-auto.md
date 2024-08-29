export default function() {
    // здесь общий для всех страниц код
    document.body.addEventListener('click', (e) => {
        if(e.target.closest('.toggle-btn')) {
            e.target.closest('.toggle-btn').parentElement.classList.toggle('open');
            e.preventDefault();
        }
        if (e.target.closest('.lang-btn')) {
            setCookie('show_lang_switch_btn', true);
        }
    });

    function setCookie(name, value) {
        const expirationDate = new Date();
        expirationDate.setMonth(expirationDate.getMonth() + 1); // Добавляем один месяц к текущей дате
        document.cookie = `${name}=${value}; expires=${expirationDate.toUTCString()}; path=/`;
    }

    document.querySelectorAll('.menu-icons-mob .item').forEach(btn => btn.addEventListener('click', () => {
        const active = document.querySelector('.menu-icons-mob .item.active');
        const check = document.querySelector('.main-header').id == btn.dataset.target;

        active != btn && active?.classList.remove('active');
        btn.classList.toggle('active');
        document.querySelector('.main-header').id = check ? '' : btn.dataset.target ?? '';
        document.body.dataset.over = check ? '' : 'modal-open';
    }));

    // Аналитика
    window.formSubmit = function (phone) {
        dataLayer.push({'event': 'formSubmit', 'phone': event.detail.phone});
    }
}
