document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('detail-modal');
    const closeBtn = modal.querySelector('.modal-close');

    document.querySelectorAll('.detail-button').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');

            const data = document.getElementById(`modal-data-${id}`);

            document.getElementById('modal-name').textContent = data.querySelector('.modal-name').textContent;
            document.getElementById('modal-gender').textContent = data.querySelector('.modal-gender').textContent;
            document.getElementById('modal-email').textContent = data.querySelector('.modal-email').textContent;
            document.getElementById('modal-tel').textContent = data.querySelector('.modal-tel').textContent;
            document.getElementById('modal-address').textContent = data.querySelector('.modal-address').textContent;
            document.getElementById('modal-building').textContent = data.querySelector('.modal-building').textContent;
            document.getElementById('modal-category').textContent = data.querySelector('.modal-category').textContent;
            document.getElementById('modal-detail').textContent = data.querySelector('.modal-detail').textContent;

            const deleteForm = document.getElementById('modal-delete-form');
            deleteForm.setAttribute('action', `/admin/${id}`);

            modal.style.display = 'block';
        });
    });

    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});