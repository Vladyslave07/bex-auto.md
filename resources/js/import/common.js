export default function() {
    // здесь общий для всех страниц код
    document.body.addEventListener('click', (e) => {
        if(e.target.closest('.toggle-btn')) {
            e.target.closest('.toggle-btn').parentElement.classList.toggle('open');
            e.preventDefault();
        }
    });
}
