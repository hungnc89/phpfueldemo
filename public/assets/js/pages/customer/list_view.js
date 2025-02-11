const toastCreateUserSuccess = document.getElementById('toast-create-user-success')
if (toastCreateUserSuccess !== null){
    const toastCoreUI = coreui.Toast.getOrCreateInstance(toastCreateUserSuccess)
    toastCoreUI.show()
}

const toastDeleteUserSuccess = document.getElementById('toast-delete-user-success')
if (toastDeleteUserSuccess !== null){
    const toastCoreUI = coreui.Toast.getOrCreateInstance(toastDeleteUserSuccess)
    toastCoreUI.show()
}


const btnCustomerEditElements = document.getElementsByClassName('btn-customer-edit');
Array.from(btnCustomerEditElements).forEach(function (item) {
    item.addEventListener('click', function () {
        window.location.href = item.getAttribute('data-url');
    });
});

const btnCustomerDeleteElements = document.getElementsByClassName('btn-customer-delete');

Array.from(btnCustomerDeleteElements).forEach((item) => {
    item.addEventListener('click', async () => {
        const confirmDeleteModalElement = document.getElementById('modal-confirm-delete');
        const confirmDeleteModalInstance = new coreui.Modal(confirmDeleteModalElement);
        const btnConfirmDelete = confirmDeleteModalElement.querySelector('.btn-confirm-delete');

        const sendRequestToServer = async () => {
            const customerId = item.getAttribute('data-id');
            const deleteUrl = item.getAttribute('data-url');

            try {
                const response = await fetch(deleteUrl, {
                    method: "POST",
                    body: JSON.stringify({ id: customerId }),
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    }
                });

                if (response.ok) {
                    const data = await response.json();
                    console.log(data);
                } else {
                    console.error('Failed to delete customer:', response.statusText);
                }
            } catch (error) {
                console.error('Error deleting customer:', error);
            } finally {
                btnConfirmDelete.removeEventListener('click', sendRequestToServer);
                confirmDeleteModalInstance.hide();
            }
            window.location.reload();
        };

        btnConfirmDelete.addEventListener('click', sendRequestToServer);
        confirmDeleteModalInstance.show();
    });
});