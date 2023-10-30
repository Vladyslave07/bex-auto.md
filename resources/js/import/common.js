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
}
