export default function() {
    document.body.addEventListener('click', (e) => {
        if(e.target.closest('.dropdown-menu') && !e.target.closest('.dropdown .option') && !e.target.closest('.dropdown-toggle') && !e.target.closest('.dropdown-item')) return;

        document.querySelector('.dropdown.open')?.classList.remove('open');

        if(e.target.closest('.dropdown-toggle')) {
            e.target.closest('.dropdown').classList.add('open');
            e.preventDefault();
        }

        if(e.target.closest('.dropdown-item')) {
            e.target.closest('.dropdown').querySelector('.dropdown-item.selected')?.classList.remove('selected');
            e.target.closest('.dropdown-item').classList.add('selected');
            if (e.target.closest('.dropdown-item').classList.contains('option')) {
                e.target.closest('.dropdown').querySelector('.dropdown-toggle').classList.add('chosen');
                e.target.closest('.dropdown').querySelector('.dropdown-toggle').textContent = e.target.closest('.dropdown-item').textContent;
            }
        }
    });
}