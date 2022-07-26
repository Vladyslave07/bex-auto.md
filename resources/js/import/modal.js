export default function() {
    document.body.addEventListener('click', (e) => {
        if(!!e.target.closest('.modal') && !!!e.target.closest('.modal-body') || e.target.closest('.close-modal-js')) {
            closeModal();
        }
        if(!!e.target.closest('[data-toggle="modal"]')) {
            closeModal();
            openModal(e.target.closest('[data-toggle="modal"]').dataset.target);
            e.preventDefault();
        }
    });

    window.openModal = (e) => {
        const documentScrollbarWidth = window.innerWidth - (document.documentElement.clientWidth || document.body.clientWidth);

        document.querySelector(e)?.classList.add('is-visible');
        !!documentScrollbarWidth && (document.body.style.paddingRight = documentScrollbarWidth+'px');
        document.body.dataset.over = 'modal-open';
    }

    window.closeModal = () => {
        const modalVisible = document.querySelector('.modal.is-visible');

        if(!!modalVisible) modalVisible.classList.remove('is-visible');
        document.body.removeAttribute('data-over');
        document.body.style.paddingRight = '';
    }
}