export default function() {
    document.body.addEventListener('click', (e) => {
        const tabBtn = e.target.closest('[data-toggle="tab"]');

        if(!!tabBtn && !tabBtn.classList.contains('active')) {
            tabBtn.closest('.nav-tabs').querySelector('.active')?.classList.remove('active');
            tabBtn.classList.add('active');

            document.querySelector(tabBtn.dataset.target).closest('.tab-content').querySelectorAll(':scope > .tab-pane').forEach(el => {
                el.classList.remove('active');
            });
            document.querySelector(tabBtn.dataset.target).classList.add('active');
        }
    });
}